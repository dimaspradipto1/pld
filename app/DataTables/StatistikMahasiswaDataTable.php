<?php

namespace App\DataTables;

use App\Models\StatistikMahasiswa;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StatistikMahasiswaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<StatistikMahasiswa> $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('mahasiswa', function (StatistikMahasiswa $mhs) {
                $jkBadge = $mhs->jenis_kelamin === 'L'
                    ? '<span class="badge bg-primary-subtle text-primary border border-primary-subtle" title="Laki-laki">L</span>'
                    : '<span class="badge bg-danger-subtle text-danger border border-danger-subtle" title="Perempuan">P</span>';

                return '<div>
                            <span class="fw-bold text-dark d-block">' . e($mhs->nama) . ' ' . $jkBadge . '</span>
                            <small class="text-muted"><i class="bi bi-person-badge me-1"></i>NIM: ' . e($mhs->nim ?: '-') . '</small>
                        </div>';
            })
            ->addColumn('jenis_disabilitas', function (StatistikMahasiswa $mhs) {
                return '<span class="badge" style="background:#283759; color:#fff; font-size:12px; font-weight:600;">' . e($mhs->jenis_disabilitas) . '</span>';
            })
            ->addColumn('akademik', function (StatistikMahasiswa $mhs) {
                return '<div>
                            <span class="fw-semibold text-dark d-block">' . e($mhs->prodi) . '</span>
                            <small class="text-muted">' . e($mhs->fakultas) . ' &bull; Angkatan ' . e($mhs->angkatan) . '</small>
                        </div>';
            })
            ->addColumn('status', function (StatistikMahasiswa $mhs) {
                if ($mhs->status === 'Aktif') {
                    return '<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Aktif</span>';
                } elseif ($mhs->status === 'Lulus') {
                    return '<span class="badge bg-info text-dark"><i class="bi bi-mortarboard me-1"></i>Lulus</span>';
                } else {
                    return '<span class="badge bg-warning text-dark"><i class="bi bi-pause-circle me-1"></i>Cuti</span>';
                }
            })
            ->addColumn('action', function (StatistikMahasiswa $mhs) {
                $btn  = '<div class="d-flex justify-content-center align-items-center" style="gap:5px">';
                $btn .= '<a href="' . route('admin-statistik-mahasiswa.edit', $mhs->id) . '"
                            class="btn btn-sm btn-warning text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Edit">
                            <i class="bi bi-pencil-fill" style="font-size:12px"></i>
                         </a>';
                $btn .= '<form action="' . route('admin-statistik-mahasiswa.destroy', $mhs->id) . '"
                               method="POST" class="m-0"
                               onsubmit="return confirm(\'Yakin ingin menghapus data mahasiswa ini?\')">'
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
            ->rawColumns(['mahasiswa', 'jenis_disabilitas', 'akademik', 'status', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(StatistikMahasiswa $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('statistik-mahasiswa-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1, 'desc')
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->searchable(false)
                ->orderable(false)
                ->width(40)
                ->addClass('text-center align-middle'),
            Column::make('mahasiswa')
                ->title('Mahasiswa / NIM')
                ->addClass('align-middle'),
            Column::make('jenis_disabilitas')
                ->title('Jenis Disabilitas')
                ->addClass('align-middle'),
            Column::make('akademik')
                ->title('Prodi & Fakultas')
                ->addClass('align-middle'),
            Column::make('status')
                ->title('Status')
                ->width(100)
                ->addClass('text-center align-middle'),
            Column::computed('action')
                ->title('Aksi')
                ->exportable(false)
                ->printable(false)
                ->width(90)
                ->addClass('text-center align-middle'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'StatistikMahasiswa_' . date('YmdHis');
    }
}
