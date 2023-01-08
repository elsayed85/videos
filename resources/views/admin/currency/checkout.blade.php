@extends('layouts.master')
@section('title','Currency')
@section('breadcum')
<div class="breadcrumbbar">
  <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
          <h4 class="page-title">{{ __('Currency') }}</h4>
          <div class="breadcrumb-list">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Currency') }}</li>
              </ol>
          </div>
      </div>
      <div class="col-md-4 col-lg-4">
        <a href="{{url('admin/currency')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
      </div>
  </div>          
</div>
@endsection
@section('maincontent')
<div class="contentbar">
  	<div class="row">
    	<div class="col-lg-12">
      		<div class="card m-b-30">
        		<div class="card-header">
          			<h5 class="box-title">{{__('Currency')}}</h5>
                        <form action="{{route('checkout.payment.method')}}" method="POST">
                            @csrf
                            <input type="hidden" name="currecny_id" value="{{$currency->id}}">
                                <div class="payment-gateway-block">
                                    <div class="row mx-2 my-4">
                                        <div class="form-group text-dark col-md-3">
                                            <label for="">{{__('Currency')}}</label>
                                            <h5>{{$currency->code}}</h5>
                                        </div>

                                        <div class="form-group text-dark col-md-9">
                                            <label for="">{{__('Payment Method')}}</label>
                                                <select name="payment_method[]" id="" class="select2" multiple>
                                                    @foreach($payments as $payment)
                                                        <option value="{{$payment}}" 
                                                            @if(isset($currency->payment_method) && $currency->payment_method != NULL)
                                                                {{ in_array($payment,$currency_payments) ? "selected" : "" }}
                                                            @endif >
                                                            {{ ucfirst($payment) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-12 form-group">
                                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __('Update') }}</button>
                                </div>
                        </form>
                

  			        </div>
		        </div>
	        </div>

@endsection 
@section('script')

@endsection