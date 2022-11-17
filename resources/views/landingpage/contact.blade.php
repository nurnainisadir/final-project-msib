@extends('landingpage.index')
@section('content')
<br><br><br><br><br>
<h1 align="center">Contact</h1>
        <div class="container-xxl py-2">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                        <img class="img-fluid" style="width: 75%" src="{{ url('img/foto/kontak.png')}}">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="row g-3 mb-4">
                            <div class="col-12 d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle" style="background-color: #6785FF">
                                    <i class="bi bi-globe2 text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h6>Website</h6>
                                    <span>www.SILaundry.com</span>
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle" style="background-color: #6785FF">
                                    <i class="bi bi-person-square text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h6>Contact</h6>
                                    <span>+62 812 3456 7890</span>
                                </div>
                            </div>
                             <div class="col-12 d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle" style="background-color: #6785FF">
                                    <i class="bi bi-envelope text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h6>E-Mail</h6>
                                    <span>SILaundry@gmail.com</span>
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle" style="background-color: #6785FF">
                                    <i class="bi bi-geo-alt-fill text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h6>Alamat</h6>
                                    <span>Jl.Kenangan No.45, Jakarta Barat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection