@extends('frontend.app')
@section('pageTitle',trans('Contact'))

@section('content')
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
                    {{$homePage?->contact_no}}
                    </p>
                  </div>
                </div>

                <div class="text-center fourth-button shadow-lg">
                  <a href="tel:{{$homePage?->contact_no}}" class="btn fs-4 fw-bold text-light py-0">
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
                    {{$homePage?->contact_no}}
                    </p>
                  </div>
                </div>

                <div class="text-center fourth-button-text shadow-lg">
                  <a class="btn button-text fs-4 fw-bold py-0">
                    Chat Now
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
                    src="{{ asset('resource/img/fourth-section-pic/Vector (2).png')}}"
                    class="img-fluid fourth-card-other-pic py-2 px-2"
                    alt=""
                  />

                  <div class="fourth-card-pera ps-3">
                    <h6 class="fw-semibold">Video Call</h6>
                    <p class="fourth-card-number text-body-tertiary">
                    {{$homePage?->whatsapp_number}}
                    </p>
                  </div>
                </div>

                <div class="text-center fourth-button-text shadow-lg">
                  <a href="{{$homePage?->whatsapp_call_link}}" class="btn fs-4 button-text fw-bold py-0">
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
                    src="{{ asset('resource/img/fourth-section-pic/Vector (3).png')}}"
                    class="img-fluid fourth-card-other-pic py-2 px-2"
                    alt=""
                  />

                  <div class="fourth-card-pera ps-3">
                    <h6 class="fw-semibold">Massege</h6>
                    <p class="fourth-card-number text-body-tertiary">
                    {{$homePage?->sms_number}}
                    </p>
                  </div>
                </div>

                <div class="text-center fourth-button-text shadow-lg">
                  <a href="sms:{{$homePage?->sms_number}}" class="btn fs-4 button-text fw-bold py-0">
                    Massege Now
                  </a>
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
          alt=""/>
        <img
          src="{{asset('uploads/contact_img/thumb/'.$homePage?->contact_img)}}"
          class="img-fluid p-3 fourth-section-pic"
          alt=""/>
        <img
          src="{{ asset('resource/img/third-section-pic/Rectangle 15.png')}}"
          class="img-fluid fourth-section-lower-rectanguler"
          alt=""/>
      </div>
    </div>
  </div>
      <!-- Submit Your Quary -->
  <div class="accordion my-4" id="accordionPanelsStayOpenExample">
    <div class="accordion-body">
    <!-- Comment Form -->
      <form action="{{route('customer.query')}}" method="post">
          @csrf
          <div class="mb-3comment-form">
            @if(Session::has('response'))
                {!!Session::get('response')['message']!!}
            @endif
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
                </div>
                @if($errors->has('eamilAddress'))
                    <small class="d-block text-danger">
                        {{$errors->first('eamilAddress')}}
                    </small>
                @endif
                </div>
                <div class="col-sm-6">
                <div class="mb-3">
                    <input type="text" class="form-control bg-light" name="phoneNumber" id="" placeholder="Your Mobile Number" required/>
                </div>
                @if($errors->has('phoneNumber'))
                    <small class="d-block text-danger">
                        {{$errors->first('phoneNumber')}}
                    </small>
                @endif
                </div>
                <div class="col-sm-6">
                <div class="mb-3">
                    <input type="text" class="form-control bg-light" name="address" id="" placeholder="Address"/>
                </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</section>
@endsection