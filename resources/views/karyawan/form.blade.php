@extends('admin.index')
@section('content')
<div class="container px-5 my-2">
    <div class="card-body">
            <h3>Form Karyawan</h3><br>

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
               <form action="{{ route('karyawan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
         <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-3">
                        <input type="text" name="kode_karyawan" class="form-control">
                        <div class="invalid-feedback" data-sb-feedback="kode_karyawan:required">Kode is required.</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-5">
                        <input type="text" name="nama_karyawan" class="form-control">
                        <div class="invalid-feedback" data-sb-feedback="nama_karyawan:required">Nama Karyawan is required.</div>
                    </div>
                </div>
         <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">No. Telepon</label>
                    <div class="col-sm-5">
                        <input type="text" name="no_tlp" class="form-control">
                        <div class="invalid-feedback" data-sb-feedback="no_tlp:required">No. Tlp is required.</div>
                    </div>
                </div>

       <div class="row mb-3">
           <label class="col-sm-2 col-form-label">Gender</label>
                <div class="radio col-sm-10">
                    <label><input name="gender" type="radio" value="L">&nbsp;L</label><br>
                    <label><input name="gender" type="radio" value="P">&nbsp;P</label>
                </div>
            </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
            <div class="col-md-7">
            <textarea class="form-control" id="alamat" type="text" name="alamat" style="height: 100px"></textarea>
            <div class="invalid-feedback" data-sb-feedback="alamat:required">Alamat is required.</div>
        </div>
        </div>

        <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-7">
                <input class="form-control" type="file" name="foto" accept="image/png, image/gif, image/jpeg, image/jpg">
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