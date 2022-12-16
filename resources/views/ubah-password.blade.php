@extends('admin.index')
@section('content')
<div class="card-body">
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="m-0 font-weight-bold text-primary">Ubah Password</h3><br>
        </div>
            
            <form action="{{ route('ubah-password-proses') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"></div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="password_lama">Password Lama</label>
                                        <input type="password" name="password_lama" class="form-control @error('password_lama') is-invalid @enderror" id="password_lama">
                                        @error('password_lama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary">Ubah</button>
                                        <a class="btn btn-secondary" href=" {{ url('dashboard') }}">Batal</a>
                                    </div>
                                </form>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection