@extends('layout.app')
@section('pageTitle',trans('Property'))
@section('pageSubTitle',trans('show'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <img src="{{asset('uploads/property_feature/'.$singleProp->feature_photo)}}" alt="">
                </div>
                <div class="my-3">
                    <p><b>Property Name:</b> {{$singleProp->name}}</p>
                    <p><b>Address:</b> {{$singleProp->address}}</p>
                    <p><b>Location:</b> {{$singleProp->locat?->name}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bordered table end -->


@endsection
