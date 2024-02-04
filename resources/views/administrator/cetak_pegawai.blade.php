<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.statuc {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Data Karyawan</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Karyawan</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No.</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Alamat</th>
            </tr>
            @foreach ($dataCetakKaryawan as $dtCtkKaryawan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dtCtkKaryawan->name }}</td>
                    <td>{{ $dtCtkKaryawan->jabatan->jabatan }}</td>
                    <td>{{ $dtCtkKaryawan->address }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>