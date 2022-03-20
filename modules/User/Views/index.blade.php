@extends("Base::backend.master")
@php
    $prompt = ['' => trans('All')]
@endphp
@section("content")
    <div class="user-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">Người dùng</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Người dùng</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route("get.user.create") }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp;Thêm mới
            </a>
        </div>

        <div class="listing">
            <div class="card">
                <div class="card-body">
                    <div class="sumary">
                        {!! summaryListing($data) !!}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Tên') }}</th>
                                <th>{{ trans('Số điện thoại') }}</th>
                                <th>{{ trans('Email') }}</th>
                                <th>{{ trans('Chức vụ') }}</th>
                                <th>{{ trans('Trạng thái') }}</th>
                                <th>{{ trans('Ngày tạo') }}</th>
                                <th class="action"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{ trans($item->name) }}</td>
                                    <td>{{ trans($item->phone) }}</td>
                                    <td>{{ trans($item->email) }}</td>
                                    <td>{{ $roles[$item->role_id] ?? 'N/A' }}</td>
                                    <td>{{ $statuses[$item->status] ?? null }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s')}}</td>
                                    <td class="link-action">
                                        @if(($item->name == \Modules\Role\Models\Role::ADMINISTRATOR && auth('admin')->user()->name == \Modules\Role\Models\Role::ADMINISTRATOR)
                                            || $item->name != \Modules\Role\Models\Role::ADMINISTRATOR)
                                            <a href="{{ route('get.user.update',$item->id) }}"
                                               class="btn btn-primary">
                                                <i class="fa fa-pencil"></i></a>
                                        @endif
                                        @if((auth('admin')->user()->id !== $item->id
                                            && ($item->role->name ?? null) !== \Modules\Role\Models\Role::ADMINISTRATOR)
                                            || auth('admin')->user()->name == \Modules\Role\Models\Role::ADMINISTRATOR)
                                            <a href="{{ route('get.user.delete',$item->id) }}"
                                               class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-5 pagination-style">
                            {{ $data->withQueryString()->render('vendor/pagination/default') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
