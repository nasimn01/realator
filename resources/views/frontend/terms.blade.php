@extends('frontend.app')
@section('pageTitle',trans('Terms & Condition'))

@section('content')
    <!-- Third section Start -->
    <section class="container third-section mt-5">
      <div class="mb-5">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="m-3 ms-5">
              <!-- first header -->
              <h3 class="fw-bold border-bottom my-3">{{$terms->title}}</h3>
              <!-- list start -->
              <div class="pb-2 text-center">
                {!! $terms->terms_and_condition !!}
              </div>
              <!-- list end -->
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection