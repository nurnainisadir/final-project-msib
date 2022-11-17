@extends('admin.index')
@section('content')
@php
$ar_customer = App\Models\Customer::all();
$ar_jenis = App\Models\Jenis::all();
$ar_karyawan = App\Models\Karyawan::all();
@endphp

<div class="col-lg-12">
    <div class="card-body">
        <div class="container px-3 my-0">
            <div class="card-body">
            <h3 class="m-0 font-weight-bold text-primary">Form Transaksi</h3><br>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
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
                    <input type="number" name="berat" class="form-control" value="{{ $row->berat }}">
                    <div class="invalid-feedback" data-sb-feedback="berat:required">Berat is required.</div>
                    </div>
                </div>

            <div class="row mb-3">
           <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                    <div class="col-sm-2">
            <input class="form-control" type="date" data-sb-validations="required" name="tgl_awal" value="{{ $row->tgl_awal }}"/>
            <div class="invalid-feedback" data-sb-feedback="tgl_awal:required">Tanggal Awal is required.</div>
        </div>
    </div>

            <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal Ambil</label>
                    <div class="col-sm-2">
                    <input class="form-control" type="date" data-sb-validations="required" name="tgl_ambil" value="{{ $row->tgl_ambil}}"/>
            <div class="invalid-feedback" data-sb-feedback="tgl_ambil:required">Tanggal Ambil is required.</div>
            </div>
            </div>

            <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Total Bayar</label>
                    <div class="col-sm-5">
                        <input type="number" name="total_bayar" class="form-control" value="{{ $row->total_bayar }}">
                        <div class="invalid-feedback" data-sb-feedback="total_bayar:required">Total Bayar is required.</div>
                    </div>
                </div>
        
                <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Karyawan</label>
            <div class="col-sm-5">
            <select class="form-select form-control" name="karyawan_id">
                <option selected>Pilih Karyawan</option>
                @foreach($ar_karyawan as $kar)
                @php $sel = ($kar->idkaryawan == $row->karyawan_id) ? 'selected' :  ''; @endphp
                <option value="{{ $kar->idkaryawan}}" {{$sel}}>{{ $kar->nama_karyawan }}</option>
                @endforeach
            </select>
        </div>
        </div>

            
        <br>

                <div class="d-grid">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button type="submit" class="btn btn-secondary">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div></div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection