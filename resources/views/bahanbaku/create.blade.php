@extends('layouts.main')

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
            <div class="row">
             <div class="col-md-10 grid-margin stretch-card">
                        <div class="card ">
                          <div class="card-body">
                            <form class="forms-sample" action="/bahanbaku" method="POST" enctype="multipart/form-data">
                             @csrf
                              <div class="form-group row">
                                <label for="nama_bahan" class="col-sm-2 col-form-label">Nama Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nama_bahan') is-invalid @enderror" id="nama_bahan" 
                                    name="nama_bahan" value="{{ old('nama_bahan') }}" autofocus>
                                  @error('nama_bahan')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div> 
                                <div class="form-group row">
                                <label for="id_supplier" class="col-sm-2 col-form-label">Supplier</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('id_supplier') is-invalid @enderror" name="id_supplier" id="id_supplier" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($supplier as $supplier)
                                          @if(old('id_supplier') == $supplier->id)
                                          <option value="{{ $supplier->id }}" selected>{{ $supplier->nama_supplier }}</option>
                                          @else 
                                          <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                    @error('id_supplier')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" 
                                    name="deskripsi" value="{{ old('deskripsi') }}" >
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