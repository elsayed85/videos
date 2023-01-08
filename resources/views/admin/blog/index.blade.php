@extends('layouts.master')
@section('title',__('All Blogs'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('All Blogs') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Blogs') }}</li>
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
      <div class="card-header movie-create-heading">
        <div class="row">
          <div class="col-lg-4 col-4 col-md-4">
            <h5 class="card-title">{{ __('All Blogs') }}</h5>
          </div>
          <div class="col-lg-8 col-8 col-md-8">
            @can('movies.create')
              <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
              data-target="#bulk_delete"><i class="feather icon-trash mr-2"></i> {{ __('Delete Selected') }} </button>
            @endcan
            @can('movies.delete')
            <a href="{{route('blog.create')}}" class="float-right btn btn-primary-rgba mr-2"><i
                class="feather icon-plus mr-2"></i>{{ __('Add Blog') }} </a>
            @endcan
          </div>
        </div>
      </div>
    </div>

            <div class="card-body">
                <section id="movies" class="movies-main-block">
                    <div class="row">
                      @if(isset($blogs) && $blogs->count() > 0)
                      @foreach($blogs as $item) 
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <input class="form-check-card-input visibility-visible" form="bulk_delete_form" type="checkbox" value="39" id="checkbox39" name="checked[]">         
                            <div class="card">
                              @if($item->image != NULL)
                                <img src="{{url('/images/blog/' . $item->image)}}" class="card-img-top" alt="...">
                              @else
                              <img src="{{Avatar::create($item->title)->toBase64()}}" class="card-img-top" alt="...">
                              @endif
                                <div class="overlay-bg"></div>
                                <div class="dropdown card-dropdown">
                                    <a class="btn btn-round btn-outline-primary pull-right dropdown-toggle" type="button" id="dropdownMenuButton-39" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></a>
                                    <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton-39">
                                      @can('blog.view')
                                        <a class="dropdown-item" href="{{url('account/blog/', $item->slug)}}" target="__blank"><i class="feather icon-monitor mr-2"></i> {{__('Page Preview')}}</a>     
                                      @endcan

                                      @can('blog.edit')                                   
                                        <a class="dropdown-item" href="{{ route('blog.edit', $item->id)}}"><i class="feather icon-edit mr-2"></i> {{__('Edit')}}</a>    
                                      @endcan
                
                                      @can('blog.delete')                                  
                                        <a type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal39"><i class="feather icon-trash mr-2"></i> {{__('Delete')}}</a>
                                      @endcan
                                    </div>
                                </div>
                                <div id="deleteModal39" class="delete-modal modal fade card-dropdown-modal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <div class="delete-icon"></div>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h4 class="modal-heading">Are You Sure ?</h4>
                                                <p>Do you really want to delete these records? This process cannot be undone.</p>
                                            </div>
                                            <div class="modal-footer">
                                              <form method="POST" action="{{route("blog.destroy", $item->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                    <input type="hidden" name="_method" value="DELETE">                         
                                                    <input type="hidden" name="_token" value="PJpGpor9HW1djPWhvrxuHo7Y48gaHbQtNSlcy9KM">                            
                                                    <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body card-header">
                                  <h5 class="card-title">{{$item->title}}</h5><br>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="card-block">
                                        <h6 class="card-body-sub-heading">{{__('Description')}}</h6>
                                        <p>{!! isset($item->detail) && $item->detail != NULL ? str_limit($item->detail,100) : '-' !!}</p>
                                    </div>
                                    <div class="card-block row">
                                        <div class="col-xs-6 col-md-6 col-md-6">
                                            <h6 class="card-body-sub-heading">{{__('Status')}}</h6>
                                            <p class="status-btn">
                                              @if($item->is_active == 1)
                                                <p>{{__('Active')}}</p>
                                              @else
                                                <p>{{__('De Active')}}</p>
                                              @endif
                                            </p>
                                       </div>
                                    </div>              
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12 pagination-block text-center">
                          {!! $blogs->appends(request()->query())->links() !!}
                        </div>
                      @else
                        <div class="col-md-12 text-center">
                          <h5>{{__("Let's start :)")}}</h5>
                          <small>{{__('Get Started by creating a actor! All of your actors will be displayed on this page.')}}<a href=""></a></small>
                        </div>
                      @endif
                    </div>
                </section>
            </div>
        </div>
</div>
</div>
</div>
@endsection 
@section('script')
   

@endsection