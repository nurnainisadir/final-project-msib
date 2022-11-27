@extends('admin.index')
@section('content')
<div class="col-lg-12">
    <div class="card-body">
        <div class="container px-3 my-0">
            <div class="card-body">
            <h3 class="m-0 font-weight-bold text-primary">Form Jenis</h3><br>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Terjadi Kesalahan saat input data<br><br>
                </div>
            @endif

               <form action="{{ route('jenis.store')}}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jenis Laundry</label>
                    <div class="col-sm-4">
                        <input type="text" name="jenis_laundry" value="{{ old('jenis_laundry') }}"
                        class="form-control @error('jenis_laundry') is-invalid @enderror">
                        @error('jenis_laundry')
                        <div class="invalid-feedback" >
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-4">
                        <input type="text" name="harga" value="{{ old('harga') }}"
                        class="form-control  @error('harga') is-invalid @enderror">
                        @error('harga')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
        <br>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href=" {{ url('jenis') }}">Batal</a>
        </div>
    </form>
</div>
</div>
</div></div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection