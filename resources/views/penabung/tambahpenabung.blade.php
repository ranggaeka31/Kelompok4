@extends('layout.admin')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>

    <body>
        <h1>Hello, world!</h1>
        <form action="/insertpenabung" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Penabung</label>
                <input type="text" class="form-control" name="penabung" id="exampleFormControlInput1">
            </div>
            @error('penabung')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="flexRadioDefault1" />
                    <label class="form-check-label" for="flexRadioDefault1">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="flexRadioDefault1" />
                    <label class="form-check-label" for="flexRadioDefault1">Perempuan</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="exampleFormControlInput1">
            </div>
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No Telpon</label>
                <input type="number" class="form-control" name="notelpon" id="exampleFormControlInput1">
            </div>
            @error('notelpon')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jumlah Uang</label>
                <input type="text" class="form-control" name="jumlah_uang" id="exampleFormControlInput1">
            </div>
            @error('jumlah_uang')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto">
            </div>
            @error('foto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Tambah</button>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </body>

    </html>
@endsection
