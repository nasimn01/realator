<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Entsandt Realator | @yield('pageTitle')</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
      {{-- tostr css --}}
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Bootstrap Icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />
    <!-- Bootsrap 5.3 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <!-- font-awesome icon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('resource/css/main.css')}}" />
    @stack('styles')
  </head>
  <body>
    <!-- Header Logo & Nav start -->
    <header>
      <nav class="navbar navbar-expand-lg nav-text">
        <div class="container">
          <a class="navbar-brand logo" href="{{route('front')}}">
            <img src="{{asset('uploads/logo/'.$homePage?->logo)}}" alt="" />
            <!-- header logo -->
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <!-- Tooggle Button -->
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Nav Start -->
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 toggler-center">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('front')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('search') }}">Property</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about.page') }}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
              </li>
            </ul>
            <!-- Nav End -->
            <form class="d-flex toggler-center" role="search">
              <!-- Header Telephone Button -->
              <a class="btn-brand" href="tel:{{$homePage?->contact_no}}"
                ><i class="bi bi-telephone-fill"></i
              ></a>
              <span class="ms-2">{{$homePage?->contact_no}}</span>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- Header End -->

  @yield('content')

    

    <!-- Footer -->
    <section class="footer">
      <div class="container p-4">
        <div class="row pt-5">
          <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
            <p class="footer-title">About</p>
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link" href="{{ route('about.page') }}">About Us</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('about.page') }}">Mission</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('about.page') }}">Vission</a></li>
            </ul>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
            <p class="footer-title">Companay</p>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('search') }}">Select Your City</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('search') }}">Select your type</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
            <p class="footer-title">Others Link</p>
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link" href="{{ route('search') }}">Property list</a></li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('location.page') }}">Location List</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="{{route('term.page')}}">Trams & Condition</a></li>
            </ul>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3 text-center mb-5">
            <a href="{{route('front')}}">
              <img class="img-fluid" src="{{asset('uploads/logo/'.$homePage?->logo)}}" alt="" />
            </a>
            <div class="share-icon mt-4">
              <a href="{{$homePage?->facebook}}"><i style="color: #3b5998" class="bi bi-facebook"></i></a>
              <a href="{{$homePage?->twitter}}"><i style="color: #00acee" class="bi bi-twitter"></i></a>
              <a href="{{$homePage?->linkedin}}"><i style="color: #0072b1" class="bi bi-linkedin"></i></a>
              
              
            </div>
          </div>
        </div>
        <div class="footer-bg">
          <img class="img-fluid" src="{{ asset('resource/img/Group 2.png')}}" alt="" />
        </div>
      </div>
    </section>
    <!-- development brand -->
    <section class="brand">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <span>&copy; Realator</span>
          </div>
          <div class="col-sm-6 d-flex justify-content-sm-end">
            <span>Developed By Muktodhara Inc.</span>
          </div>
        </div>
      </div>
    </section>
    <!-- Bootstrap 5.3 -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('assets/js/jquery-1.9.1.min.js')}}"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- JS File -->
    <script src="{{ asset('resource/js/app.js')}}"></script>
    @stack('scripts')

    {{-- tostr --}}
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
  </body>
</html>

