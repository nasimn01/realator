
@extends('layout.app')

@section('pageTitle',trans('Create Property'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.property.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="property_cat">Property Type</label>
                                            <select class="form-control form-select" name="property_cat" id="property_cat" required>
                                                <option value="">Select Property Type</option>
                                                @forelse($proCat as $d)
                                                    <option value="{{$d->id}}" {{ old('property_cat')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Property Name</label>
                                            <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Picture">Feature Photo</label>
                                            <input type="file" id="feature_photo" class="form-control" name="feature_photo">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" id="price" class="form-control" name="price" value="{{old('price')}}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="bed">Bed</label>
                                            <input type="text" id="bed" class="form-control" name="bed" value="{{old('bed')}}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="bath">Bath</label>
                                            <input type="text" id="bath" class="form-control" name="bath" value="{{old('bath')}}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="garage">Garage</label>
                                            <input type="text" id="garage" class="form-control" name="garage" value="{{old('garage')}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" class="form-control" name="address" value="{{old('address')}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <select class="form-control form-select" name="location" id="location" required>
                                                <option value="">Select Location</option>
                                                @forelse($loc as $d)
                                                    <option value="{{$d->id}}" {{ old('location')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="default" name="description" >{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="advance_feature"><b>Advance Feature</b></label>
                                        <div class="form-group">
                                            @foreach ($adv as $d)
                                            <input type="checkbox" name="advance_feature[]" value="{{ $d->id }}">
                                            <label>{{ $d->feature }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="ameneties"><b>Ameneties</b></label>
                                        <div class="form-group">
                                            @foreach ($ameneties as $amenity)
                                            <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}">
                                            <label>{{ $amenity->name }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="video_link">Video link</label>
                                            <input type="text" id="video_link" class="form-control" name="video_link" value="{{old('video_link')}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="map">Map Link</label>
                                            <input type="text" id="map" class="form-control" name="map" value="{{old('map')}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="status"><b>{{__('Status')}}:</b></label>
                                            <select class="form-control form-select" value="{{ old('status')}}" name="status">
                                                <option value="0">Inactive</option>
                                                <option value="1">Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="is_feature"><b>{{__('Is Feature')}}:</b></label>
                                            <select class="form-control form-select" value="{{ old('is_feature')}}" name="is_feature">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row imggl">
                                    <label for="status"><b>{{__('Gallery Image')}}:</b></label>
                                    <div class="col-5 col-sm-3 mb-3">
                                        <input type="file" class="dropify" data-height="100" name="image[]"/>
                                    </div> 
                                    <div class="col-2 addbtn">
                                        <button type="button" class="btn btn-primary" onclick="addGallery()">Add More</button>
                                    </div> 
                                </div> <!-- end row -->
                                <div class="row">
                                    <div class="col-12 py-2 d-flex justify-content-end">
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
@push('scripts')
<script src="{{ asset('/assets/extensions/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/tinymce.js')}}"></script>
<link rel="stylesheet" href="{{ asset('/assets/dropify/dropify.min.css')}}">
<script src="{{ asset('/assets/dropify/dropify.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/form-fileupload.init.js')}}"></script>
<script>
    function addGallery(){
        $('.addbtn').before('<div class="col-5 col-sm-3 mb-3"><input type="file" class="dropify" data-height="100" name="image[]"/></div> ');
        $(".dropify").dropify({messages:{default:"Drag and drop a file here or click",replace:"Drag and drop or click to replace",remove:"Remove",error:"Ooops, something wrong appended."},error:{fileSize:"The file size is too big (1M max)."}});
    }
</script>
@endpush

