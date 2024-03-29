@extends('layouts.main')

@section('container')
                    

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form Barang </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/barang">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Barang</li>
                </ol>
              </nav>
            </div>
            <div class="row">
             <div class="col-md-10 grid-margin stretch-card">
                        <div class="card ">
                          <div class="card-body">
                            {{-- <h4 class="card-title">Horizontal Form</h4>
                            <p class="card-description"> Horizontal form layout </p> --}}
                            <form class="forms-sample" action="/barang" method="POST" enctype="multipart/form-data">
                             @csrf
                              <div class="form-group row">
                                <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" 
                                    name="kode_barang" value="{{ $kode }}" @readonly(true)>
                                  @error('kode_barang')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" 
                                    name="nama_barang" placeholder="Nama Barang" value="{{ old('nama_barang') }}" autofocus>
                                  @error('nama_barang')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="id_kategori" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori" id="id_kategori" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($kategori as $kategori)
                                          @if(old('id_kategori') == $kategori->id)
                                          <option value="{{ $kategori->id }}" selected>{{ $kategori->nama_kategori }}</option>
                                          @else 
                                          <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                    @error('id_kategori')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" 
                                    name="deskripsi" placeholder="deskripsi" value="{{ old('deskripsi') }}">
                                  @error('deskripsi')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" 
                                    name="stok" placeholder="stok" value="{{ old('stok',0) }}">
                                  @error('stok')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="stok_aman" class="col-sm-2 col-form-label">Stok Aman</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('stok_aman') is-invalid @enderror" id="stok_aman" 
                                    name="stok_aman" placeholder="stok_aman" value="{{ old('stok_aman',0) }}">
                                  @error('stok_aman')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" 
                                    name="harga" placeholder="harga" value="{{ old('harga') }}">
                                  @error('harga')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="images" class="col-sm-2 col-form-label">Images</label><br>
                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="" alt="">
                                <div class="col-sm-12">
                                  <input class="form-control @error('images') is-invalid @enderror" 
                                  type="file" id="images" name="images" onchange="previewImages()">
                                    @error('images')
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
            {{-- <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me <i class="input-helper"></i></label>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          </div> --}}
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

<script>
  function previewImages() {
    const image = document.querySelector('#images');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'blok';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>