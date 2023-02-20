<!DOCTYPE html>
<html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid rgb(0 ,0, 0);
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: rgb(255,255, 255);
        }

        #customers tr:hover {
            background-color: rgb(11, 11, 11);
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(255,255, 255);
            color: rgb(11, 11, 11);
        }
    </style>
</head>

<body>

    <h1 class="text-center">Data Uang Ditarik</h1>

    <table id="customers">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama Penabung</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Telpon</th>
            <th scope="col">Penarikan</th>


        </tr>

        @php
            $no = 1;
        @endphp
        @foreach ($array as $row)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->created_at->translatedFormat('l/d/F/Y : H:i') }}</td>
                <td>{{ $row->penabung ? $row->penabung->nama_penabung : 'Data Tidak Ada' }}</td>
                <td>{{ $row->jenis_kelamin }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->notelpon }}</td>
                <td>Rp.{{ number_format($row['penarikan'], 2, '.', '.') }}</td>


            </tr>
        @endforeach

    </table>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</html>
