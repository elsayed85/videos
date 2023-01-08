@extends('layouts.master')
@section('title', __('Color Option'))
@section('breadcum')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('Color Option') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('Color Option') }}</li>
                </ol>
            </div>
        </div>
      
    </div>          
</div>
@endsection
@section('maincontent')
<div class="contentbar"> 
  <div class="row">
    <div class="col-md-12">

        <div class="card m-b-50">
            <div class="card-header">
                <h5 class="card-title">{{ __('Color Option') }}</h5>
            </div> 

            <div class="card-body">
                {!! Form::open(['method' => 'POST', 'action' => 'ColorSchemeController@store']) !!}                     
                    <!-- row start -->
                    <div class="row">
                        <div class="col-md-12">
                        {{-- Color Schemes SECTIONS END --}}
                            <div class="col-md-6 col-lg-6 col-xl-12">
                                <div class="bg-primary ml-6 mr-6 mb-6">
                                  <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('COLOR LAYOUTS')}}</h4></div>
                              </div>
                            </div>
                            <div class="row mx-2 my-4" >
                                <div class="col-md-6">
                                    <h5 class="bootstrap-switch-label">{{__('Color Schemes')}}</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('color_scheme') ? ' has-error' : '' }}">
                                        <select class="form-control select2" name="color_scheme">
                                            <option value="dark" {{$color_scheme->color_scheme == 'dark'? 'selected' : ''}} >{{__('Dark')}}</option>
                                            <option value="light" {{$color_scheme->color_scheme == 'light'? 'selected' : ''}}>{{__('Light')}}</option>
                                        </select>
                                     </div>
                                    <small class="text-danger">{{ $errors->first('color_scheme') }}</small>
                                </div>
                            </div>
                        {{-- Color Schemes SECTIONS END --}}

                        {{-- NAVIGATION START --}}
                            <div class="col-md-6 col-lg-6 col-xl-12">
                                <div class="bg-primary ml-6 mr-6 mb-6">
                                <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('NAVIGATION SECTIONS')}}</h4></div>
                            </div>
                            </div>
                            <div class="row mx-2 my-4" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="default_navigation_color">{{__('Default Color')}}</label>
                                        <input  class="form-control" type="color" value="{{$color_scheme->default_navigation_color}}"  name="default_navigation_color" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="custom_navigation_color">{{__('Custom Color')}}</label>
                                        <input  class="form-control" type="color" value="{{$color_scheme->custom_navigation_color}}" name="custom_navigation_color">
                                    </div>
                                </div>
                            </div>

                        {{-- NAVIGATION END --}}

                        {{-- TEXT COLOR START --}}
                            <div class="col-md-6 col-lg-6 col-xl-12">
                                <div class="bg-primary ml-6 mr-6 mb-6">
                                  <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('TEXT COLOR')}}</h4></div>
                              </div>
                            </div>
                            <div class="col-md-10 text-dark">
                                {!! Form::label('aws', __('Text Color')) !!}
                            </div>
                            <div class="row mx-2 my-4" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="default_text_color">{{__('Default Color')}}</label>
                                        <input  class="form-control" type="color" value="{{$color_scheme->default_text_color}}"  name="default_text_color" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="custom_text_color">{{__('Custom Color')}}</label>
                                        <input  class="form-control" type="color" value="{{$color_scheme->custom_text_color}}" name="custom_text_color">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10 text-dark">
                                {!! Form::label('aws', __('Text on Hover Color')) !!}
                            </div>
                            <div class="row mx-2 my-4" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="default_text_on_color">{{__('Default Color')}}</label>
                                        <input  class="form-control" type="color" value="{{$color_scheme->default_text_on_color}}"  name="default_text_on_color" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="custom_text_on_color">{{__('Custom Color')}}</label>
                                        <input  class="form-control" type="color" value="{{$color_scheme->custom_text_on_color}}" name="custom_text_on_color">
                                    </div>
                                </div>
                            </div>
                        {{-- TEXT COLOR END --}}

                        {{-- BACKTO TOP SECTION  START --}}
                        <div class="col-md-6 col-lg-6 col-xl-12">
                            <div class="bg-primary ml-6 mr-6 mb-6">
                              <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('BACKTO TOP SECTION ')}}</h4></div>
                          </div>
                        </div>
                        <div class="col-md-10 text-dark">
                            {!! Form::label('aws', __('Back2Top Background color')) !!}
                        </div>
                        <div class="row mx-2 my-4" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="default_back_to_top_color">{{__('Default Color')}}</label>
                                    <input  class="form-control" type="color" value="{{$color_scheme->default_back_to_top_color}}"  name="default_back_to_top_bgcolor" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="custom_back_to_top_bgcolor">{{__('Custom Color')}}</label>
                                    <input  class="form-control" type="color" value="{{$color_scheme->custom_back_to_top_bgcolor}}" name="custom_back_to_top_bgcolor">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10 text-dark">
                            {!! Form::label('aws', __('Back2Top Background color on hover')) !!}
                        </div>
                        <div class="row mx-2 my-4" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="custom_back_to_top_bgcolor">{{__('Default Color')}}</label>
                                    <input  class="form-control" type="color" value="{{$color_scheme->custom_back_to_top_bgcolor}}"  name="default_back_to_top_bgcolor_on_hover" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="custom_back_to_top_bgcolor_on_hover">{{__('Custom Color')}}</label>
                                    <input  class="form-control" type="color" value="{{$color_scheme->custom_back_to_top_bgcolor_on_hover}}" name="custom_back_to_top_bgcolor_on_hover">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10 text-dark">
                            {!! Form::label('aws', __('Back2Top color')) !!}
                        </div>
                        <div class="row mx-2 my-4" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="default_back_to_top_color">{{__('Default Color')}}</label>
                                    <input  class="form-control" type="color" value="{{$color_scheme->default_back_to_top_color}}"  name="default_back_to_top_color" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="custom_back_to_top_color">{{__('Custom Color')}}</label>
                                    <input class="form-control" type="color" value="{{$color_scheme->custom_back_to_top_color}}" name="custom_back_to_top_color">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10 text-dark">
                            {!! Form::label('aws', __('Back2Top color on hover')) !!}
                        </div>
                        <div class="row mx-2 my-4" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="default_back_to_top_color_on_hover">{{__('Default Color')}}</label>
                                    <input  class="form-control" type="color" value="{{$color_scheme->default_back_to_top_color_on_hover}}"  name="default_back_to_top_color_on_hover" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="custom_back_to_top_color_on_hover">{{__('Custom Color')}}</label>
                                    <input class="form-control" type="color" value="{{$color_scheme->custom_back_to_top_color_on_hover}}" name="custom_back_to_top_color_on_hover">
                                </div>
                            </div>
                        </div>
                    {{-- BACKTO TOP SECTION END --}}

                    {{-- FOOTER SECTION START --}}
                    <div class="col-md-6 col-lg-6 col-xl-12">
                        <div class="bg-primary ml-6 mr-6 mb-6">
                        <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('FOOTER SECTION ')}}</h4></div>
                    </div>
                    </div>
                    <div class="row mx-2 my-4" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="default_footer_background_color">{{__('Default Color')}}</label>
                                <input  class="form-control" type="color" value="{{$color_scheme->default_footer_background_color}}"  name="default_footer_background_color" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="custom_footer_background_color">{{__('Custom Color')}}</label>
                                <input  class="form-control" type="color" value="{{$color_scheme->custom_footer_background_color}}" name="custom_footer_background_color">
                            </div>
                        </div>
                    </div>

                {{-- FOOTER SECTION END --}}
                                            
                            <div class="col-md-12">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban mr-1"></i>{{__('Reset')}}</button>
                                <button type="submit" name="reset" class="btn btn-warning-rgba" value="{{__('Reset to Default')}}" ><i class="fa fa-check-circle mr-1"></i>{{__('Reset to Default')}}</button>
                                <button type="submit" name="save" class="btn btn-primary-rgba" value="{{__('Save Settings')}}" ><i class="fa fa-check-circle mr-1"></i>{{__('Save Settings')}}</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection 
@section('script')

@endsection
