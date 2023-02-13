@extends('layout.admin')

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Penarikan</h1>
    <div class="mt-3">
        <a href="/tambahuangkeluar" class="btn btn-primary">Tarik Uang</a>
    </div>
    <div class="row mt-3">
        <div class="container">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Penabung</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Jumlah Uang Keluar</th>
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
                            <td>{{ $row->created_at->translatedFormat('l/d/F/Y : H:i') }}</td>
                            <td>{{ $row->penabung ? $row->penabung->nama_penabung : 'Data Tidak Ada' }}</td>
                            <td>{{ $row->jenis_kelamin }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->notelpon }}</td>
                            <td>Rp.{{ number_format($row['jumlah_uang'], 2, '.', '.') }}</td>
                            <td>Rp.{{ number_format($row['penarikan'], 2, '.', '.') }}</td>
                            {{-- <td>
                                <a href="/edituangkeluar/{{ $row->id }}" class="btn btn-success mb-1"><i
                                        class="fas fa-pencil-alt"></i>Edit</a><br>
                                <a href="/hapusuangkeluar/{{ $row->id }}" class="btn btn-danger"
                                    onclick="return confirm('Yakin Ingin Menghapus Data Ini ')">Hapus</a>
                            </td> --}}
                    </tr>

                    @endforeach

                </tbody>
              </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>


@endsection
