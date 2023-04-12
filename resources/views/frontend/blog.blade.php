@extends('frontend.app')
@section('pageTitle',trans('Blog'))

@section('content')
<section class="container py-4 my-5">
      <div class="text-center">
        <!-- header -->
        <h2 class="second-header fw-bold fs-2">Latest News</h2>
        <p class="fs-5">For the latest Property Connect with us</p>
      </div>
      <div class="row mt-5">
        @foreach($blog as $b)
        <dic class="col-sm-6 col-md-4 col-lg-3 py-2">
          <div  style="background-image: url('{{ asset('uploads/blog/thumb/'.$b->bolg_image)}}');">
            <div class="fifth-section-card px-1 pb-1 pt-2">
              <div class="fourth-button mt-2 me-2 float-end text-light">
                <button
                  type="button"
                  class="fifth-card-button btn py-1 mx-2 text-light"
                >
                <a href="{{route('sBlog',$b->id)}}" style="text-decoration: none; color:white;">
                  {{$b->property_cat?->name}}
                </a>
                </button>
              </div>
              <div class="fifth-card-text ps-3">
                <a href="{{route('sBlog',$b->id)}}" style="text-decoration: none; color:white;">
                <p class="text-light fw-semibold">{{$b->title}}</p>
                </a>
              </div>
            </div>
          </div>
        </dic>
        @endforeach
      </div>
    </section>
@endsection