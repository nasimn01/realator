@extends('frontend.app')
@section('pageTitle',trans('About Us'))

@section('content')
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
                    src="{{asset('uploads/about/img1/thumb/'.$about->image_one)}}"
                    class="img-fluid third-section-pic"
                      alt=""
                    />
                  </div>
                  <div>
                    <div class="p-2">
                      <img
                        src="{{asset('uploads/about/img2/thumb/'.$about->image_two)}}"
                        class="img-fluid third-section-pic"
                        alt=""
                      />
                    </div>
                    <div class="p-2">
                      <img
                        src="{{asset('uploads/about/img3/thumb/'.$about->image_three)}}"
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
                  {{$about->title}}
                </h2>
              </div>
              <!-- head end -->
              <p class="my-4 fw-semibold third-section-pera">
                {{$about->long_description}}
              </p>
              <!-- list start -->
              <ul class="third-section-list ms-0">
                @forelse($about_motive as $abm)
                <li>
                  <img
                    src="{{ asset('resource/img/third-section-pic/Vector.png')}}"
                    alt=""
                  />
                  {{$abm->motive}}
                </li>
                @empty
                <li>
                  <img
                    src="{{ asset('resource/img/third-section-pic/Vector.png')}}"
                    alt=""
                  />
                  Decorate Your Own Home Environment
                </li>
                @endforelse
              </ul>
              <!-- list end -->
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection