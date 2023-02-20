@extends('layout.admin')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"> --}}

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>
        <h1 class="text-center">Tambah Penarikan</h1>
        <div class="mt-3">
            <form action="/insertuangkeluar" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <p class="">Nama Penabung</p>
                    <select class="ipan_select3 form-control select2" style="width:100%;" name="penabungs_id" class=""
                        id="penabungs_id" @error('penabungs_id')  @enderror>
                        <option value="" selected disabled>Pilih Nama Penabung</option>
                        @foreach ($penabung as $item)
                            <option value="{{ $item->id }}" data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                data-alamat="{{ $item->alamat }}" data-jumlah_uang="{{ $item->jumlah_uang }}"
                                data-notelpon="{{ $item->notelpon }}">
                                {{ $item->nama_penabung }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis kelamin</label>
                    <input type="text" class="form-control" readonly name="jenis_kelamin" id="jenis_kelamin">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" readonly name="alamat" id="alamat">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No Telpon</label>
                    <input type="number" class="form-control" readonly name="notelpon" id="notelpon">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah Uang</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" readonly name="jumlah_uang" id="jumlah_uang">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Penarikan</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="penarikan" id="penarikan">
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-success" id="proses" type="submit">Tarik Uang</button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css"></script>
<script>
      $('#proses').click(function(e) {
                   e.preventDefault();
                   if (parseInt($('#penarikan').val()) > parseInt($('#jumlah_uang').val())) {
                       Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Jumlah Beli anda melebihi stok yang tersedia!',
                       })
                   }
                    // console.log('ipanganteng');
                    var data = {
                       'penabungs_id': $('#penabungs_id').val(),
                       'jenis_kelamin': $('#jenis_kelamin').val(),
                       'alamat': $('#alamat').val(),
                       'notelpon': $('#notelpon').val(),
                       'jumlah_uang': $('#jumlah_uang').val(),
                       'penarikan': $('#penarikan').val(),
                   }
                   $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                   });
                   $.ajax({
                       type: "POST",
                       url: "/insertuangkeluar",
                       data: data,
                       dataType: "json",
                       success: function(response) {
                           if (response.errors) {
                               Swal.fire({
                                   icon: 'error',
                                   title: response.errors[Object.keys(response.errors)[0]][
                                       0
                                   ],
                               })
                           }


                       }
                   });
                   document.getElementById('penarikan').value = ("");
                   // document.getElementById('stok').value = ("");
                   // document.getElementById('nama_barang').value = ("");
                   // document.getElementById('harga_jual').value = ("");


               });

</script>


    </body>

    <script>
        const selection = document.getElementById('penabungs_id')
        selection.onchange = function(e) {
            const jenis_kelamin = e.target.options[e.target.selectedIndex].dataset.jenis_kelamin
            const alamat = e.target.options[e.target.selectedIndex].dataset.alamat
            const notelpon = e.target.options[e.target.selectedIndex].dataset.notelpon
            const jumlah_uang = e.target.options[e.target.selectedIndex].dataset.jumlah_uang
            document.getElementById('jenis_kelamin').value = jenis_kelamin;
            document.getElementById('alamat').value = alamat;
            document.getElementById('notelpon').value = notelpon;
            document.getElementById('jumlah_uang').value = jumlah_uang;
        }
    </script>

    </html>
@endsection
