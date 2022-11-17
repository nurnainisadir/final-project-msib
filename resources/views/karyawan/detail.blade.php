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
                    <div class="image-block">
                        @empty($row->foto)
                    <img src="{{ url('img/foto/nophoto.png') }}" alt="Profile" class="rounded-circle">
                    @else
                    <img src="{{ url('img')}}/{{$row->foto}}" alt="Profile" class="rounded-circle" style="width: 75%">
                    @endempty
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 align-self-center">
                    <div class="content-block">
                        <div class="name">
                             <h4>{{ $row->nama_karyawan }}</h4>
                        </div>
                        <div class="alert alert-light" role="alert">
                            <br>
                            <ul class="mr-1">
                                <li>Kode Karyawan : {{ $row->kode_karyawan }}</li>
                                <li>No Tlp        : {{ $row->no_tlp }}</li>
                                <li>Alamat        : {{ $row->alamat }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection