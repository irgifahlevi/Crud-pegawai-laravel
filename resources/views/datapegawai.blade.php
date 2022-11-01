@extends('layout.admin')

@section('content')


<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Table Pegawai</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">


               <div class="margin mb-4">
                  <div class="btn-group">
                     <a href="/tambahpegawai" type="button" class="btn btn-info mr-1">Tambah Data</a>
                  </div>
                  <div class="btn-group">
                     <a href="/exportpdf" type="button" class="btn btn-info">Cetak PDF</a>
                  </div>
               </div>


               <div class="card">
                  <div class="card-header">
                     <div class="card-tools">
                        <div class="input-group" style="width: 200px;">
                           <form action="/pegawai" method="GET" class="d-flex">
                              <input type="text" name="search" class="form-control float-right" placeholder="Search">
                              <div class="input-group-append">
                                 <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>

                  </div>
                  <div class="card-body">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th style="width: 10px">No</th>
                              <th>Nama</th>
                              <th>Foto</th>
                              <th>Jenis Kelamin</th>
                              <th>Umur</th>
                              <th>No Telpon</th>
                              <th>Alamat</th>
                              <th>Dibuat</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php
                           $no = 1;
                           @endphp
                           @foreach ($data as $index => $row)
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

                                 <!-- <a href="/tampilkandata/{{ $row->id }}" type="button"
                                    class="btn btn-warning btn-sm">Edit</a>
                                 <a href="#" type="button" class="btn btn-danger btn-sm delete" data-id="{{ $row->id}}"
                                    data-nama="{{ $row->nama }}">Delete</a> -->

                                 <div class="margin">
                                    <div class="btn-group">
                                       <a href="/tampilkandata/{{ $row->id }}" type="button"
                                          class="btn btn-block btn-warning btn-sm mr-1">Edit</a>
                                    </div>
                                    <div class="btn-group">
                                       <a href="#" type="button" class="btn btn-block btn-danger btn-sm delete"
                                          data-id="{{ $row->id}}" data-nama="{{ $row->nama }}">Hapus</a>
                                    </div>
                                 </div>

                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <div class="card-footer clearfix">
                     <ul class="pagination pagination-sm m-0 float-right">
                        {{ $data->links() }}
                     </ul>
                  </div>
               </div>
               <!-- /.card -->
            </div>
         </div>

      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>

{{--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
--}}

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- jquery --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

{{-- toastr --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
   integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>




<script>
   $('.delete').click(function () {
      var pegawaiid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');

      swal({
         title: "Apakah anda yakin?",
         text: "Menghapus data pegawai dengan nama " + nama + " !",
         icon: "warning",
         buttons: true,
         dangerMode: true,
      })
         .then((willDelete) => {
            if (willDelete) {
               window.location = "/delete/" + pegawaiid + ""
               swal("Data berhasil di hapus", {
                  icon: "success",
               });
            } else {
               swal("Data tidak jadi di hapus");
            }
         });
   });
</script>


<script>
   @if (Session:: has('success'))
   toastr.success("{{ Session::get('success') }}")
   @endif
</script>

@endsection