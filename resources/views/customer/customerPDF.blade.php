<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h4 align="center">Data Customer | SI Laundry</h4>
    <table class="table table-bordered">
        <thead class="table-dark">  
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Gender</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($customer as $row)
            <tr>
                <th>{{$no++}}</th>
                <td>{{ $row->nama_customer }}</td>
                <td>{{ $row->no_tlp }}</td>
                <td>{{ $row->gender }}</td>
                <td>{{ $row->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>