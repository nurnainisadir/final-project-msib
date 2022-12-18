@extends('admin.index')
@section('content')
@php
$ar_gender = ['L','P'];
@endphp
<div class="container px-5 my-2">
    <div class="card-body">
        <h3 class="m-0 font-weight-bold text-primary">Form Customer</h3><br>
            @if ($errors->any())
            <div class="alert alert-danger">
            <strong>Whoops!</strong> Terjadi Kesalahan saat input data<br><br>
            </div>
            @endif

            <form action="{{ route('customer.store')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Customer</label>
                <div class="col-sm-5">
                    <input type="text" name="nama_customer" value="{{ old('nama_customer') }}"
                    class="form-control @error('nama_customer') is-invalid @enderror">
                    @error('nama_customer')
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

        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href=" {{ url('customer') }}">Batal</a>
        </div>
    </form>
</div>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection