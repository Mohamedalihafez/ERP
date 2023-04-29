@extends('admin.layout.master')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="content container-fluid">		
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">{{ __('pages.add_product') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:(0);">{{ __('pages.products') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('pages.add_product') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->        
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body custom-edit-service">                 
                                    <!-- Add Blog -->
                                    <form method="post" enctype="multipart/form-data" action="{{ route('product.modify') }}" class="ajax-form" redirect="{{ route('product') }}" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                                    @csrf
                                        <div class="service-fields mb-3">
                                            <div class="row">
                                          
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label class="mb-2">{{ __('pages.name') }}</label>
                                                            <input class="form-control" type="text" name="name" placeholder="{{ __('pages.name') }}" value="@isset($product->id){{$product->name}}@endisset">
                                                            <p class="error error_name"></p>
                                                        <p class="error error_day"></p>

                                                    </div>
                                                </div>
                                
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label class="mb-2">{{ __('pages.barcode') }}</label>
                                                            <input class="form-control" type="text" name="barcode" placeholder="{{ __('pages.barcode') }}" value="@isset($product->id){{$product->barcode}}@endisset">
                                                            <p class="error error_barcode"></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label class="mb-2">{{ __('pages.price') }}</label>
                                                            <input class="form-control" type="text" name="price" placeholder="{{ __('pages.price') }}" value="@isset($product->id){{$product->price}}@endisset">
                                                            <p class="error error_price"></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label class="mb-2">{{ __('pages.description') }}</label>
                                                        <textarea name="description" class="form-control"id="description"placeholder="{{ __('pages.description') }}">@isset($product->id){{$product->description}}@endisset</textarea>
                                                            <p class="error error_description"></p>

                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>

                                        @isset($product->id)
                                            <input type="hidden" value="{{$product->id}}" name="id">
                                        @endisset
                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn" type="submit" name="form_submit" placeholder="submit">{{ __('pages.submit') }}</button>
                                        </div>
                                    </form>
                                    <!-- /Add Blog -->
                                </div>
                            </div>
                        </div>			
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection