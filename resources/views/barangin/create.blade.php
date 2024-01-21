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
                            <form class="forms-sample" action="/barangin" method="POST" enctype="multipart/form-data">
                             @csrf
                              <div class="form-group row">
                                <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('kode_barang') is-invalid @enderror"
                                     name="kode_barang" id="kode_barang" aria-label="Default select example" onkeydown="autofill()" autofocus>
                                {{-- <option selected>Open this select menu</option> --}}
                                    <option>Open this select menu</option>
                                        @foreach ($deskripsi->unique('kode_barang') as $item)
                                         {{-- @foreach ($barang as $item) --}}
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
                                <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" 
                                    name="tanggal_masuk" placeholder="Tanggal Masuk" value="{{ old('tanggal_masuk') }}" >
                                  @error('tanggal_masuk')    
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
                                    @error('nama_barang')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="nama_bahanbaku" class="col-sm-2 col-form-label">Bahan</label>
                                <div class="col-sm-10">
                                     {{-- <input type="textarea" class="form-control @error('nama_bahanbaku') is-invalid @enderror" id="nama_bahanbaku" 
                                     placeholder="Nama Supplier" name="" value="" readonly> --}}
                                     <textarea type="text" class="form-control @error('nama_bahanbaku') is-invalid @enderror" id="nama_bahanbaku" 
                                     placeholder="Nama Supplier" name="" value="" readonly cols="20" rows="5"></textarea>
                                    @error('nama_bahanbaku')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              {{-- </div>
                               <div class="form-group row">
                                <label for="nama_bahanbaku" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                     <input type="text" class="form-control @error('nama_bahanbaku') is-invalid @enderror" id="nama_bahanbaku" 
                                     placeholder="Nama Supplier" name="" value="" readonly>
                                    @error('nama_bahanbaku')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div> --}}
                              {{-- <div class="form-group row">
                                <label for="id_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
                                <div class="col-sm-10">
                                 
                                    <input type="text" class="form-control @error('id_supplier') is-invalid @enderror" id="id_supplier" 
                                    name="id_supplier" placeholder="id_supplier" value="{{ old('id_supplier',) }}">
                                    @error('id_supplier')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div> --}}
                              <div class="form-group row">
                                <label for="jumlah_masuk" class="col-sm-2 col-form-label">jumlah Masuk</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('jumlah_masuk') is-invalid @enderror" id="jumlah_masuk" 
                                    name="jumlah_masuk" placeholder="jumlah_masuk" value="{{ old('jumlah_masuk',0) }}">
                                  @error('jumlah_masuk')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="harga_masuk" class="col-sm-2 col-form-label">Harga Masuk</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('harga_masuk') is-invalid @enderror" id="harga_masuk" 
                                    name="harga_masuk" placeholder="harga_masuk" value="{{ old('harga_masuk',0) }}">
                                  @error('harga_masuk')    
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

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('id').addEventListener('input', function () {
            var idBarang = this.value;

            fetch('/barangin/getNamaBarang?id=' + idBarang)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nama_barang').value = data.nama_barang;
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
<script>

// document.addEventListener('DOMContentLoaded', function () {
//     var idBarangInput = document.getElementById('id_barang');
//     var namaBarangInput = document.getElementById('nama_barang');
//     // var namaSupplierInput = document.getElementById('nama_supplier');
//     var namaBahanInput = document.getElementById('nama_bahanbaku');
//     // var namaBahanInputs = document.querySelectorAll('.nama_bahanbaku') 

//     if (idBarangInput) {
//         idBarangInput.addEventListener('input', function () {
//             var idBarang = this.value;

//             fetch('/getNamaBarang/' + idBarang)
//                 .then(response => {
//                     if (!response.ok) {
//                         throw new Error('Barang tidak ditemukan atau terjadi kesalahan server');
//                     }
//                     return response.json();
//                 })
//                 .then(data => {
//                     namaBarangInput.value = data.nama_barang;
//                      var namaBahanArray = data.nama_bahanbaku.map(bahan => bahan.id_bahanbaku + ' = ' + bahan.jumlah);

//                     // Menetapkan nilai ke dalam elemen HTML
//                     namaBahanInput.value = namaBahanArray.join(', ');
               
                    
//                 })
//                 .catch(error => {
//                     console.error('Error:', error.message);
//                     // Tampilkan pesan kesalahan atau lakukan penanganan yang sesuai
//                 });
//         });
//     }
// });
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
