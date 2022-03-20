@extends("Base::backend.master")

@section("content")
    <div class="dangvien-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">Đảng viên</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("get.dangvien.list") }}">Đảng viên</a></li>
                        <li class="breadcrumb-item active">Sửa đảng viên</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route("get.dangvien.list") }}" class="btn btn-cyan">Quay lại</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="title">Sửa đảng viên</h4>
            </div>
            <div class="card-body">
                @include('DangVien::_form')
            </div>
        </div>
    </div>
@endsection
