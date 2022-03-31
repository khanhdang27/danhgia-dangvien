@php
    use \Modules\Rating\Models\Rating;
@endphp
@extends("Base::backend.master")

@section("content")
    <div id="txl-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">Đảng viên tự xếp loại</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đảng viên tự xếp loại</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route("get.txl.create") }}" class="btn btn-primary"
               data-toggle="modal" data-target="#form-modal" data-title="Thêm đánh giá">
                <i class="fa fa-plus"></i>&nbsp; Đánh giá
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
                                <th>Năm</th>
                                <th>Họ tên</th>
                                <th>Tự xếp loại</th>
                                <th>Chính quyền xếp loại</th>
                                <th>Chi uỷ xếp loại</th>
                                <th>Chi bộ xếp loại</th>
                                <th>Đoàn trường xếp loại</th>
                                <th>Đảng uỷ khoa xếp loại</th>
                                <th>Đảng uỷ trường xếp loại</th>
                                <th class="action"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{ $item->nam}}</td>
                                    <td>{{ $item->dangvien != null ? $item->dangvien->hoten : ''}}</td>
                                    <td>{{ Rating::getXeploai($item->txl)}}</td>
                                    <td>{{ Rating::getXeploai($item->cqxl)}}</td>
                                    <td>{{ Rating::getXeploai($item->cuxl)}}</td>
                                    <td>{{ Rating::getXeploai($item->cbxl)}}</td>
                                    <td>{{ Rating::getXeploai($item->dtxl)}}</td>
                                    <td>{{ Rating::getXeploai($item->duk)}}</td>
                                    <td>{{ Rating::getXeploai($item->dut)}}</td>
                                    <td class="link-action">
                                        @if( (int)$item->nam < $toyear || $item->cqxl != null || $item->cuxl != null || $item->cbxl != null || $item->dtxl != null || $item->dut != null || $item->duk != null)
                                            <a href="#" class="btn btn-disable btn-primary"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-disable btn-danger"><i class="fa fa-trash"></i></a>
                                        @else
                                            <a href="{{ route('get.txl.update',['madv'=>$item->madv,'nam'=>$item->nam])}}"
                                               class="btn btn-primary"
                                               data-toggle="modal" data-target="#form-modal"
                                               data-title="Chỉnh sửa tự xếp loại">
                                                <i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('get.txl.delete',['madv'=>$item->madv,'nam'=>$item->nam]) }}"
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

    {!! getModal(['class' => 'modal-ajax']) !!}
@endsection
@push('js')
    <script>
        $(document).on('click', '.btn-disable', function () {
            $.toast({
                heading: "Thất bại",
                text: 'Bạn không có quyền thao tác dữ liệu này',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 10000,
                stack: 2
            });
        });
    </script>
@endpush
