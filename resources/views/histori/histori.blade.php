@extends('layout.admin')

@section('content')

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('title')
        <title>Histori Tabungan</title>
    @endsection

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Histori</h1>
    <div class="row mt-3">
        <div class="container">
            <table class="table table-hover" id="example1">
                <thead>
                    <tr>
                        <th class="wd-20p">No</th>
                        <th class="wd-20p">Nama</th>
                        <th class="wd-20p">Tanggal</th>

                        <th class="wd-20p">Histori Dari</th>
                        <th class="wd-15p">Total</th>


                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($array as $row)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $row['penabungs_id'] }}</td>
                            <td>{{ $row['tanggal'] }}</td>

                            <td>{{ $row['type'] }}</td>
                            <td>Rp.{{ number_format($row['total'], 2, '.', '.') }}</td>


                        </tr>
                    @endforeach
                </tbody>
                <tr>
                    <td colspan="3">
                    </td>
                    <td style="font-weight: 900;">SubTotal uang ditabung :<br>Subtotal uang ditarik :</td>
                    <td style="font-weight: 900;">Rp.{{ number_format($subtotalmasuk, 2, '.', '.') }}<br>
                        Rp.{{ number_format($subtotalkeluar, 2, '.', '.') }}</td>
                </tr>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>


@endsection
