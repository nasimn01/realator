@extends('frontend.app')
@section('pageTitle',trans('Blog'))

@section('content')
    <!-- Third section Start -->
    <section class="container third-section mt-5">
      <div class="mb-5">
        <div class="row mt-5">
            <div>
                <h3 class="fw-bold border-bottom my-3">Blog</h3>
            </div>
            @foreach($blog as $b)
            <dic class="col-sm-6 col-md-6 col-lg-3 py-2">
                <div  style="background-image: url('{{ asset('uploads/blog/thumb/'.$b->bolg_image)}}');">
                    <div class="fifth-section-card px-1 pb-1 pt-2">
                    <div class="fourth-button mt-2 me-2 float-end text-light">
                        <button
                        type="button"
                        class="fifth-card-button btn py-1 mx-2 text-light"
                        >
                        <a href="{{route('blog-page')}}" style="text-decoration: none; color:white;">
                        {{$b->property_cat?->name}}
                        </a>
                        </button>
                    </div>
                    <div class="fifth-card-text ps-3">
                        <a href="{{route('blog-page')}}" style="text-decoration: none; color:white;">
                        <p class="text-light fw-semibold">{{$b->title}}</p>
                        </a>
                    </div>
                    </div>
                </div>
            </dic>
            <div class="col-sm-6 col-md-6 col-lg-9 ">
                <h4 style="color:#57c427;">{{$b->title}}</h4>
                <p>{!! $b->details !!}</p>
            </div>
            <div>
                <hr>
            </div>
            @endforeach
            <div class="d-flex justify-content-end">
                {!! $blog->links()!!}
            </div>
        </div>
      </div>
    </section>
    @endsection