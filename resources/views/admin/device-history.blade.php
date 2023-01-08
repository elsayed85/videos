@extends('layouts.master')
@section('title',__('Device History'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('Device History') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Device History') }}</li>
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
        <div class="card-body">
          <div class="table-responsive">
            <table id="devicetable" class="table table-borderd">
              <thead>
                <th> {{ __('#') }}</th>
                <th>{{ __("User name")}}</th>
                <th>{{ __("IP Address") }}</th>
                <th>{{ __("Platform") }}</th>
                <th>{{ __("Browser") }}</th>
                <th>{{ __("Logged in at") }}</th>
                <th>{{ __("Logged out at") }}</th>
              </thead>
              <tbody>
              
              </tbody>
            </table>                  
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
    jQuery.noConflict();
    var table;
    if($.fn.dataTable.isDataTable('#devicetable')){
      var table = $('#devicetable').DataTable();
    }else{
      table = $('#devicetable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        scrollCollapse: true,
      
        
        ajax: "{{ route('device_history') }}",
        columns: [
              {
                  data: 'DT_RowIndex',
                  name: 'DT_RowIndex',
                  searchable: false,
                  orderable: false
              },
              {
                  data: 'username',
                  name: 'users.name'
              },
              {
                  data: 'ip_address',
                  name: 'auth_log.ip_address'
              },
              {
                  data: 'platform',
                  name: 'auth_log.platform'
              },
              {
                  data: 'browser',
                  name: 'auth_log.browser'
              },
              {
                  data: 'login_at',
                  name: 'auth_log.login_at'
              },
              {
                  data: 'logout_at',
                  name: 'auth_log.logout_at'
              }
        ],
        dom : 'lBfrtip',
        buttons : [
          'csv','excel','pdf','print'
        ],
        order : [[0,'desc']]
      });
    }
      
    
  });
</script>
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