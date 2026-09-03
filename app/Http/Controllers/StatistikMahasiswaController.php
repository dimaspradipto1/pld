<?php

namespace App\Http\Controllers;

use App\DataTables\StatistikMahasiswaDataTable;
use App\Http\Requests\StatistikMahasiswaRequest;
use App\Models\StatistikMahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StatistikMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StatistikMahasiswaDataTable $dataTable)
    {
        return $dataTable->render('pages.statistik-mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $jenisDisabilitas = StatistikMahasiswa::listJenisDisabilitas();
        $fakultas = StatistikMahasiswa::listFakultas();

        return view('pages.statistik-mahasiswa.create', compact('jenisDisabilitas', 'fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatistikMahasiswaRequest $request): RedirectResponse
    {
        StatistikMahasiswa::create($request->validated());

        alert()->success('Berhasil!', 'Data mahasiswa berhasil ditambahkan.');

        return redirect()->route('admin-statistik-mahasiswa.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatistikMahasiswa $admin_statistik_mahasiswa): View
    {
        $mahasiswa = $admin_statistik_mahasiswa;
        $jenisDisabilitas = StatistikMahasiswa::listJenisDisabilitas();
        $fakultas = StatistikMahasiswa::listFakultas();

        return view('pages.statistik-mahasiswa.edit', compact('mahasiswa', 'jenisDisabilitas', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatistikMahasiswaRequest $request, StatistikMahasiswa $admin_statistik_mahasiswa): RedirectResponse
    {
        $admin_statistik_mahasiswa->update($request->validated());

        alert()->success('Berhasil!', 'Data mahasiswa berhasil diperbarui.');

        return redirect()->route('admin-statistik-mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatistikMahasiswa $admin_statistik_mahasiswa): RedirectResponse
    {
        $admin_statistik_mahasiswa->delete();

        alert()->success('Berhasil!', 'Data mahasiswa berhasil dihapus.');

        return redirect()->route('admin-statistik-mahasiswa.index');
    }

    /**
     * Hapus beberapa data mahasiswa terpilih (Multi-Select Delete)
     */
    public function bulkDelete(Request $request): RedirectResponse
    {
        $ids = $request->input('ids');

        if (empty($ids) || !is_array($ids)) {
            alert()->error('Gagal', 'Tidak ada data mahasiswa yang dipilih untuk dihapus.');
            return redirect()->route('admin-statistik-mahasiswa.index');
        }

        $count = StatistikMahasiswa::whereIn('id', $ids)->delete();

        alert()->success('Berhasil!', "Sebanyak {$count} data mahasiswa terpilih berhasil dihapus.");

        return redirect()->route('admin-statistik-mahasiswa.index');
    }

    /**
     * Hapus semua data mahasiswa (Delete All / Kosongkan)
     */
    public function deleteAll(): RedirectResponse
    {
        $count = StatistikMahasiswa::count();

        StatistikMahasiswa::truncate();

        alert()->success('Berhasil!', "Semua data mahasiswa ({$count} data) berhasil dikosongkan.");

        return redirect()->route('admin-statistik-mahasiswa.index');
    }

    /**
     * Download Template Excel Format Pengisian Data Mahasiswa Disabilitas
     */
    public function downloadTemplate(): StreamedResponse
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Template Mahasiswa PLD');

        // Header definitions
        $headers = [
            'A1' => 'No',
            'B1' => 'NIM',
            'C1' => 'Nama Lengkap Mahasiswa *',
            'D1' => 'Jenis Kelamin (L/P) *',
            'E1' => 'Jenis Disabilitas *',
            'F1' => 'Fakultas *',
            'G1' => 'Program Studi *',
            'H1' => 'Tahun Angkatan *',
            'I1' => 'Status (Aktif/Lulus/Cuti) *',
            'J1' => 'Keterangan',
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        // Header Styling (Deep Navy PLD #141B39 dengan teks putih)
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '141B39'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '283759'],
                ],
            ],
        ];
        $sheet->getStyle('A1:J1')->applyFromArray($headerStyle);
        $sheet->getRowDimension(1)->setRowHeight(32);

        // Sample Data Rows
        $sampleData = [
            [1, '24011001', 'Ahmad Pratama', 'L', 'Tunanetra', 'Fakultas Ilmu Komputer', 'Teknik Informatika', 2024, 'Aktif', 'Pendampingan screen reader & modul audio'],
            [2, '24011002', 'Siti Rahmawati', 'P', 'Tunarungu', 'Fakultas Ekonomi & Bisnis', 'Manajemen', 2024, 'Aktif', 'Fasilitas juru bahasa isyarat (BISINDO)'],
            [3, '23011003', 'Dimas Santoso', 'L', 'Tunadaksa', 'Fakultas Teknik', 'Teknik Industri', 2023, 'Aktif', 'Akses kelas di lantai 1 & ramp kursi roda'],
            [4, '22011004', 'Anisa Lestari', 'P', 'Tunagrahita', 'Fakultas Agama Islam', 'Pendidikan Agama Islam', 2022, 'Aktif', 'Akomodasi waktu ujian tambahan & peer tutor'],
            [5, '21011005', 'Rizky Wijaya', 'L', 'Kesulitan Belajar', 'Fakultas Hukum', 'Ilmu Hukum', 2021, 'Lulus', 'Telah menyelesaikan skripsi dan yudisium'],
        ];

        $rowNum = 2;
        foreach ($sampleData as $row) {
            $sheet->setCellValue('A' . $rowNum, $row[0]);
            $sheet->setCellValueExplicit('B' . $rowNum, (string)$row[1], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('C' . $rowNum, $row[2]);
            $sheet->setCellValue('D' . $rowNum, $row[3]);
            $sheet->setCellValue('E' . $rowNum, $row[4]);
            $sheet->setCellValue('F' . $rowNum, $row[5]);
            $sheet->setCellValue('G' . $rowNum, $row[6]);
            $sheet->setCellValue('H' . $rowNum, $row[7]);
            $sheet->setCellValue('I' . $rowNum, $row[8]);
            $sheet->setCellValue('J' . $rowNum, $row[9]);

            // Row Styling
            $sheet->getStyle("A{$rowNum}:J{$rowNum}")->applyFromArray([
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
            $sheet->getStyle("B{$rowNum}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("D{$rowNum}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("H{$rowNum}:I{$rowNum}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getRowDimension($rowNum)->setRowHeight(24);
            $rowNum++;
        }

        // Column widths
        $sheet->getColumnDimension('A')->setWidth(6);
        $sheet->getColumnDimension('B')->setWidth(16);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(22);
        $sheet->getColumnDimension('F')->setWidth(28);
        $sheet->getColumnDimension('G')->setWidth(26);
        $sheet->getColumnDimension('H')->setWidth(18);
        $sheet->getColumnDimension('I')->setWidth(24);
        $sheet->getColumnDimension('J')->setWidth(40);

        // Petunjuk pengisian
        $noteRow = $rowNum + 1;
        $sheet->setCellValue("C{$noteRow}", "PETUNJUK PENGISIAN FORMAT IMPORT:");
        $sheet->getStyle("C{$noteRow}")->getFont()->setBold(true)->getColor()->setRGB('D32F2F');

        $notes = [
            "1. Kolom bertanda (*) Nama, Jenis Kelamin, Jenis Disabilitas, Fakultas, Program Studi, Angkatan, dan Status WAJIB diisi.",
            "2. Kolom Jenis Kelamin diisi: L (Laki-laki) atau P (Perempuan).",
            "3. Kolom Jenis Disabilitas dapat diisi: Tunanetra, Tunadaksa, Tunarungu, Tunagrahita, Kesulitan Belajar, Tunawicara, Autisme, atau Lainnya.",
            "4. Kolom Fakultas dapat diisi: Fakultas Ilmu Komputer, Fakultas Teknik, Fakultas Ekonomi & Bisnis, Fakultas Agama Islam, Fakultas Hukum, atau nama fakultas lainnya.",
            "5. Kolom Tahun Angkatan diisi format 4 digit angka tahun (contoh: 2024).",
            "6. Kolom Status diisi: Aktif, Lulus, atau Cuti.",
            "7. Anda dapat menghapus atau menimpa baris contoh di atas sebelum mengunggah file hasil inputan."
        ];

        foreach ($notes as $idx => $note) {
            $currRow = $noteRow + 1 + $idx;
            $sheet->setCellValue("C{$currRow}", $note);
            $sheet->getStyle("C{$currRow}")->getFont()->setSize(10)->getColor()->setRGB('555555');
        }

        $fileName = 'Template_Import_Mahasiswa_PLD.xlsx';

        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Cache-Control' => 'max-age=0',
        ]);
    }

    /**
     * Import Data Mahasiswa Disabilitas dari File Excel / CSV
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
                alert()->error('Gagal', 'File Excel kosong atau tidak memiliki baris data.');
                return redirect()->route('admin-statistik-mahasiswa.index');
            }

            $importedCount = 0;

            foreach ($rows as $index => $row) {
                if ($index === 1) {
                    continue; // Skip header row
                }

                $nim             = trim($row['B'] ?? '');
                $nama            = trim($row['C'] ?? '');
                $jenisKelamin    = strtoupper(trim($row['D'] ?? 'L'));
                $jenisDisabilitas= trim($row['E'] ?? '');
                $fakultas        = trim($row['F'] ?? '');
                $prodi           = trim($row['G'] ?? '');
                $angkatan        = (int) trim($row['H'] ?? date('Y'));
                $status          = trim($row['I'] ?? 'Aktif');
                $keterangan      = trim($row['J'] ?? '');

                // Abaikan baris kosong atau bila mencapai teks petunjuk pengisian
                if (empty($nama) || str_starts_with(strtoupper($nama), 'PETUNJUK')) {
                    continue;
                }

                // Normalisasi jenis kelamin
                if ($jenisKelamin !== 'L' && $jenisKelamin !== 'P') {
                    $jenisKelamin = str_starts_with($jenisKelamin, 'P') ? 'P' : 'L';
                }

                // Normalisasi status
                $statusValid = in_array($status, ['Aktif', 'Lulus', 'Cuti']) ? $status : 'Aktif';

                StatistikMahasiswa::create([
                    'nim'               => $nim ?: null,
                    'nama'              => $nama,
                    'jenis_kelamin'     => $jenisKelamin,
                    'jenis_disabilitas' => $jenisDisabilitas ?: 'Lainnya',
                    'fakultas'          => $fakultas ?: 'Universitas Ibnu Sina',
                    'prodi'             => $prodi ?: 'Umum',
                    'angkatan'          => $angkatan ?: (int)date('Y'),
                    'status'            => $statusValid,
                    'keterangan'        => $keterangan ?: null,
                ]);

                $importedCount++;
            }

            alert()->success('Berhasil!', "Proses impor selesai! Sebanyak {$importedCount} data mahasiswa disabilitas berhasil diimpor.");

            return redirect()->route('admin-statistik-mahasiswa.index');

        } catch (\Exception $e) {
            alert()->error('Gagal', 'Terjadi kesalahan saat memproses file Excel: ' . $e->getMessage());
            return redirect()->route('admin-statistik-mahasiswa.index');
        }
    }
}
