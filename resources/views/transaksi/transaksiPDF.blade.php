<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h5 align="center">Data Transaksi | SI Laundry</h5>
    <table class= "table table-stripped">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Jenis</th>
                <th>Berat</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Kasir</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($transaksi as $row)
            @php
                $color = "";
                if($row->status == 'Selesai'){
                $color = 'badge-success';
                }
                else{
                $color = 'badge-info';
                }
                @endphp
            <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{ $row->customer->nama_customer }}</td>
                <td>{{ $row->jenis->jenis_laundry }}</td>
                <td>{{ $row->berat }}&nbsp;Kg</td>
                <td>{{ $row->tgl_awal }}</td>
                <td>{{ $row->tgl_ambil }}</td>
                <td>Rp. {{number_format($row['total_bayar'], 2,',','.')}}</td>
                <td><span class="badge {{ $color }}"> {{ $row->status }}</span></td>
                <td> {{ $row->users?->name }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
</body>
</html>