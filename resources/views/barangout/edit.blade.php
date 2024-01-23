@extends('layouts.main')

@section('container')
                    

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form Barang Keluar </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/barangout">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Barang Keluar</li>
                </ol>
              </nav>
            </div>
            <div class="row">
             <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            {{-- <h4 class="card-title">Horizontal Form</h4>
                            <p class="card-description"> Horizontal form layout </p> --}}
                            <form class="forms-sample" action="/barangout/{{ $barangout->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                       <div class="mb-3">
                                          <label for="kode_barang" class="col-sm-3 col-form-label">Kode Barang</label>
                                          <div class="mb-3">
                                            <input type="hidden" name="kode_barang" value="{{ $barangout->kode_barang }}">
                                              <select class="form-select @error('kode_barang') is-invalid @enderror"
                                              name="kode_barang" id="kode_barang" aria-label="Default select example" onkeydown="autofill()">
                                                  {{-- <option selected>Open this select menu</option> --}}
                                                  @foreach ($deskripsi->unique('kode_barang') as $item)
                                                    @if(old('kode_barang',$barangout->kode_barang) == $item->kode_barang)
                                                    <option value="{{ $item->kode_barang }}" selected @disabled(true)>{{ $item->kode_barang }}</option>
                                                    @endif
                                                  @endforeach
                                              </select>
                                          </div>
                                       </div>
                                  <div class="mb-3">
                                  <label for="tanggal_keluar" class="col-sm-3 col-form-label">Tanggal Keluar</label>
                                  <div class="col-sm-12">
                                      <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror" id="tanggal_keluar" 
                                      name="tanggal_keluar" placeholder="Nama supplier" value="{{ old('tanggal_keluar', $barangout->tanggal_keluar) }}" autofocus>
                                    @error('tanggal_keluar')    
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                </div>
                              <div class="mb-3">
                                <label for="id_barang" class="col-sm-3 col-form-label">Nama Barang</label>
                                <div class="col-sm-12">
                                    <select class="form-select @error('id_barang') is-invalid @enderror" name="id_barang" id="id_barang" aria-label="Default select example">
                                        {{-- <option selected>Open this select menu</option> --}}
                                        @foreach ($barang as $barang)
                                          @if(old('kode_barang', $barangout->kode_barang) == $barang->kode_barang)
                                          <option value="{{ $barang->kode_barang }}" selected @disabled(true)>{{ $barang->nama_barang }}</option>
                                          {{-- @else 
                                          <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option> --}}
                                          @endif
                                        @endforeach
                                    </select>
                                    @error('id_barang')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="jumlah_keluar" class="col-sm-3 col-form-label">jumlah keluar</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control @error('jumlah_keluar') is-invalid @enderror" id="jumlah_keluar" 
                                    name="jumlah_keluar" placeholder="jumlah_keluar" value="{{ old('jumlah_keluar', $barangout->jumlah_keluar) }}">
                                  @error('jumlah_keluar')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="harga_keluar" class="col-sm-3 col-form-label">Stok Aman</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control @error('harga_keluar') is-invalid @enderror" id="harga_keluar" 
                                    name="harga_keluar" placeholder="harga_keluar" value="{{ old('harga_keluar', $barangout->harga_keluar) }}">
                                  @error('harga_keluar')    
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
  // function previewImages() {
  //   const image = document.querySelector('#images');
  //   const imgPreview = document.querySelector('.img-preview');

  //   imgPreview.style.display = 'blok';

  //   const oFReader = new FileReader();
  //   oFReader.readAsDataURL(image.files[0]);

  //   oFReader.onload = function(oFREvent) {
  //     imgPreview.src = oFREvent.target.result;
  //   }
  // }
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
<script>

document.addEventListener('DOMContentLoaded', function () {
    var idBarangInput = document.getElementById('id_barang');
    var namaBarangInput = document.getElementById('nama_barang');
    var namaSupplierInput = document.getElementById('nama_supplier');

    if (idBarangInput) {
        idBarangInput.addEventListener('input', function () {
            var idBarang = this.value;

            fetch('/getNamaBarang/' + idBarang)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Barang tidak ditemukan atau terjadi kesalahan server');
                    }
                    return response.json();
                })
                .then(data => {
                    namaBarangInput.value = data.nama_barang;
                    namaSupplierInput.value = data.nama_supplier;
                })
                .catch(error => {
                    console.error('Error:', error.message);
                    // Tampilkan pesan kesalahan atau lakukan penanganan yang sesuai
                });
        });
    }
});

</script>