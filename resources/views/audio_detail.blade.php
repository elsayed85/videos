@extends('layouts.theme')


@section('custom-meta')

@endsection

@section('title',"$audio->title")


@section('main-wrapper')
@php
$auth = Illuminate\Support\Facades\Auth::user();
$subscribed = null;
$withlogin= $configs->withlogin;
$catlog = $configs->catlog;


@endphp
<!-- main wrapper -->
<section class="main-wrapper main-wrapper-single-movie-prime">
  <div class="background-main-poster-overlay">

    <!-- Modal -->


    @if(isset($audio))
    @if($audio->poster != null)
    <div class="background-main-poster col-md-offset-4 col-md-6"
      style="background-image: url('{{asset('images/audio/posters/'.$audio->poster)}}');">
      @else
      <div class="background-main-poster col-md-offset-4 col-md-6"
        style="background-image: url('{{asset('images/default-poster.jpg')}}');">
        @endif
        @endif
      </div>
      <div class="overlay-bg gredient-overlay-right"></div>
      <div class="overlay-bg"></div>
    </div>
    <div id="full-movie-dtl-main-block" class="full-movie-dtl-main-block">
      <div class="container-fluid">
        @if(isset($audio))

        <div class="row">
          <div class="col-md-8 small-screen-block">
            <div class="full-movie-dtl-block">
              <h2 class="section-heading">{{$audio->title}}</h2></br>
              <div class="">

                <div id="wishlistelement" class="screen-play-btn-block">

                  @if(Auth::check() && getSubscription()->getData()->subscribed == true)


                  @if(Auth::check() && Auth::user()->is_admin == '1')
                  <a href="{{route('watchaudio',$audio->id)}}"
                    class="btn btn-play play-btn-icon{{ $audio['id'] }}"><span class="play-btn-icon"><i
                        class="fa fa-play"></i></span> <span class="play-text">{{__('Play Now')}}</span>
                  </a>
                  @else
                  <a href="{{url('/watch/audio/'.$audio->id)}}"
                    class=" btn btn-play play-btn-icon{{ $audio['id'] }}"><span class="play-btn-icon "><i
                        class="fa fa-play"><span class="play-text"> {{__('Play Now')}}</span></a>
                  @endif

                  @endif

                </div>

              </div>

              <p>
                {{$audio->detail}}
              </p>
            </div>
          </div>
          <div class="col-md-4 small-screen-block">
            <div class="poster-thumbnail-block">
              @if($audio->thumbnail != null || $audio->thumbnail != '')
              <img src="{{asset('images/audio/thumbnails/'.$audio->thumbnail)}}" class="img-responsive"
                alt="genre-image">
              @else
              <img src="{{asset('images/default-thumbnail.jpg')}}" class="img-responsive" alt="genre-image">
              @endif
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>


    @endsection


    @section('custom-script')


    <script>
      $(document).ready(function () {

        $(".group1").colorbox({
          rel: 'group1'
        });
        $(".group2").colorbox({
          rel: 'group2',
          transition: "fade"
        });
        $(".group3").colorbox({
          rel: 'group3',
          transition: "none",
          width: "75%",
          height: "75%"
        });
        $(".group4").colorbox({
          rel: 'group4',
          slideshow: true
        });
        $(".ajax").colorbox();
        $(".youtube").colorbox({
          iframe: true,
          innerWidth: 640,
          innerHeight: 390
        });
        $(".vimeo").colorbox({
          iframe: true,
          innerWidth: 500,
          innerHeight: 409
        });
        $(".iframe").colorbox({
          iframe: true,
          width: "100%",
          height: "100%"
        });
        $(".inline").colorbox({
          inline: true,
          width: "50%"
        });
        $(".callbacks").colorbox({
          onOpen: function () {
            alert('onOpen: colorbox is about to open');
          },
          onLoad: function () {
            alert('onLoad: colorbox has started to load the targeted content');
          },
          onComplete: function () {
            alert('onComplete: colorbox has displayed the loaded content');
          },
          onCleanup: function () {
            alert('onCleanup: colorbox has begun the close process');
          },
          onClosed: function () {
            alert('onClosed: colorbox has completely closed');
          }
        });

        $('.non-retina').colorbox({
          rel: 'group5',
          transition: 'none'
        })
        $('.retina').colorbox({
          rel: 'group5',
          transition: 'none',
          retinaImage: true,
          retinaUrl: true
        });


        $("#click").click(function () {
          $('#click').css({
            "background-color": "#f00",
            "color": "#fff",
            "cursor": "inherit"
          }).text("Open this window again and this message will still be here.");
          return false;
        });
      });
    </script>

    @endsection