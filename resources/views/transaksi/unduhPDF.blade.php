<!DOCTYPE html>
<html>
<head>
    <title>Transaksi PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-8">
        <div class="text-center">
          <p style="color: #7e8d9f;font-size: 20px;"><strong>SI Laundry</strong></p>
          <p style="color: #7e8d9f;font-size: 15px;">Jl.Kenangan, No.45 Jakarta Barat</p>
        </div>
        <hr style="border: 1px solid;">
      </div>
      
      <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted">Nama: <span style="color:#5d9fc5 ;">{{ $transaksi->customer->nama_customer }}</span></li>
            </ul>
          </div>
          <div class="col-xl-4">
            <ul class="list-unstyled">
              <li class="text-muted"><span>Creation Date:</span>
              <span class="fw-bold">{{ $transaksi->tgl_awal }}</span></li>
              <li class="text-muted"><span>Status:</span>
              <span class="me-1 fw-bold">{{ $transaksi->status }}</span></li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#84B0CA ;" class="text-center">
              <tr>
                <th scope="col">Jenis</th>
                <th scope="col">Berat</th>
                <th scope="col">Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                <td>{{ $transaksi->jenis->jenis_laundry }}</td>
                <td>{{ $transaksi->berat }}&nbsp;Kg</td>
                <td>Rp. {{number_format($transaksi['total_bayar'], 2,',','.')}}</td>
              </tr>
            </tbody>
          </table>
        </div>
</div>
</body>
</html>