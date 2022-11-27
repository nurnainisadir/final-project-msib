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
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('customer.update',$row->idcustomer) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Customer</label>
            <div class="col-sm-5">
                <input type="text" name="nama_customer" class="form-control" value="{{ $row->nama_customer }}">
                <div class="invalid-feedback" data-sb-feedback="nama_customer:required">Nama Customer is required.</div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">No. Telepon</label>
            <div class="col-sm-5">
                <input type="text" name="no_tlp" class="form-control" value="{{ $row->no_tlp }}">
                <div class="invalid-feedback" data-sb-feedback="no_tlp:required">No. Telepon is required.</div>
            </div>
        </div>

        <div class="row mb-3">
           <label class="col-sm-2 col-form-label">Gender</label>
            <div class="radio col-sm-10">
                @foreach($ar_gender as $gender)
                @php $cek = ($gender == $row->gender) ? 'checked' : ''; @endphp
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="{{ $gender }}" {{ $cek }}>
                        <label class="form-check-label" for="gridRadios1">
                            {{ $gender }}
                        </label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
            <div class="col-md-7">
                <textarea class="form-control" id="alamat" type="text" name="alamat" style="height: 100px" >{{ $row->alamat }}</textarea>
                <div class="invalid-feedback" data-sb-feedback="alamat:required">Alamat is required.</div>
            </div>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href=" {{ url('customer') }}">Batal</a>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection