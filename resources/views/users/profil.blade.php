@extends('admin.index')
@section('content')

<div class="card-body">
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h3 class="m-0 font-weight-bold text-primary">Profil</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Profil</li>
          <li class="breadcrumb-item"><a href="{{ route('edit-profil') }}">Edit Profil</a></li>
          </ol>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card mb-4">
          <div class="card-body box-profile">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              @empty($row->foto)
                <img src="{{ url('user')}}/user.png"" alt="Profile" class="rounded-circle"  style="width: 25%">
              @else
                <img src="{{ url('user')}}/{{$row->foto}}" alt="Profile" class="rounded-circle"  style="width: 25%">
              @endempty
            </div>

              <p class="text-muted text-center">{{ Auth::user()->role }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama</b> <a class="float-right">{{ $row->name }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $row->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Telepon</b> <a class="float-right">{{ $row->phone }}</a>
                  </li>
                </ul>     
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      
@endsection