<?php

namespace App\DataTables;

use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VolunteerDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Volunteer> $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('nama_lengkap', function (Volunteer $v) {
                return '<div>
                            <span class="fw-bold text-dark d-block">' . e($v->nama_lengkap) . '</span>
                            <span class="small text-muted">NIM: ' . e($v->nim ?: '-') . ' &bull; ' . e($v->jurusan_prodi ?: '-') . '</span>
                        </div>';
            })
            ->addColumn('kontak', function (Volunteer $v) {
                $waNum = preg_replace('/[^0-9]/', '', $v->no_hp_wa);
                if (str_starts_with($waNum, '0')) {
                    $waNum = '62' . substr($waNum, 1);
                }
                return '<div class="small">
                            <div><i class="bi bi-whatsapp text-success me-1"></i><a href="https://wa.me/' . $waNum . '" target="_blank">' . e($v->no_hp_wa) . '</a></div>
                            <div><i class="bi bi-envelope text-primary me-1"></i><a href="mailto:' . e($v->email) . '">' . e($v->email) . '</a></div>
                        </div>';
            })
            ->addColumn('keahlian', function (Volunteer $v) {
                return '<span class="badge" style="background:#283759; color:#fff;">' . e(\Illuminate\Support\Str::limit($v->keahlian ?: 'Umum', 35)) . '</span>';
            })
            ->addColumn('status', function (Volunteer $v) {
                if ($v->status === 'Diterima') {
                    return '<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Diterima</span>';
                } elseif ($v->status === 'Ditolak') {
                    return '<span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Ditolak</span>';
                } else {
                    return '<span class="badge" style="background:#79a8e2; color:#fff;"><i class="bi bi-hourglass-split me-1"></i>Menunggu Review</span>';
                }
            })
            ->addColumn('created_at', function (Volunteer $v) {
                return '<span class="small text-muted">' . $v->created_at->format('d M Y, H:i') . '</span>';
            })
            ->addColumn('action', function (Volunteer $v) {
                $btn  = '<div class="d-flex justify-content-center align-items-center" style="gap:5px">';
                $btn .= '<a href="' . route('volunteer.show', $v->id) . '"
                            class="btn btn-sm btn-info text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Detail / Ubah Status">
                            <i class="bi bi-eye-fill" style="font-size:12px"></i>
                         </a>';
                $btn .= '<form action="' . route('volunteer.destroy', $v->id) . '"
                               method="POST" class="m-0"
                               onsubmit="return confirm(\'Yakin ingin menghapus data relawan ini?\')">'
                        . csrf_field() . method_field('DELETE')
                        . '<button type="submit"
                                   class="btn btn-sm btn-danger"
                                   style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                                   title="Hapus">
                                   <i class="bi bi-trash-fill" style="font-size:12px"></i>
                           </button>
                         </form>';
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['nama_lengkap', 'kontak', 'keahlian', 'status', 'created_at', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Volunteer $model): QueryBuilder
    {
        return $model->newQuery()->latest('id');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('volunteer-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->parameters([
                        'pageLength' => 10,
                        'language'   => [
                            'url' => '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
                        ],
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->width(40)->addClass('text-center'),
            Column::make('nama_lengkap')->title('Pendaftar & Akademik'),
            Column::make('kontak')->title('Kontak (WA & Email)'),
            Column::make('keahlian')->title('Minat & Keahlian'),
            Column::make('status')->title('Status Review')->addClass('text-center'),
            Column::make('created_at')->title('Tanggal Daftar')->addClass('text-center'),
            Column::computed('action')->title('Aksi')->exportable(false)->printable(false)->width(90)->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Volunteer_' . date('YmdHis');
    }
}
