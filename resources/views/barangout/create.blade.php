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
             <div class="col-md-10 grid-margin stretch-card">
                        <div class="card ">
                          <div class="card-body">
                            {{-- <h4 class="card-title">Horizontal Form</h4>
                            <p class="card-description"> Horizontal form layout </p> --}}
                            <form class="forms-sample" action="/barangout" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="form-group row">
                                <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('kode_barang') is-invalid @enderror"
                                     name="kode_barang" id="kode_barang" aria-label="Default select example" onkeydown="autofill()" autofocus>
                                        <option selected>Open this select menu</option>
                                        @foreach ($deskripsi->unique('kode_barang') as $item)
                                          @if(old('kode_barang') == $item->kode_barang)
                                          <option value="{{ $item->kode_barang }}" selected>{{ $item->kode_barang }}</option>
                                          @else 
                                          <option value="{{ $item->kode_barang }}">{{ $item->kode_barang }}</option>
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
                                <label for="tanggal_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror" id="tanggal_keluar" 
                                    name="tanggal_keluar" placeholder="Tanggal Keluar" value="{{ old('tanggal_keluar') }}" autofocus>
                                  @error('tanggal_keluar')    
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
                                     placeholder="Nama Barang" readonly>
                                </div>
                              </div>
                              {{-- <div class="form-group row">
                                <label for="nama_bahanbaku" class="col-sm-2 col-form-label">Bahan</label>
                                <div class="col-sm-10">
                                     <textarea type="text" class="form-control @error('nama_bahanbaku') is-invalid @enderror" id="nama_bahanbaku" 
                                     placeholder="Nama Bahan" name="" value="" readonly cols="20" rows="5"></textarea>
                                </div>
                              </div> --}}
                              <div class="form-group row">
                                <label for="jumlah_keluar" class="col-sm-2 col-form-label">jumlah Keluar</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('jumlah_keluar') is-invalid @enderror" id="jumlah_keluar" 
                                    name="jumlah_keluar" placeholder="jumlah_keluar" value="{{ old('jumlah_keluar',0) }}">
                                  @error('jumlah_keluar')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="harga_keluar" class="col-sm-2 col-form-label">Harga Keluar</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('harga_keluar') is-invalid @enderror" id="harga_keluar" 
                                    name="harga_keluar" placeholder="harga_keluar" value="{{ old('harga_keluar',0) }}">
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {
    var kodeBarangInput = document.getElementById('kode_barang');
    var namaBarangInput = document.getElementById('nama_barang');
    var namaBahanInput = document.getElementById('nama_bahanbaku');

    if (kodeBarangInput) {
        kodeBarangInput.addEventListener('input', function () {
            var kodeBarang = this.value;

            fetch('/getNamaBarang/' + kodeBarang)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Barang tidak ditemukan atau terjadi kesalahan server');
                    }
                    return response.json();
                })
                .then(data => {
                    namaBarangInput.value = data.nama_barang;

                    // Mengambil id_bahanbaku dan jumlah dari setiap objek
                    var idBahanBakuArray = data.nama_bahanbaku.map(bahan => bahan.id_bahanbaku);
                    var jumlahArray = data.nama_bahanbaku.map(bahan => bahan.jumlah);

                    // Menetapkan nilai ke dalam elemen HTML
                    namaBahanInput.value = '';  // Reset nilai sebelum memuat data baru

                    // Mendapatkan nama bahan sesuai dengan id_bahanbaku
                    idBahanBakuArray.forEach((idBahanBaku, index) => {
                        fetch('/getNamaBahan/' + idBahanBaku)
                            .then(response => response.json())
                            .then(dataBahan => {
                                // Menambahkan informasi nama bahan ke dalam input
                                namaBahanInput.value += dataBahan.nama_bahan + ' = ' + jumlahArray[index] + ', ';
                            })
                            .catch(error => {
                                console.error('Error:', error.message);
                            });
                    });
                })
                .catch(error => {
                    console.error('Error:', error.message);
                });
        });
    }
});

</script>
