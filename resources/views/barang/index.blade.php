
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
              {{-- <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic Table</h4>
                    <p class="card-description"> Add class <code>.table</code>
                    </p>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Profile</th>
                          <th>VatNo.</th>
                          <th>Created</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jacob</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>53275532</td>
                          <td>15 May 2017</td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>53275533</td>
                          <td>14 May 2017</td>
                          <td><label class="badge badge-info">Fixed</label></td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>53275534</td>
                          <td>16 May 2017</td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td>20 May 2017</td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> --}}
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" >
                  <div class="card-body " class="auto">
                    <h4 class="card-title">Table Categories</h4>
    
                        <a href="/barang/create" ><span class="badge badge-sm bg-gradient-primary"> Tambah Data</span></a>
                    <!-- Button trigger modal -->
                        {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <span class="badge badge-sm bg-gradient-primary border-0 d-inline"> Tambah Data</span>
                        </button> --}}
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
                                <th>Kode</th>
                                <th>Nama barang</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                                <th>Stok Aman</th>
                                <th>Harga Satuan</th>
                                <th>Images</th>
                                <th class="text-center">Acion</th>
                                {{-- <th>Sale</th>
                                <th>Status</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                             @foreach ($barang as $b)
                               <tr>
                               <td>{{ $b->kode_barang }}</td>
                                <td>{{ $b->nama_barang }}</td>
                                <td>{{ $b->kategori->nama_kategori }}</td>
                                <td>{{ $b->deskripsi }}</td>
                                <td>{{ $b->stok }}</td>
                                <td>{{ $b->stok_aman }}</td>
                                <td>{{ $b->harga }}</td>
                                {{-- <td>{{ $b->images }}</td> --}}
                                <style>
                                  
                                </style>
                                <td>
                                  <img src="{{ asset('storage/'. $b->images) }}" alt="image" class="mb-1 mw-1000 w-1000 rounded" style="height: 100px; width:100px"  >
                                </td>
                               
                            </div>
                                {{-- <td>
                                  <img src="{{ asset('storage/'. $b->images) }}" class="mb-2 mw-100 w-100 rounded" alt="image">
                                </td> --}}
                                {{-- <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td> --}}
                                <td class="text-center">
                                  <a href="/barang/{{ $b->id }}/edit"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a> 
                                  <form action="/barang/{{ $b->id }}" class="d-inline" method="post">
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
            

              <!-- Modal Create -->
            
              
              {{-- <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bordered table</h4>
                    <p class="card-description"> Add class <code>.table-bordered</code>
                    </p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> First name </th>
                          <th> Progress </th>
                          <th> Amount </th>
                          <th> Deadline </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> 1 </td>
                          <td> Herman Beck </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td> 2 </td>
                          <td> Messsy Adam </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $245.30 </td>
                          <td> July 1, 2015 </td>
                        </tr>
                        <tr>
                          <td> 3 </td>
                          <td> John Richards </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $138.00 </td>
                          <td> Apr 12, 2015 </td>
                        </tr>
                        <tr>
                          <td> 4 </td>
                          <td> Peter Meggik </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td> 5 </td>
                          <td> Edward </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 160.25 </td>
                          <td> May 03, 2015 </td>
                        </tr>
                        <tr>
                          <td> 6 </td>
                          <td> John Doe </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 123.21 </td>
                          <td> April 05, 2015 </td>
                        </tr>
                        <tr>
                          <td> 7 </td>
                          <td> Henry Tom </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 150.00 </td>
                          <td> June 16, 2015 </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> --}}
              
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
