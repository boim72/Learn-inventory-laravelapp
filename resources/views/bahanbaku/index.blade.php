
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
                <div class="card" >
                  <div class="card-body " class="auto">
                    <h4 class="card-title">Table Categories</h4>
    
                        <a href="/bahanbaku/create" ><span class="badge badge-sm bg-gradient-primary"> Tambah Data</span></a>
                        <style>
                          .table-custom {
                              table-layout: fixed;

                          }

                          .table-custom th,
                          .table-custom td {
                              overflow: hidden;
                              text-overflow: auto;
                              white-space: nowrap; 
                          }
                      </style>
                        <div class="table-resposive">
                          <table class="table table-hover table-custom">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Bahan</th>
                                <th>Supplier</th>
                                <th>Deskipsi</th>
                                <th>Stok</th>
                                <th>Stok Aman</th>
                                <th>Harga</th>
                                <th>Images</th>
                                <th class="text-center">Acion</th>
                                {{-- <th>Sale</th>
                                <th>Status</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                             @foreach ($bahanbaku as $baku)
                               <tr>
                               <td>{{ $loop->iteration }}</td>
                                <td>{{ $baku->nama_bahan }}</td>
                                <td>{{ $baku->supplier->nama_supplier }}</td>
                                <td>{{ $baku->deskripsi }}</td>
                                <td>{{ $baku->stok }}</td>
                                <td>{{ $baku->stok_aman }}</td>
                                <td>{{ $baku->harga }}</td>
                                <td>
                                  <img src="{{ asset('storage/'. $baku->images) }}" alt="image" class="mb-1 mw-1000 w-1000 rounded" style="height: 100px; width:100px"  >
                                </td>
                               
                            </div>
                                {{-- <td>
                                  <img src="{{ asset('storage/'. $b->images) }}" class="mb-2 mw-100 w-100 rounded" alt="image">
                                </td> --}}
                                {{-- <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td> --}}
                                <td class="text-center">
                                  <a href="/bahanbaku/{{ $baku->id }}/edit"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a> 
                                  <form action="/bahanbaku/{{ $baku->id }}" class="d-inline" method="post">
                                      @method('delete')
                                      @csrf
                                      <button class="badge bg-danger border-0" onclick="return confirm('apakah yakin')">Hapus</button>
                                  </form>
                                  {{-- <label class="badge badge-danger">Pending</label> --}}
                                 </td>
                              </tr>
                             @endforeach
                             
                              
                            </tbody>
                          </table>
                        </div>
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
