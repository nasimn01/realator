@extends('frontend.app')
@section('pageTitle',trans('Single'))

@section('content')
    <!-- Swiper -->
    <section class="shadow-lg">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @forelse($propPhoto as $photo)
                <div class="swiper-slide">
                    <img class="modImg" src="{{asset('uploads/property_photo/'.$photo->image)}}" alt="" />
                </div>
                @empty
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- Swiper end -->
    <main class="single-bg">
      <div class="container">
        <!-- title section -->
        <div class="title-sec py-5">
          <span>{{$singleProp->bed}} Bed</span>
          <span>{{$singleProp->bath}} Bath</span>
          <span>{{$singleProp->garage}} Garage</span>
          <p>{{$singleProp->address}}</p>
          <p><i class="bi bi-geo-alt-fill"></i>{{$singleProp->locat?->name}}</p>
        </div>
        <!-- Body Row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <!-- Discription -->
            <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
              <div class="accordion-item shadow">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Discription
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseOne"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne"
                >
                  <div class="accordion-body">
                  {{$singleProp->description}}
                  </div>
                </div>
              </div>
            </div>
            <!-- Advance Features -->
            <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
              <div class="accordion-item shadow">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Advance Features
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseTwo"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne"
                >
                  <div class="accordion-body">
                    <div
                      class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 features"
                    >
                    @foreach($adv as $d)
                    <div class="col mb-3">
                      <i class="bi bi-taxi-front"></i>
                      <span>{{$d->feature}}</span>
                    </div>
                    @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Ameneties -->
            <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
              <div class="accordion-item shadow">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseThree"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Ameneties
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseThree"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne"
                >
                  <div class="accordion-body">
                    <div
                      class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 ameneties"
                    >
                    @foreach($ame as $a)
                    <div class="col mb-3">
                      <i class="bi bi-bus-front"></i>
                      <span>{{$a->name}}</span>
                    </div>
                    @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Property Video -->
            <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
              <div class="accordion-item shadow">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseFour"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Property Video
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseFour"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne"
                >
                  <div class="accordion-body">
                    <div class="ratio ratio-16x9">
                      <iframe
                        width="853"
                        height="480"
                        src="https://www.youtube.com/embed/{{$singleProp->video_link}}"
                        title="Fully Furnished Luxury 4 BHK Lonavala Villa for Sale"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                      ></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Property Video -->
            <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
              <div class="accordion-item shadow">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseFive"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Location
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseFive"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne"
                >
                  <div class="accordion-body">
                    <div class="ratio ratio-16x9">
                      <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32699395.56485871!2d-122.29098629477929!3d59.98501601169469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2sbd!4v1677739821031!5m2!1sen!2sbd"
                        width="600"
                        height="450"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                      ></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Rating -->
            <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
              <div class="accordion-item shadow">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseSix"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Rating
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseSix"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne"
                >
                  <div class="accordion-body">
                    <div class="row rating">
                      <div class="col-4 border-end border-dark">
                        <p>4.5</p>
                        <p>Out of 5.00</p>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                      </div>
                      <div class="col-4">
                        <p>Property</p>
                        <div
                          class="progress mb-3"
                          role="progressbar"
                          aria-label="Basic example"
                          aria-valuenow="0"
                          aria-valuemin="0"
                          aria-valuemax="100"
                          style="height: 5px"
                        >
                          <div
                            class="progress-bar bg-warning"
                            style="width: 80%"
                          ></div>
                        </div>
                        <p>Location</p>
                        <div
                          class="progress"
                          role="progressbar"
                          aria-label="Basic example"
                          aria-valuenow="0"
                          aria-valuemin="0"
                          aria-valuemax="100"
                          style="height: 5px"
                        >
                          <div
                            class="progress-bar bg-warning"
                            style="width: 80%"
                          ></div>
                        </div>
                      </div>
                      <div class="col-4">
                        <p>Value Of Money</p>
                        <div
                          class="progress mb-3"
                          role="progressbar"
                          aria-label="Basic example"
                          aria-valuenow="0"
                          aria-valuemin="0"
                          aria-valuemax="100"
                          style="height: 5px"
                        >
                          <div
                            class="progress-bar bg-warning"
                            style="width: 80%"
                          ></div>
                        </div>
                        <p>Support</p>
                        <div
                          class="progress"
                          role="progressbar"
                          aria-label="Basic example"
                          aria-valuenow="0"
                          aria-valuemin="0"
                          aria-valuemax="100"
                          style="height: 5px"
                        >
                          <div
                            class="progress-bar bg-warning"
                            style="width: 80%"
                          ></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Write A Review -->
            <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
              <div class="accordion-item shadow">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseSeven"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Write A Review
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseSeven"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne"
                >
                  <div class="accordion-body">
                    <div class="row review mb-3">
                      <div class="col-sm-12 col-md-12 col-lg-4">
                        <p>Property</p>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <p>Value of Money</p>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-4">
                        <p>Location</p>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <p>Agent Support</p>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="avarege-ratting">
                          <p>5</p>
                          <span>Avarege Ratting</span>
                        </div>
                      </div>
                    </div>
                    <!-- Comment Form -->
                    <div class="mb-3 comment-form">
                      <textarea
                        class="form-control bg-light mb-3"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        placeholder="Massege"
                      ></textarea>
                      <div class="row">
                        <div class="col sm-6">
                          <div class="mb-3">
                            <input
                              type="text"
                              class="form-control bg-light"
                              id="exampleFormControlInput1"
                              placeholder="Your Name"
                            />
                          </div>
                        </div>
                        <div class="col sm-6">
                          <div class="mb-3">
                            <input
                              type="email"
                              class="form-control bg-light"
                              id="exampleFormControlInput1"
                              placeholder="Email address"
                            />
                          </div>
                        </div>
                      </div>
                      <a class="submit-btn" href="">Submit</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="share bg-white shadow-lg p-4 rounded mb-4">
              <p class="share-btn shadow">Share</p>
              <div class="share-icon">
                <i style="color: #3b5998" class="bi bi-facebook"></i>
                <i style="color: #00acee" class="bi bi-twitter"></i>
                <i style="color: #0072b1" class="bi bi-linkedin"></i>
                <i style="color: #34b7f1" class="bi bi-whatsapp"></i>
                <i style="color: #006aff" class="bi bi-chat-fill"></i>
              </div>
            </div>
            <!-- feature proparty -->
            <div class="feature-proparty bg-white shadow-lg p-4 rounded mb-4">
              <p class="feature-proparty-title">Feature Proparty</p>
              @foreach($feature_property as $fp)
              <div class="features-seciton shadow p-3 rounded mb-4">
                <div class="row">
                  <div class="col-sm-4">
                    <img
                      class="img-fluid rounded"
                      src="{{asset('uploads/property_feature/'.$fp->feature_photo)}}"
                      alt=""
                    />
                  </div>
                  <div class="col-sm-8">
                    <p>{{$fp->name}}</p>
                    <p>{{date('j F, Y', strtotime($fp->created_at))}}</p>
                    <p><i class="bi bi-geo-alt-fill"></i>{{$fp->locat?->name}}</p>
                    <span>Rent</span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        
      </div>
    </main>
@endsection