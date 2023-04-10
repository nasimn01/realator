@extends('layout.app')
@section('pageTitle',trans('Property'))
@section('pageSubTitle',trans('show'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="card">
        
            <div class="row p-3">
                <div class="text-center">
                    <h4>Property Information</h4>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 text-center p-2">
                    <img width="100%" height="180px" src="{{ asset('uploads/property_feature/' . optional($singleProp)->feature_photo) }}" alt="Property">
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 text-center p-2">
                    <div class="accordion-body">
                        <div class="ratio ratio-16x9">
                        <iframe
                            width="353"
                            height="180"
                            src="https://www.youtube.com/embed/{{optional($singleProp)->video_link}}"
                            title="Fully Furnished Luxury 4 BHK Lonavala Villa for Sale"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                        ></iframe>
                        </div>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 text-center p-2">
                    <div class="accordion-body">
                        <div class="ratio ratio-16x9">
                        <iframe
                            src="{{optional($singleProp)->map_link}}"
                            width="353"
                            height="180"
                            style="border: 0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                        </div>
                  </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 my-3">
                    <p class="m-1"><b>Property Name:</b>
                        <!-- @if (is_object($singleProp))
                            {{ $singleProp->name }}
                        @else
                            {{ $singleProp }}
                        @endif -->
                        {{optional($singleProp)->name}}
                    </p>
                    <p class="m-1">
                        <b>Address:</b> {{optional($singleProp)->address}}
                    </p>
                    <p class="m-1">
                        <b>Location:</b> {{optional($singleProp)->locat?->name}}
                    </p>
                    <p class="m-1">
                        <b>Bed Room:</b> {{optional($singleProp)->bed}}
                        <b>Bath Room:</b> {{optional($singleProp)->bath}}
                        <b>Garage:</b> {{optional($singleProp)->garage}}
                    </p>
                    <p class="m-1">
                         {!! optional($singleProp)->description !!}
                    </p>
                </div>
                <div>
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 my-3">
                    <div class="text-center">
                    <h4>Client Information</h4>
                    </div>
                    <p class="m-1"><b>Name:</b> {{$query->name}}</p>
                    <p class="m-1"><b>Email:</b> {{$query->email}}</p>
                    <p class="m-1"><b>Contact:</b> {{$query->phone}}</p>
                    <p class="m-1"><b>Address:</b> {{$query->address}}</p>
                    <p class="m-1"><b>Message:</b> {{$query->message}}</p>
                </div>
            </div>
        
    </div>
</section>
<!-- Bordered table end -->


@endsection
