@extends('frontend.app')
@section('pageTitle',trans('Blog'))

@section('content')
 <section class="container third-section mt-5">
      <div class="mb-5">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="m-3 ms-5">
              <!-- first header -->
              <h3 class="fw-bold border-bottom my-3">Blog</h3>
              <!-- second header -->
              <div class="me-5">
                <h2 class="second-header">
                  {{$blog->title}}
                </h2>
                <p><b><em>Published at</em></b> {{$blog->bolg_date}}</p>
              </div>
              
              <div class="pb-2 text-center">
                <img src="{{asset('uploads/blog/'.$blog->bolg_image)}}"
                  class="img-fluid third-section-pic"
                  alt=""/>
              </div>
              <!--Description -->
              <p class="my-4 fw-semibold third-section-pera">
                {!!$blog->details !!}
              </p>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection