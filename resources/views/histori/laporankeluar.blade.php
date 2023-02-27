@extends('layout.admin')

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('title')
        <title>Laporan uang ditarik</title>
    @endsection

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Laporan Uang Ditarik</h1>
    <form action="/laporankeluar" method="POST">
        @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="container-fluid">
                    <div class="form-group row">
                        <label for="date" class="col-form-label col-sm-2">Cari Tanggal Dari</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm" id="mulai"
                                name="mulai">
                        </div>
                        <label for="date" class="col-form-label col-sm-2">Cari Tanggal
                            Sampai</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm" id="akhir"
                                name="akhir">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-danger" type="submit" name="search" title="Search">Cari
                                <i class="ti-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>
    <div class="row mt-3">
        <div class="container">
            <table class="table table-hover" id="example1">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Penabung</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Penarikan</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($uangkeluar as $row)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $row->created_at->translatedFormat('l/d/F/Y') }}</td>
                            <td>{{ $row->penabung ? $row->penabung->nama_penabung : 'Data Tidak Ada' }}</td>
                            <td>{{ $row->jenis_kelamin }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->notelpon }}</td>
                            <td>Rp.{{ number_format($row['penarikan'], 2, '.', '.') }}</td>
                    </tr>

                    @endforeach

                </tbody>
                <tr>
                    <td colspan="5  ">
                    </td>
                    <td style="font-weight: 900;">Subtotal :</td>
                    <td style="font-weight: 900;">Rp.{{ number_format($subtotal, 2, '.', '.') }}</td>
                </tr>
              </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>




@endsection
