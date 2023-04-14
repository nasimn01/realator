@extends('frontend.app')
@section('pageTitle',trans('Single'))

@section('content')
<meta property="og:url"           content="{{route('sProperty',$singleProp->id)}}" />
<meta property="og:type"          content="Realator" />
<meta property="og:title"         content="{{$singleProp->locat?->name}}" />
<meta property="og:description"   content="{{$singleProp->locat?->name}}" />
<meta property="og:image"         content="{{asset('uploads/property_feature/thumb/'.$singleProp->feature_photo)}}" />

    <!-- Swiper -->
    <section class="shadow-lg">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @forelse($propPhoto as $photo)
              <div class="swiper-slide">
                <img class="modImg" src="{{asset('uploads/property_photo/thumb/'.$photo->image)}}" alt="" />
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
                  {!! $singleProp->description !!}
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
                      <!-- <i class="bi bi-taxi-front"></i> -->
                      <img src="{{asset('uploads/advance_feature/thumb/'.$d->icon)}}" alt="">
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
                      <!-- <i class="bi bi-bus-front"></i> -->
                      <img src="{{asset('uploads/ameneties/thumb/'.$a->icon)}}" alt="">
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
                        src="{{$singleProp->map_link}}"
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
                    <div
                      class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 rating"
                    >
                      <div class="col-4">
                        <p>{{$average}}</p>
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
                            style="width: {{$property_rating}}%"
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
                            style="width: {{$location_rating}}%"
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
                            style="width: {{$value_of_money_rating}}%"
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
                            style="width: {{$agent_support_rating}}%"
                          ></div>
                        </div>
                      </div>
                    </div>
                    <br />
                    <hr />
                    <!-- Reating Comment -->
                    <div>
                      @foreach($property_review as $p)
                      <div class="row rating-comment">
                        <div class="col-sm-2 mb-4">
                          <img src="{{asset('./resource/img/user.png')}}" alt="" />
                        </div>
                        <div class="col-sm-10">
                          <p>{{$p->name}}</p>
                          <p>{{$p->email}}</p>
                          <p>{{$p->property_rating}} Star</p>
                          <p>
                            {{$p->message}}
                          </p>
                        </div>
                      </div>
                      <br />
                      <hr />
                      @endforeach
                    </div>
                    <!-- Pagination -->
            <div class="d-flex justify-content-end">
                {!! $property_review->links()!!}
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
                  <form action="{{route('preview')}}" method="post">
                    @csrf
                    <div class="accordion-body">
                        @if(Session::has('response'))
                            {!!Session::get('response')['message']!!}
                        @endif
                      <div class="row star-section review mb-3">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                          <p>Property</p>
                          <div class="d-flex star">
                            <input type="radio" name="property" value="5" id="property1"/><label for="property1"></label>
                            <input type="radio" name="property" value="4" id="property2"/><label for="property2"></label>
                            <input type="radio" name="property" value="3" id="property3"/><label for="property3"></label>
                            <input type="radio" name="property" value="2" id="property4"/><label for="property4"></label>
                            <input type="radio" name="property" value="1" id="property5"/><label for="property5"></label>
                          </div>
                          <div class="mt-5 star-section">
                            <p>Value of Money</p>
                            <div class="d-flex star mb-3">
                              <input type="radio" name="value_of_Money" value="5" id="value-of-Money1"/><label for="value-of-Money1"></label>
                              <input type="radio" name="value_of_Money" value="4" id="value-of-Money2"/><label for="value-of-Money2"></label>
                              <input type="radio" name="value_of_Money" value="3" id="value-of-Money3"/><label for="value-of-Money3"></label>
                              <input type="radio" name="value_of_Money" value="2" id="value-of-Money4"/><label for="value-of-Money4"></label>
                              <input type="radio" name="value_of_Money" value="1" id="value-of-Money5"/><label for="value-of-Money5"></label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                          <p>Location</p>
                          <div class="d-flex star mb-3">
                            <input type="radio" name="location" value="5" id="location1"/><label for="location1"></label>
                            <input type="radio" name="location" value="4" id="location2"/><label for="location2"></label>
                            <input type="radio" name="location" value="3" id="location3"/><label for="location3"></label>
                            <input type="radio" name="location" value="2" id="location4"/><label for="location4"></label>
                            <input type="radio" name="location" value="1" id="location5"/><label for="location5"></label>
                          </div>
                          <div class="my-5">
                            <p>Agent Support</p>
                            <div class="d-flex star mb-3">
                              <input type="radio" name="agent_support" value="5" id="agent-support1"/><label for="agent-support1"></label>
                              <input type="radio" name="agent_support" value="4" id="agent-support2"/><label for="agent-support2"></label>
                              <input type="radio" name="agent_support" value="3" id="agent-support3"/><label for="agent-support3"></label>
                              <input type="radio" name="agent_support" value="2" id="agent-support4"/><label for="agent-support4"></label>
                              <input type="radio" name="agent_support" value="1" id="agent-support5"/><label for="agent-support5"></label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                          <div class="avarege-ratting" >
                            <p id="average-values">5</p>
                            <span>Avarege Ratting</span>
                          </div>
                        </div>
                      </div>
                      <!-- Comment Form -->
                      <div class="mb-3 mt-5 comment-form">
                        <input type="hidden" name="property_id" value="{{$singleProp->id}}">

                        <textarea  class="form-control bg-light mb-3" name="message" rows="3" placeholder="Your Comment"></textarea>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <input  type="text" class="form-control bg-light" name="name" placeholder="Your Name"/>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <input type="email" class="form-control bg-light" name="emailAddress" placeholder="Email address" required/>
                              @if($errors->has('emailAddress'))
                                  <small class="d-block text-danger">
                                      {{$errors->first('emailAddress')}}
                                  </small>
                              @endif
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Submit Your Quary -->
            <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
              <div class="accordion-item shadow">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseEight"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Submit Your Quary
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseEight"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne"
                >
                  <div class="accordion-body">
                    <!-- Comment Form -->
                    <form action="{{route('customer.query')}}" method="post">
                      @csrf
                      <div class="mb-3comment-form">
                        @if(Session::has('response'))
                            {!!Session::get('response')['message']!!}
                        @endif
                        <input type="hidden" name="property_id" value="{{$singleProp->id}}">
                        <textarea class="form-control bg-light mb-3" name="message" rows="3" placeholder="Massege"></textarea>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <input type="text" class="form-control bg-light" name="name" placeholder="Your Name" required/>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <input type="email" class="form-control bg-light" name="emailAddress" placeholder="Email address" required/>
                              @if($errors->has('eamilAddress'))
                                  <small class="d-block text-danger">
                                      {{$errors->first('eamilAddress')}}
                                  </small>
                              @endif
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <input type="text" class="form-control bg-light" name="phoneNumber" id="" placeholder="Your Mobile Number" required/>
                              @if($errors->has('phoneNumber'))
                                  <small class="d-block text-danger">
                                      {{$errors->first('phoneNumber')}}
                                  </small>
                              @endif
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <input type="text" class="form-control bg-light" name="address" id="" placeholder="Address"/>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="share bg-white shadow-lg p-4 rounded mb-4">
              <p class="share-btn shadow">Share</p>
              <div class="share-icon">
                <a target="_blank" href="https://www.facebook.com/sharer.php?u={{route('sProperty',$singleProp->id)}}">
                  <i style="color: #3b5998" class="bi bi-facebook"></i>
                </a>
                <a target="_blank" href=https://twitter.com/share?url={{route('sProperty',$singleProp->id)}}&text={{urlencode($singleProp->locat?->name)}}">
                  <i style="color: #00acee" class="bi bi-twitter"></i>
                </a>
                <a target="_blank" href="https://www.linkedin.com/shareArticle?url={{route('sProperty',$singleProp->id)}}&title={{urlencode($singleProp->locat?->name)}}">
                  <i style="color: #0072b1" class="bi bi-linkedin"></i>
                </a>
                <a target="_blank" href="https://wa.me/?text={{urlencode($singleProp->locat?->name)}}+{{route('sProperty',$singleProp->id)}}">
                  <i style="color: #34b7f1" class="bi bi-whatsapp"></i>
                </a>
                <a target="_blank" href="fb-messenger://share/?link= {{route('sProperty',$singleProp->id)}}&app_id=123456789">
                  <i style="color: #006aff" class="bi bi-chat-fill"></i>
                </a>
              </div>
            </div>
            <!-- feature proparty -->
            <div class="feature-proparty bg-white shadow-lg p-4 rounded mb-4">
              <p class="feature-proparty-title">Feature Proparty</p>
              @foreach($feature_property as $fp)
              <div class="features-seciton shadow p-3 rounded mb-4">
                <a href="{{route('sProperty',$fp->id)}}">
                  <div class="row">
                    <div class="col-sm-4">
                      <img
                        class="img-fluid rounded"
                        src="{{asset('uploads/property_feature/thumb/'.$fp->feature_photo)}}"
                        alt=""
                      />
                    </div>
                    <div class="col-sm-8">
                      <p class="title">{{$fp->name}}</p>
                      <p>{{date('j F, Y', strtotime($fp->created_at))}}</p>
                      <p><i class="bi bi-geo-alt-fill"></i>{{$fp->locat?->name}}</p>
                      <span>{{$fp->property_cat?->name}}</span>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        
      </div>
    </main>
