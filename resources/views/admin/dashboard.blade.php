@extends('admin.index')

@section('dashboard')
    

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <a href="" class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></a>

            <div class="info-box-content nav-link">
                <span class="info-box-text">Staf - Guru</span>
                <span class="info-box-number nav -link">
                    {{ $stafgurus->total() }}
                    <small></small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i
                    class="fas fa-trophy"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Prestasi</span>
                <span class="info-box-number">{{ $prestasis->total() }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i
                    class="fas fa-newspaper"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Blog</span>
                <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="far fa-image"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Galeri</span>
                <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="far fa-futbol"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Ekstrakurikuler</span>
                <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-graduate"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">PPDB</span>
                <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Agenda</span>
                <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

@endsection