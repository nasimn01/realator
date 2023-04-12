@extends('frontend.app')
@section('pageTitle',trans('About Us'))

@section('content')
    <!-- Third section Start -->
    
    <section class="container my-5">
      <div class="text-center">
        <p class="fs-5">Find Your Property</p>
        <!-- header -->
        <h2 class="second-header fw-bold fs-2">All City</h2>
      </div>
      <div class="row pt-3 mt-5">
        @forelse($location as $loca)
        
          <dic class="col-sm-6 col-md-4 col-lg-3 py-2">
            <div  style="background-image: url('{{ asset('uploads/location/thumb/'.$loca->feature_img)}}');">
                <div class="fifth-section-card px-1 pb-1 pt-2">
                    <div class="fourth-button mt-2 me-2 float-end text-light">
                    <button
                        type="button"
                        class="fifth-card-button btn py-1 mx-2 text-light"
                    >
                    <a href="{{ route('search') }}" style="text-decoration: none; color:white;">
                    {{$loca->properties->count()}} Property
                    </a>
                    </button>
                    </div>
                    <div class="fifth-card-text ps-3">
                    <a href="{{ route('search') }}" style="text-decoration: none; color:white;">
                    <p class="text-light fw-semibold">{{$loca->name}}</p>
                    </a>
                    </div>
                </div>
            </div>
          </dic>
        
        @empty
        @endforelse
      </div>
      <!-- Pagination -->
            <div class="d-flex justify-content-end my-3">
                {!! $location->links()!!}
            </div>
    </section>
    @endsection