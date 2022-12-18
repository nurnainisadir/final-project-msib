@extends('admin.index')
@section('content')

<section class="section single-speaker">
    <div class="container">
        <div class="block">
            <div class="row">
                <div class="col-lg-4 col-md-6 align-self-md-center">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <center><br>
                    <div class="image-block">
                    @empty($row->foto)
                    <img src="{{ url('img/foto/nophoto.png') }}" alt="Profile">
                    @else
                    <img src="{{ url('img')}}/{{$row->foto}}" alt="Profile" style="width: 75%">
                    @endempty
                    </div>
                    </center>
                </div>
                
                <div class="col-lg-6 col-md-6 align-self-center">
                    <div class="content-block">
                        <div class="name">
                             <br><h4>{{ $row->nama_karyawan }}</h4>
                        </div>
                        <div>
                            <br>
                                <li>Kode Karyawan : {{ $row->kode_karyawan }}</li>
                                <li>No Tlp        : {{ $row->no_tlp }}</li>
                                <li>Jenis kelamin : {{ $row->gender }}</li>
                                <li>Alamat        : {{ $row->alamat }}</li>
                                <br><br>
                                <a href="{{ url('/karyawan')}}">
                                <button type="submit" class="btn btn-secondary btn-sm"><i class="bi bi-box-arrow-left ">&nbsp;</i>Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection