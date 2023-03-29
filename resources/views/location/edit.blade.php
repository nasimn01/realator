
@extends('layout.app')

@section('pageTitle',trans('Update location'))
@section('pageSubTitle',trans('update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.location.update',encryptor('encrypt',$loc->id))}}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="name">Location Name</label>
                                            <input type="text" id="name" class="form-control" name="name" value="{{old('name',$loc->name)}}">
                                        </div>
                                    </div>
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="Picture">Feature Image</label>
                                            <input type="file" id="feature" class="form-control" name="feature">
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
