
@extends('layout.app')

@section('pageTitle',trans('Update Founder message'))
@section('pageSubTitle',trans('update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.founder.update',encryptor('encrypt',$found->id))}}">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{old('title',$found->title)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="sub_title">Sub Title</label>
                                            <input type="text" id="sub_title" class="form-control" name="sub_title" value="{{old('sub_title',$found->sub_title)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control" name="name" value="{{old('name',$found->name)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Picture">Image</label>
                                            <input type="file" id="Picture" class="form-control" name="Picture">
                                            <p class="text-danger">Required width 444px and height 570px*</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" id="facebook" class="form-control" name="facebook" value="{{old('facebook',$found->facebook)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="youtube">Youtube</label>
                                            <input type="text" id="youtube" class="form-control" name="youtube" value="{{old('youtube',$found->youtube)}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="linkedin">Linkedin</label>
                                            <input type="text" id="linkedin" class="form-control" name="linkedin" value="{{old('linkedin',$found->linkedin)}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="msg">Message</label>
                                            <textarea  class="form-control" id="default"
                                                 name="message" rows="2">{{ old('message',$found->message)}}</textarea>
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
@push('scripts')
<script src="{{ asset('/assets/extensions/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/tinymce.js')}}"></script>
@endpush
