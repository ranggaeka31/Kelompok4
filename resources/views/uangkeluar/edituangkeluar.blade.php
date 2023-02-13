@extends('layout.admin')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>
        <h1 class="text-center">Edit Penarikan</h1>
        <div class="mt-3">
            <form action="/updateuangkeluar/{{ $uangkeluar->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <p class="">Nama Penabung</p>
                    <select class="ipan_select3 form-control select2" style="width:100%;" name="penabungs_id" class=""
                        id="penabungs_id" @error('penabungs_id')  @enderror>
                        <option value="" selected disabled>Pilih Nama Penabung</option>
                        @foreach ($penabung as $item)
                            <option value="{{ $item->id }}"<?php if ($uangkeluar->penabungs_id == $item->id) {
                                echo 'selected';
                            } ?>
                                data-jenis_kelamin="{{ $item->jenis_kelamin }}" data-alamat="{{ $item->alamat }}"
                                data-notelpon="{{ $item->notelpon }}">
                                {{ $item->nama_penabung }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" readonly name="jenis_kelamin"
                        value="{{ $uangkeluar->jenis_kelamin }}" id="jenis_kelamin">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" readonly name="alamat" value="{{ $uangkeluar->alamat }}"
                        id="alamat">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No Telpon</label>
                    <input type="number" class="form-control" readonly name="notelpon" value="{{ $uangkeluar->notelpon }}"
                        id="notelpon">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah Uang</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" class="form-control" name="jumlah_uang"
                            value="{{ $uangkeluar->jumlah_uang }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Penarikan</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" class="form-control" name="penarikan" value="{{ $uangkeluar->penarikan }}">
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </body>

    <script>
        const selection = document.getElementById('penabungs_id')
        selection.onchange = function(e) {
            const jenis_kelamin = e.target.options[e.target.selectedIndex].dataset.jenis_kelamin
            const alamat = e.target.options[e.target.selectedIndex].dataset.alamat
            const notelpon = e.target.options[e.target.selectedIndex].dataset.notelpon
            document.getElementById('jenis_kelamin').value = jenis_kelamin;
            document.getElementById('alamat').value = alamat;
            document.getElementById('notelpon').value = notelpon;
        }
    </script>

    </html>
@endsection
