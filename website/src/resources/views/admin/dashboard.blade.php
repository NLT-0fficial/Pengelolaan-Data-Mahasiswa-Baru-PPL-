@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Admin</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-4 col-6">

        <div class="small-box bg-info">

            <div class="inner">
                <h3>30</h3>
                <p>Total Mahasiswa</p>
            </div>

        </div>

    </div>

    <div class="col-lg-4 col-6">

        <div class="small-box bg-success">

            <div class="inner">
                <h3>3</h3>
                <p>Program Studi</p>
            </div>

        </div>

    </div>

</div>

@stop