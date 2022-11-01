@extends('layout.admin')

@section('content')

@section('content')
   <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
               <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
         </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <div class="container">
      <a href="/tambahpegawai" type="button" class="btn btn-info">+Tambah Data</a>
      <a href="/exportpdf" type="button" class="btn btn-danger">Export PDF</a>
      
      
      <div class="row g-3 align-items-center mt-1">
         <form  action="/pegawai" method="GET" class="d-flex col-3">
            <input class="form-control me-2" type="search" name="search" placeholder="Search..." >
            <button class="btn btn-outline-success" type="submit">Search</button>
         </form>
      </div>
      <div class="row">
         {{-- @if ($message = Session::get('success'))
         <div class="alert alert-success" role="alert">
            {{ $message }}
         </div>
         @endif --}}
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Umur</th>
                  <th scope="col">No Telpon</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Dibuat</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               @php
               $no = 1;
               @endphp
               @foreach ($data as  $index => $row)
               <tr>
                  <th scope="row">{{ $index + $data->firstItem() }}</th>
                  <td>{{ $row->nama }}</td>
                  <td>
                     <img src="{{asset('fotopegawai/'. $row->foto)}}" alt="" style="width:40px;">
                  </td>
                  <td>{{ $row->jeniskelamin }}</td>
                  <td>{{ $row->umur }}</td>
                  <td> 0{{ $row->notelpon }}</td>
                  <td>{{ $row->alamat }}</td>
                  <td>{{ $row->created_at->format('D M Y') }}</td>
                  <td>
   
                     <a href="/tampilkandata/{{ $row->id }}" type="button" class="btn btn-warning btn-sm">Edit</a>
                     <a href="#" type="button" class="btn btn-danger btn-sm delete" data-id="{{ $row->id}}" data-nama="{{ $row->nama }}">Delete</a>
   
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         {{ $data->links() }}
      </div>
   </div>

   </div>
















































































@endsection