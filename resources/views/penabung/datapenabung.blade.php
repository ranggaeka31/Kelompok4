@extends('layout.admin')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('title')
        <title>Penabung</title>
    @endsection

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <h1 class="text-center">Data Penabung</h1>
    <div class="mt-3">
        <a href="/tambahpenabung" class="btn btn-primary"><i class="bx bx-plus"></i></a>
    </div>
    <div class="row mt-3">
        <div class="container">
            <table class="table table-hover" id="example1">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Penabung</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Jumlah Uang</th>
                        <th scope="col">Jumlah Uang Ditarik</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>
                                <a href="{{ asset('fotopenabung/' . $row->foto) }}" data-lightbox="" aris-label="Close">
                                    <img src="{{ asset('fotopenabung/' . $row->foto) }}" class="img-fluid"
                                        alt="" style="width: 50px";></a>
                            </td>
                            <td>{{ $row->nama_penabung }}</td>
                            <td>{{ $row->jenis_kelamin }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->notelpon }}</td>
                            <td>Rp. {{ number_format($row['jumlah_uang'], 2, '.', '.') }}</td>
                            <td>Rp. {{ number_format($row['jumlah_ditarik'], 2, '.', '.') }}</td>
                            <td>
                                <a href="/editpenabung/{{ $row->id }}" class="btn btn-success mb-1">
                                    <i class="bx bxs-pencil"></i></a><br>
                                <a href="/hapuspenabung/{{ $row->id }}" class="btn btn-danger"
                                    onclick="return confirm('Yakin Ingin Menghapus Data Ini ')"><i
                                        class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

@include('sweetalert::alert')

</html>
@endsection
