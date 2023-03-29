
@extends('layout.app')

@section('pageTitle',trans('Create Property Category'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.category.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="name">Property Type</label>
                                            <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <select class="form-control form-select" name="location_id" id="location_id" required>
                                                <option value="">Select Location</option>
                                                @forelse($loc as $d)
                                                    <option value="{{$d->id}}" {{ old('location_id')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" id="price" class="form-control" name="price" value="{{old('price')}}">
                                        </div>
                                    </div>
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="Picture">Feature Image</label>
                                            <input type="file" id="feature_image" class="form-control" name="feature_image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 offset-2 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection
