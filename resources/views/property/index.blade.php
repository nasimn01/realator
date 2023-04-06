@extends('layout.app')
@section('pageTitle',trans('Property List'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">

            <div class="card">
                <div>
                <a class="float-end" href="{{route(currentUser().'.property.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
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
                                <th scope="col">{{__('Property Type')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Feature icon')}}</th>
                                <th scope="col">{{__('Price')}}</th>
                                <th scope="col">{{__('Location')}}</th>
                                <th scope="col">{{__('Address')}}</th>
                                <th scope="col">{{__('Bed')}}</th>
                                <th scope="col">{{__('Bath')}}</th>
                                <th scope="col">{{__('Garage')}}</th>
                                <th scope="col">{{__('video')}}</th>
                                <th scope="col">{{__('status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pro as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->property_cat?->name}}</td>
                                <td>{{$p->name}}</td>
                                <td><img width="50px" src="{{asset('uploads/property_feature/'.$p->feature_photo)}}" alt=""></td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->locat?->name}}</td>
                                <td>{{$p->address}}</td>
                                <td>{{$p->bed}}</td>
                                <td>{{$p->bath}}</td>
                                <td>{{$p->garage}}</td>
                                <td>{{$p->video_link}}</td>
                                <td>{{ $p->status == 1?"Active":"Inactive" }}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.property.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.property.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                        
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="13" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end my-3">
                        {!! $pro->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bordered table end -->


@endsection
