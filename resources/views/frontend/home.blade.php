@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')
  <style>
    .fifth-card-one {
      background-image: url("{{ asset('resource/img/fifth-section-pic/image6.png')}}");
    }
    .fifth-card-two {
      background-image: url("{{ asset('resource/img/fifth-section-pic/image7.png')}}");
    }
    .fifth-card-three {
      background-image: url("{{ asset('resource/img/fifth-section-pic/image8.png')}}");
    }
    .fifth-card-four {
      background-image: url("{{ asset('resource/img/fifth-section-pic/image9.png')}}");
    }
  </style>
    <!-- Slider Section Start -->
    <section class="container slider">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 mt-5 pt-5">
          <h1>{{$homePage->title_1}}</h1>
          <!-- slider 1st Header -->
          <h1>{{$homePage->title_2}}</h1>
          <!-- slider 2nd Header -->
          <h1>{{$homePage->title_3}}</h1>
          <!-- slider 3rd Header -->
          <div class="counter-box d-flex align-items-start">
            <!-- COunter Box -->
            <div class="row">
              <div class="col-sm-4 mb-4">
                <!-- COunter Box 1 -->
                <div class="counter shadow-lg rounded-4 p-2 text-center">
                  <h3>2.0K</h3>
                  <span>Premium Product</span>
                </div>
              </div>
              <div class="col-sm-4 mb-4">
                <!-- COunter Box 2 -->
                <div class="counter shadow-lg rounded-4 p-2 text-center">
                  <h3>2.0K</h3>
                  <span>Premium Product</span>
                </div>
              </div>
              <div class="col-sm-4 mb-4">
                <!-- COunter Box 3 -->
                <div class="counter shadow-lg rounded-4 p-2 text-center">
                  <h3>2.0K</h3>
                  <span>Premium Product</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 justify-content-end">
          <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="1"
                aria-label="Slide 2"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="2"
                aria-label="Slide 3"
              ></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-inner">
                @forelse($slider as $s)
                <div class="carousel-item active">
                  <img
                    src="{{asset('uploads/Slide_image/'.$s->image)}}"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>
                @empty
                <div class="carousel-item">
                  <img
                    src="{{ asset('resource/img/Slide.png')}}"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>
                @endforelse
              </div>
            </div>
          </div>
          <!-- search select Section -->
          <div class="search-div bg-white p-3 shadow-lg mt-5 rounded">
            <div class="row">
              <div class="col-sm-5 mb-3">
                <select
                  class="form-select form-select-sm"
                  aria-label="Default select example"
                >
                  <option selected>Proparty Type</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="col-sm-5 mb-3">
                <select
                  class="form-select form-select-sm"
                  aria-label="Default select example"
                >
                  <option selected>Locaiton</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="col-sm-2 mb-3">
                <a href="#" class="btn-brand"> Submit</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  Slider Section end -->
    <!-- Popular section start -->
    <section class="container my-5 p-5">
      <div class="my-5">
        <div class="text-center mb-4">
          <!--center First  Header -->
          <p class="card-first-header">Best Choice</p>
          <!--center Secound Header  -->
          <h1 class="card-secound-header">Popular Residence</h1>
        </div>
        <div class="row mt-5">
          @forelse($property as $loc)
          <div class="col-sm-6 col-md-4 col-lg-3 col- my-3 px-2">
            <div class="card first-card shadow border border-0">
              <a href="{{route('sProperty',$loc->id)}}">
                <img src="{{asset('uploads/property_feature/'.$loc->feature_photo)}}" class="card-img-top img-fluid" alt="..."/>
              </a>
              <div class="card-body">
                <p class="card-amount">
                  <span class="dollar-sign">$</span> USD {{$loc->price}}
                </p>
                <p class="card-text fw-bold">{{$loc->name}}</p>
                <p class="card-location">Location : {{$loc->locat?->name}}</p>
              </div>
            </div>
          </div>
          @empty
          <div class="col-sm-6 col-md-4 col-lg-3 col- my-3 px-2">
            <div class="card first-card shadow border border-0">
              <img
                src="{{ asset('resource/img/card pic/house.png')}}"
                class="card-img-top img-fluid"
                alt="..."
              />
              <div class="card-body">
                <p class="card-amount">
                  <span class="dollar-sign">$</span> USD 2000.00
                </p>
                <p class="card-text fw-bold">Golden Home Town</p>
                <p class="card-location">Location : Ontorio, Canada</p>
              </div>
            </div>
          </div>
          @endforelse
        </div>
      </div>
    </section>
    <!-- Popular section end -->
    <!-- Third section Start -->
    <section class="container third-section mt-5 pt-5">
      <div class="mb-5">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="rectangles">
              <div>
                <img
                  src="{{ asset('resource/img/third-section-pic/Rectangle 14.png')}}"
                  class="img-fluid uper-rectangles"
                  alt=""
                />

                <div class="d-flex third-section-image p-2">
                  <div class="p-2">
                    <img
                      src="{{ asset('resource/img/third-section-pic/image 2.png')}}"
                      class="img-fluid third-section-pic"
                      alt=""
                    />
                  </div>
                  <div>
                    <div class="p-2">
                      <img
                        src="{{ asset('resource/img/third-section-pic/image 3.png')}}"
                        class="img-fluid third-section-pic"
                        alt=""
                      />
                    </div>
                    <div class="p-2">
                      <img
                        src="{{ asset('resource/img/third-section-pic/image 4.png')}}"
                        class="img-fluid third-section-pic"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <img
                  src="{{ asset('resource/img/third-section-pic/Rectangle 15.png')}}"
                  class="img-fluid bottom-rectanguler"
                  alt=""
                />
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="m-3 ms-5">
              <!-- first header -->
              <h4 class="fw-bold my-3">About Us</h4>
              <!-- second header -->
              <div class="me-5">
                <h2 class="second-header" style="width: 20rem">
                  Decorate Your Own Home Environment
                </h2>
              </div>
              <!-- head end -->
              <p class="my-4 fw-semibold third-section-pera">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                varius malesuada justo vel varius. Pellentesque nec turpis a
                ante sollicitudin convallis. Ut sed leo urna. Nulla maximus urna
                eget congue pretium. Aliquam sit amet lacinia elit. Etiam ac
                tortor eget nibh consequat placerat. Interdum et malesuada fames
                ac ante ipsum primis in faucibus.
              </p>
              <!-- list start -->
              <ul class="third-section-list ms-0">
                <li>
                  <img
                    src="{{ asset('resource/img/third-section-pic/Vector.png')}}"
                    alt=""
                  />
                  Decorate Your Own Home Environment
                </li>
                <li>
                  <img
                    src="{{ asset('resource/img/third-section-pic/Vector.png')}}"
                    alt=""
                  />
                  Decorate Your Own
                </li>
                <li>
                  <img
                    src="{{ asset('resource/img/third-section-pic/Vector.png')}}"
                    alt=""
                  />
                  Decorate Your Own Home
                </li>
                <li>
                  <img
                    src="{{ asset('resource/img/third-section-pic/Vector.png')}}"
                    alt=""
                  />
                  Decorate Your
                </li>
                <li>
                  <img
                    src="{{ asset('resource/img/third-section-pic/Vector.png')}}"
                    alt=""
                  />
                  Decorate Your Own Home Environment
                </li>
                <li>
                  <img
                    src="{{ asset('resource/img/third-section-pic/Vector.png')}}"
                    alt=""
                  />
                  Decorate Your Own Home
                </li>
              </ul>
              <!-- list end -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Third section end -->
    <!-- Fourth section -->
    <section class="container fourth-section my-5 pt-5">
      <div class="text-center">
        <!-- first header -->
        <h6>Contact Us</h6>
        <!-- second header -->
        <h2 class="fw-bold second-header">Easy to Connect Us</h2>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 mt-5 pe-5">
          <div class="row mt-5">
            <div class="col-6">
              <div class="py-2 mx-2">
                <div class="card fourth-section-first-card rounded-4">
                  <div class="card-body fourth-card-body">
                    <div class="d-flex mb-3">
                      <img
                        src="{{ asset('resource/img/fourth-section-pic/Vector.png')}}"
                        class="img-fluid fourth-card-pic py-2 px-2"
                        alt=""
                      />

                      <div class="fourth-card-pera ps-3">
                        <h6 class="fw-semibold">Call</h6>
                        <p class="fourth-card-number text-body-tertiary">
                        {{$homePage->contact_no}}
                        </p>
                      </div>
                    </div>

                    <div class="text-center fourth-button shadow-lg">
                      <a type="button" class="btn fs-4 fw-bold text-light py-0">
                        Call Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="py-2 mx-2">
                <div class="card fourth-section-card rounded-4">
                  <div class="card-body fourth-card-body">
                    <div class="d-flex mb-3">
                      <img
                        src="{{ asset('resource/img/fourth-section-pic/Vector (1).png')}}"
                        class="img-fluid fourth-card-other-pic py-2 px-2"
                        alt=""
                      />

                      <div class="fourth-card-pera ps-3">
                        <h6 class="fw-semibold">Chat</h6>
                        <p class="fourth-card-number text-body-tertiary">
                        {{$homePage->contact_no}}
                        </p>
                      </div>
                    </div>

                    <div class="text-center fourth-button-text shadow-lg">
                      <button
                        type="button"
                        class="btn button-text fs-4 fw-bold py-0"
                      >
                        Chat Now
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="py-2 mx-2">
                <div class="card fourth-section-card rounded-4">
                  <div class="card-body fourth-card-body">
                    <div class="d-flex mb-3">
                      <img
                        src="{{ asset('resource/img/fourth-section-pic/Vector (2).png')}}"
                        class="img-fluid fourth-card-other-pic py-2 px-2"
                        alt=""
                      />

                      <div class="fourth-card-pera ps-3">
                        <h6 class="fw-semibold">Video Call</h6>
                        <p class="fourth-card-number text-body-tertiary">
                        {{$homePage->contact_no}}
                        </p>
                      </div>
                    </div>

                    <div class="text-center fourth-button-text shadow-lg">
                      <button
                        type="button"
                        class="btn button-text fs-4 fw-bold py-0"
                      >
                        Call Now
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="py-2 mx-2">
                <div class="card fourth-section-card rounded-4">
                  <div class="card-body fourth-card-body">
                    <div class="d-flex mb-3">
                      <img
                        src="{{ asset('resource/img/fourth-section-pic/Vector (3).png')}}"
                        class="img-fluid fourth-card-other-pic py-2 px-2"
                        alt=""
                      />

                      <div class="fourth-card-pera ps-3">
                        <h6 class="fw-semibold">Massege</h6>
                        <p class="fourth-card-number text-body-tertiary">
                        {{$homePage->contact_no}}
                        </p>
                      </div>
                    </div>

                    <div class="text-center fourth-button-text shadow-lg">
                      <button
                        type="button"
                        class="btn fs-4 button-text fw-bold py-0"
                      >
                        Massege Now
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- right col start -->
        <div class="col-sm-12 col-md-12 col-lg-6 ps-5 mt-5">
          <div class="">
            <img
              src="{{ asset('resource/img/third-section-pic/Rectangle 14.png')}}"
              class="img-fluid fourth-section-uper-rectanguler"
              alt=""
            />
            <img
              src="{{asset('uploads/contact_img/'.$homePage->contact_img)}}"
              class="img-fluid p-3 fourth-section-pic"
              alt=""
            />
            <img
              src="{{ asset('resource/img/third-section-pic/Rectangle 15.png')}}"
              class="img-fluid fourth-section-lower-rectanguler"
              alt=""
            />
          </div>
        </div>
      </div>
    </section>

    <!-- fourth section end -->

    <!-- fifth section start -->
    <section class="container my-5">
      <div class="text-center">
        <p class="fs-5">Find Your Property</p>
        <!-- header -->
        <h2 class="second-header fw-bold fs-2">Explore The City</h2>
      </div>
      <div class="row pt-3 mt-5">
        @forelse($location as $loca)
        <dic class="col-sm-6 col-md-4 col-lg-3 py-2">
          <div  style="background-image: url('{{ asset('uploads/location/'.$loca->feature_img)}}');">
            <div class="fifth-section-card px-1 pb-1 pt-2">
              <div class="fourth-button mt-2 me-2 float-end text-light">
                <button
                  type="button"
                  class="fifth-card-button btn py-1 mx-2 text-light"
                >
                {{$loca->properties->count()}} Property
                </button>
              </div>
              <div class="fifth-card-text ps-3">
                <p class="text-light fw-semibold">{{$loca->name}}</p>
              </div>
            </div>
          </div>
        </dic>
        @empty
        @endforelse
      </div>
    </section>
    <!-- fifth section end -->

    <!-- sixth section start-->
    <section class="container pt-5 my-5">
      <div class="row pt-5">
        <div class="col-sm-12 col-md-12 col-lg-6">
          <h2 class="second-header lh-1 fw-semibold fs-2">
            {{$found->title}}
          </h2>
          <p class="lh-1 fs-6 fw-bold">{{$found->sub_title}}</p>
          <p class="fs-2 fw-semibold">{{$found->name}}</p>
          <div class="d-flex">
            <div class="p-2">
              <a href=""
                ><i class="bi bi-facebook fs-4 text-primary-emphasis"></i
              ></a>
            </div>
            <div class="p-1">
              <a href=""><i class="bi bi-youtube fs-3"></i></a>
            </div>
            <div class="p-2">
              <a href=""
                ><i class="bi bi-linkedin pb-2 fs-5 text-primary"></i
              ></a>
            </div>
          </div>
          <div class="sixth-pera fw-semibold mt-4 me-5">
            <p>
            {{$found->message}}
            </p>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 sixth-image">
          <div class="sixth-pic">
            <img
              class="img-fluid ceo-img"
              src="{{asset('uploads/founder/'.$found->image)}}"
              alt=""
            />
          </div>
        </div>
      </div>
    </section>

    <!-- sixth section end-->

    <!--  seventh section start -->
    <section class="container py-4 my-5">
      <div class="text-center">
        <!-- header -->
        <h2 class="second-header fw-bold fs-2">Latest News</h2>
        <p class="fs-5">For the latest Property Connect with us</p>
      </div>
      <div class="row mt-5">
        @foreach($blog as $b)
        <dic class="col-sm-6 col-md-4 col-lg-3 py-2">
          <div  style="background-image: url('{{ asset('uploads/blog/'.$b->bolg_image)}}');">
            <div class="fifth-section-card px-1 pb-1 pt-2">
              <div class="fourth-button mt-2 me-2 float-end text-light">
                <button
                  type="button"
                  class="fifth-card-button btn py-1 mx-2 text-light"
                >
                  New Arrivel
                </button>
              </div>
              <div class="fifth-card-text ps-3">
                <p class="text-light fw-semibold">{{$b->title}}</p>
              </div>
            </div>
          </div>
        </dic>
        @endforeach
        <!-- <dic class="col-sm-6 col-md-4 col-lg-3 py-2">
          <div class="fifth-card-two">
            <div class="fifth-section-card px-1 pb-1 pt-2">
              <div class="fourth-button mt-2 me-2 float-end text-light">
                <button
                  type="button"
                  class="fifth-card-button btn py-1 mx-2 text-light"
                >
                  New Arrivel
                </button>
              </div>
              <div class="fifth-card-text ps-3">
                <p class="text-light fw-semibold">Our Top Corporate Office</p>
              </div>
            </div>
          </div>
        </dic>
        <dic class="col-sm-6 col-md-4 col-lg-3 py-2">
          <div class="fifth-card-three">
            <div class="fifth-section-card px-1 pb-1 pt-2">
              <div class="fourth-button mt-2 me-2 float-end text-light">
                <button
                  type="button"
                  class="fifth-card-button btn py-1 mx-2 text-light"
                >
                  New Arrivel
                </button>
              </div>
              <div class="fifth-card-text ps-3">
                <p class="text-light fw-semibold">Up Coming Project</p>
              </div>
            </div>
          </div>
        </dic>
        <dic class="col-sm-6 col-md-4 col-lg-3 py-2">
          <div class="fifth-card-four">
            <div class="fifth-section-card px-1 pb-1 pt-2">
              <div class="fourth-button mt-2 me-2 float-end text-light">
                <button
                  type="button"
                  class="fifth-card-button btn py-1 mx-2 text-light"
                >
                  Property
                </button>
              </div>
              <div class="fifth-card-text ps-3">
                <p class="text-light fw-semibold">4 Bed Room, Full Furnished</p>
              </div>
            </div>
          </div>
        </dic> -->
      </div>
    </section>
    <!--   seventh section end  -->

    <!-- eighth section start -->
    <section class="eighth-section my-5">
      <div class="container">
        <div class="text-center fw-semibold pt-5">
          <p>Testimunial</p>
          <!-- second header -->
          <div class="">
            <h2 class="second-header fw-bold fs-2">
              What our Customer <br />
              Have To Saying
            </h2>
          </div>
        </div>
        <div class="row">
          @forelse($customer as $cus)
          <div class="col-sm-12 col-md-6 col-lg-4 text-center mt-4 mb-5">
            <div class="card rounded-4 border-0 shadow-lg">
              <div class="card-body">
                <p class="lh-sm eigth-pera fw-normal mb-4">
                  <span class="fs-3 fw-bold">“</span> {{$cus->review}} <span class="fs-3 fw-bold">”</span>
                </p>
              </div>
            </div>
            <div>
              <div
                class="eighth-card-pic m-auto one ps-2 pt-1 rounded-3 text-center"
              >
                <img
                  src="{{asset('uploads/customer/'.$cus->image)}}"
                  class="card-img-bottom img-fluid"
                  alt="..."
                />
              </div>
              <div class="lh-1 mt-2 fw-semibold">
                <p class="second-header fs-5 lh-1">{{$cus->name}}</p>
                <p>{{$cus->location}}</p>
              </div>
            </div>
          </div>
          @empty
          @endforelse
        </div>
      </div>
    </section>
    <!-- eighth section end -->

    <!-- ninth section start -->
    <section class="container my-5">
      <div class="ms-5 py-3">
      <form action="{{route('subscriber.email')}}" method="post">
        @csrf
        <div class="ninth-image">
          <div class="background-color">
            <div class="text-light text-center mx-5">
              <p class="ninth-pera">
              Laoreet proin ut dolor vivamus auctor! Ullamcorper commodo condimentum litora lorem litora id nulla. Rhoncus dictumst nullam varius scelerisque rhoncus nisl ultrices sollicitudin! Mi senectus potenti nostra a, ullamcorper leo praesent neque vehicula etiam. Fermentum fames eros tortor. Aenean lacinia non hac a integer cras magna penatibus donec. Semper eu dictum pulvinar. Sodales mollis himenaeos ut arcu maecenas nunc luctus sociis maecenas tincidunt leo? Potenti feugiat tortor est aptent ultricies nunc pharetra felis leo sapien felis. Sociosqu lobortis.
              </p>
              <h2 class="fw-bold">Subscribe Get The Latest News</h2>
              <div class="subscribe">
                    @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                <div class="input-group mb-3">
                  <input
                    name="emailAdress"
                    type="text"
                    class="form-control"
                    placeholder="Enter Your Email Address"
                    aria-label="Recipient's username"
                    aria-describedby="basic-addon2"
                    required/>
                  <button type="submit">
                    <span class="input-group-text" id="basic-addon2"
                    >Subscribe</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </section>
    <!-- ninth section end -->
    @endsection
   
