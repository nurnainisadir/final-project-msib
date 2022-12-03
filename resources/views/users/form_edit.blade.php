@extends('admin.index')
@section('content')
@php
$ar_role = ['admin','karyawan'];
@endphp
<div class="container px-5 my-2">
    <div class="card-body">
        <h3 class="m-0 font-weight-bold text-primary">Form User</h3><br>
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
            <form method="POST" action="{{ route('users.update',$row->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-5">
                <input type="text" name="name" class="form-control" value="{{ $row->name}}">
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
                <input type="text" name="email" class="form-control" value="{{ $row->email }}">
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-5">
                <input type="text" name="password" class="form-control" value="{{ $row->password }}">
                <div class="invalid-feedback"></div>
            </div>
        </div>
        
        <div class="row mb-3">
           <label class="col-sm-2 col-form-label">Role</label>
            <div class="radio col-sm-10">
                @foreach($ar_role as $role)
                @php $cek = ($role == $row->role) ? 'checked' : ''; @endphp
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" value="{{ $role }}" {{ $cek }}>
                    <label class="form-check-label" for="gridRadios1">
                        {{ $role }}
            </label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Isactive</label>
            <div class="col-sm-5">
                <input type="number" name="isactive" class="form-control" value="{{ $row->isactive }}">
                <div class="invalid-feedback"></div>
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-5">
                <input type="file" name="foto" class="form-control">
                @if(!empty($row->foto)) <img src="{{ url('img')}}/{{$row->foto}}" width="10%" class="img-thumbnail"><br/>\
                {{$row->foto}}
                @endif
            </div>
        </div>
        <br>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href=" {{ url('users') }}">Batal</a>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection