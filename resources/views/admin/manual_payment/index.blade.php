@extends('layouts.master')
@section('title',__('All Manual Payment Transacation'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('All Manual Payment Transacation') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('All Manual Payment Transacation') }}</li>
                    </ol>
                </div>
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
                <h5 class="card-title"> {{__("All Manual Payment Transacation")}}</h5>
          </div>
          
          <div class="card-body">
           
              <div class="table-responsive">
                <table id="roletable" class="table table-borderd responsive " style="width: 100%">

                    <thead>
                      <th>{{__('#')}}</th>
                      <th>{{__('User Name')}}</th>
                      <th>{{__('Package')}}</th>
                      <th>{{__('Amount')}}</th>
                      <th>{{__('Subscription From')}}</th>
                      <th>{{__('Subscription To')}}</th>
                      <th>{{__('Status')}}</th>
                      <th>{{__('Actions')}}</th>
                    </thead>
                
                    @if($manual_payment)
                    <tbody>
                      @foreach($manual_payment as $key=>$payment)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$payment->user->name}}</td>
                          <td>{{$payment->plan->name}}</td>
                          <td>{{$payment->plan->amount}}</td>
                          <td>{{date('F j, Y  g:i:a',strtotime($payment->subscription_from))}}</td>
                          <td>{{date('F j, Y  g:i:a',strtotime($payment->subscription_to))}}</td>
                          <td>
                            @if($payment->status == 1)
                              <a href="{{url('manualpayment',$payment->id)}}" class='badge badge-pill badge-success'>{{__('Active')}}</a>
                            @else
                              <a href="{{url('manualpayment',$payment->id)}}" class='badge badge-pill badge-danger'>{{__('Deactive')}}</a> 
                            @endif
                          </td>
                          <td>
                            <a href="{{url('/images/recipt/'.$payment->file)}}" data-toggle="tooltip" data-original-title="Download file" class="btn btn-round btn-outline-success" download><i class="fa fa-cloud-download"></i></a></td>
                        </tr>
                      @endforeach
                     
                    </tbody>
                  @endif 
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection 
@section('script')
<script>
  $(function(){
    $('#checkboxAll').on('change', function(){
      if($(this).prop("checked") == true){
        $('.material-checkbox-input').attr('checked', true);
      }
      else if($(this).prop("checked") == false){
        $('.material-checkbox-input').attr('checked', false);
      }
    });
  });
</script>
@endsection