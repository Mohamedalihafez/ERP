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
                        <h3 class="page-title">{{ __('pages.users') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">{{ __('pages.users') }}</li>
                        </ul>
                    </div>
                    <div class="col-sm-5 col">
                        <a href="{{ route('user.upsert') }}" class="btn btn-primary float-end mt-2">{{ __('pages.add_user') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"></h5>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                                    <form class="form" action="{{ route('user.filter') }}" method="get">
                                        <div class="form-group d-flex align-items-center">
                                            <input type="search" placeholder="{{ __('pages.search_by_name') }}" name="name" class="form-control d-block search_input w-25" value="{{request()->input('name')}}">
                                            <button class="btn btn-primary mx-2 btn-search">{{ __('pages.search') }}</button>
                                        </div>
                                    </form>
                                    <table id="example" class=" display  table table-hover table-center mb-0 accordion" filter="{{ route('user.filter') }}">
                                        <thead>
                                            <tr>
                                                <th>::</th>
                                                <th>{{ __('pages.name') }}</th>
                                                <th>{{ __('pages.mobile') }}</th>
                                                <th>{{ __('pages.email') }}</th>
                                                <th class="text-end">{{ __('pages.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}#</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                            @foreach($password_tokens as $token)
                                                                @if($token->phone == $user->phone )
                                                                    <a class="copyval btn btn-sm btn-primary" value="{{ route('user.reset',['token' =>  $token->token ,'phone' => $user->phone ]) }}">
                                                                        <i class="fa fa-files-o" aria-hidden="true"></i>
                                                                    </a>
                                                                @endif
                                                            @endforeach 
                                                            <a href="{{ route('user.report',['user' => $user->email]) }}" class="btn btn-sm bg-primary-light">
                                                                <i class="fe fe-send"></i> {{ __('pages.send_data') }}
                                                            </a>
                                                            <a href="{{ route('user.upsert',['user' => $user->id]) }}" class="btn btn-sm bg-success-light">
                                                                <i class="fe fe-pencil"></i> {{ __('pages.edit') }}
                                                            </a>
                                                            <a data-bs-toggle="modal" href="#" class="btn btn-sm bg-danger-light btn_delete" route="{{ route('user.delete',['user' => $user->id])}}">
                                                                <i class="fe fe-trash"></i> {{ __('pages.delete') }}
                                                            </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @if(!count($users))
                                        <td colspan="4">
                                            <p class="mb-0 text-center mt-3">{{ __('pages.no_data_to_display') }}</p>
                                        </td>
                                    @endif  

                                    <nav aria-label="Page navigation example" class="mt-2">
                                        <ul class="pagination">
                                            @for($i = 1; $i <= $users->lastPage(); $i++)
                                                <li class="page-item">
                                                    <a class="page-link" href="?page={{$i}}">{{$i}}</a>
                                                </li>
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
@endsection

@section('js')
<script>
    $('.copyval').on('click',function(e){
        let x=$(this).attr('value');
        e.preventDefault();

        document.addEventListener('copy', function(e) {
            e.clipboardData.setData('text/plain', x);
            e.preventDefault();
        }, true);
        document.execCommand('copy');
    })
    
    
    $(".user_status").on("change", function(){   
        if ($(this).is(":checked"))
        {
            $(this).val(1);
        }   
        else {
            $(this).val(0);
        }

        $.ajax({
            headers: 
            {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            url: '{{ route("user.status") }}',
            method: 'post',
            data: {id: $(this).attr("user_id"), suspend_doctor: $(this).val()},
            success: function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: 'success',
                    title: '{{ __("pages.sucessdata") }}'
                });
            }
        });
    });
    

</script>
@endsection