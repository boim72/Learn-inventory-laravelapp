
@extends('layouts/main')
@section('container')
    
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Tabel Deskripsi Barang </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/deskripsibarang">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tabel Deskripsi Barang</li>
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
                    {{-- <h4 class="card-title">Tabel Deskripsi Barang</h4> --}}
    
                        {{-- <a href="/deskripsibarang/create" ><span class="badge badge-sm bg-gradient-primary"> Tambah Data</span></a> --}}
                        <style>
                          .table-custom {
                              table-layout: auto;

                          }

                          .table-custom th,
                          .table-custom td {
                              overflow: hidden;
                              text-overflow: auto;
                              white-space: nowrap; 
                          }
                      </style>
                        <div class="table-responsive">
                          <table class="table table-hover table-custom">
                            <thead>
                              <tr>
                                <th colspan="2" class="text-center">Barang</th>
                                <th  class="text-center" colspan="{{ count($bahanbaku) }}">Jumlah Bahan  </th>
                              </tr>
                              <tr>
                                <th class="text-right">Acion</th>
                                <th>Kode</th>
                                <th>Nama barang</th>
                                @foreach ($bahanbaku as $bahan)
                                    <th style="width: {{ 100 / count($bahanbaku) }}%">{{ $bahan->nama_bahan }}</th>
                                @endforeach

                                {{-- <th>Sale</th>
                                <th>Status</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                             @foreach ($barang as $barang)
                               <tr>
                                <td class="text-right">
                                  @if (count($desk[$barang->kode_barang]) == 0 )                            
                                  {{-- <a href="{{ url('/deskripsibarang/add', ['kode_barang' => $barang->kode_barang]) }}"> --}}
                                    <a href="/deskripsibarang/add/{{ $barang->kode_barang }}">
                                      <span data-feather="add" class="badge badge-sm bg-gradient-info">Tambah</span></a> 
                                    @else                            
                                      <a href="/deskripsibarang/{{ $barang->kode_barang }}/edit"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a> 
                                 @endif
                                  
                                  <form action="/deskripsibarang/{{ $barang->kode_barang }}" class="d-inline" method="post">
                                      @method('delete')
                                      @csrf
                                      <button class="badge bg-danger border-0" onclick="return confirm('apakah yakin')">Hapus</button>
                                  </form>
                                 </td>
                                 
                               <td>{{  $barang->kode_barang }}</td>
                               <td>{{  $barang->nama_barang }}</td>
                              @foreach ($deskripsi as $item)
                                @if ( $barang->kode_barang == $item->kode_barang)

                                <td>{{ $item->jumlah }}</td>
                                {{-- {{ $item->id_barang }} --}}
                                
                                @endif
                              @endforeach
                                
                               
                            </div>
                              </tr>
                             @endforeach
                             
                            </tbody>
                          </table>
                        </div>
                  </div>
                </div>
              </div>
            

              <div class="row">
              <div class="col-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>
                    {{-- <div class="d-flex">
                      <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                        <i class="mdi mdi-account-outline icon-sm me-2"></i>
                        <span>jack Menqu</span>
                      </div>
                      <div class="d-flex align-items-center text-muted font-weight-light">
                        <i class="mdi mdi-clock icon-sm me-2"></i>
                        <span>October 3rd, 2018</span>
                      </div>
                    </div> --}}
                    <div class="row mt-3">
                      <div class="col-12 pe-1">
                        <img src="assets/images/dashboard/img_1.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                      </div>                      
                    </div>
                    {{-- <div class="d-flex mt-5 align-items-top">
                      <img src="assets/images/faces/face3.jpg" class="img-sm rounded-circle me-3" alt="image">
                      <div class="mb-0 flex-grow">
                        <h5 class="me-2 mb-2">School Website - Authentication Module.</h5>
                        <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                      </div>
                      <div class="ms-auto">
                        <i class="mdi mdi-heart-outline text-muted"></i>
                      </div>
                    </div> --}}
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
