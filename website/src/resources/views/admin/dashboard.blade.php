@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1>Dashboard Admin</h1>
@stop

@section('content')

<div class="row">

    <!-- Total Mahasiswa -->
    <div class="col-lg-4 col-6">

        <div class="small-box bg-info">

            <div class="inner">
                <h3>30</h3>
                <p>Total Mahasiswa</p>
            </div>

            <a href="/admin/mahasiswa"
               class="small-box-footer">

                Lihat Data
                <i class="fas fa-arrow-circle-right"></i>

            </a>

        </div>

    </div>

    <!-- Total Program Studi -->
    <div class="col-lg-4 col-6">

        <div class="small-box bg-success">

            <div class="inner">
                <h3>3</h3>
                <p>Program Studi</p>
            </div>

            <a href="/admin/program-studi"
               class="small-box-footer">

                Lihat Data
                <i class="fas fa-arrow-circle-right"></i>

            </a>

        </div>

    </div>

</div>


<!-- Menu Cepat -->
<div class="card">

    <div class="card-header">

        <h3 class="card-title">
            Menu Admin
        </h3>

    </div>

    <div class="card-body">

        <div class="d-flex flex-wrap gap-2">

            <a href="/admin/dashboard"
               class="btn btn-dark">

                <i class="fas fa-home"></i>
                Dashboard

            </a>

            <a href="/admin/mahasiswa"
               class="btn btn-primary">

                <i class="fas fa-user-graduate"></i>
                Data Mahasiswa

            </a>

            <a href="/admin/program-studi"
               class="btn btn-success">

                <i class="fas fa-book"></i>
                Program Studi

            </a>

            <a href="/logout"
               class="btn btn-danger">

                <i class="fas fa-sign-out-alt"></i>
                Logout

            </a>

        </div>

    </div>

</div>

@stop