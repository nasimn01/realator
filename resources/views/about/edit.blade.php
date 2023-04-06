
@extends('layout.app')

@section('pageTitle',trans('Update About Us'))
@section('pageSubTitle',trans('update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.about.update',encryptor('encrypt',$about->id))}}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{old('title',$about->title)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Picture">Image 1</label>
                                            <input type="file" class="form-control" name="image_one">
                                            <p class="text-danger">Required width 340px and height 538px*</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Picture">Image 2</label>
                                            <input type="file" class="form-control" name="image_two">
                                            <p class="text-danger">Required width 312px and height 262px*</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Picture">Image 3</label>
                                            <input type="file" class="form-control" name="image_three">
                                            <p class="text-danger">Required width 306px and height 270px*</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">Short Description</label>
                                            <textarea name="short_text" class="form-control"  rows="3">{{old('short_text',$about->short_text)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">Long Description</label>
                                            <textarea name="long_description" class="form-control"  rows="5">{{old('long_description',$about->long_description)}}</textarea>
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
