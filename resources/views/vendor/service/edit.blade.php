@extends('layouts.load')

@section('content')

            <div class="content-area">
              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error') 
                      <form id="geniusformdata" action="{{route('vendor-service-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @foreach($languages as $language)
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">{{ $langg->lang510  . ' ' . $language }} *</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <input type="text" class="input-field" name="{{ $language }}[title]" placeholder="{{  $langg->lang510  . ' ' . $language }}" value="{{  $data->translate_value[$language]['title'] ?? '' }}" required="">
                            </div>
                          </div>
                        @endforeach

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ $langg->lang511 }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="img-upload">
                                <div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset('assets/images/services/'.$data->photo):asset('assets/images/noimage.png') }});">
                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ $langg->lang512 }}</label>
                                    <input type="file" name="photo" class="img-upload" id="image-upload">
                                  </div>
                                  <p class="text">{{ $langg->lang513 }}</p>
                            </div>

                          </div>
                        </div>

                        @foreach($languages as $language)
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                <h4 class="heading">
                                     {{ $langg->lang514 . ' ' . $language }} *
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                                <textarea class="input-field" name="{{ $language }}[details]" placeholder="{{ $langg->lang514 . ' ' . $language }}">{{  $data->translate_value[$language]['details'] ?? '' }}</textarea>
                            </div>
                          </div>
                        @endforeach

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ $langg->lang516 }}</button>
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