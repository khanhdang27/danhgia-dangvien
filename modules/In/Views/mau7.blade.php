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
                        <p class="m-0 font-16 font-weight-bold">ĐẢNG UỶ KHOA CNTT&TT</p>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <p class="m-0 font-16 font-weight-bold">*</p>
                    </td>
                    <td>
                        <p class="m-0 font-16"><i>Cần Thơ, ngày {{$ngay}} tháng {{$thang}} năm {{$nam}}</i></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="m-0 font-16">Số&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-QĐ/ĐU</p>
                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <div class="card-body px-5">
                <div class="table-responsive mb-1">
                    <p class="m-0 font-20 font-weight-bold text-center">QUYẾT ĐỊNH</p>
                    <p class="m-0 font-18 font-weight-bold text-center">Công nhận xếp loại chất lượng đảng viên
                        năm {{$nam}}</p><br>
                    <p class="m-0 text-center">-----</p><br>
                    <p style="text-indent: 25px">- Căn cứ Quy định số 97-QĐ/TW ngày 22/03/2004 của Ban Bí thư về “Chức
                        năng, nhiệm vụ của đảng bộ, chi bộ cơ sở trong các đơn vị sự nghiệp;</p>
                    <p style="text-indent: 25px">- Căn cứ Hướng dẫn số 10-HD/TU ngày 25/11/2019 của Thành ủy Cần Thơ về
                        "kiểm điểm, đánh giá, xếp loại chất lượng hàng năm đối với tổ chức đảng, đảng viên và tập thể,
                        cá nhân cán bộ lãnh đạo, quản lý các cấp"; "; Hướng dẫn số 03-HD/ĐU ngày 03/12/2021 của Đảng ủy
                        Trường Đại học Cần Thơ về "kiểm điểm, đánh giá, xếp loại chất lượng tổ chức cơ sở đảng và đảng
                        viên năm {{$nam}}”;</p>
                    <p style="text-indent: 25px">- Căn cứ kết quả đánh giá xếp loại chất lượng đảng viên năm {{$nam}}
                        ,</p><br>
                    <p class="m-0 font-18 font-weight-bold text-center">BAN CHẤP HÀNH QUYẾT ĐỊNH</p><br>
                    <table class="mb-5">
                        <tr>
                            <td nowrap><p class="m-0 font-16 font-weight-bold">Điều 1.</p></td>
                            <td><p class="m-0 font-16">Xếp loại chất lượng đảng viên năm {{$nam}} cho … đảng viên.</p>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p class="m-0 font-16">(Có danh sách kèm theo)</p><br></td>
                        </tr>
                        <tr>
                            <td nowrap class="align-top"><p class="m-0 font-16 font-weight-bold">Điều 2.</p></td>
                            <td><p class="m-0 font-16">Chi ủy các chi bộ trực thuộc và đảng viên có tên ở Điều 1 chịu
                                    trách nhiệm thi hành Quyết định này.</p></td>
                        </tr>
                    </table>

                    <table width="100%" class="mb-5">
                        <tr>
                            <td nowrap class="align-top">
                                <br>
                                <p class="m-0 font-18" style="text-decoration: underline">Nơi nhận:</p>
                                <p class="m-0 font-14">- Như điều 2,</p>
                                <p class="m-0 font-14">- Đảng ủy trường (để báo cáo),</p>
                                <p class="m-0 font-14">- Lưu: Đảng ủy khoa.</p>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="m-0 font-18 font-weight-bold">T/M ĐẢNG BỘ/CHI ỦY (CHI BỘ)</p>
                                    <p class="m-0 font-18">BÍ THƯ</p>
                                    <p class="m-0 font-14">(ký, ghi rõ họ tên)</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div style='break-after:page'></div>
                    <p class="m-0 font-20 font-weight-bold text-center">DANH SÁCH</p>
                    <p class="m-0 font-18 font-weight-bold text-center">XẾP LOẠI CHẤT LƯỢNG ĐẢNG VIÊN NĂM {{$nam}}</p>
                    <p class="m-0 font-18 text-center">(Kèm theo Quyết định số
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-QĐ/ĐU ngày .../.../{{$nam}}</p>
                    <p class="m-0 font-18 text-center">của Đảng ủy khoa Công nghệ thông tin và truyền thông)</p>
                    <br>
                    <table class="table table-bordered" border="1">
                        <thead class="text-center">
                        <tr>
                            <th width="20px" class="align-middle">TT</th>
                            <th class="align-middle">Họ và tên</th>
                            <th class="align-middle">MSVC/ MSSV</th>
                            <th class="align-middle">Chi bộ</th>
                            <th class="align-middle">Xếp loại</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->dangvien != null ? $item->dangvien->hoten : '' }}</td>
                                <td>{{ $item->dangvien != null ? $item->dangvien->mavc : '' }}</td>
                                <td>{{ $item->dangvien != null ? ($item->dangvien->chibo != null ? $item->dangvien->chibo->tencb : '') : '' }}</td>
                                <td>{{ $item->duk }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-right mt-3 mr-3">
                    <div class="text-center">
                        <p class="m-0 font-18 font-weight-bold">T/M ĐẢNG BỘ/CHI ỦY (CHI BỘ)</p>
                        <p class="m-0 font-18">BÍ THƯ</p>
                        <p class="m-0 font-16">(ký, ghi rõ họ tên)</p>
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
