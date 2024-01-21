
@extends('layouts/main')
@section('container')
    
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
            @endif
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Table Barang Keluar</h4>
    
                        <a href="/barangout/create" ><span class="badge badge-sm bg-gradient-primary"> Tambah Data</span></a>
                    <!-- Button trigger modal -->
                        {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <span class="badge badge-sm bg-gradient-primary border-0 d-inline"> Tambah Data</span>
                        </button> --}}
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal Keluar</th>
                          <th>Nama Barang</th>
                          {{-- <th>Nama Supplier</th> --}}
                          <th>Jumlah Keluar</th>
                          <th>Harga Keluar</th>
                          
                          <th class="text-center">Acion</th>
                          {{-- <th>Sale</th>
                          <th>Status</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($barangout as $barangout)
                         <tr>
                         <td>{{ $barangout->kode_barang }}</td>
                         <td>{{ $barangout->tanggal_keluar }}</td>
                            @foreach ($barang as $b)
                              @if ($barangout->kode_barang == $b->kode_barang)   
                                <td>{{ $b->nama_barang }}</td>
                              @endif
                            @endforeach
                          <td>{{ $barangout->jumlah_keluar }}</td>
                          <td>{{ $barangout->harga_keluar }}</td>
                         
                         
                      </div>
                          <td class="text-center">
                            <a href="/barangout/{{ $barangout->id }}/edit"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a>
                            {{-- <a href="/barangmasuk/{{ $barangout->id }}/delete"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a> --}}

                            <form action="/barangout/{{ $barangout->id }}" class="d-inline" method="POST">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('apakah yakin')">Hapus</button>
                            </form>
                            {{-- <label class="badge badge-danger">Pending</label> --}}
                           </td>
                        </tr>
                       @endforeach
                       
                        {{-- <tr>
                          <td>Messsy</td>
                          <td>Flash</td>
                          <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr> --}}
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            

             
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
@endsection
