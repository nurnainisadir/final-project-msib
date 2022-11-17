@extends('admin.index')
@section('content')
<section class="section schedule text-black">
    <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="m-0 font-weight-bold text-primary">Data Customer</h3><p style="float:right;">

                         @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif

                        <a href="{{ route('customer.create') }}">
                        <button type="button" class="btn btn-primary bi-plus" title="Tambah Customer">Tambah</button></a></h3>
                    <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         @php $no = 1; @endphp
                        @foreach($customer as $row)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                        <td>{{ $row->nama_customer }}</td>
                        <td>{{ $row->no_tlp }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>
                          <form method="POST" action="{{ route('customer.destroy',$row->idcustomer) }}">
                                @csrf
                                @method('DELETE')   
                        <a class="btn btn-warning btn-sm" title="Edit"href=" {{ url('customer-edit',$row->idcustomer) }}"><i class="bi bi-pencil-square"></i></a>

                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus Transaksi"
                                    onclick="return confirm('Yakin ingin menghapus data ?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
