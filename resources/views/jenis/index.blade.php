@extends('admin.index')
@section('content')
<section class="section schedule text-black">
    <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="m-0 font-weight-bold text-primary">Data Jenis</h3><br>
                        
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif

                    <a href="{{ route('jenis.create') }}">
                    <button type="button" class="btn btn-primary bi-plus btn-sm" title="Tambah Jenis"></button></a>&nbsp;
                    <a href="{{ url('jenis-pdf')}}">
                    <button type="button" class="btn btn-danger bi-file-earmark-pdf btn-sm" title="Export PDF"></button></a>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Laundry</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         @php $no = 1; @endphp
                        @foreach($jenis as $row)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                        <td>{{ $row->jenis_laundry }}</td>
                        <td>Rp. {{number_format($row['harga'], 2,',','.')}}</td>
                        <td>
                             <form method="POST" action="{{ route('jenis.destroy',$row->idjenis) }}">
                                @csrf
                                @method('DELETE')
                        <a class="btn btn-warning btn-sm" title="Edit"href=" {{ url('jenis-edit',$row->idjenis) }}"><i class="bi bi-pencil-square"></i></a>

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