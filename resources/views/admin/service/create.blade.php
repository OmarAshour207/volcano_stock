@extends('layouts.load')

@section('content')

            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')  
                      <form id="geniusformdata" action="{{route('admin-service-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}


                        @foreach($languages as $language)
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                <h4 class="heading">{{ __("Title $language") }} *</h4>
                                <p class="sub-heading">{{ __("$language") }}</p>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <input type="text" class="input-field" name="{{$language}}[title]" placeholder="{{ __('Enter Title') }}" required="">
                            </div>
                          </div>
                        @endforeach

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Current Featured Image') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="img-upload">
                                <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/admin/images/upload.png') }});">
                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                    <input type="file" name="photo" class="img-upload" id="image-upload">
                                  </div>
                                  <p class="text">{{ __('Prefered Size: (600x600) or Square Sized Image') }}</p>
                            </div>

                          </div>
                        </div>

                        @foreach($languages as $language)
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __("Description $language") }} *
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                                <textarea  class="input-field" name="{{$language}}[details]" placeholder="{{ __('Description') }}"></textarea>
                            </div>
                          </div>
                        @endforeach
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Create Service') }}</button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection