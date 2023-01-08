@extends('layouts.master')
@section('title',__('All FAQs'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('All FAQs') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('All FAQs') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
            @can('faq.delete')
              <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
            data-target="#bulk_delete"><i class="feather icon-trash mr-2"></i> {{ __('Delete Selected') }} </button>
            @endcan
            @can('faq.create')
              <a href="{{ route('faqs.create') }}" class="float-right btn btn-primary-rgba mr-2"><i
                  class="feather icon-plus mr-2"></i>{{ __('Create FAQs') }}</a>
            @endcan
            </div>

            <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
              <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close"
                              data-dismiss="modal">&times;</button>
                          <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                          <h4 class="modal-heading">{{__('Are You Sure ?')}}</h4>
                          <p>{{__('Do you really want to delete selected item names here? This
                              process
                              cannot be undone.')}}</p>
                      </div>
                      <div class="modal-footer">
                        {!! Form::open(['method' => 'POST', 'action' => 'FaqController@bulk_delete', 'id' => 'bulk_delete_form']) !!}
                              @method('POST')
                              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                              <button type="submit" class="btn btn-danger">{{__('Yes')}}</button>
                          {!! Form::close() !!}
                      </div>
                  </div>
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
                <h5 class="card-title"> {{__("All FAQs")}}</h5>
          </div>
          
          <div class="card-body">
           
              <div class="table-responsive">
                <table id="roletable" class="table table-borderd responsive " style="width: 100%">

                    <thead>
                      <th>
                        <div class="inline">
                          <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                          <label for="checkboxAll" class="material-checkbox">#</label>
                        </div>
                      </th>
                      <th>{{__('Faq Question')}}</th>
                      <th>{{__('Faq Answer')}}</th>
                      <th>{{__('Created At')}}</th>
                      <th>{{__('Updated At')}}</th>
                      <th>{{__('Actions')}}</th>
                    </thead>
                
                    <tbody>
                      @if ($faqs)
          <tbody id="sortable">
            @php ($no = 1)
            @foreach ($faqs as $faq)
              <tr class="sortable row1" data-id="{{ $faq->id }}" >
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="{{$faq->id}}" id="checkbox{{$faq->id}}">
                    <label for="checkbox{{$faq->id}}" class="material-checkbox"></label>
                  </div>
                  {{$no}}
                  @php ($no++)
                </td>
                <td>{!! $faq->question !!}</td>
                <td>{!! $faq->answer !!}</td>
                <td>{{date('F d, Y',strtotime($faq->created_at))}}</td>
                <td>{{date('F d, Y',strtotime($faq->updated_at))}}</td>
                
                <td>
                  <div class="admin-table-action-block">
                    @can('faq.edit')
                    <a href="{{route('faqs.edit', $faq->id)}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}" class="btn btn-round btn-outline-primary"> <i class="fa fa-edit"></i></a>
                    @endcan
                    @can('faq.delete')
                    <button type="button" class="btn btn-round btn-outline-danger" data-toggle="modal" data-target="#delete{{$faq->id}}"><i class="fa fa-trash"></i> </button>
                    @endcan
                  </div>
                </td>

              </tr>
              <div id="delete{{$faq->id}}" class="delete-modal modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"
                                data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                        </div>
                        <div class="modal-body text-center">
                            <h4 class="modal-heading">{{__('Are You Sure ?')}}</h4>
                            <p>{{__('Do you really want to delete selected item names here? This
                                process
                                cannot be undone.')}}</p>
                        </div>
                        <div class="modal-footer">
                          {!! Form::open(['method' => 'DELETE', 'action' => ['FaqController@destroy', $faq->id]]) !!}
                                @method('DELETE')
                                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                                <button type="submit" class="btn btn-danger">{{__('Yes')}}</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
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

<script>
  
  var sorturl = {!!json_encode(route('faqs_reposition'))!!};

  </script>

  <script>
  $(function(){
    // jQuery.noConflict();
    $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
        $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
        $('.material-checkbox-input').attr('checked', false);
        }
    });
    $( "#full_detail_table" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
        sendOrderToServer();
      }
    });
  });


  

  function sendOrderToServer() {
  var order = [];
  var token = $('meta[name="csrf-token"]').attr('content');
  $('tr.row1').each(function(index,element) {
      order.push({
      id: $(this).attr('data-id'),
      position: index+1
      });
  });
  $.ajax({
      type: "POST", 
      dataType: "json", 
      url: sorturl,
      data: {
          order: order,
      _token: token
      },
      success: function(response) {
          if (response.status == "success") {
          console.log(response);
          } else {
          console.log(response);
          }
      }
  });
  }
      
  </script>
@endsection