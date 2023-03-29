@extends('layout.app')
@section('pageTitle',trans('Founder Message'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">

            <div class="card">
                <div>
                <a class="float-end" href="{{route(currentUser().'.founder.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
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
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col">{{__('Sub Title')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Facebook')}}</th>
                                <th scope="col">{{__('Linkedin')}}</th>
                                <th scope="col">{{__('Youtube')}}</th>
                                <th scope="col">{{__('Picture')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($found as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->title}}</td>
                                <td>{{$p->sub_title}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->facebook}}</td>
                                <td>{{$p->linkedin}}</td>
                                <td>{{$p->youtube}}</td>
                                <td><img width="50px" src="{{asset('uploads/founder/'.$p->image)}}" alt=""></td>
                                <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.founder.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="9" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bordered table end -->


@endsection
