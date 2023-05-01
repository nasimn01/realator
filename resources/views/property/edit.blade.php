
@extends('layout.app')

@section('pageTitle',trans('Update Property'))
@section('pageSubTitle',trans('update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body" id="result_show">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.property.update',encryptor('encrypt',$prop->id))}}">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="property_cat">Property Type</label>
                                            <select class="form-control form-select" name="property_cat" id="property_cat" required>
                                                <option value="">Select Property Type</option>
                                                @forelse($proCat as $d)
                                                    <option value="{{$d->id}}" {{ old('property_cat',$prop->property_category_id)==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Property Name</label>
                                            <input type="text" id="name" class="form-control" name="name" value="{{old('name',$prop->name)}}" required>
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
                                            <input type="text" id="price" class="form-control" name="price" value="{{old('price',$prop->price)}}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="bed">Bed</label>
                                            <input type="text" id="bed" class="form-control" name="bed" value="{{old('bed',$prop->bed)}}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="bath">Bath</label>
                                            <input type="text" id="bath" class="form-control" name="bath" value="{{old('bath',$prop->bath)}}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="garage">Garage</label>
                                            <input type="text" id="garage" class="form-control" name="garage" value="{{old('garage',$prop->garage)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" class="form-control" name="address" value="{{old('address',$prop->address)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <select class="form-control form-select" name="location" id="location" required>
                                                <option value="">Select Location</option>
                                                @forelse($loc as $d)
                                                    <option value="{{$d->id}}" {{ old('location',$prop->location)==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="default" name="description">{{old('description',$prop->description)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="advance_feature"><b>Advance Feature</b></label>
                                        <div class="form-group">
                                            @foreach ($adv as $d)
                                            <input type="checkbox" name="advance_feature[]" value="{{ $d->id }}" {{ in_array($d->id, explode(',', $prop->advance_feature)) ? 'checked' : '' }}>
                                            <label>{{ $d->feature }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="ameneties"><b>Ameneties</b></label>
                                        <div class="form-group">
                                            @foreach ($ameneties as $amenity)
                                            <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}" {{ in_array($amenity->id, explode(',', $prop->ameneties)) ? 'checked' : '' }}>
                                            <label>{{ $amenity->name }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="video_link">Video link</label>
                                            <input type="text" id="video_link" class="form-control" name="video_link" value="{{old('video_link',$prop->video_link)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="map">Map Link</label>
                                            <input type="text" id="map" class="form-control" name="map" value="{{old('map',$prop->map_link)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="status"><b>{{__('Status')}}:</b></label>
                                            <select class="form-control form-select" value="{{ old('status')}}" name="status">
                                                <option value="">Select Status</option>
                                                <option value="0" {{ old('status',$prop->status)=='0' ? 'selected':''}}>Inactive</option>
                                                <option value="1" {{ old('status',$prop->status)=='1' ? 'selected':''}}>Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="is_feature"><b>{{__('Is Feature')}}:</b></label>
                                            <select class="form-control form-select" value="{{ old('is_feature')}}" name="is_feature">
                                                <option value="">Select is feature</option>
                                                <option value="0" {{ old('is_feature',$prop->is_feature)=='0' ? 'selected':''}}>No</option>
                                                <option value="1" {{ old('is_feature',$prop->is_feature)=='1' ? 'selected':''}}>Yes</option>
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
                                <div class="row imggl">
                                    @forelse($propphoto as $pp)
                                    <div class="col-5 col-sm-3 mb-3 text-center del{{$pp->id}}">
                                        <img class="modImg w-100" src="{{asset('uploads/property_photo/thumb/'.$pp->image)}}" alt="" />
                                        <button type="button" onclick="deletedata({{$pp->id}})" class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </div>
                                    @empty

                                    @endforelse
                                    
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

    function deletedata(e){
        $.get("{{route(currentUser().'.pro_delete')}}?id="+e, function(data, status){
            alert("Image Deleted!");
            $('.del'+e).remove();
        });
    }
</script>
@endpush
