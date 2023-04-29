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
                                <h3 class="page-title">{{ __('pages.add_order') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:(0);">{{ __('pages.orders') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('pages.add_order') }}</li>
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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('order.modify') }}" class="ajax-form" redirect="{{ route('order') }}" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                                    @csrf
                                        <div class="service-fields mb-3">
                                            <div class="row">
                                          
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label class="mb-2">{{ __('pages.products') }}</label>
                                                        <select class="form-control js-example-basic product_id" name="product_id"   id="product_id">
                                                            <option  selected disabled value=""> -- {{__('pages.products')}} --</option>
                                                                @foreach($products as $product)
                                                                    <option class="form-control" value="{{$product->id}}" @isset($order->id)
                                                                        @if($order->product_id == $product->id) selected @endif
                                                                    @endisset> {{ $product->name }}</option>
                                                                @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <label class="mb-2">{{__('pages.price')}}</label>
                                                    <select disabled  class="form-control js-example-basic-multiple" id="price1">
                                                    @isset($order->id)
                                                         <option value="">--  @isset($order->id){{$order->price}}@endisset --</option>
                                                    @endisset
                                                            <option value="">-- {{__('pages.price')}} --</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label class="mb-2">{{ __('pages.quantity') }}</label>
                                                            <input  id="quantity" class="form-control" type="number" name="quantity" placeholder="{{ __('pages.quantity') }}" value="@isset($order->id){{$order->quantity}}@endisset">
                                                            <p class="error error_quantity"></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label class="mb-2">{{ __('pages.price_all') }}</label>
                                                            <input  class="form-control" id="total" type="text" name="price" placeholder="{{ __('pages.price_all') }}" value="@isset($order->id){{$order->price}}@endisset">
                                                            <p class="error error_price"></p>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">

                                        @isset($order->id)
                                            <input type="hidden" value="{{$order->id}}" name="id">
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

@section('js')
<script>
    
$(document).ready(function () {
        $('#product_id').on('change', function () {
            var product_id = this.value;
            $("#price1").html('');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                url: '{{ route("order.price") }}',
                method: 'post',
                data: {product_id: product_id},
                success: function (results) {
                    $('#price1').html('');
                    results.forEach((result, index) => {
                        $("#price1").append('<option value="' + result['price'] + '">' + result['price'] + '</option>');
                    });
                },
            });
        });
        $('#quantity').on('keyup',function(){
         var tot = $('#price1').val() * this.value;
            $total = $('#total').val(tot); 
        });
    });
    

</script>
@endsection