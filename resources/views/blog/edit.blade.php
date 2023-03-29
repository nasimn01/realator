
@extends('layout.app')

@section('pageTitle',trans('Update Blogs'))
@section('pageSubTitle',trans('update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.blog.update',encryptor('encrypt',$blog->id))}}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control form-select" name="category" id="category" required>
                                                <option value="">Select Category</option>
                                                @forelse($propCat as $d)
                                                    <option value="{{$d->id}}" {{ old('category',$blog->property_category_id)==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" class="form-control" value="{{old('title',$blog->title)}}" name="title">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="details">Details</label>
                                            <textarea name="details" class="form-control" id="details" rows="2">{{old('details',$blog->details)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" id="date" class="form-control" value="{{old('date',$blog->bolg_date)}}" name="date">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Picture">Image</label>
                                            <input type="file" id="bolg_image" class="form-control" name="bolg_image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-end">
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
