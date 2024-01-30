
@extends('layouts/main')
@section('container')
    
<div class="main-panel">
          <div class="content-wrapper">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
            @endif
            <div class="row">
            
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Laporan Barang Keluar</h4>
                     <form action="/laporan.cetakout" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="tglawal">
                            <input type="date" class="form-control" name="tglakhir">
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                    </form>

                    <div>
                      @if ($tglawal && $tglakhir)
                      <!-- Tombol cetak data -->
                      <div class="col-md-12 mb-3">
                            <p @class(['text-start', 'font-bold' => true])>Laporan untuk tanggal {{ $tglawal }} hingga {{ $tglakhir }}</p>
                              <a href="/laporan/cetakoutpdf/{{ $tglawal }}/{{ $tglakhir }}" target="_blank"
                                  class="btn btn-success btn-icon-text">
                                  Cetak Data <i class="mdi mdi-printer btn-icon-append"></i>
                              </a>
                            </div>
                      @endif
                    </div>

                    <table border='1' class='table' width="100%">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Tanggal Keluar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Keluar</th>
                                <th>Harga Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cetakout as $keluar)
                                <tr>
                                    <td>{{ $keluar->kode_barang }}</td>
                                    <td>{{ $keluar->tanggal_keluar }}</td>
                                      @foreach ($barang as $item)    
                                        @if ( $keluar->kode_barang == $item->kode_barang)                                  
                                          <td>{{ $item->nama_barang }}</td>
                                        @endif
                                      @endforeach
                                    <td>{{ $keluar->jumlah_keluar }}</td>
                                    <td>{{ $keluar->harga_keluar }}</td>
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
