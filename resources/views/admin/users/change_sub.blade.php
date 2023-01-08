@extends('layouts.master')
@section('title',__('Change Subscription')." ". $user->name)
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Subscription Plan') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="widgetbar">
                <a href="{{ route('users.index') }}" class="btn btn-primary-rgba mr-2"><i
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
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title">{{__('Change Or Add Subscription')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::open(['method' => 'POST', 'action' => 'UsersController@change_subscription', 'files' => true]) !!}
          
            <div class="col-md-6">
                <h5>{{__('User Name')}}: {{$user->name}}</h5>
          @php
               $planname='not exist';
              if (isset($plans)) {
                  if (isset($last_payment->plan->name) && !is_null($last_payment)){
                     $planname=$last_payment->plan->name;
                     $planid = $last_payment->plan->id;
                   }else{
                    if (isset($user_stripe_plan) && !is_null($user_stripe_plan)) {
                     $planname=$user_stripe_plan->name;
                     $planid = $user_stripe_plan->id;
                    }
                   }
               
              }else{
                  $planname='not exist';
              }

              @endphp
             
              <h5>{{__('Last Subscription Plan')}}: {{$planname}}</h5>
            </div>
            <input type="hidden" name="user_stripe_plan_id" value="{{$user_stripe_plan != null ? $user_stripe_plan->id : null}}">
            <input type="hidden" name="last_payment_id" value="{{$last_payment != null ? $last_payment->id : null}}">
            <input type="hidden" name="user_id" value="{{$user->id}}">


            @foreach ($user->paypal_subscriptions as $pu)
              @php
               $test=0;
               $status =App\Package::select('status')->where('id',$pu->package_id)->get();
                     foreach ($status as $key => $value) {
                      $test=$value->status;
                     }
              @endphp

              @if($test == 1)
                <div class="alert alert-danger">
                  {{__('User Plan Not Exist')}}
                </div>
              @endif
            @endforeach

              <div class="col-md-6">
                <div class="form-group">
                <select class="form-control select2" name="plan_id">
                  @foreach ($plans as $plan)
                  @if($plan->delete_status == 1)
                  <option value="{{ $plan->id }}" {{isset($planid) && $planid == $plan->id ? 'Selected' : ''}}>{{ $plan->name }}</option>
                  @endif
                @endforeach
                </select>
              </div>
              </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success-rgba"><i class="fa fa-check-circle"></i>
                    {{ __('Change Subscription') }}</button>
                </div>
                {!! Form::close() !!}
                <div class="clear-both"></div>
              </div>

      </div>
    </div>
  </div>
</div>
</div>

@endsection 