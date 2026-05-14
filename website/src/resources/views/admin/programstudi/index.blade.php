@extends('adminlte::page')

@section('title', 'Program Studi')

@section('content_header')
    <h1>Data Program Studi</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Prodi</th>
                    <th>Fakultas</th>
                </tr>
            </thead>

            <tbody>

                @foreach($programStudi as $prodi)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $prodi->nama_prodi }}</td>

                    <td>{{ $prodi->fakultas }}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@stop