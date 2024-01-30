
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
                    <form action="/laporan.cetakbahanin" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date">
                            <input type="date" class="form-control" name="end_date">
                            <button class="btn btn-primary" type="submit">FILTER</button>
                         
                        </div>
                    </form>
                         <div>
                            @if ($start_date && $end_date)
                            <!-- Tombol cetak data -->
                            <div class="col-md-12 mb-3">
                                  <p @class(['text-start', 'font-bold' => true])>Laporan untuk tanggal {{ $start_date }} hingga {{ $end_date }}</p>
                                    <a href="/laporan/cetakbahaninpdf/{{ $start_date }}/{{ $end_date }}" target="_blank"
                                       class="btn btn-success btn-icon-text">
                                        Cetak Data <i class="mdi mdi-printer btn-icon-append"></i>
                                    </a>
                                  </div>
                            @endif
                         </div>
                      <table border='1' class='table' width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Bahan</th>
                                <th>Nama Supplier</th>
                                <th>Jumlah Masuk</th>
                                <th>Harga Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bahanin as $masuk)
                                <tr>
                                    <td><center>{{ $loop->iteration }}</center></td>
                                    <td>{{ $masuk->tanggal_masuk }}</td>
                                    <td>{{ $masuk->bahanbaku->nama_bahan }}</td>
                                    <td>{{ $masuk->bahanbaku->supplier->nama_supplier }}</td>
                                    <td>{{ $masuk->jumlah_masuk }}</td>
                                    <td>{{ $masuk->harga_masuk }}</td>
                                </tr>
                            @endforeach
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
