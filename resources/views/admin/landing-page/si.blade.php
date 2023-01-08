@extends('layouts.master')
@section('title',__('Social Url Setting'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Social Url Setting') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="widgetbar">
                <a href="{{url('admin/')}}" class="btn btn-primary-rgba mr-2"><i
                  class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
              </div>
            </div>
        </div>          
    </div>
@endsection
@section('maincontent')
<div class="contentbar">
  <div class="row">
    @if ($errors->any())  
  <div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)     
  <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach  
  </div>
  @endif
    <div class="col-lg-6">
      <div class="card m-b-50">
        <div class="card-header">
          <h5 class="box-title">{{__('Social Url Setting')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::open(['method' => 'POST', 'action' => 'GenreController@store', 'files' => true]) !!}
            <div class="row">
              <div class="col-md-12">
				<div class= "form-group text-dark">
                <label for=""><i class="fa fa-facebook"></i> {{__('FacebookURL')}}:</label>
				<input autofocus="" placeholder="http://facebook.com/mediacity" type="text" class="form-control" name="url1" value="{{ $si->url1 }}">
				</div>
				<div class= "form-group text-dark">
				<label for=""><i class="fa fa-twitter"></i> {{__('TwitterURL')}}:</label>
				<input type="text" placeholder="http://twitter.com/mediacity" class="form-control" name="url2" value="{{ $si->url2 }}">
				</div>
				<div class= "form-group text-dark">
				<label for=""><i class="fa fa-youtube"></i> {{__('YoutubeURL')}}:</label>
				<input type="text" placeholder="http://youtube.com/mediacity" class="form-control" name="url3" value="{{ $si->url3 }}">
				</div>

              </div>
              
              
                <div class="form-group">
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    {{ __('Update') }}</button>
                </div>
                {!! Form::close() !!}
                <div class="clear-both"></div>
            

      </div>
    </div>
  </div>
</div>
</div>
@endsection 
@section('script')

@endsection