@extends("Base::backend.master")

@section("content")
    <div id="chuadg-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">Đảng viên chưa kiểm điểm đánh giá</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đảng viên chưa kiểm điểm đánh giá</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route('get.chuadg.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp; Thêm mới
            </a>
        </div>
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
                            <th width="50px">#</th>
                            <th>Năm</th>
                            <th>Mã đảng viên</th>
                            <th>Họ tên</th>
                            <th>Chi bộ</th>
                            <th>Ngày kết nạp</th>
                            <th class="text-center">Chưa kiểm điểm</th>
                            <th class="text-center">Chưa đánh giá</th>
                            <th class="text-center">Lý do</th>
                            <th style="width: 10%" class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $item->nam }}</td>
                                <td>{{ $item->madv }}</td>
                                <td>{{ $item->dangvien != null ? $item->dangvien->hoten : '' }}</td>
                                <td>{{ $item->dangvien != null ? ($item->dangvien->chibo != null ? $item->dangvien->chibo->tencb : '') : '' }}</td>
                                <td>{{ $item->dangvien != null ? \Carbon\Carbon::parse($item->dangvien->ngaychinhthuc)->format('d-m-Y') : '' }}</td>
                                <td class="text-center">{{ $item->chuakd ? '✓' : '' }}</td>
                                <td class="text-center">{{ $item->chuadg ? '✓' : ''}}</td>
                                <td>{{ $item->lydo }}</td>
                                <td class="text-center">
                                    <a href="{{ route('get.chuadg.update',['madv'=>$item->madv,'nam'=>$item->nam]) }}"
                                       class="btn btn-primary">
                                        <i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('get.chuadg.delete',['madv'=>$item->madv,'nam'=>$item->nam]) }}"
                                       class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 pagination-style">
                        {{ $data->withQueryString()->render('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
