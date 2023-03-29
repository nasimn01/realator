
@extends('layout.app')

@section('pageTitle',trans('Update Customer Review'))
@section('pageSubTitle',trans('update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.review.update',encryptor('encrypt',$customer->id))}}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="name">Customer Name</label>
                                            <input type="text" id="name" class="form-control" name="name" value="{{old('name',$customer->name)}}">
                                        </div>
                                    </div>
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="review">Review Message</label>
                                            <textarea class="form-control" name="review" id="review"  rows="2">{{old('review',$customer->review)}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" id="location" class="form-control" name="location" value="{{old('location',$customer->location)}}">
                                        </div>
                                    </div>
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="Picture">Image</label>
                                            <input type="file" id="image" class="form-control" name="image">
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
