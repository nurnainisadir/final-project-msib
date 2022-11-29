@extends('landingpage.index')
@section('content')

<div class="container-xxl hero-header" style="background-color: #6785FF">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="text-white mb-4 animated zoomIn">Terima Kasih telah Melakukan Registrasi User</h1>
                    <p class="text-white pb-3 animated zoomIn" >Mohon tunggu Approval dari Administrator</p>
                    <a href="{{ url('login') }}" class="btn btn-outline-light rounded-pill border-2 py-3 px-5 animated slideInRight">Login</a>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid animated zoomIn" src="{{url('img/foto/newsletter.png')}}" style="width: 80%" alt="">
            </div>
        </div>
    </div>
</div>
@endsection