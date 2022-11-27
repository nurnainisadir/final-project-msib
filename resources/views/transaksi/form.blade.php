@extends('admin.index')
@section('content')
<div class="col-lg-12">
<div class="card-body">
<div class="container px-3 my-0">
    <div class="card-body">
        <h3 class="m-0 font-weight-bold text-primary">Form Transaksi</h3><br>
             @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Terjadi Kesalahan saat input data<br><br>
            </div>
            @endif

            <form action="{{ route('transaksi.store')}}" method="POST">
            @csrf

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Customer</label>
                <div class="col-sm-5">
                    <select class="form-select form-control @error('customer_id') is-invalid @enderror" name="customer_id">
                    <option selected>Pilih Customer</option>
                    @foreach($ar_customer as $cus)
                        @php
                        $sel = (old('customer_id') == $cus->idcustomer)? 'selected':'';
                        @endphp
                        <option value="{{ $cus->idcustomer }}" {{ $sel }}>{{ $cus->nama_customer }}</option>
                    @endforeach
                    </select>
                    @error('customer_id')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
           
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Laundry</label>
                <div class="col-sm-5">
                    <select class="form-select form-control @error('jenis_id') is-invalid @enderror" name="jenis_id">
                    <option selected>Pilih Jenis Laundry</option>
                    @foreach($ar_jenis as $jen)
                        @php
                        $sel = (old('jenis_id') == $jen->idjenis)? 'selected':'';
                        @endphp
                        <option value="{{ $jen->idjenis }}" {{ $sel }}>{{ $jen->jenis_laundry}}&nbsp;&nbsp;|&nbsp;&nbsp;{{ $jen->harga}}</option>
                    @endforeach
                    </select>
                    @error('jenis_id')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Berat /kg</label>
                <div class="col-sm-2">
                    <input type="number" name="berat" value="{{ old('berat') }}"
                    class="form-control form-control @error('berat') is-invalid @enderror">
                    @error('berat')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                <div class="col-sm-2">
                    <input type="date" data-sb-validations="required" name="tgl_awal" value="{{ old('tgl_awal') }}"
                    class="form-control @error('tgl_awal') is-invalid @enderror">
                    @error('tgl_awal')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tanggal Ambil</label>
                <div class="col-sm-2">
                    <input type="date" data-sb-validations="required" name="tgl_ambil" alue="{{ old('tgl_ambil') }}"
                    class="form-control @error('tgl_ambil') is-invalid @enderror">
                    @error('tgl_ambil')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Total Bayar</label>
                <div class="col-sm-5">
                    <input type="number" name="total_bayar" value="{{ old('total_bayar') }}"
                    class="form-control form-control @error('total_bayar') is-invalid @enderror">
                        @error('total_bayar')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror  
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Karyawan</label>
                <div class="col-sm-5">
                    <select class="form-select form-control @error('karyawan_id') is-invalid @enderror" name="karyawan_id">
                    <option selected>Pilih Karyawan</option>
                    @foreach($ar_karyawan as $kar)
                        @php
                        $sel = (old('karyawan_id') == $kar->idkaryawan)? 'selected':'';
                        @endphp
                        <option value="{{ $kar->idkaryawan }}" {{ $sel }}>{{ $kar->nama_karyawan }}</option>
                    @endforeach
                    </select>
                    @error('karyawan_id')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror               
                </div>
            </div>
        <br>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href=" {{ url('transaksi') }}">Batal</a>
        </div>
    </form>
</div>
</div>
</div></div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection