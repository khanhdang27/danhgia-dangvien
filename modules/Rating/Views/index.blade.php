@extends("Base::backend.master")

@section("content")
    <div id="rating-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">Xếp loại</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Xếp loại</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route("get.rating.create") }}" class="btn btn-primary"
               data-toggle="modal" data-target="#form-modal" data-title="Thêm xếp loại">
                <i class="fa fa-plus"></i>&nbsp; Thêm mới
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
                                <th>Mã xếp loại</th>
                                <th>Tên xếp loại</th>
                                <th class="action" style="width: 10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                            @foreach($data as $item)
{{--                                {{dump($item)}}--}}
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $item->maxeploai }}</td>
                                    <td>{{ $item->tenxeploai }}</td>
                                    <td class="link-action">
                                        <a href="{{ route('get.rating.update',$item->maxeploai) }}"
                                           class="btn btn-primary"
                                           data-toggle="modal" data-target="#form-modal"
                                           data-title="{{ trans('Sửa xếp loại') }}">
                                            <i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('get.rating.delete',$item->maxeploai) }}"
                                           class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
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

    {!! getModal(['class' => 'modal-ajax']) !!}
@endsection
