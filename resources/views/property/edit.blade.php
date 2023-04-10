
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
                                        <label for="status"><b>{{__('Status')}}:</b></label>
                                        <select class="form-control form-select" value="{{ old('status')}}" name="status">
                                            <option value="">Select Status</option>
                                            <option value="0" {{ old('status',$prop->status)=='0' ? 'selected':''}}>Inactive</option>
                                            <option value="1" {{ old('status',$prop->status)=='1' ? 'selected':''}}>Active</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="is_feature"><b>{{__('Is Feature')}}:</b></label>
                                        <select class="form-control form-select" value="{{ old('is_feature')}}" name="is_feature">
                                            <option value="">Select is feature</option>
                                            <option value="0" {{ old('is_feature',$prop->is_feature)=='0' ? 'selected':''}}>No</option>
                                            <option value="1" {{ old('is_feature',$prop->is_feature)=='1' ? 'selected':''}}>Yes</option>
                                        </select>
                                    </div>
                                </div>
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
@endpush
