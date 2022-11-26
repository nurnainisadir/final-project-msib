@extends('admin.index')
@section('content')

<section class="section schedule text-black">
    <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="m-0 font-weight-bold text-primary">Data Karyawan</h3><br>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif

                        <a href="{{ route('karyawan.create') }}">
                        <button type="button" class="btn btn-primary bi-plus btn-sm" title="Tambah Karyawan"></button></a>&nbsp;
                        <a href="{{ url('karyawan-pdf')}}">
                        <button type="button" class="btn btn-danger bi-file-earmark-pdf btn-sm" title="Export PDF"></button></a>&nbsp;
                        <a href="{{ url('karyawan-excel')}}">
                        <button type="button" class="btn btn-success bi-file-earmark-excel btn-sm" title="Export Excel"></button></a>
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
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($karyawan as $row)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{ $row->kode_karyawan }}</td>
                            <td>{{ $row->nama_karyawan }}</td>
                            <td>{{ $row->no_tlp }}</td>
                            <td>{{ $row->gender }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td width="10%">
                                @empty($row->foto)
                                <img src="{{ url('img/foto/nophoto.png') }}" width="35%" alt="Profile" class="rounded-circle">
                                @else
                                <img src="{{ url('img')}}/{{$row->foto}}" width="35%" alt="Profile" class="rounded-circle">
                                @endempty
                            </td>
                            <td>
                            <form method="POST" action="{{ route('karyawan.destroy',$row->idkaryawan) }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail" href=" {{ route('karyawan.show',$row->idkaryawan) }}"> <i class="bi bi-eye"></i></a>
                                <a class="btn btn-warning btn-sm" title="Edit"href=" {{ url('karyawan-edit',$row->idkaryawan) }}"><i class="bi bi-pencil-square"></i></a>

                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
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