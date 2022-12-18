@extends('admin.index')
@section('content')
@php
$ar_customer = App\Models\Customer::all();
$ar_jenis = App\Models\Jenis::all();
$ar_karyawan = App\Models\Karyawan::all();
$ar_users = App\Models\User::all();
@endphp

<div class="col-lg-12">
    <div class="card-body">
        <div class="container px-3 my-0">
            <div class="card-body">
            <h3 class="m-0 font-weight-bold text-primary">Form Transaksi</h3><br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Terjadi kesalahan saat edit data<br><br>
            </div>
            @endif
            <form method="POST" action="{{ route('transaksi.update',$row->idtransaksi) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Customer</label>
                <div class="col-sm-5">
                    <select class="form-select form-control" name="customer_id">
                        <option selected>Pilih Customer</option>
                        @foreach($ar_customer as $cus)
                        @php $sel = ($cus->idcustomer == $row->customer_id) ? 'selected' :  ''; @endphp
                        <option value="{{ $cus->idcustomer}}" {{$sel}} >{{ $cus->nama_customer }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Laundry</label>
                <div class="col-sm-5">
                    <select class="form-select form-control" name="jenis_id">
                        <option selected>Pilih Jenis Laundry</option>
                        @foreach($ar_jenis as $jen)
                        @php $sel = ($jen->idjenis == $row->jenis_id) ? 'selected' :  ''; @endphp
                        <option value="{{ $jen->idjenis}}" {{$sel}} >{{ $jen->jenis_laundry}}&nbsp;&nbsp;|&nbsp;&nbsp;{{ $jen->harga}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
           
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Berat /kg</label>
                <div class="col-sm-2">
                    <input type="number" name="berat" value="{{ $row->berat }}"
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
                    <input type="date" name="tgl_awal" value="{{ $row->tgl_awal }}"
                    class="form-control form-control @error('tgl_awal') is-invalid @enderror">
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
                    <input type="date" name="tgl_ambil" value="{{ $row->tgl_ambil }}"
                    class="form-control form-control @error('tgl_ambil') is-invalid @enderror">
                    @error('tgl_ambil')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Total Bayar</label>
                <div class="col-sm-2">
                    <input type="number" name="total_bayar" value="{{ $row->total_bayar }}"
                    class="form-control form-control @error('total_bayar') is-invalid @enderror">
                    @error('total_bayar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select class="form-select form-control" name="status">
                        <option selected>Pilih Status</option>
                        @php 
                        $sel = ($row->status == $row->status) ? 'selected' : ''; 
                        @endphp
                        <option value="{{ $row->status }}" {{ $sel }}>{{ $row->status }}</option>
                        <option value="Proses">Proses</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kasir</label>
                <div class="col-sm-5">
                    <select class="form-select form-control" name="users_id">
                        <option selected>Pilih Kasir</option>
                        @foreach($ar_users as $kar)
                        @php $sel = ($kar->id == $row->users_id) ? 'selected' :  ''; @endphp
                        <option value="{{ $kar->id}}" {{$sel}}>{{ $kar->name }}</option>
                        @endforeach
                    </select>
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
    </div>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection