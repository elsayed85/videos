@extends('layouts.master')
@section('title',__('Create Live Tv'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Create Live Tv') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="widgetbar">
                <a href="{{url('admin/livetv')}}" class="btn btn-primary-rgba mr-2"><i
                  class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
              </div>
            </div>
        </div>          
    </div>
@endsection
@section('maincontent')
<div class="contentbar">
  <div class="row">

    <div class="col-lg-9">
      <div class="card m-b-50">
        <div class="card-header">
          <h5 class="box-title">{{__('Create Live Tv')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::open(['method' => 'POST', 'action' => 'LiveTvController@store', 'files' => true]) !!}
          
            <div class="row">
      <div class="col-md-12">
        <div id="movie_title" class="form-group text-dark{{ $errors->has('title') ? ' has-error' : '' }}">
          {!! Form::label('title',__('Live Tv Title')) !!}
          {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => __('Enter Livetv Title')]) !!}
          <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>
        <div id="movie_slug" class="form-group text-dark{{ $errors->has('slug') ? ' has-error' : '' }}">
          {!! Form::label('slug', __('Live Tv Slug')) !!}
          {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => 'Please enter livetv slug']) !!}
          <small class="text-danger">{{ $errors->first('slug') }}</small>
        </div>
        <input type="text" name="live" value="1" hidden="true">
       
        {{-- select to upload code start from here --}}
        <div class="form-group text-dark{{ $errors->has('selecturl') ? ' has-error' : '' }}">
          {!! Form::label('selecturls',__('Add Video')) !!}
          {!! Form::select('selecturl', array('iframeurl' => __('IFrame URL'),
       
           
           'customurl' => __('Custom URL Youtube URL Vimeo URL')), null, ['class' => 'form-control select2','id'=>'selecturl']) !!}
           <small class="text-danger">{{ $errors->first('selecturl') }}</small>
         </div>


         <div id="ifbox" style="display: none;" class="form-group text-dark">
          <label for="iframeurl">{{__('IFrame URL')}}: </label> <a data-toggle="modal" data-target="#embdedexamp"></a>
          <input  type="text" class="form-control" name="iframeurl" placeholder="">
        </div>


        <div class="modal fade" id="embdedexamp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="myModalLabel">{{__('Embded URL Examples')}}: </h6>
              </div>
              <div class="modal-body">
                <p style="font-size: 15px;"><b>{{__('Youtube')}}:</b> {{__('Youtube Url Link')}} </p>

                <p style="font-size: 15px;"><b>{{__('GoogleDrive')}}:</b> {{__('Google Drive Link')}} </p>

                <p style="font-size: 15px;"><b>{{__('Openload')}}:</b> {{__('Openload Link')}} </p>

                <p style="font-size: 15px;"><b>{{__('Note')}}:</b> {{__('Do Not Include')}} &lt;iframe&gt; {{__('Tag Before URL')}}</p>
              </div>

            </div>
          </div>
        </div>

     

        {{-- youtube and vimeo url --}}
        <div id="ready_url" style="display: none;" class="form-group text-dark{{ $errors->has('ready_url') ? ' has-error' : '' }}">
         <label id="ready_url_text"></label>
         {!! Form::text('ready_url', null, ['class' => 'form-control','id'=>'apiUrl']) !!}
         <small class="text-danger">{{ $errors->first('ready_url') }}</small>
       </div>


     <div class="form-group text-dark{{ $errors->has('a_language') ? ' has-error' : '' }}">
      {!! Form::label('a_language', __('Audio Languages')) !!}
      <div class="input-group">
        {!! Form::select('a_language[]', $a_lans, null, ['class' => 'form-control select2', 'multiple']) !!}
        <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
      </div>
      <small class="text-danger">{{ $errors->first('a_language') }}</small>
    </div>
    <div class="form-group text-dark{{ $errors->has('maturity_rating') ? ' has-error' : '' }}">
      {!! Form::label('maturity_rating',__('Maturity Rating')) !!}
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
            <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Thumbnail')}}">
            
              <span class="js-fileName">{{__('Choose A File')}}</span>
            </label>
            <p class="info">{{__('Choose Custom Thumbnail')}}</p>
            <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group text-dark{{ $errors->has('poster') ? ' has-error' : '' }} input-file-block">
            {!! Form::label('poster',__('Poster')) !!} 
            {!! Form::file('poster', ['class' => 'input-file', 'id'=>'poster']) !!}
            <label for="poster" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Poster')}}">
             
              <span class="js-fileName">{{__('Choose A File')}}</span>
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
          {!! Form::label('featured', __('Featured')) !!}
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
  <label for="">{{__('Meta Keyword')}}: </label>
  <input name="keyword" value="{{old('keyword')}}" type="text" class="form-control" data-role="tagsinput"/>
</div>

<div class="form-group text-dark">
  <label for="">{{__('Meta Description')}}: </label>
  <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
</div>

