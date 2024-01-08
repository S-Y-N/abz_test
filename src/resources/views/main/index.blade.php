@extends('layouts.main')

@push('stylesheets')
    <style>
        .stat-card-text {
            font-size: 0.9rem;
            text-align: left;
        }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Abz test</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <div class="row">
                                <h3 class="ml-3">{{ $totalUsers }}</h3>
                                <div class="col stat-card-text">
                                    <div>+{{ $usersToday }} сьогодні</div>
                                    <div>+{{ $usersPerWeek }} за 7 днів</div>
                                </div>
                            </div>
                            <p class="font-weight-bold">Користувачі</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('user.index') }}" class="small-box-footer">
                            До списку користувачів
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
