@extends('admin.layout.master')
@section('content')
    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">{{ __('pages.add_order') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">{{ __('pages.orders') }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="{{ route('order.upsert') }}" class="btn btn-primary float-end mt-2">{{ __('pages.add_order') }}</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form class="form" action="{{ route('order.filter') }}" method="get">
                                        <div class="form-group d-flex align-items-center">
                                            <input type="search" placeholder="{{ __('pages.search_by_name') }}" name="name" class="form-control d-block search_input w-25" value="{{request()->input('name')}}">
                                            <button class="btn btn-primary mx-2 btn-search">{{ __('pages.search') }}</button>
                                        </div>
                                    </form>
                                    <table  class="table table-hover table-center mb-0"  filter="{{ route('order.filter') }}">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ __('pages.name') }}</th>
                                                <th class="text-end">{{ __('pages.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                        @foreach($orders as $order)
                                            <tr class="record">
                                                <td>{{ $order->id }}#</td>
                                                <td>{{ $order->product->name }}</td>
                                                <td  class="text-end">
                                                    <div class="actions">
                                                        <a href="{{ route('order.upsert',['order' => $order->id]) }}" class="btn btn-sm bg-success-light" >
                                                            <i class="fe fe-pencil"></i> {{ __('pages.edit') }}
                                                        </a>
                                                        <a   class="btn btn-sm bg-danger-light btn_delete" route="{{ route('order.delete',['order' => $order->id]) }}">
                                                            <i class="fe fe-trash"></i> {{ __('pages.delete') }}
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                        @if(!count($orders))
                                        <td colspan="5">
                                            <p class="mb-0 text-center">{{ __('pages.no_data_to_display') }}</p>
                                        </td>
                                        @endif  
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation example" class="mt-2">
                                        <ul class="pagination">
                                            @for($i = 1; $i <= $orders->lastPage(); $i++)
                                                <li class="page-item"><a class="page-link" href="?page={{$i}}">{{$i}}</a></li>
                                            @endfor
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>			
                </div>
            </div>	
        </div>
        <!-- /Page Wrapper -->
    </div>
@endsection

@section('js')

@endsection