<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h4 align="center">Data Transaksi</h4>
    <table class= "table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Jenis Laundry</th>
                <th>Berat</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Ambil</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($transaksi as $row)
            <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{ $row->customer->nama_customer }}</td>
                <td>{{ $row->jenis->jenis_laundry }}</td>
                <td>{{ $row->berat }}&nbsp;Kg</td>
                <td>{{ $row->tgl_awal }}</td>
                <td>{{ $row->tgl_ambil }}</td>
                <td>Rp. {{number_format($row['total_bayar'], 2,',','.')}}</td>
                <td> {{ $row->karyawan->nama_karyawan }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
</body>
</html>