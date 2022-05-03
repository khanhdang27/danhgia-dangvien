@extends("Base::backend.master")

@section("content")
    <div id="dangvien-module">
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
        <div class="mb-3 d-flex justify-content-end group-btn">
            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                <a href="{{ route("get.in.list") }}" class="btn btn-cyan mr-1">Quay lại</a>
                <a href="#" id="print" class="btn btn-info"><i class="fa fa-print"></i>&nbsp; In</a>
            @endif
        </div>
    </div>

    <div id="print-form" class="listing">
        <div class="card">
            <table width="100%" class="mt-5 mb-3">
                <tbody class="text-center">
                <tr>
                    <td>
                        <p class="m-0 font-18">ĐẢNG BỘ TRƯỜNG ĐẠI HỌC CẦN THƠ</p></td>
                    <td>
                        <p style="text-decoration: underline" class="m-0 font-18 font-weight-bold">ĐẢNG CỘNG SẢN VIỆT
                            NAM</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="m-0 font-16 font-weight-bold">ĐẢNG BỘ, CHI BỘ: Khoa CNTT&TT</p>
                    </td>
                    <td>
                        <p class="m-0 font-16"><i>Cần Thơ, ngày {{$ngay}} tháng {{$thang}} năm {{$nam}}</i></p>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="card-body px-5">
                <div class="table-responsive mb-1">
                    <p class="m-0 font-18 font-weight-bold text-center">TỔNG HỢP ĐỀ XUẤT MỨC CHẤT LƯỢNG</p>
                    <p class="m-0 font-18 font-weight-bold text-center">ĐẢNG VIÊN CỦA CÁC CHỦ THỂ NĂM {{$nam}}</p><br>
                    <p class="m-0 text-center">-----</p><br>
                    <table class="table table-bordered" border="1">
                        <tr>
                            <th width="20px" class="align-middle">TT</th>
                            <th class="align-middle">Họ và tên đảng viên</th>
                            <th class="align-middle">MSVC/ MSSV</th>
                            <th class="align-middle">Chức vụ đảng, chính quyền, đoàn thể</th>
                            <th class="align-middle">Đảng viên tự đánh giá, xếp loại (1)</th>
                            <th class="align-middle">Đánh giá, xếp loại, viên chức, người lao động (Nếu là VC-NLĐ) (2)
                            </th>
                            <th class="align-middle">Chi ủy nơi đảng viên sinh hoạt đánh giá, xếp loại (3)</th>
                            <th class="align-middle">Tập thể lãnh đạo đoàn thể mà đảng viên là thành viên lãnh đạo (4)
                            </th>
                            <th class="align-middle">Chi bộ đánh giá, xếp loại (5)</th>
                            <th class="align-middle">Ghi chú</th>
                        </tr>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->hoten ?? '' }}</td>
                                <td>{{ $item->mavc ?? '' }}</td>
                                <td></td>
                                <td>{{ $item->dgdv != '[]' ? $item->dgdv[0]->txl : '' }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-right mt-3 mr-3">
                    <div class="text-center">
                        <p class="m-0 font-18 font-weight-bold">T/M ĐẢNG BỘ/CHI ỦY (CHI BỘ)</p>
                        <p class="m-0 font-18">BÍ THƯ</p>
                        <p class="m-0 font-14">(ký, ghi rõ họ tên)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('#print').click(function () {
            printJS({
                printable: 'print-form',
                type: 'html',
                css: '{{ asset('assets/backend/css/style-print.css') }}'
            });
        })
    </script>
@endpush
