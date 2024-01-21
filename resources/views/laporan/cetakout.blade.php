
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
                         <a href="" onclick="this.href='/laporan/cetakout/'+document.getElementById('tglawal').value + 
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
