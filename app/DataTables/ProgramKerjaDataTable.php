<?php

namespace App\DataTables;

use App\Models\ProgramKerja;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProgramKerjaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<ProgramKerja> $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('judul', function (ProgramKerja $pk) {
                return '<div>
                            <span class="fw-bold text-dark d-block">' . e($pk->judul) . '</span>
                            <span class="badge" style="background:#283759; color:#fff; font-size:11px;">' . e($pk->kategori) . '</span>
                        </div>';
            })
            ->addColumn('deskripsi', function (ProgramKerja $pk) {
                return '<span title="' . e($pk->deskripsi) . '">' . e(\Illuminate\Support\Str::limit($pk->deskripsi, 80)) . '</span>';
            })
            ->addColumn('target_waktu', function (ProgramKerja $pk) {
                return '<span class="small text-muted"><i class="bi bi-clock me-1"></i>' . e($pk->target_waktu ?: '-') . '</span>';
            })
            ->addColumn('penanggung_jawab', function (ProgramKerja $pk) {
                return '<span class="small fw-semibold">' . e($pk->penanggung_jawab ?: '-') . '</span>';
            })
            ->addColumn('status', function (ProgramKerja $pk) {
                if ($pk->status === 'Terlaksana') {
                    return '<span class="badge bg-success"><i class="bi bi-check-all me-1"></i>Terlaksana</span>';
                } elseif ($pk->status === 'Sedang Berjalan') {
                    return '<span class="badge" style="background:#79a8e2; color:#fff;"><i class="bi bi-arrow-repeat me-1"></i>Sedang Berjalan</span>';
                } else {
                    return '<span class="badge bg-secondary"><i class="bi bi-calendar me-1"></i>Direncanakan</span>';
                }
            })
            ->addColumn('is_active', function (ProgramKerja $pk) {
                return $pk->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Nonaktif</span>';
            })
            ->addColumn('action', function (ProgramKerja $pk) {
                $btn  = '<div class="d-flex justify-content-center align-items-center" style="gap:5px">';
                $btn .= '<a href="' . route('program-kerja.edit', $pk->id) . '"
                            class="btn btn-sm btn-warning text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Edit">
                            <i class="bi bi-pencil-fill" style="font-size:12px"></i>
                         </a>';
                $btn .= '<form action="' . route('program-kerja.destroy', $pk->id) . '"
                               method="POST" class="m-0"
                               onsubmit="return confirm(\'Yakin ingin menghapus program kerja ini?\')">'
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
            ->rawColumns(['judul', 'deskripsi', 'target_waktu', 'penanggung_jawab', 'status', 'is_active', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProgramKerja $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('urutan', 'asc')->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('programkerja-table')
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
            Column::make('judul')->title('Program Kerja & Kategori'),
            Column::make('deskripsi')->title('Deskripsi'),
            Column::make('target_waktu')->title('Jadwal Pelaksanaan'),
            Column::make('penanggung_jawab')->title('PIC / Divisi'),
            Column::make('status')->title('Status Progress')->addClass('text-center'),
            Column::make('is_active')->title('Visibilitas')->addClass('text-center'),
            Column::computed('action')->title('Aksi')->exportable(false)->printable(false)->width(90)->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProgramKerja_' . date('YmdHis');
    }
}