@endsection
@push('scripts')
<!-- JavaScript code to calculate and display the average value for each set -->
<script>
  // const sets = ["property", "value_of_Money", "location", "agent_support"];

  // // Add event listener to each radio input in each set
  // for (let i = 0; i < sets.length; i++) {
  //   const radios = document.getElementsByName(sets[i]);
  //   for (let j = 0; j < radios.length; j++) {
  //     radios[j].addEventListener("change", () => {
  //       // Calculate sum of checked values across all sets
  //       let checkedSum = 0;
  //       for (let k = 0; k < sets.length; k++) {
  //         const checkedRadios = document.querySelectorAll('input[name="' + sets[k] + '"]:checked');
  //         for (let l = 0; l < checkedRadios.length; l++) {
  //           checkedSum += parseInt(checkedRadios[l].value);
  //         }
  //       }
  //       // Calculate overall average based on checked sum
  //       const overallAverage = checkedSum / (sets.length);
  //       // Display overall average as rounded value without text
  //       document.getElementById("average-values").innerHTML = overallAverage.toFixed(1);
  //     });
  //   }
  // }
  const sets = ["property", "value_of_Money", "location", "agent_support"];

  document.addEventListener("change", () => {
    const checkedSum = sets.reduce((sum, set) => {
      const checkedRadios = document.querySelectorAll(`input[name="${set}"]:checked`);
      return sum + [...checkedRadios].reduce((setSum, radio) => setSum + parseInt(radio.value), 0);
    }, 0);
    const overallAverage = checkedSum / sets.length;
    document.getElementById("average-values").textContent = overallAverage.toFixed(1);
  });
  new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  freeMode: true,
  loop: true,
  lazyLoading: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  keyboard: {
    enabled: true,
  },
  breakpoints: {
    480: {
      slidesPerView: 1,
      spaceBetween: 40,
    },
    600: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    990: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
  },
});
</script>
@endpush