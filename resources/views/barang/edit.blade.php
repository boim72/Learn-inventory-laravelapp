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
             <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            {{-- <h4 class="card-title">Horizontal Form</h4>
                            <p class="card-description"> Horizontal form layout </p> --}}
                            <form class="forms-sample" action="/barang/{{ $barang->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                  <label for="kode_barang" class="col-sm-3 col-form-label">Kode Barang</label>
                                  <div class="col-sm-12">
                                      <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" 
                                      name="kode_barang" value="{{ $barang->kode_barang }}" @readonly(true)>
                                    @error('kode_barang')    
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                </div> 
                                <div class="mb-3">
                                <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" 
                                    name="nama_barang" placeholder="Nama supplier" value="{{ old('nama_barang', $barang->nama_barang) }}" autofocus>
                                  @error('nama_barang')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="id_kategori" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-12">
                                    <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori" id="id_kategori" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($kategori as $kategori)
                                          @if(old('id_kategori', $barang->id_kategori) == $kategori->id)
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
                              <div class="mb-3">
                                <label for="deskripsi" class="col-sm-3 col-form-label">deskripsi</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" 
                                    name="deskripsi" placeholder="deskripsi" value="{{ old('deskripsi', $barang->deskripsi) }}">
                                  @error('deskripsi')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" 
                                    name="stok" placeholder="stok" value="{{ old('stok', $barang->stok) }}">
                                  @error('stok')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="stok_aman" class="col-sm-3 col-form-label">Stok Aman</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control @error('stok_aman') is-invalid @enderror" id="stok_aman" 
                                    name="stok_aman" placeholder="stok_aman" value="{{ old('stok_aman', $barang->stok_aman) }}">
                                  @error('stok_aman')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" 
                                    name="harga" placeholder="harga" value="{{ old('harga', $barang->harga) }}">
                                  @error('harga')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="images" class="col-sm-3 col-form-label">Images</label><br>
                                <input type="hidden" name="oldImages" value="{{ $barang->images }}">
                                @if ($barang->images) 
                                  <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage/'.$barang->images) }}" alt="">
                                @else
                                  <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="" alt="">
                                @endif
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