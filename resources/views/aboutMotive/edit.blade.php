
@extends('layout.app')

@section('pageTitle',trans('Update About Us Motive'))
@section('pageSubTitle',trans('update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.aboutMotive.update',encryptor('encrypt',$motive->id))}}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="motive">Motive</label>
                                            <input type="text" id="motive" class="form-control" value="{{old('motive',$motive->motive)}}" name="motive">
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
