
@extends('layout.app')

@section('pageTitle',trans('Create home page'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.home.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" id="logo" class="form-control" name="logo">
                                            <p class="text-danger">Maximum width 144px and height 67px*</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title 1</label>
                                            <input type="text" id="title1" class="form-control" value="{{ old('title1')}}" name="title1">
                                            <p class="text-danger m-0">Characters should be between 8 to 12</p>
                                            @if($errors->has('title1'))
                                                <small class="d-block text-danger">
                                                    {{$errors->first('title1')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title 2</label>
                                            <input type="text" id="title2" class="form-control" value="{{ old('title2')}}" name="title2">
                                            <p class="text-danger m-0">Characters should be between 15 to 20</p>
                                            @if($errors->has('title2'))
                                                <small class="d-block text-danger">
                                                    {{$errors->first('title2')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title 3</label>
                                            <input type="text" id="title3" class="form-control" value="{{ old('title3')}}" name="title3">
                                            <p class="text-danger m-0">Characters should be between 8 to 12</p>
                                            @if($errors->has('title3'))
                                                <small class="d-block text-danger">
                                                    {{$errors->first('title3')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contact">Contact Number</label>
                                            <input type="text" name="contact" class="form-control" value="{{old('contact')}}" id="contact">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="fb_message_link">FB Message Link</label>
                                            <input type="text" name="fb_message_link" class="form-control" value="{{old('fb_message_link')}}" id="fb_message_link">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="whatsapp_number">Whatsapp Number</label>
                                            <input type="text" name="whatsapp_number" class="form-control" value="{{old('whatsapp_number')}}" id="whatsapp_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="whatsapp_call_link">Whatsapp Call Link</label>
                                            <input type="text" name="whatsapp_call_link" class="form-control" value="{{old('whatsapp_call_link')}}" id="whatsapp_call_link">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sms_number">SMS Number</label>
                                            <input type="text" name="sms_number" class="form-control" value="{{old('sms_number')}}" id="sms_number">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contact_img">Contact Image</label>
                                            <input type="file" id="contact_img" class="form-control" name="contact_img">
                                            <p class="text-danger">Required width 439px and height 474px*</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" placeholder="facebook link here" id="facebook" class="form-control" value="{{old('facebook')}}" name="facebook">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" placeholder="twitter link here" id="twitter" class="form-control" value="{{old('twitter')}}" name="twitter">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="linkedin">Linkedin</label>
                                            <input type="text" placeholder="linkedin link here" id="linkedin" class="form-control" value="{{old('linkedin')}}" name="linkedin">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
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

