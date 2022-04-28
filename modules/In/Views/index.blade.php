@extends("Base::backend.master")

@section("content")
    <div id="in-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">In</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active">In</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row font-20">
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau1')}}" class="btn btn-info">
                            Phiếu xếp loại chất lượng đảng viên
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau2')}}" class="btn btn-info">
                            Phiếu bình chọn đảng viên hoàn thành xuất sắc nhiệm vụ
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau3')}}" class="btn btn-info">
                            Phiếu đánh giá đảng bộ khoa CNTT&TT
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau1')}}" class="btn btn-info">
                            Phiếu đánh giá đảng bộ khoa CNTT&TT
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau1')}}" class="btn btn-info">
                            Phiếu xin ý kiến - Đánh giá chất lượng và xếp loại (tổ chức Đảng hoặc tập thể lãnh đạo)
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau1')}}" class="btn btn-info">
                            Tổng hợp đề xuất mức chất lượng đảng viên của các chủ thể
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau1')}}" class="btn btn-info">
                            Quyết định - Công nhận xếp loại chất lượng đảng viên
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau1')}}" class="btn btn-info">
                            Quyết định - Về việc khen thưởng đảng viên
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau1')}}" class="btn btn-info">
                            Quyết định - Xếp loại chất lượng các chi bộ trực thuộc

                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau1')}}" class="btn btn-info">
                            Quyết định - Tặng giấy khen cho chi bộ trực thuộc Đảng ủy cơ sở
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{route('get.in.printMau1')}}" class="btn btn-info">
                            Danh sách đảng viên chưa kiểm điểm, xếp loại chất lượng
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
