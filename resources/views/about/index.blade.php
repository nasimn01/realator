@extends('layout.app')
@section('pageTitle',trans('About Us'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">

            <div class="card">
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
                                <th scope="col">{{__('Image 1')}}</th>
                                <th scope="col">{{__('Image 2')}}</th>
                                <th scope="col">{{__('Image 3')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($about as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->title}}</td>
                                <td><img width="50px" src="{{asset('uploads/about/img1/'.$p->image_one)}}" alt=""></td>
                                <td><img width="50px" src="{{asset('uploads/about/img2/'.$p->image_two)}}" alt=""></td>
                                <td><img width="50px" src="{{asset('uploads/about/img3/'.$p->image_three)}}" alt=""></td>
                                <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.about.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="6" class="text-center">No Data Found</th>
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
