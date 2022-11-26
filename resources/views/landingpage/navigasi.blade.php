<div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0"  style="background-color: #6785FF">
                <a class="navbar-brand py-0">
                    <h1 class="m-0" style="color: #FFFFFF">SI Laundry</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{url('/home')}}" class="nav-item nav-link">Home</a>
                        <a href="{{url('/about')}}" class="nav-item nav-link">About</a>
                        <a href="{{url('/contact')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    @auth
                    <a href="{{ url('administrator')}}" class="btn btn-light rounded-pill py-2 px-4 ms-lg-5" style="color : #6785FF">{{auth()->user()->name}}</a>

                    @else
                    <a href="{{ route('login')}}" class="btn btn-light rounded-pill py-2 px-4 ms-lg-5" style="color : #6785FF">Login</a>

                    @endauth
                </div>
            </nav>