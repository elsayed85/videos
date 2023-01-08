@extends('layouts.theme')
@section('title',__('Manage Profile Name'))
@section('main-wrapper')

	<div class="container">
		<div class="manage-profile">
			<br>
			<div class="text-center">
				<h4>{{__('Hey')}} {{ Auth::user()->name }} {{__('Edit your Personal Profile Name')}} {{ config('app.name') }}:</h4>
			</div>
			@if(!isset($result))
			 	<p>{{__('no profile available')}}</p>
			@endif
			<div align="center"><p id="msg"></p></div>
				<form action="{{ route('mus.update') }}" method="POST">
					<div class="row">
						<div class="col-md-6 col-md-offset-3"> 
							{{ csrf_field() }}			
							@if(isset($result->screen1))
								<div class="col-md-3 col-sm-4 col-xs-6 ">
									<div class="btm-20 manage-profile-block">
										<img class="imageprofile" src="{{ Avatar::create($result->screen1)->toBase64() }}" alt="">
                                        <br><br>
										<input class="screen2 form-control" name="screen1" type="text" value="{{ $result->screen1 }}" >
										
									</div>
								</div>
							@endif
							@if(isset($result->screen2))
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="btm-20 manage-profile-block">
										<img class="imageprofile" src="{{ Avatar::create($result->screen2)->toBase64() }}" alt="">
                                        <br><br>
										<input class="screen2 form-control" name="screen2" type="text" value="{{ $result->screen2 }}" >
											
									</div>
								</div>
							@endif
							@if(isset($result->screen3))
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="btm-20 manage-profile-block">
										<img class="imageprofile" src="{{ Avatar::create($result->screen3)->toBase64() }}" alt="">
                                        <br><br>
										<input class="screen2 form-control" name="screen3" type="text" value="{{ $result->screen3 }}" >
										
									</div>
								</div>
							@endif
							@if(isset($result->screen4))
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="btm-20 manage-profile-block">
										<img class="imageprofile" src="{{ Avatar::create($result->screen4)->toBase64() }}" alt="">
									<br><br>
										<input class="screen2 form-control" name="screen4" type="text" value="{{ $result->screen4 }}" >
										
									</div>
								</div>
							@endif		
						</div>
					</div>
                    <div class="btn-group">
                        <input class="btn btn-success" type="submit" value="{{__('update')}}">
                      </div>
				</form>
				
			</div>
		</div>
	</div>

@endsection

@section('custom-script')
	<script>
		function changescreen(screen,count){

			$.ajax({
				type : 'GET',
				data : {screen : screen, count : count},
				url  : '{{ url('/changescreen/'.Auth::user()->id) }}',
				success : function(data){
					console.log(baseurl);
					$('#msg').html(data);
					setTimeout(function(){ 
						$(location).attr('href',baseurl)
					}, 700);


				}
			});
		}
	</script>
@endsection