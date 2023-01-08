@extends('layouts.master')
@section('title',__('Edit')." "." - $audio->title")
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Audio') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <a href="{{url('admin/audio')}}" class="float-right btn btn-primary-rgba mr-2"><i
                  class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
            </div>
        </div>          
    </div>
@endsection
@section('maincontent')
<div class="contentbar">
  <div class="row">
    
    <div class="col-lg-9">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title">{{__('Edit Audio')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($audio, ['method' => 'PATCH', 'action' => ['AudioController@update',$audio->id], 'files' => true]) !!}
          
            <div class="row">
      <div class="col-md-12">
        <div id="movie_title" class="form-group text-dark{{ $errors->has('title') ? ' has-error' : '' }}">
          {!! Form::label('title', __('AudioTitle')) !!}
          <input  type="text" class="form-control" name="title" value="{{ $audio->title }}">
          <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>
           <div class="form-group text-dark{{ $errors->has('selecturl') ? ' has-error' : '' }}">
            {!! Form::label('selecturls', __('Add Audio')) !!}
             <select class="form-control select2" id="selecturl" name="selecturl">
           
              @if($audio['audiourl']!='')
              <option value="audiourl" selected="">{{__('Audio URL')}}</option>
              @else
                <option value="audiourl">{{__('Audio URL')}}</option>
              @endif
              
             
               @if(isset($audio['upload_audio']) && $audio['upload_audio'] != '')
               <option value="upload_audio" selected="">{{__('Upload Audio')}}</option>
                @else
                 <option value="upload_audio">{{__('Upload Audio')}}</option>
              @endif
              
  
             
            </select>
             <small class="text-danger">{{ $errors->first('selecturl') }}</small>
           </div>
  
  
           <div id="ifbox" style="{{$audio['audiourl']!='' ? '' : "display: none" }}" class="form-group text-dark">
            <label for="audiourl">{{__('Audio URL:')}} </label> <a data-toggle="modal" data-target="#embdedexamp"><i class="fa fa-question-circle-o"> </i></a>
            <input  type="text" class="form-control" name="audiourl" placeholder="" value="{{$audio['audiourl']}}">
          </div>
  
           
  
         {{-- upload Audio --}}
        <div style="{{$audio['upload_audio']!='' ? '' : "display: none" }}"class="form-group text-dark{{ $errors->has('upload_audio') ? ' has-error' : '' }} input-file-block" id="uploadaudio" >
          {!! Form::label('upload_audio',__('Upload Audio')) !!} 
          <div class="input-group">
           
            <input type="text" class="form-control" id="upload_audio" name="upload_audio" value="{{$audio['upload_audio']}}">
            <span class="input-group-addon midia-toggle-upload_audio" data-input="upload_audio">{{__('Choose A Audio')}}</span>
            
          </div>
          <small class="text-danger">{{ $errors->first('upload_audio') }}</small>
        </div>
       {{-- select to upload or add links code ends here --}}
  
       <div class="form-group text-dark{{ $errors->has('a_language') ? ' has-error' : '' }}">
        {!! Form::label('a_language',  __('Audio Languages')) !!}
        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('Please Select Audio Language')}}"></i>
        <div class="input-group">
          <select name="a_language[]" id="a_language" class="form-control select2" multiple="multiple">
            @if(isset($old_lans) && count($old_lans) > 0)
            @foreach($old_lans as $old)
            <option value="{{$old->id}}" selected="selected">{{$old->language}}</option> 
            @endforeach
            @endif
            @if(isset($a_lans))
            @foreach($a_lans as $rest)
            <option value="{{$rest->id}}">{{$rest->language}}</option> 
            @endforeach
            @endif
          </select>  
          <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
        </div>
        <small class="text-danger">{{ $errors->first('a_language') }}</small>
      </div>
      
      <div class="form-group text-dark{{ $errors->has('maturity_rating') ? ' has-error' : '' }}">
        {!! Form::label('maturity_rating', __('Maturity Rating')) !!}
        {!! Form::select('maturity_rating', array('all age' => __('All Age'), '13+' =>'13+', '16+' => '16+', '18+'=>'18+'), null, ['class' => 'form-control select2']) !!}
        <small class="text-danger">{{ $errors->first('maturity_rating') }}</small>
      </div>
      <div class="form-group text-dark" style="display: none">
        <div class="row">
          <div class="col-md-6">
            {!! Form::label('', __('Choose Custom Thumbnail And Poster')) !!}
          </div>
          <div class="col-md-5 pad-0">
            <label class="switch for-custom-image">
              {!! Form::checkbox('', 1, 1, ['class' => 'custom_toggle']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="upload-image-main-block">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group text-dark{{ $errors->has('thumbnail') ? ' has-error' : '' }} input-file-block">
              {!! Form::label('thumbnail', __('Thumbnail')) !!}
              {!! Form::file('thumbnail', ['class' => 'input-file', 'id'=>'thumbnail']) !!}
              <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{isset($audio->thumbnail) ? $audio->thumbnail :__('Thumbnail')}}">
                
                <span class="js-fileName">{{isset($audio->thumbnail) ? $audio->thumbnail :__('Choose A File')}}</span>
              </label>
              <p class="info">{{__('Choose Custom Thumbnail')}}</p>
              <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group text-dark{{ $errors->has('poster') ? ' has-error' : '' }} input-file-block">
              {!! Form::label('poster', __('Poster')) !!} 
              {!! Form::file('poster', ['class' => 'input-file', 'id'=>'poster']) !!}
              <label for="poster" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title={{isset($audio->poster) ? $audio->poster :__('Poster')}}>
               
                <span class="js-fileName">{{isset($audio->poster) ? $audio->poster :__('Choose A File')}}</span>
              </label>
              <p class="info">{{__('Choose Custom Poster')}}</p>
              <small class="text-danger">{{ $errors->first('poster') }}</small>
            </div>
          </div>
        </div>
      </div>
  
      
      
      <div class="form-group text-dark{{ $errors->has('featured') ? ' has-error' : '' }}">
        <div class="row">
          <div class="col-md-6">
            {!! Form::label('featured',__('Featured')) !!}
          </div>
          <div class="col-md-5 pad-0">
            <label class="switch">
              {!! Form::checkbox('featured', 1, 0, ['class' => 'custom_toggle']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-xs-12">
          <small class="text-danger">{{ $errors->first('featured') }}</small>
        </div>
      </div>
  
      <div class="form-group text-dark{{ $errors->has('is_protect') ? ' has-error' : '' }}">
        <div class="row">
          <div class="col-md-6">
            {!! Form::label('is_protect', __('Protected Video?')) !!}
          </div>
          <div class="col-md-5 pad-0">
            <label class="switch">
              <input type="checkbox" name="is_protect" class="custom_toggle" id="is_protect">
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-xs-12">
          <small class="text-danger">{{ $errors->first('is_protect') }}</small>
        </div>
      </div>
      <div class="search form-group text-dark{{ $errors->has('password') ? ' has-error' : '' }} is_protect" style="display: none;">
        {!! Form::label('password', __('Protected Password For Video')) !!}
        {!! Form::password('password', old('password'), ['class' => 'form-control','id'=>'password']) !!}
        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
        <small class="text-danger">{{ $errors->first('password') }}</small>
      </div>
  
  
  
        <div class="form-group text-dark">
          <label for="">{{__('Meta Keyword:')}} </label>
          <input name="keyword" value="{{old('keyword')}}" type="text" class="form-control" data-role="tagsinput"/>
        </div>
  
      
        <div class="menu-block">
          <h6 class="menu-block-heading">{{__('Please Select Menu')}}</h6>
          @if (isset($menus) && count($menus) > 0)
            <div class="row">
              @foreach ($menus as $menu)
              <div class="col-md-4">
                {{$menu->name}}
              </div>
              @php
                $checked = null;
                if (isset($menu->menu_data) && count($menu->menu_data) > 0) {
                  if ($menu->menu_data->where('audio_id', $audio->id)->where('menu_id', $menu->id)->first() != null) {
                    $checked = 1;
                  }
                }
                @endphp
              <div class="col-md-5 pad-0">
                <div class="inline">
                  @if ($checked == 1)
                <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}" checked>
                <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                @else
                <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}">
                <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                @endif
                </div>
              </div>
              @endforeach
            </div>
            @endif
        </div>
        <br>
    
        <div class="form-group text-dark{{ $errors->has('rating') ? ' has-error' : '' }}">
          {!! Form::label('rating', __('Ratings')) !!}
          {!! Form::text('rating',  old('rating'), ['class' => 'form-control', ]) !!}
          <small class="text-danger">{{ $errors->first('rating') }}</small>
        </div>
            
        <div class="form-group text-dark{{ $errors->has('genre_id') ? ' has-error' : '' }}">
         {!! Form::label('genre_id', __('Genre')) !!}
         <div class="input-group">
            <select name="genre_id[]" id="genre_id" class="form-control select2" multiple="multiple">
              @if(isset($old_genre) && count($old_genre) > 0)
              @foreach($old_genre as $old)
              <option value="{{$old->id}}" selected="selected">{{$old->name}}</option> 
              @endforeach
              @endif
              @if(isset($genre_ls))
              @foreach($genre_ls as $rest)
              <option value="{{$rest->id}}">{{$rest->name}}</option> 
              @endforeach
              @endif
            </select>  
            <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddGenreModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
          </div>
          <small class="text-danger">{{ $errors->first('genre_id') }}</small>
        </div>
        <div class="form-group text-dark{{ $errors->has('detail') ? ' has-error' : '' }}">
           {!! Form::label('detail', __('Description')) !!}
           {!! Form::textarea('detail', old('detail'), ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
           <small class="text-danger">{{ $errors->first('detail') }}</small>
        </div>
</div>
                

              </div>
              
              
                <div class="form-group ">
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
    </div>
    <!-- Add Language Modal -->
<div id="AddLangModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('Add Language')}}</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      {!! Form::open(['method' => 'POST', 'action' => 'AudioLanguageController@store']) !!}
      <div class="modal-body">
        <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
          {!! Form::label('language', __('Language')) !!}
          {!! Form::text('language', null, ['class' => 'form-control', 'required' => 'required']) !!}
          <small class="text-danger">{{ $errors->first('language') }}</small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
          <button type="submit" class="btn btn-primary-rgba">{{__('Create')}}</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Add Genre Modal -->
<div id="AddGenreModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('Add Genre')}}</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      {!! Form::open(['method' => 'POST', 'action' => 'GenreController@store']) !!}
      <div class="modal-body admin-form-block">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name',__('Name')) !!}
          {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
          <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-success-rgba"> {{__('Reset')}}</button>
          <button type="submit" class="btn btn-primary-rgba"> {{__('Create')}}</button>
        </div>
      </div>
      <div class="clear-both"></div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection 
@section('script')
<script>
  $(document).ready(function(){
   
    $('#selecturl').change(function(){  
     selecturl = document.getElementById("selecturl").value;
     if (selecturl == 'audiourl') {
    $('#ifbox').show();
    $('#uploadaudio').hide();
    


  }else if (selecturl == 'upload_audio') {
   $('#uploadaudio').show();
   $('#ifbox').hide();
   

 }

});
 
  $('input[name="is_protect"]').click(function(){
    if($(this).prop("checked") == true){
      $('.is_protect').fadeIn();
    }
    else if($(this).prop("checked") == false){
      $('.is_protect').fadeOut();
    }
  });
   
  });
</script>
{{-- vimeo api code --}}


<script type="text/javascript">
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script>
  $(".midia-toggle-upload_audio").midia({
		base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.mp3'
        },
    directory_name: 'audio'
	});
</script>  
@endsection