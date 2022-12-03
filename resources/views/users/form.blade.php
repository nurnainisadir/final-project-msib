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
            </div>
            @endif
            
            <form action="{{ route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" name="name" value="{{ old('name') }}" 
                    class="form-control  @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-5">
                    <input type="text" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="text" name="password" value="{{ old('password') }}"
                    class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Role</label>
                <div class="radio col-sm-10">
                @foreach($ar_role as $role)
                    @php
                    $cek = (old('role') == $role)? 'checked':'';
                    @endphp
                    <div class="form-check">
                        <input class="form-check-input @error('role') is-invalid @enderror"  type="radio" name="role" value="{{ $role }}" {{ $cek }}>
                        <label class="form-check-label" for="gridRadios1">
                        {{ $role }}
                        </label>
                    </div>
                    @endforeach
                    @error('role')
                    <div class="invalid-feedback d-inline">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Isactive</label>
                <div class="col-sm-5">
                    <input type="text" name="isactive" value="{{ old('isactive') }}"
                    class="form-control @error('isactive') is-invalid @enderror">
                    @error('isactive')
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
            </div><br>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href=" {{ url('users') }}">Batal</a>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection