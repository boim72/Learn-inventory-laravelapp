
@extends('layouts/main')
@section('container')
    
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Table Bahanbaku Masuk </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Table Bahanbaku Masuk</li>
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
                    {{-- <h4 class="card-title">Table Bahan Baku Masuk</h4> --}}
    
                        <a href="/bahanbakuin/create" ><span class="badge badge-sm bg-gradient-primary"> Tambah Data</span></a>
                  <div class="table-resposive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal Masuk</th>
                          <th>Nama Bahan</th>
                          <th>Nama Supplier</th>
                          <th>Jumlah Masuk</th>
                          <th>Harga Masuk</th>
                          
                          <th class="text-center">Acion</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($bahanbakuin as $masuk)
                         <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $masuk->tanggal_masuk }}</td>
                          <td>{{ $masuk->bahanbaku->nama_bahan }}</td>
                           <td>{{ $masuk->bahanbaku->supplier->nama_supplier }}</td>
                          <td>{{ $masuk->jumlah_masuk }}</td>
                          <td>{{ $masuk->harga_masuk }}</td>
                         
                      </div>
                          <td class="text-center">
                            <a href="/bahanbakuin/{{ $masuk->id }}/edit"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a>
                            {{-- <a href="/barangmasuk/{{ $barangmasuk->id }}/delete"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a> --}}

                            <form action="/bahanbakuin/{{ $masuk->id }}" class="d-inline" method="POST">
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
