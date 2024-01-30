

    
{{-- <div class="main-panel">
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
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
            @endif
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Table Categories</h4>
    
                        <a href="/barangin/create" ><span class="badge badge-sm bg-gradient-primary"> Tambah Data</span></a>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal Masuk</th>
                          <th>Nama Barang</th>
                          <th>Nama Supplier</th>
                          <th>Jumlah Masuk</th>
                          <th>Harga Masuk</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($cetakout as $masuk)
                         <tr>
                         <td>{{ $masuk->barang->kode_barang }}</td>
                          <td>{{ $masuk->tanggal_keluar }}</td>
                          <td>{{ $masuk->barang->nama_barang }}</td>
                           <td>{{ $masuk->barang->supplier->nama_supplier }}</td>
                          <td>{{ $masuk->jumlah_keluar }}</td>
                          <td>{{ $masuk->harga_keluar }}</td> 
                      </div>  
                           </td>
                        </tr>
                       @endforeach
                       
                      
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            

              
            </div>
          </div>
        
        
</div> --}}

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Cetak</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Style untuk mempercantik tampilan -->
    <style type="text/css">
        body {
            font-family: 'Calibri', Courier, monospace;
            margin: auto;
            text-align: center;
            max-width: 1200px; /* Menggunakan max-width agar sesuai dengan batasan lebar */
            font-size: 14px;
        }

        .container {
            margin: 10px;
            /* display: flex; */
        /* align-items: center; */
        }

        .table1 {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            margin: 10px 0; /* Memberikan margin pada atas dan bawah */
        }

        table hr {
            border: 3px double #000;
        }

        .ttd {
            float: right;
            width: 250px;
            padding: 20px 20px 20px 0; /* Mengubah padding untuk penyesuaian */
            text-align: left; /* Menyesuaikan posisi teks */
        }

        table th {
            color: #000;
            font-family: Verdana, Geneva, sans-serif;
            font-size: 12px;
        }

        #logo {
            width: 111px;
            height: 90px;
            padding-top: 10px;
            margin-left: 10px;
        }

        h2,
        h3 {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <table class='table1'>
            <tr>
                <td style="vertical-align: top;"><img src='logoq.png' height="100" width="100"></td>
                <td style="vertical-align: top;">
                    <div>
                        <h2 style="margin: 0;">PT ABC SEJAHTERA JEPARA</h2>
                        <h2 style="margin: 0;">PTABC.com</h2>
                        <p style="font-size:14px;"><i>Jl. kodingbuton.com</i></p>
                    </div>
                </td>
            </tr>
        </table>

        <table class='table'>
            <tr>
                <td><hr /></td>
            </tr>
        </table>

        <h3>Laporan Barang Keluar</h3>
<br>
        <table border='1' class='table' width="100%">
            <thead>
                <tr>
                    <th>kode</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Barang</th>
                    {{-- <th>Nama Supplier</th> --}}
                    <th>Jumlah Keluar</th>
                    <th>Harga Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cetakout as $masuk)
                    <tr>
                        <td>{{ $masuk->kode_barang }}</></td>
                        <td>{{ $masuk->tanggal_keluar }}</td>
                            @foreach ($barang as $barangitem)
                                @if ($masuk->kode_barang == $barangitem->kode_barang)    
                                 <td>{{ $barangitem->nama_barang }}</td>
                                @endif
                            @endforeach
                        <td>{{ $masuk->jumlah_keluar }}</td>
                        <td>{{ $masuk->harga_keluar }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container" >
        <table width="450" align="right" class="ttd">
            <tr>
                <td>
                    <strong>kodingbuton.com,</strong>
                    <br><br><br><br>
                    <strong><u>TTD</u><br></strong><small></small>
                </td>
            </tr>
        </table>
    </div>

    <script>
        // Optional: Menggunakan JavaScript untuk kembali ke halaman sebelumnya saat tombol cetak ditekan
        window.onafterprint = function () {
            history.go(-1);
        };
    </script>

    <!-- Script untuk melakukan pencetakan -->
    {{-- <script type="text/javascript">
        window.print();
    </script> --}}
</body>

</html>

<script type="text/javascript">
    window.print();
</script>