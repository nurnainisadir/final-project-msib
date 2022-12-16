@extends('admin.index')
@section('content')

<div class="card-body">
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h3 class="m-0 font-weight-bold text-primary">Edit Profil</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Profil</li>
            <li class="breadcrumb-item"><a href="{{ route('edit-profil') }}">Edit Profil</a></li>
        </ol>
    </div>
          
      <form method="POST" action="{{ route('update-profil',$row->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
          
      <div class="row">
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-body">
              <form>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $row->name}}">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $row->email }}">
                  </div>

                  <div class="form-group">
                    <label>Telepon</label>
                    <input type="number" name="phone" class="form-control" value="{{ $row->phone }}">
                  </div>
                   
                  <div class="form-group">
                    <label>Foto</label>
                      <div class="custom-file">
                        <input type="file" name="foto" class="form-control">
                        @if(!empty($row->foto)) <img src="{{ url('user')}}/{{$row->foto}}" 
                        width="10%" class="img-thumbnail"><br>
                        {{$row->foto}}
                        @endif
                      </div>
                  </div>
        
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
          <div class="col-lg-6">
          </div>
      </div>
  </div>
</div>

@endsection