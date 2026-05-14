@extends('adminlte::page')

@section('title', 'Data Mahasiswa')

@section('content_header')
    <h1>Data Mahasiswa</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach($mahasiswa as $mhs)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $mhs->nim }}</td>

                    <td>{{ $mhs->nama }}</td>

                    <td>{{ $mhs->programStudi->nama_prodi }}</td>

                    <td>{{ $mhs->email }}</td>

                    <td>{{ $mhs->status_akun }}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@stop