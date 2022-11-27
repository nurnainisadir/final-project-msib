@extends('admin.index')
@section('content')
@php
$ar_gender = ['L','P'];
@endphp
<div class="container px-5 my-2">
    <div class="card-body">
        <h3 class="m-0 font-weight-bold text-primary">Form Karyawan</h3><br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Terjadi Kesalahan saat input data<br><br>
            </div>
            @endif
            
            <form action="{{ route('karyawan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-3">
                    <input type="text" name="kode_karyawan" value="{{ old('kode_karyawan') }}"
                    class="form-control @error('kode_karyawan') is-invalid @enderror">
                    @error('kode_karyawan')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                <div class="col-sm-5">
                    <input type="text" name="nama_karyawan" value="{{ old('nama_karyawan') }}" 
                    class="form-control  @error('nama_karyawan') is-invalid @enderror">
                    @error('nama_karyawan')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No. Telepon</label>
                <div class="col-sm-5">
                    <input type="text" name="no_tlp" value="{{ old('no_tlp') }}"
                    class="form-control @error('no_tlp') is-invalid @enderror">
                    @error('no_tlp')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
                       
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="radio col-sm-10">
                @foreach($ar_gender as $gender)
                    @php
                    $cek = (old('gender') == $gender)? 'checked':'';
                    @endphp
                    <div class="form-check">
                        <input class="form-check-input @error('gender') is-invalid @enderror"  type="radio" name="gender" value="{{ $gender }}" {{ $cek }}>
                        <label class="form-check-label" for="gridRadios1">
                        {{ $gender }}
                        </label>
                    </div>
                    @endforeach
                    @error('gender')
                    <div class="invalid-feedback d-inline">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                <div class="col-md-5">
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" type="text" name="alamat" style="height: 100px">{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

        <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-5">
                <input class="form-control" type="file" name="foto" accept="image/png, image/gif, image/jpeg, image/jpg">
            </div>
        </div>
        <br>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href=" {{ url('karyawan') }}">Batal</a>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection