@extends('layout.app')
@section('pageTitle',trans('Customer Query list'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="text-center">
        <h3>Query List</h3>
    </div>
    @forelse($cq as $c)
        <div class="card my-3">
            <div class="row">
                <div class="col-sm-2 mb-4 text-center">
                    <b>SL#</b> {{ $c->id }}
                    <div>
                        {{date('j F, Y', strtotime($c->created_at))}}
                    </div>
                    <div>
                        {{date('H:i:s', strtotime($c->created_at))}}
                    </div>
                </div>
                <div class="col-sm-10">
                    <h4>{{$c->name}}</h4>
                    <p class="m-0"><b>Email Address:</b> {{$c->email}}</p>
                    <p class="m-0"><b>Contact:</b> {{$c->phone}}</p>
                    <p class="mt-0"><b>Address:</b> {{$c->address}}</p>
                    <p><b>Message:</b>
                    {{$c->message}}
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center">
            <p>No Data Found</p>
        </div>
        @endforelse
    <div class="d-flex justify-content-end my-3">
        {!! $cq->links()!!}
    </div>
</section>
<!-- Bordered table end -->


@endsection
