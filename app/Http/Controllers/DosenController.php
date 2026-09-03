<?php

namespace App\Http\Controllers;

use App\DataTables\DosenDataTable;
use App\Http\Requests\DosenRequest;
use App\Models\Dosen;
use App\Models\Layanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DosenController extends Controller
{
    public function index(DosenDataTable $dataTable)
    {
        $prodis = Layanan::where('aktif', true)->orderBy('urutan')->get();
        return $dataTable->render('pages.dosen.index', compact('prodis'));
    }

    public function create(): View
    {
        $prodis = Layanan::where('aktif', true)->orderBy('urutan')->get();
        return view('pages.dosen.create', compact('prodis'));
    }

    public function store(DosenRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active');

        if ($request->filled('layanan_id')) {
            $prodi = Layanan::find($request->layanan_id);
            $data['prodi_nama'] = $prodi?->judul;
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('dosen/foto', 'public');
        }

        Dosen::create($data);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen): View
    {
        $prodis = Layanan::where('aktif', true)->orderBy('urutan')->get();
        return view('pages.dosen.edit', compact('dosen', 'prodis'));
    }

    public function update(DosenRequest $request, Dosen $dosen): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active');

        if ($request->filled('layanan_id')) {
            $prodi = Layanan::find($request->layanan_id);
            $data['prodi_nama'] = $prodi?->judul;
        }

        if ($request->hasFile('foto')) {
            if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
                Storage::disk('public')->delete($dosen->foto);
            }
            $data['foto'] = $request->file('foto')->store('dosen/foto', 'public');
        }

        $dosen->update($data);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen): RedirectResponse
    {
        if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
            Storage::disk('public')->delete($dosen->foto);
        }

        $dosen->delete();

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }

    /**
     * Hapus beberapa data dosen terpilih (Multi-Select Delete)
     */
    public function bulkDelete(Request $request): RedirectResponse
    {
        $ids = $request->input('ids');

        if (empty($ids) || !is_array($ids)) {
            return redirect()
                ->route('dosen.index')
                ->with('error', 'Tidak ada data dosen yang dipilih untuk dihapus.');
        }

        $dosens = Dosen::whereIn('id', $ids)->get();
        $count = $dosens->count();

        foreach ($dosens as $dosen) {
            if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
                Storage::disk('public')->delete($dosen->foto);
            }
            $dosen->delete();
        }

        return redirect()
            ->route('dosen.index')
            ->with('success', "Berhasil menghapus {$count} data dosen terpilih.");
    }

    /**
     * Hapus semua data dosen (Delete All)
     */
    public function deleteAll(): RedirectResponse
    {
        $dosens = Dosen::all();
        $count = $dosens->count();

        foreach ($dosens as $dosen) {
            if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
                Storage::disk('public')->delete($dosen->foto);
            }
            $dosen->delete();
        }

        return redirect()
            ->route('dosen.index')
            ->with('success', "Semua data dosen ({$count} data) berhasil dikosongkan.");
    }

    /**
     * Download Template Excel Format Pengisian Dosen
     */
    public function downloadTemplate(): StreamedResponse
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Template Dosen PLD');

        // Headers
        $headers = [
            'A1' => 'No',
            'B1' => 'Nama Lengkap & Gelar Dosen *',
            'C1' => 'Program Studi *',
            'D1' => 'Jabatan Fungsional',
            'E1' => 'NIDN',
            'F1' => 'NUPTK',
            'G1' => 'Link Profil (PDDIKTI / SINTA / GScholar)',
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        // Header Styling (Ungu PLD #823ca2 dengan teks putih)
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '823CA2'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '5A2475'],
                ],
            ],
        ];
        $sheet->getStyle('A1:G1')->applyFromArray($headerStyle);
        $sheet->getRowDimension(1)->setRowHeight(32);

        // Ambil data prodi aktif sebagai contoh
        $prodis = Layanan::where('aktif', true)->pluck('judul')->toArray();
        $prodi1 = $prodis[0] ?? 'S1 Kesehatan dan Keselamatan Kerja';
        $prodi2 = $prodis[1] ?? 'S1 Kesehatan Lingkungan';
        $prodi3 = $prodis[2] ?? 'S2 Kesehatan Masyarakat';

        // Sample Data Rows
        $sampleData = [
            [1, 'Dr. Hengky Oktarizal, S.KM., M.KM', $prodi1, 'Lektor Kepala', '1021088101', '7153759660110033', 'https://pddikti.kemdiktisaintek.go.id'],
            [2, 'Dr. Ir. Hendra Saputra, M.Si., M.Kes', $prodi2, 'Lektor Kepala', '1011037801', '6142756658110022', 'https://pddikti.kemdiktisaintek.go.id'],
            [3, 'Prof. Dr. dr. H. Syamsudin, M.Kes., FISPH', $prodi3, 'Guru Besar', '1004016501', '5132743645110011', 'https://pddikti.kemdiktisaintek.go.id'],
        ];

        $rowNum = 2;
        foreach ($sampleData as $row) {
            $sheet->setCellValue('A' . $rowNum, $row[0]);
            $sheet->setCellValue('B' . $rowNum, $row[1]);
            $sheet->setCellValue('C' . $rowNum, $row[2]);
            $sheet->setCellValue('D' . $rowNum, $row[3]);
            $sheet->setCellValueExplicit('E' . $rowNum, $row[4], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('F' . $rowNum, $row[5], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('G' . $rowNum, $row[6]);

            // Styling row data
            $sheet->getStyle("A{$rowNum}:G{$rowNum}")->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => 'D0D5DD'],
                    ],
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ]);
            $sheet->getStyle("A{$rowNum}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("E{$rowNum}:F{$rowNum}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getRowDimension($rowNum)->setRowHeight(24);
            $rowNum++;
        }

        // Auto size columns
        $sheet->getColumnDimension('A')->setWidth(8);
        $sheet->getColumnDimension('B')->setWidth(40);
        $sheet->getColumnDimension('C')->setWidth(38);
        $sheet->getColumnDimension('D')->setWidth(24);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(24);
        $sheet->getColumnDimension('G')->setWidth(45);

        // Petunjuk pengisian di bawah data
        $noteRow = $rowNum + 1;
        $sheet->setCellValue("B{$noteRow}", "PETUNJUK PENGISIAN:");
        $sheet->getStyle("B{$noteRow}")->getFont()->setBold(true)->getColor()->setRGB('D32F2F');

        $notes = [
            "1. Kolom bertanda (*) Nama Lengkap & Gelar Dosen serta Program Studi WAJIB diisi.",
            "2. Kolom Program Studi dapat diisi dengan nama prodi yang ada di PLD (contoh: {$prodi1}, {$prodi2}, {$prodi3}).",
            "3. Kolom Jabatan Fungsional dapat diisi: Tenaga Pengajar, Asisten Ahli, Lektor, Lektor Kepala, atau Guru Besar.",
            "4. Kolom NIDN, NUPTK, dan Link Profil bersifat opsional. Pastikan format angka NIDN/NUPTK tidak terpotong (disimpan sebagai teks).",
            "5. Anda dapat menghapus baris contoh sebelum mengunggah file hasil inputan."
        ];

        foreach ($notes as $idx => $note) {
            $currRow = $noteRow + 1 + $idx;
            $sheet->setCellValue("B{$currRow}", $note);
            $sheet->getStyle("B{$currRow}")->getFont()->setSize(10)->getColor()->setRGB('555555');
        }

        $fileName = 'Template_Import_Dosen_PLD.xlsx';

        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Cache-Control' => 'max-age=0',
        ]);
    }

    /**
     * Import Data Dosen dari File Excel / CSV
     */
    public function importExcel(Request $request): RedirectResponse
    {
        $request->validate([
            'file_excel' => ['required', 'file', 'mimes:xlsx,xls,csv', 'max:10240'],
        ], [
            'file_excel.required' => 'Silakan pilih file Excel / CSV yang akan diimpor.',
            'file_excel.mimes'    => 'Format file harus berupa .xlsx, .xls, atau .csv.',
            'file_excel.max'      => 'Ukuran file maksimal 10MB.',
        ]);

        try {
            $file = $request->file('file_excel');
            $spreadsheet = IOFactory::load($file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true);

            if (count($rows) <= 1) {
                return redirect()
                    ->route('dosen.index')
                    ->with('error', 'File Excel kosong atau tidak memiliki data.');
            }

            $allProdis = Layanan::all();
            $importedCount = 0;
            $skippedCount = 0;

            // Loop data mulai dari baris ke-2 (mengabaikan header)
            foreach ($rows as $index => $row) {
                if ($index === 1) {
                    continue; // Skip header
                }

                $namaDosen = trim($row['B'] ?? '');
                $namaProdi = trim($row['C'] ?? '');
                $jabatanFungsional = trim($row['D'] ?? '');
                $nidn = trim($row['E'] ?? '');
                $nuptk = trim($row['F'] ?? '');
                $link = trim($row['G'] ?? '');

                // Stop jika baris kosong atau mencapai petunjuk pengisian
                if (empty($namaDosen) || str_starts_with(strtoupper($namaDosen), 'PETUNJUK')) {
                    continue;
                }

                // Cari prodi yang cocok
                $matchedProdi = null;
                if (!empty($namaProdi)) {
                    $matchedProdi = $allProdis->first(function ($p) use ($namaProdi) {
                        return stripos($p->judul, $namaProdi) !== false || stripos($namaProdi, $p->judul) !== false;
                    });
                }

                Dosen::create([
                    'layanan_id'         => $matchedProdi?->id,
                    'prodi_nama'         => $matchedProdi?->judul ?? $namaProdi,
                    'nama_dosen'         => $namaDosen,
                    'jabatan_fungsional' => $jabatanFungsional ?: null,
                    'nidn'               => $nidn ?: null,
                    'nuptk'              => $nuptk ?: null,
                    'link'               => $link ?: null,
                    'is_active'          => true,
                ]);

                $importedCount++;
            }

            return redirect()
                ->route('dosen.index')
                ->with('success', "Proses impor selesai! Sebanyak {$importedCount} data dosen berhasil diimpor ke database.");

        } catch (\Exception $e) {
            return redirect()
                ->route('dosen.index')
                ->with('error', 'Terjadi kesalahan saat memproses file Excel: ' . $e->getMessage());
        }
    }
}
