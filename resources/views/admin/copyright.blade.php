@extends('layouts.master')
@section('title',__('Copyright'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('Copyright') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Copyright') }}</li>
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
                <h5 class="card-title">{{ __('Copyright') }}</h5>
            </div> 

            <div class="card-body">
              @if ($config)
              {!! Form::model($config, ['method' => 'PATCH', 'route' => 'copyright']) !!}
                <div class="form-group{{ $errors->has('copyright') ? ' has-error' : '' }}">
                  {!! Form::label('copyright', __('Copyright Text')) !!}
                  {!! Form::textarea('copyright', null, ['id' => 'editor1', 'class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('copyright') }}</small>
                </div>
                <div class="btn-group pull-right">
                  <button type="submit" class="btn btn-primary-rgba"> {{__('Save')}}</button>
                </div>
                <div class="clear-both"></div>
              {!! Form::close() !!}
            @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection 
@section('script')
<script>
  $(function () {
    CKEDITOR.replace('editor1');
  });
</script>
@endsection
