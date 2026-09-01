<?php

namespace App\DataTables;

use App\Models\FacultyStat;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FacultyStatDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<FacultyStat> $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('preview', function ($stat) {
                if ($stat->image) {
                    return '<img src="' . asset('storage/' . $stat->image) . '"
                                 alt="Statistik Fakultas"
                                 style="width:140px;height:70px;object-fit:cover;border-radius:8px;border:1px solid #dee2e6"
                                 loading="lazy">';
                }
                return '<span class="text-muted small fst-italic">Tanpa gambar</span>';
            })
            ->addColumn('title', function ($stat) {
                return '<div>
                            <div class="fw-semibold">' . e($stat->title) . '</div>
                        </div>';
            })
            ->addColumn('stats_summary', function ($stat) {
                return '<div class="d-flex flex-column gap-1" style="font-size:13px;">
                            <span><i class="bi bi-mortarboard text-primary me-1"></i><strong>' . number_format($stat->jumlah_prodi) . '</strong> Program Studi</span>
                            <span><i class="bi bi-people text-success me-1"></i><strong>' . number_format($stat->total_mahasiswa) . '</strong> Mahasiswa Aktif</span>
                            <span><i class="bi bi-person-workspace text-warning me-1"></i><strong>' . number_format($stat->total_dosen) . '</strong> Dosen</span>
                            <span><i class="bi bi-award text-info me-1"></i><strong>' . number_format($stat->total_alumni) . '</strong> Alumni</span>
                        </div>';
            })
            ->addColumn('is_active', function ($stat) {
                if ($stat->is_active) {
                    return '<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Aktif</span>';
                }
                return '<span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i>Nonaktif</span>';
            })
            ->addColumn('action', function ($stat) {
                $btn  = '<div class="d-flex justify-content-center align-items-center" style="gap:5px">';

                // Tombol Edit
                $btn .= '<a href="' . route('faculty-stat.edit', $stat->id) . '"
                            class="btn btn-sm btn-warning text-white"
                            style="width:30px;height:30px;display:flex;align-items:center;justify-content:center"
                            title="Edit">
                            <i class="bi bi-pencil-fill" style="font-size:12px"></i>
                         </a>';

                // Tombol Hapus
                $btn .= '<form action="' . route('faculty-stat.destroy', $stat->id) . '"
                              method="POST" class="m-0"
                              onsubmit="return confirm(\'Yakin ingin menghapus data statistik ini?\')">'
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
            ->setRowId('DT_RowIndex')
            ->rawColumns(['preview', 'title', 'stats_summary', 'is_active', 'action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<FacultyStat>
     */
    public function query(FacultyStat $model): QueryBuilder
    {
        return $model->newQuery()
            ->select(['id', 'title', 'image', 'jumlah_prodi', 'total_mahasiswa', 'total_dosen', 'total_alumni', 'is_active'])
            ->latest('id');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('faculty-stat-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
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
                ->title('No')
                ->width('5%')
                ->addClass('text-center')
                ->searchable(false)
                ->orderable(false),

            Column::computed('preview')
                ->title('Gambar')
                ->width('18%')
                ->addClass('text-center')
                ->exportable(false)
                ->printable(false),

            Column::make('title')
                ->title('Judul Section'),

            Column::computed('stats_summary')
                ->title('Ringkasan Statistik')
                ->exportable(false)
                ->printable(false),

            Column::make('is_active')
                ->title('Status')
                ->width('10%')
                ->addClass('text-center'),

            Column::computed('action')
                ->title('Aksi')
                ->exportable(false)
                ->printable(false)
                ->width('10%')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'FacultyStat_' . date('YmdHis');
    }
}
