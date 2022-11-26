@extends('admin.index')
@section('content')
<div class="container px-5 my-2">
    <div class="card-body">
            <h3>Form User</h3><br>

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

            @php
                if (isset($user)) {
                    $actionUrl = route('users.update', $user->id);
                } else {
                    $actionUrl = route('users.store');
                }
            @endphp

            <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($user))
                {{ method_field('PATCH') }}
                @endif
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-5">
                        <input type="text" name="name" class="form-control" value="{{ isset($user) ? $user->name : old('name') }}">
                        <div class="invalid-feedback" data-sb-feedback="name:required">Nama is required.</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" name="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}">
                        <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" name="password" class="form-control">
                        <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
                    </div>
                </div>

        <br>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
             <button type="submit" class="btn btn-secondary">Batal</button>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
