@extends("Base::backend.master")

@section("content")
    <div class="chuadg-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">Đảng viên chưa kiểm điểm đánh giá</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("get.chuadg.list") }}">Đảng viên chưa kiểm điểm đánh giá</a></li>
                        <li class="breadcrumb-item active">Thêm đảng viên chưa kiểm điểm đánh giá</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route("get.chuadg.list") }}" class="btn btn-cyan">Quay lại</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="title">Thêm đảng viên chưa kiểm điểm đánh giá</h4>
            </div>
            <div class="card-body">
                @include('ChuaDg::_form')
            </div>
        </div>
    </div>
@endsection
