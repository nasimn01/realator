@extends('frontend.app')
@section('pageTitle',trans('About Us'))

@section('content')
    <!-- Third section Start -->
    <section class="container third-section mt-5">
      <div class="mb-5">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="m-3 ms-5">
              <!-- first header -->
              <h3 class="fw-bold border-bottom my-3">About Us</h3>
              <!-- second header -->
              <div class="me-5">
                <h2 class="second-header">
                  {{$about->title}}
                </h2>
              </div>
              <!-- head end -->
              <p class="my-4 fw-semibold third-section-pera">
                {{$about->long_description}}
              </p>
              <!-- list start -->
              <div class="pb-2">
                <img src="{{asset('uploads/about/img2/thumb/'.$about->image_two)}}"
                  class="img-fluid third-section-pic"
                  alt=""/>
              </div>
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