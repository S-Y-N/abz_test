@extends('layouts.main')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col col-12">
                <a href="{{ route($modelName . '.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    Додати
                </a>
                <table id="main-table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>ID</td>
                        @yield('table-head')
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-confirm-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Підтвердження видалення</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Ви дійсно хочете видалити цей запис?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" id="btn-confirm-delete">Так</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ні</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script>
        function renderControls(data) {
            let editUrl = '{{ route($modelName . ".edit", "_ID_") }}'
            let deleteUrl = '{{ route($modelName . ".delete", "_ID_") }}'

            return `
                <div class="row justify-content-around" style="min-width: 115px">
                    <a href="${editUrl.replace('_ID_', data)}" class="btn btn-primary col-5">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="${deleteUrl.replace('_ID_', data)}" method="post" class="col-5 p-0">
                        @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger w-100" data-toggle="modal" data-target="#modal-confirm-delete">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div
`
        }
        $(function () {
            $('#main-table').DataTable({
                ajax: '{{ route(isset($searchRoute) ? $searchRoute : ($modelName . ".search")) }}',
                pageLength:6,
                columns: [
                    {
                        data: '{{ $tableName }}__id',
                        width: '0px'
                    },
                    @yield('datatable-columns'),
                        @hasSection('datatable-controls')
                        @yield('datatable-controls')
                        @else
                    {
                        data: '{{ $tableName }}__id',
                        width: '115px',
                        orderable: false,
                        render: function (data, type, row, meta) {
                            return renderControls(data)
                        }
                    }
                    @endif
                ],
                serverSide: true,
                paging: true,
                lengthChange: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                language: {
                    lengthMenu: "Показувати _MENU_ записів на сторінці",
                    zeroRecords: "Нічого не знайдено",
                    info: "Сторінка _PAGE_ з _PAGES_",
                    infoEmpty: "Нічого не знайдено",
                    infoFiltered: "(Обрано з _MAX_ записів)",
                    search: "Пошук: ",
                    paginate: {
                        first: "Перша",
                        previous: "Назад",
                        next: "Вперед",
                        last: "Остання"
                    }
                }
            });

            let pendingDelete = null

            $("#main-table").on('draw.dt', function () {
                $('table input[value="delete"]').parents('form').on('submit', function (e) {
                    pendingDelete = e.target
                    e.preventDefault()
                })

                $('#btn-confirm-delete').on('click', function (e) {
                    pendingDelete.submit()
                })
            })
        });
    </script>
@endpush
