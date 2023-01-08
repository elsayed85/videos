@extends('layouts.master')
@section('title',__('Custom Style Settings'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('Custom Style Settings') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Custom Style Settings') }}</li>
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
                <h5 class="card-title">{{ __('Custom Style Settings') }}</h5>
                
            </div> 

            <div class="card-body">
              <div class="form-group{{ $errors->has('css') ? ' has-error' : '' }}">
                <form action="{{ route('css.store') }}" method="POST">
                  {{ csrf_field() }}
                <div class="form-group">
                <label for="css">{{__('Custom CSS:')}}</label>
                <small class="text-danger">{{ $errors->first('css','CSS Cannot be blank !') }}</small>
                <textarea placeholder="a {
                  color:red;
                }" id="he" class="form-control" name="css" rows="10" cols="30">{{ $css }}</textarea>
                </div>
                <div class="form-group">
                <input type="submit" value="{{__('ADD Css')}}" class="btn btn-primary-rgba">
                </div>
                </form>
                </div>
                <br>
                <div class="form-group{{ $errors->has('js') ? ' has-error' : '' }}">
                <form action="{{ route('js.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="js">{{__('Custom JS:')}}</label>
                    <small class="text-danger">{{ $errors->first('js','Javascript Cannot be blank !') }}</small>
                    <textarea placeholder="$(document).ready(function{
                      //code
                  });" class="form-control" name="js" rows="10" cols="30">{{$js}}</textarea>
                  </div>
              <div class="form-group">
                <input type="submit" value="{{__('ADD JS')}}" class="btn btn-primary-rgba">
              </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection 
@section('script')
   

@endsection
