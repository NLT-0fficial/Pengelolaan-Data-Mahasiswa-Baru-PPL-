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

        </div>

    </div>

    <!-- Total Program Studi -->
    <div class="col-lg-4 col-6">

        <div class="small-box bg-success">

            <div class="inner">
                <h3>3</h3>
                <p>Program Studi</p>
            </div>

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

        <a href="/admin/mahasiswa"
           class="btn btn-primary">

            Data Mahasiswa

        </a>

        <a href="/admin/program-studi"
           class="btn btn-success">

            Program Studi

        </a>

        <a href="/logout"
           class="btn btn-danger">

            Logout

        </a>

    </div>

</div>

@stop