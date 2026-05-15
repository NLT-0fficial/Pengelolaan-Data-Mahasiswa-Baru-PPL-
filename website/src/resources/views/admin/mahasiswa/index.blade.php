@extends('adminlte::page')

@section('title', 'Data Mahasiswa')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1>Data Mahasiswa</h1>

    <div>

        <button
        class="btn btn-primary"
        data-toggle="modal"
        data-target="#tambahModal">

            <i class="fas fa-plus"></i>
            Tambah

        </button>


        <a href="{{ url('/admin/mahasiswa/export') }}"
        class="btn btn-success">

            <i class="fas fa-print"></i>
            Cetak

        </a>

    </div>

</div>

@stop


@section('content')

<div class="card">

<div class="card-body">


<form
method="GET"
action="/admin/mahasiswa"
class="mb-3">

<div class="input-group">

<input
type="text"
name="search"
class="form-control"
placeholder="Cari NIM, Nama, Email, Program Studi..."
value="{{ request('search') }}">


<div class="input-group-append">

<button
class="btn btn-primary"
type="submit">

<i class="fas fa-search"></i>
Cari

</button>

</div>

</div>

</form>



<table class="table table-bordered table-striped">

<thead>

<tr>

<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Program Studi</th>
<th>Semester</th>
<th>Email</th>
<th>Status</th>

<th class="text-center">
Aksi
</th>

</tr>

</thead>


<tbody>

@forelse($mahasiswa as $mhs)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $mhs->nim }}</td>

<td>{{ $mhs->nama }}</td>

<td>{{ $mhs->programStudi->nama_prodi }}</td>

<td>

Semester {{ $mhs->semester }}

</td>

<td>{{ $mhs->email }}</td>

<td>{{ $mhs->status_akun }}</td>


<td class="text-center">


<button
class="btn btn-warning btn-sm"
data-toggle="modal"
data-target="#edit{{ $mhs->id }}">

<i class="fas fa-edit"></i>
Edit

</button>



<form
action="/admin/mahasiswa/delete/{{ $mhs->id }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">

<i class="fas fa-trash"></i>
Hapus

</button>

</form>


</td>

</tr>




<!-- MODAL EDIT -->

<div
class="modal fade"
id="edit{{ $mhs->id }}">

<div class="modal-dialog">

<div class="modal-content">


<form
action="/admin/mahasiswa/update/{{ $mhs->id }}"
method="POST">

@csrf
@method('PUT')


<div class="modal-header">

<h4>Edit Mahasiswa</h4>

<button
type="button"
class="close"
data-dismiss="modal">

<span>&times;</span>

</button>

</div>



<div class="modal-body">


<div class="form-group">

<label>Nama</label>

<input
type="text"
name="nama"
value="{{ $mhs->nama }}"
class="form-control"
required>

</div>



<div class="form-group">

<label>Email</label>

<input
type="email"
name="email"
value="{{ $mhs->email }}"
class="form-control"
required>

</div>



<div class="form-group">

<label>Program Studi</label>

<select
name="program_studi_id"
class="form-control">

@foreach($programStudi as $prodi)

<option
value="{{ $prodi->id }}"
{{ $mhs->program_studi_id==$prodi->id ? 'selected':'' }}>

{{ $prodi->nama_prodi }}

</option>

@endforeach

</select>

</div>



<div class="form-group">

<label>Semester</label>

<select
name="semester"
class="form-control">

@for($i=1;$i<=14;$i++)

<option
value="{{ $i }}"
{{ $mhs->semester==$i ? 'selected':'' }}>

Semester {{ $i }}

</option>

@endfor

</select>

</div>



<div class="form-group">

<label>Status</label>

<select
name="status_akun"
class="form-control">

<option
value="Aktif"
{{ $mhs->status_akun=='Aktif' ? 'selected':'' }}>

Aktif

</option>


<option
value="Nonaktif"
{{ $mhs->status_akun=='Nonaktif' ? 'selected':'' }}>

Nonaktif

</option>

</select>

</div>

</div>


<div class="modal-footer">

<button
type="submit"
class="btn btn-warning">

Update

</button>

</div>


</form>

</div>

</div>

</div>


@empty

<tr>

<td
colspan="8"
class="text-center">

Data tidak ditemukan

</td>

</tr>

@endforelse


</tbody>

</table>

</div>

</div>





<!-- MODAL TAMBAH -->

<div
class="modal fade"
id="tambahModal">

<div class="modal-dialog">

<div class="modal-content">


<form
action="/admin/mahasiswa/store"
method="POST">

@csrf


<div class="modal-header">

<h4>Tambah Mahasiswa</h4>

<button
type="button"
class="close"
data-dismiss="modal">

<span>&times;</span>

</button>

</div>



<div class="modal-body">


<div class="form-group">

<label>NIM</label>

<input
type="text"
id="nim"
name="nim"
class="form-control"
readonly>

</div>



<div class="form-group">

<label>Nama</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>



<div class="form-group">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>



<div class="form-group">

<label>Program Studi</label>

<select
id="programStudi"
name="program_studi_id"
class="form-control">

@foreach($programStudi as $prodi)

<option value="{{ $prodi->id }}">

{{ $prodi->nama_prodi }}

</option>

@endforeach

</select>

</div>



<div class="form-group">

<label>Semester</label>

<select
name="semester"
class="form-control">

@for($i=1;$i<=14;$i++)

<option value="{{ $i }}">

Semester {{ $i }}

</option>

@endfor

</select>

</div>



<div class="form-group">

<label>Status</label>

<select
name="status_akun"
class="form-control">

<option value="Aktif">

Aktif

</option>

<option value="Nonaktif">

Nonaktif

</option>

</select>

</div>

</div>



<div class="modal-footer">

<button
type="submit"
class="btn btn-primary">

Simpan

</button>

</div>


</form>

</div>

</div>

</div>


@stop




@section('js')

<script>

document.addEventListener(
'DOMContentLoaded',
function(){

const prodi =
document.getElementById(
'programStudi'
);

if(prodi){

function generateNim(){

fetch(
'/admin/generate-nim?program_studi_id='
+prodi.value
)

.then(
response=>response.json()
)

.then(data=>{

document
.getElementById(
'nim'
)
.value=data.nim;

});

}

generateNim();

prodi.addEventListener(
'change',
generateNim
);

}

});

</script>

@stop