<div class="menu-block">
  <h6 class="menu-block-heading">{{__('Please Select Menu')}}</h6>
  @if (isset($menus) && count($menus) > 0)
   <div class="row">
    @foreach ($menus as $menu)
    <div class="col-md-4">
      {{$menu->name}}
    </div>
    <div class="col-md-5 pad-0">
      <div class="inline">
        <input type="checkbox" class="filled-in material-checkbox-input one" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}" >
        <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
      </div>
    </div>
    @endforeach
  </div>
  @endif
  </div><br>


  <input type="text" name="director_id" value="0" hidden="true">
  <input type="text" name="actor_id" value="0" hidden="true">
  <input type="text" name="duration" value="0" hidden="true">
<div class="form-group text-dark{{ $errors->has('rating') ? ' has-error' : '' }}">
    {!! Form::label('rating', __('Ratings')) !!}
    {!! Form::text('rating',  old('rating'), ['class' => 'form-control', ]) !!}
    <small class="text-danger">{{ $errors->first('rating') }}</small>
  </div>
  <div class="form-group text-dark{{ $errors->has('genre_id') ? ' has-error' : '' }}">
    {!! Form::label('genre_id', __('Genre')) !!}
    <div class="input-group">
      {!! Form::select('genre_id[]', $genre_ls, null, ['class' => 'form-control select2', 'multiple']) !!}
      <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddGenreModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
    </div>
    <small class="text-danger">{{ $errors->first('genre_id') }}</small>
  </div>

  <div class="form-group text-dark{{ $errors->has('detail') ? ' has-error' : '' }}">
    {!! Form::label('detail', __('Description')) !!}
    {!! Form::textarea('detail', old('detail'), ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
    <small class="text-danger">{{ $errors->first('detail') }}</small>
  </div>
  
  <div class="form-group text-dark{{ $errors->has('livetvicon') ? ' has-error' : '' }}">
    <div class="row">
      <div class="col-md-6">
        {!! Form::label('livetvicon', __('Live Tv Icon Show')) !!}
      </div>
      <div class="col-md-5 pad-0">
        <label class="switch">
          {!! Form::checkbox('livetvicon', 1, 0, ['class' => 'custom_toggle']) !!}
          <span class="slider round"></span>
        </label>
      </div>
    </div>
    <div class="col-xs-12">
      <small class="text-danger">{{ $errors->first('livetvicon') }}</small>
    </div>
  </div>
</div>
                

              </div>
              
              
                <div class="form-group ">
                  <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
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
  $(document).ready(function() {
   var SITEURL = '{{URL::to('')}}';
 
 
   $.ajax({
     type: "GET",
     url: SITEURL + "/admin/movie/upload_video/converting",
     success: function (data) {
      console.log('Success:',data);
    },
    error: function (data) {
     console.log('Error:', data);
   }
 });
 
 
 });
 </script>
 <script>
   $(document).ready(function(){
    $('#ifbox').show();
    $('#selecturl').change(function(){  
      selecturl = document.getElementById("selecturl").value;
       if (selecturl == 'iframeurl') {
     $('#ifbox').show();
     $('#uploadvideo').hide();
     $('#audio_url').hide();
     $('#ready_url').hide();
     $('#subtitle_section').hide();
 
   }else if (selecturl == 'uploadvideo') {
    $('#uploadvideo').show();
    $('#ready_url').hide();
   
    $('#ifbox').hide();
    $('#subtitle_section').show();
 
  }else if(selecturl=='customurl'){
    $('#ifbox').hide();
    $('#uploadvideo').hide();
    $('#ready_url').show();
   
    $('#subtitle_section').show();
    $('#ready_url_text').text('Enter Custom URL or Vimeo or Youtube URL');
  }
  else if (selecturl == 'youtubeapi') {
    $('#uploadvideo').hide();
    $('#ready_url').show();
 
    $('#ifbox').hide();
    $('#subtitle_section').hide();
   
    $('#ready_url_text').text('Import From Youtube API');
 
  }else if(selecturl=='vimeoapi'){
    $('#ifbox').hide();
    $('#uploadvideo').hide();
    $('#ready_url').show();
 
    $('#subtitle_section').hide();
    $('#ready_url_text').text('Import From Vimeo API');
   
  }
 
 
 
 });
    var i= 1;
    $('#add').click(function(){  
      i++;  
      $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" name="sub_t[]"/></td><td><input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');  
    });
 
    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('#row'+button_id+'').remove();  
    });  
 
 
    $('form').on('submit', function(event){
     $('.loading-block').addClass('active');
   });
    $('#custom_url').hide();
 
    $('#TheCheckBox').on('switchChange.bootstrapSwitch', function (event, state) {
 
     if (state == true) {
 
      $('#ready_url').show();
      $('#custom_url').hide();
 
    } else if (state == false) {
 
     $('#ready_url').hide();
     $('#custom_url').show();
 
   };
 
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
@endsection