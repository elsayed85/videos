@extends('layouts.master')
@section('title',__('Edit Fake View'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('Edit Fake View') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Fake View') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <a href="{{url('admin/fakeViews')}}" class="float-right btn btn-primary-rgba mr-2"><i
                  class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
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
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title">{{__('Edit Genre')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($movies, ['method' => 'PATCH', 'action' => ['FakeViewController@update', $movies->id], 'files' => true]) !!}
              <div class="col-md-12">
                <div class="form-group ">
                  {!! Form::label('views', __('Add Fake View')) !!}
                  {!! Form::number('views', old('views'), ['class' => 'form-control','autocomplete'=>'off','required']) !!}
                </div>
              </div>
              
              <div class="form-group">
                <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>{{ __('Update') }}</button>
              </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
@section('script')

@endsection