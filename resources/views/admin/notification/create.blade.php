@extends('layouts.master')
@section('title',__('Create Notification'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Create Notification') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <a href="{{url('/admin')}}" class="float-right btn btn-primary-rgba mr-2"><i
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
          <h5 class="box-title">{{__('Create Audio Language')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::open(['method' => 'POST', 'action' => 'NotificationController@store']) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group text-dark{{ $errors->has('title') ? ' has-error' : '' }}">
                  {!! Form::label('title', __('Notification Title')) !!}
                  {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('title') }}</small>
              </div>

              <div class="form-group text-dark{{ $errors->has('description') ? ' has-error' : '' }}">
                {!! Form::label('description', __('Notification Description')) !!}
                {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('description') }}</small>
              </div>

            @php
              $movie=App\Movie::orderBy('created_at', 'desc')->get();;
            @endphp
            <div class="form-group text-dark{{ $errors->has('movie_id') ? ' has-error' : '' }}">
              {!! Form::label('movie_id', __('Select Movies')) !!}
                <select class="form-control select2" name="movie_id" >
                  <option value="">{{__('Please Select')}}</option>
                    @foreach($movie as $movies)
                      <option value="{{$movies->id}}" name="{{$movies->id}}">{{$movies->title}}</option>
                    @endforeach
                </select>
                <small class="text-danger">{{ $errors->first('movie_id') }}</small>
            </div>

            @php
              $livetv=App\Movie::orderBy('created_at', 'desc')->where('live',1)->get();;
            @endphp
            <div class="form-group text-dark{{ $errors->has('livetv') ? ' has-error' : '' }}">
              {!! Form::label('livetv', __('SelectLiveTv')) !!}
                <select class="form-control select2" name="livetv">
                  <option value="">{{__('Please Select')}}</option>
                    @foreach($livetv as $movies)
                      <option value="{{$movies->id}}" name="{{$movies->id}}">{{$movies->title}}</option>
                    @endforeach
                </select>
                <small class="text-danger">{{ $errors->first('livetv') }}</small>
            </div>

            @php
            $tv=App\TvSeries::orderBy('created_at', 'desc')->get();
            @endphp
            <div class="form-group text-dark{{ $errors->has('tv_id') ? ' has-error' : '' }}">
              {!! Form::label('tv_id', __('Select Tv Series')) !!}
                <select class="form-control select2" name="tv_id">
                  <option value="">{{__('Please Select')}}</option>
                    @foreach($tv as $tvs)
                      @php
                        $seasons=App\Season::where('tv_series_id',$tvs->id)->first();
                      @endphp
                      @if(isset($seasons) )
                        <option value="{{$seasons->id}}" name="{{$seasons->id}}">{{$tvs->title}}</option>
                      @endif
                     @endforeach
                </select>
                <small class="text-danger">{{ $errors->first('tv_id') }}</small>
            </div>

            @php
              $user=App\User::all();
            @endphp
              <div class="form-group text-dark{{ $errors->has('user_id') ? ' has-error' : '' }}">
                {!! Form::label('user_id', __('Select Users')) !!}
                  <select class="form-control select2" name="user_id[]" multiple="true" required="true">
                    <option value="0">{{__('All Users')}}</option>
                      @foreach($user as $users)
                        <option value="{{$users->id}}">{{$users->name}}</option>
                      @endforeach
                  </select>
                  <small class="text-danger">{{ $errors->first('user_id') }}</small>
              </div>

            </div>
              <div class="form-group text-dark">
                <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>{{ __('Update') }}</button>
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
<script>
 
</script>


    
@endsection