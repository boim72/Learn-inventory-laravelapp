@extends('layouts.main')

@section('container')
                    

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form Supplier </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Supplier</li>
                </ol>
              </nav>
            </div>
            <div class="row">
             <div class="col-md-10 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            {{-- <h4 class="card-title">Horizontal Form</h4>
                            <p class="card-description"> Horizontal form layout </p> --}}
                            <form class="forms-sample" action="/supplier/{{ $supplier->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group row">
                                  <label for="nama_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" 
                                    id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" value="{{ old('nama_supplier', $supplier->nama_supplier) }}">
                                  @error('nama_supplier')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="no_telp" class="col-sm-2 col-form-label">No Telpon</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" 
                                    id="no_telp" name="no_telp" placeholder="No Telpon" value="{{ old('no_telp', $supplier->no_telp) }}">
                                  @error('no_telp')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                                  <div class="col-sm-10">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" name="email" placeholder="Email" value="{{ old('email', $supplier->email) }}">
                                  @error('email')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" 
                                    id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat', $supplier->alamat) }}">
                                  @error('alamat')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                              <button class="btn btn-light">Cancel</button>
                            </form>
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