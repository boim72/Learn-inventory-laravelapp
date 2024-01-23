@extends('layouts.main')

@section('container')
                    

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form Deskripsi Barang </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/deskripsibarang">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Deskripsi Barang</li>
                </ol>
              </nav>
            </div>
            <div class="row">
             <div class="col-md-10 grid-margin stretch-card">
                        <div class="card ">
                          <div class="card-body">
                            <form class="forms-sample" action="/deskripsibarang" method="POST" enctype="multipart/form-data">
                              {{-- @method('put') --}}
                             @csrf
                              <div class="form-group row">
                                <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('kode_barang') is-invalid @enderror"
                                     name="kode_barang" id="kode_barang" aria-label="Default select example" onkeydown="autofill()" autofocus>
                                        {{-- <option selected>Open this select menu</option> --}}
                                        @foreach ($barang as $item)
                                          @if(old('kode_barang', $deskripsi->kode_barang) == $item->kode_barang)
                                          <option value="{{ $item->kode_barang }}" selected @readonly(true)>{{ $item->kode_barang }}</option>
                                          @endif
                                        @endforeach
                                    </select>
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
                                    name="" placeholder="Nama Barang" value="{{ $deskripsi->nama_barang }}" readonly>
                                  @error('nama_barang')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              @foreach ($bahanbaku as $item)
                                  <div class="form-group row">
                                    <input type="hidden" name="id_bahanbaku[]" value="{{ $item->id }}">
                                    <label for="jumlah[]" class="col-sm-2 col-form-label">{{ $item->nama_bahan }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('jumlah[]') is-invalid @enderror" id="jumlah[]" 
                                        name="jumlah[]" placeholder="Jumlah" value="{{ old('jumlah[]') }}" >
                                      @error('jumlah[]')    
                                          <div class="invalid-feedback">
                                          {{ $message }}
                                          </div>
                                      @enderror
                                    </div>
                                  </div>
                              @endforeach
                              
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
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
<script>

      document.addEventListener('DOMContentLoaded', function () {
          var kodeBarangInput = document.getElementById('kode_barang');
          var namaBarangInput = document.getElementById('nama_barang');

          if (kodeBarangInput) {
              kodeBarangInput.addEventListener('input', function () {
                  var kodeBarang = this.value;

                  fetch('/getDeskripsi/' + kodeBarang)
                      .then(response => {
                          if (!response.ok) {
                              throw new Error('Barang tidak ditemukan atau terjadi kesalahan server');
                          }
                          return response.json();
                      })
                      .then(data => {
                          namaBarangInput.value = data.nama_barang;
                      })
                      .catch(error => {
                          console.error('Error:', error.message);
                          // Tampilkan pesan kesalahan atau lakukan penanganan yang sesuai
                      });
              });
          }
      });

</script>