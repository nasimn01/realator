
@extends('layout.app')

@section('pageTitle',trans('Create Property Photo'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.proPhoto.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="property">Property</label>
                                            <select class="form-control form-select" name="property" id="property" required>
                                                <option value="">Select Property</option>
                                                @forelse($prop as $d)
                                                    <option value="{{$d->id}}" {{ old('property')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8 offset-2">
                                        <div class="form-group">
                                            <label for="Picture">Feature Image</label>
                                            <input type="file" id="Picture" class="form-control" name="Picture">
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
