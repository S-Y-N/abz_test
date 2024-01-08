@extends('layouts.main')

@push('stylesheets')
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
        <div class="container-fluid" style="width: {{ isset($formWidth) ? $formWidth : '400px' }}">
            <div class="row">
                <form action="{{ $formAction }}" method="post" id="main_form" class="w-100" enctype="multipart/form-data">
                    @csrf
                    @if (isset($isUpdate))
                        @method('patch')
                    @endif

                    @yield('form-body')

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="{{ isset($isUpdate) ? 'Оновити' : 'Створити' }}">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2:not(#hidden .select2)').select2({
                placeholder: $(this).data('placeholder')
            })

            $('.select2bs4:not(#hidden .select2bs4)').select2({
                theme: 'bootstrap4',
                placeholder: $(this).data('placeholder')
            })
        })
    </script>
@endpush