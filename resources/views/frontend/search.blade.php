@extends('frontend.app')
@section('pageTitle',trans('Search'))

@section('content')
<main class="single-bg">
      <div class="container" id="search-results">
        <!-- title section -->
        <div class="search-page py-5 text-center">
          <p>
            Search results for <span class="fw-bold fs-4">Property</span>
          </p>
        </div>
        <!-- advance Filter -->
        <div class="share bg-white shadow-lg p-2 rounded mb-4 sm-device">
          <div class="row advance-filter">
            <div class="col-sm-4">
              <p class="mb-0 ms-3 mt-2">Advance Filter</p>
            </div>
            <div class="col-sm-4">
            <form action="" method="get">
                <div class="searchBox">
                    <input type="text" value="{{ request()->input('name', '') }}"  name="name" id="search" placeholder="Search">
                    <button type="submit">
                        <span class="bi bi-search"></span>
                    </button>
                </div>
            </form>
            </div>
            <div class="col-sm-4">
              <form action="{{ route('search') }}" method="GET" id="sort-form">
                <div class="d-flex justify-content-end">
                  <select name="sort_by" id="sort-by" class="form-select form-select-sm me-2" aria-label=".form-select-sm example">
                    <option value="">Open Filtaring</option>
                    <option value="a_to_z">A to Z</option>
                    <option value="z_to_a">Z to A</option>
                    <option value="latest">leatest</option>
                    <option value="oldest">oldest</option>
                  </select>
                  <div class="body-style-icon d-flex">
                    <i onclick="styOne()" class="bi bi-justify me-3"></i>
                    <i onclick="styTwo()" class="bi bi-grid me-3 mt-1"></i>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Body Row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <!-- Product Card -->
            <div id="main-pro-sec" class="">
                @forelse($properties as $p)
                  <div class="main-col6-add">
                    <div class="share product-card-seciton bg-white shadow-lg p-2 rounded mb-4">
                      <a href="{{route('sProperty',$p->id)}}">
                        <div class="inner-row-remove row p-2">
                          <div class="inner-col4-remove col-sm-4">
                            <img class="img-fluid rounded mb-3" src="{{asset('uploads/property_feature/thumb/'.$p->feature_photo)}}" alt=""/>
                          </div>
                          <div class="inner-col8-remove col-sm-8">
                            <p class="title">{{$p->name}}</p>
                            <p>{{date('j F, Y', strtotime($p->created_at))}}</p>
                            <span>${{$p->price}}</span>
                            <p><i class="bi bi-geo-alt-fill"></i>{{$p->locat?->name}}</p>
                            <span>{{$p->property_cat?->name}}</span>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                @empty
                <div class="main-col6-add text-center">
                    <p>No Data Found</p>
                </div>
                @endforelse
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-end my-3">
                {!! $properties->links()!!}
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4">
            <!-- Property Status filter -->
            <form id="property-search-form" action="{{ route('search') }}" method="get">
              <div class="share bg-white shadow-lg p-4 rounded mb-4">
                <p class="mb-4 fw-bold">Property Type</p>
                <div class="form-check mb-2">
                  <input class="form-check-input" name="property_type[]" type="checkbox" value="1" id="defaultCheck1" @if(in_array('1', $propertyTypes)) checked @endif/>
                  <label class="form-check-label" for="property_type">Rent</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" name="property_type[]" type="checkbox" value="2" id="defaultCheck2" @if(in_array('2', $propertyTypes)) checked @endif/>
                  <label class="form-check-label" for="property_type">Buy/Sales</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" name="property_type[]" type="checkbox" value="3" id="defaultCheck3" @if(in_array('3', $propertyTypes)) checked @endif/>
                  <label class="form-check-label" for="property_type">land</label>
                </div>
              </div>
            
            <!-- Location filter -->
            
              <div class="share bg-white shadow-lg p-4 rounded mb-4">
                <p class="mb-4 fw-bold">Loacation</p>
                @foreach($search_location as $sl)
                <div class="form-check mb-2">
                  <input class="form-check-input" name="location[]" type="checkbox" value="{{$sl->id}}" @if(in_array($sl->id, $locations)) checked @endif/>
                  <label class="form-check-label" for="defaultCheck1">{{$sl->name}}</label>
                </div>
                @endforeach
              </div>
           
            
            <!-- Price filter -->
            
              <div class="share bg-white shadow-lg p-4 rounded mb-4" id="price-range">
                <p class="mb-4 fw-bold">Price</p>
                <div class="form-check mb-2">
                  <input class="form-check-input" name="price_range[]" type="checkbox" value="0-999" @if(in_array('0-999', $priceRanges)) checked @endif/>
                  <label class="form-check-label" for=""> 0 to 999USD</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" name="price_range[]" type="checkbox" value="1000-1999" @if(in_array('1000-1999', $priceRanges)) checked @endif/>
                  <label class="form-check-label" for=""> 1000 to 1999 USD</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" name="price_range[]" type="checkbox" value="2000-2999" @if(in_array('2000-2999', $priceRanges)) checked @endif/>
                  <label class="form-check-label" for=""> 2000 to 2999 USD</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" name="price_range[]" type="checkbox" value="3000-3999"  @if(in_array('3000-3999', $priceRanges)) checked @endif/>
                  <label class="form-check-label" for=""> 3000 to 3999 USD</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" name="price_range[]" type="checkbox" value="4000-4999"  @if(in_array('4000-4999', $priceRanges)) checked @endif/>
                  <label class="form-check-label" for=""> 4000 to 4999 USD</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" name="price_range[]" type="checkbox" value="5000-5999" @if(in_array('5000-5999', $priceRanges)) checked @endif/>
                  <label class="form-check-label" for=""> 5000 to 5999 USD</label>
                </div>
              </div>
            </form>
            <!-- feature proparty -->
            <div class="feature-proparty bg-white shadow-lg p-4 rounded mb-4">
              <p class="feature-proparty-title">Feature Proparty</p>
              @forelse($feature_property as $fp)
                <div class="features-seciton shadow p-3 rounded mb-4">
                  <a href="{{route('sProperty',$fp->id)}}">
                    <div class="row">
                    <div class="col-sm-4">
                      <img
                        class="img-fluid rounded"
                        src="{{asset('uploads/property_feature/thumb/'.$fp->feature_photo)}}"
                        alt=""
                      />
                    </div>
                    <div class="col-sm-8">
                      <p class="title">{{$fp->name}}</p>
                      <p>{{date('j F, Y', strtotime($fp->created_at))}}</p>
                      <p><i class="bi bi-geo-alt-fill"></i>{{$fp->locat?->name}}</p>
                      <span>{{$fp->property_cat?->name}}</span>
                    </div>
                  </div>
                  </a>
                </div>
                @empty
                <div class="features-seciton shadow p-3 rounded mb-4">
                  <div class="row">
                    <div class="col-sm-4">
                      <img
                        class="img-fluid rounded"
                        src="{{ asset('./resource/img/s2.png')}}"
                        alt=""
                      />
                    </div>
                    <div class="col-sm-8">
                      <p>Creekland Villege</p>
                      <p>July, 24 , 2022</p>
                      <p><i class="bi bi-geo-alt-fill"></i>778 Panama City, FL</p>
                      <span>Rent</span>
                    </div>
                  </div>
                </div>
                @endforelse
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
@push('scripts')
<script>
    // $(document).ready(function() {
    //     $('input[type=radio][name=property_type]').change(function() {
    //         var value = $(this).val();
    //         var url = "{{ route('search') }}" + "?property_type=" + value;
    //         window.location.href = url;
    //     });
    // });

    $(document).ready(function() {
    $('input[type=radio]').change(function() {
        var name = $(this).attr('name');
        var value = $(this).val();
        var url = "{{ route('search') }}" + "?" + name + "=" + value;
        window.location.href = url;
    });

    $(function() {
      $('#sort-by').on('change', function() {
          $('#sort-form').submit();
      });
    });

});
</script>
<script>
    // listen for changes to the checkboxes
    $('input[type="checkbox"]').on('change', function () {
        // submit the form using AJAX
        $.ajax({
            type: 'GET',
            url: $('#property-search-form').attr('action'),
            data: $('#property-search-form').serialize(),
            success: function (data) {
                // find the element in the returned data that contains the search results
                var searchResults = $(data).find('#main-pro-sec').html();
                // update the #search-results element on the page with the extracted search results
                $('#main-pro-sec').html(searchResults);
            },
            error: function () {
                // handle errors
            }
        });
    });
</script>

@endpush