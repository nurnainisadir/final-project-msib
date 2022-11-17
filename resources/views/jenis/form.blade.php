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
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
               <form action="{{ route('jenis.store')}}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jenis Laundry</label>
                    <div class="col-sm-4">
                        <input type="text" name="jenis_laundry" class="form-control">
                        <div class="invalid-feedback" data-sb-feedback="jenis_laundry:required">Jenis Laundry is required.</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-4">
                        <input type="text" name="harga" class="form-control">
                        <div class="invalid-feedback" data-sb-feedback="harga:required">Jenis Laundry is required.</div>
                    </div>
                </div>
        <br>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
             <button type="reset" class="btn btn-secondary">Batal</button>
        </div>
    </form>
</div>
</div>
</div></div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection