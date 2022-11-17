@extends('landingpage.index')
@section('content')
 <div class="container-xxl hero-header" style="background-color: #6785FF">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn">Welcome to SI Laundry</h1>
                            <p class="text-white pb-3 animated zoomIn" >Jasa Laundry Pakaian Sekitar Jakarta Barat</p>
                            <a href="" class="btn btn-outline-light rounded-pill border-2 py-3 px-5 animated slideInRight">All Services</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="img-fluid animated zoomIn" src="{{url('img/foto/home.png')}}" style="width: 80%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <div class="container-xxl">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h2 class="mb-4 ">MENGAPA HARUS MEMILIH LAYANAN KAMI</h2>
                    <p>Karena kami senantiasa memberikan layanan paket usaha & franchise laundry dengan berbagai peralatan untuk laundry kiloan maupun koin yang profesional dan berkualitas dengan Brand SpeedQueen Commercial Laundry.</p></br></br>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon" style="background-color: #6785FF">
                                    <i class="fa fa-user-tie fa-2x" style="background-color: #6785FF"></i>
                                </div>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Sistem Manajemen yang Berkualitas</h5>
                                <span>Dengan bermitra bersama kami, Anda bisa mendapatkan panduan dan bimbingan lengkap dari tim yang profesional.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon" style="background-color: #6785FF">
                                    <i class="fa fa-chart-pie fa-2x" style="background-color: #6785FF"></i>
                                </div>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Distributor & Showroom Resmi</h5>
                                <span>Mesin laundry yang kami tawarkan merupakan produk import asli dari Amerika, sehingga Anda tidak perlu khawatir akan kualitasnya.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon" style="background-color: #6785FF">
                                    <i class="bi bi-book-half fa-2x" style="background-color: #6785FF"></i>
                                </div>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Akses Laporan Yang Nyaman & Mudah</h5>
                                <span>Akses setiap laporan harian dari bisnis franchise laundry Anda dengan teknologi IoT dimanapun, kapanpun.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon" style="background-color: #6785FF">
                                    <i class="bi bi-tags-fill fa-2x" style="background-color: #6785FF"></i>
                                </div>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Biaya Investasi Yang Lebih Terjangkau</h5>
                                <span>Biaya yang Anda perlukan dalam berbisnis franchise laundry bersama kami tidaklah besar. Anda tetap akan mendapatkan harga terjangkau dengan kualitas profesional dalam mengembangkan bisnis Anda.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon" style="background-color: #6785FF">
                                    <i class="fab fa-servicestack fa-2x" style="background-color: #6785FF"></i>
                                </div>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Tersedia Service & Sparepart Center</h5>
                                <span>Jika peralatan laundry Anda membutuhkan perawatan, maka. tidaklah perlu khawatir karena kami menyediakan area servis dan penyediaan suku cadang di 32 kota di Indonesia.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon" style="background-color: #6785FF">
                                    <i class="fa fa-chart-line fa-2x" style="background-color: #6785FF"></i>
                                </div>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Tim Pemasaran Online & Offline Profesional</h5>
                                <span>Dengan bermitra bersama kami, Anda tidak perlu khawatir dalam memasarkan bisnis franchise laundry Anda terhadap target audiens. Kami dapat membantu Anda dengan memberikan dukungan tim yang terdiri dari pemasaran baik untuk digital maupun offline.</span>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl my-6 wow fadeInUp" data-wow-delay="0.1s" style="background-color: #6785FF">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">ORDERAN PERTAMA DISKON 15%</h3>
                        <small class="text-white"> Hubungi Kami : <i class="fas fa-phone-volume"></i> 0823-7654-9876</small>
                    </div>
                    <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                        <img class="img-fluid mt-5" style="max-height: 250px;" src="img/newsletter.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <div class="d-inline-block border rounded-pill text-black px-4 mb-3">Testimonial</div>
                    <h2 class="mb-5">What Our Clients Say!</h2>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item rounded p-4">
                        <i class="fa fa-quote-left fa-2x mb-3" style="color: #6785FF"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg">
                            <div class="ps-3">
                                <h6 class="mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <i class="fa fa-quote-left fa-2x mb-3" style="color: #6785FF"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg">
                            <div class="ps-3">
                                <h6 class="mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <i class="fa fa-quote-left fa-2x mb-3" style="color: #6785FF"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg">
                            <div class="ps-3">
                                <h6 class="mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <i class="fa fa-quote-left fa-2x mb-3" style="color: #6785FF"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg">
                            <div class="ps-3">
                                <h6 class="mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        @endsection