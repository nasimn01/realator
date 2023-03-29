
@extends('layout.app')

@section('pageTitle',trans('Update home page'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.home.update',encryptor('encrypt',$home->id))}}">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" id="logo" class="form-control" name="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title 1</label>
                                            <input type="text" id="title1" class="form-control" value="{{ old('title1',$home->title_1)}}" name="title1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title 2</label>
                                            <input type="text" id="title2" class="form-control" value="{{ old('title2',$home->title_2)}}" name="title2">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title 3</label>
                                            <input type="text" id="title3" class="form-control" value="{{ old('title3',$home->title_3)}}" name="title3">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contact">Contact Number</label>
                                            <input type="text" name="contact" class="form-control" value="{{old('contact',$home->contact_no)}}" id="contact">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contact_img">Contact Image</label>
                                            <input type="file" id="contact_img" class="form-control" name="contact_img">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" placeholder="facebook link here" id="facebook" class="form-control" value="{{old('facebook',$home->facebook)}}" name="facebook">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" placeholder="twitter link here" id="twitter" class="form-control" value="{{old('twitter',$home->twitter)}}" name="twitter">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="linkedin">Linkedin</label>
                                            <input type="text" placeholder="linkedin link here" id="linkedin" class="form-control" value="{{old('linkedin',$home->linkedin)}}" name="linkedin">
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

