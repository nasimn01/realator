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
                <a class="float-end" href="{{route(currentUser().'.home.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                </div>
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">

                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Logo')}}</th>
                                <th scope="col">{{__('Title 1')}}</th>
                                <th scope="col">{{__('Title 2')}}</th>
                                <th scope="col">{{__('Title 3')}}</th>
                                <th scope="col">{{__('Contact No')}}</th>
                                <th scope="col">{{__('Contact img')}}</th>
                                <th scope="col">{{__('Facebook')}}</th>
                                <th scope="col">{{__('Twitter')}}</th>
                                <th scope="col">{{__('Linkedin')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($home as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td><img width="50px" src="{{asset('uploads/logo/'.$p->logo)}}" alt=""></td>
                                <td>{{$p->title_1}}</td>
                                <td>{{$p->title_2}}</td>
                                <td>{{$p->title_3}}</td>
                                <td>{{$p->contact_no}}</td>
                                <td><img width="50px" src="{{asset('uploads/contact_img/'.$p->contact_img)}}" alt=""></td>
                                <td>{{$p->facebook}}</td>
                                <td>{{$p->twitter}}</td>
                                <td>{{$p->linkedin}}</td>
                                <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.home.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="14" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end my-3">
                        {!! $home->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bordered table end -->


@endsection
