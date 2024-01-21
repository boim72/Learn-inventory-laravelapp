
@extends('layouts/main')
@section('container')
    
<div class="main-panel">
          <div class="content-wrapper">
            {{-- <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div> --}}
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
            @endif
            <div class="row">
            
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Laporan Barang Masuk</h4>
    
                        {{-- <a href="/barangin/create" ><span class="badge badge-sm bg-gradient-primary"> Tambah Data</span></a> --}}
                    
                    {{-- <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal Masuk</th>
                          <th>Nama Barang</th>
                          <th>Nama Supplier</th>
                          <th>Jumlah Masuk</th>
                          <th>Harga Masuk</th>
                          
                          <th class="text-center">Acion</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($barangin as $masuk)
                         <tr>
                         <td>{{ $masuk->barang->kode_barang }}</td>
                          <td>{{ $masuk->tanggal_masuk }}</td>
                          <td>{{ $masuk->barang->nama_barang }}</td>
                        
                           <td>{{ $masuk->barang->supplier->nama_supplier }}</td>
                          <td>{{ $masuk->jumlah_masuk }}</td>
                          <td>{{ $masuk->harga_masuk }}</td>
                         
                          
                         
                      </div>
                       
                          <td class="text-center">
                            <a href="/barangin/{{ $masuk->id }}/edit"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a>

                            <form action="/barangin/{{ $masuk->id }}" class="d-inline" method="POST">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('apakah yakin')">Hapus</button>
                            </form>
                           </td>
                        </tr>
                       @endforeach
                        <tr>
                        <td>1</td>
                          <td>Jacob</td>
                        
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        
                        
                      </tbody>
                    </table> --}}
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="tglawal">Tanggal Awal</label>
                            <input type="date" name="tglawal" id="tglawal" class="form-control" value="">
                        </div>
                        <div class="col-sm-6">
                            <label for="tglakhir">Tanggal Akhir</label>
                            <input type="date" name="tglakhir" id="tglakhir" class="form-control" value="">
                        </div>
                    </div>
                     <div class=" col-md-6">
                        {{-- <button type="submit" class="btn btn-gradient-info btn-icon-text"> Print <i class="mdi mdi-printer btn-icon-append"></i>
                          </button> --}}
                         <a href="" onclick="this.href='/laporan/cetakin/'+document.getElementById('tglawal').value + 
                         '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-gradient-info btn-icon-text">Print <i class="mdi mdi-printer btn-icon-append"></i></a>

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
