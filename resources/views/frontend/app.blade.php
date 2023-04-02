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
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('resource/css/main.css')}}" />
  </head>
  <body>
    <!-- Header Logo & Nav start -->
    <header>
      <nav class="navbar navbar-expand-lg nav-text">
        <div class="container">
          <a class="navbar-brand logo" href="{{route('front')}}">
            <img src="{{asset('uploads/logo/'.$homePage->logo)}}" alt="" />
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
                <a class="nav-link" href="#">Property</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Products
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Service
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
            </ul>
            <!-- Nav End -->
            <form class="d-flex toggler-center" role="search">
              <!-- Header Telephone Button -->
              <a class="btn-brand" href="tel:+88 0145 67890123"
                ><i class="bi bi-telephone-fill"></i
              ></a>
              <span class="ms-2">{{$homePage->contact_no}}</span>
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
              <li class="nav-item"><a class="nav-link" href="">About Us</a></li>
              <li class="nav-item"><a class="nav-link" href="">Mission</a></li>
              <li class="nav-item"><a class="nav-link" href="">Vision</a></li>
              <li class="nav-item"><a class="nav-link" href="">Mission</a></li>
            </ul>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
            <p class="footer-title">Companay</p>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="">Select Your City</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Select Your City</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Corporate Office</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="">About Us</a></li>
              <li class="nav-item">
                <a class="nav-link" href="">Corporate Office</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
            <p class="footer-title">Others Link</p>
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link" href="">About Us</a></li>
              <li class="nav-item">
                <a class="nav-link" href="">Corporate Office</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="">Vision</a></li>
              <li class="nav-item"><a class="nav-link" href="">About Us</a></li>
              <li class="nav-item">
                <a class="nav-link" href="">Select Your City</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3 text-center mb-5">
            <img class="img-fluid" src="{{asset('uploads/logo/'.$homePage->logo)}}" alt="" />
            <div class="share-icon mt-4">
              <a href="{{$homePage->facebook}}"><i style="color: #3b5998" class="bi bi-facebook"></i></a>
              <a href="{{$homePage->twitter}}"><i style="color: #00acee" class="bi bi-twitter"></i></a>
              <a href="{{$homePage->linkedin}}"><i style="color: #0072b1" class="bi bi-linkedin"></i></a>
              
              
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
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- JS File -->
    <script src="{{ asset('resource/js/app.js')}}"></script>
  </body>
</html>
