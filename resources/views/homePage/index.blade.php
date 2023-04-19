@extends('layout.app')
@section('pageTitle',trans('Home Page'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">

            <div class="card">
                <div>
                    <a class="float-end" href="{{route(currentUser().'.home.edit',encryptor('encrypt',$home->id))}}" style="font-size:1.7rem"><i class="bi bi-pencil-square"></i></a>
                </div>
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">

                        <thead>
                            <tr>
                                <th rowspan="4">
                                    {{__('Logo')}}<br>
                                    <img width="50px" src="{{asset('uploads/logo/'.$home->logo)}}" alt="">
                                </th>
                                <td> <b>{{__('Title 1')}}: </b>{{$home->title_1}}</td>
                            </tr>
                            
                            <tr>
                                <td> <b>{{__('Title 2')}}: </b>{{$home->title_2}}</td>
                            </tr>
                            <tr>
                                <td> <b>{{__('Title 3')}}: </b>{{$home->title_3}}</td>
                            </tr>
                            <tr>
                                <td> <b>{{__('Contact Number')}}: </b>{{$home->contact_no}}</td>
                            </tr>
                            <tr>
                                <th rowspan="3">
                                    {{__('Contact img')}}<br>
                                    <img width="50px" src="{{asset('uploads/contact_img/'.$home->contact_img)}}" alt="">
                                </th>
                                <td scope="col"><b>{{__('Facebook')}}: </b> {{$home->facebook}}</td>
                            </tr>
                            <tr>
                                <td><b>{{__('Twitter')}}: </b> {{$home->twitter}}</td>
                            </tr>
                            <tr>
                                <td><b>{{__('Linkedin')}}: </b> {{$home->linkedin}}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bordered table end -->


@endsection
