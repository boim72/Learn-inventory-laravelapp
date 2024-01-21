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
                            
                            <form class="forms-sample" action="/bahanbakuin/{{ $bahanbakuin->id }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                {{-- {{ dd($barangmasuk) }} --}}
                                 <div class="mb-3">
                                <input type="hidden" name="id_bahanbaku" value="{{ $bahanbakuin->id_bahanbaku }}">
                                <label for="id_bahanbaku" class="col-sm-3 col-form-label">Nama Bahan</label>
                                <div class="col-sm-12">
                                    <select class="form-select @error('id_bahanbaku') is-invalid @enderror"
                                     name="id_bahanbaku" id="id_bahanbaku" aria-label="Default select example" onkeydown="autofill()">
                                        {{-- <option selected>Open this select menu</option> --}}
                                        @foreach ($bahanbaku as $item)
                                          @if(old('id_bahanbaku',$bahanbakuin->id_bahanbaku) == $item->id)
                                          <option value="{{ $item->id }}" selected @disabled(true)>{{ $item->nama_bahan }}</option>
                                          {{-- @else 
                                          <option value="{{ $item->id }}">{{ $item->nama_bahan }}</option> --}}
                                          @endif
                                        @endforeach
                                    </select>
                                    @error('id_bahanbaku')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                                <div class="mb-3">
                                <label for="tanggal_masuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" 
                                    name="tanggal_masuk" placeholder="Tanggal masuk" value="{{ old('tanggal_masuk', $bahanbakuin->tanggal_masuk) }}" autofocus>
                                  @error('tanggal_masuk')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="id_supplier" class="col-sm-3 col-form-label">Supplier</label>
                                <div class="col-sm-12">
                                    <select class="form-select @error('id_supplier') is-invalid @enderror" id="id_supplier" aria-label="Default select example">
                                        {{-- <option selected>Open this select menu</option> --}}
                                        @foreach ($supplier as $supplier)
                                          @if(old('id_supplier', $bahanbakuin->bahanbaku->id_supplier) == $supplier->id)
                                          <option value="{{ $supplier->id }}" selected @disabled(true)>{{ $supplier->nama_supplier }}</option>
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
                              <div class="mb-3">
                                <label for="jumlah_masuk" class="col-sm-3 col-form-label">jumlah_masuk</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control @error('jumlah_masuk') is-invalid @enderror" id="jumlah_masuk" 
                                    name="jumlah_masuk" placeholder="jumlah_masuk" value="{{ old('jumlah_masuk', $bahanbakuin->jumlah_masuk) }}">
                                  @error('jumlah_masuk')    
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                                 <div class="mb-3">
                                <label for="harga_masuk" class="col-sm-3 col-form-label">harga_masuk</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control @error('harga_masuk') is-invalid @enderror" id="harga_masuk" 
                                    name="harga_masuk" placeholder="harga_masuk" value="{{ old('harga_masuk', $bahanbakuin->harga_masuk) }}">
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