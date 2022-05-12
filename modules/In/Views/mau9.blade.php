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
                    <p class="m-0 font-18 font-weight-bold text-center">Xếp loại chất lượng các chi bộ trực thuộc</p>
                    <br>
                    <p class="m-0 text-center">-----</p><br>
                    <p style="text-indent: 25px">- Căn cứ Quy định số 97-QĐ/TW ngày 22/03/2004 của Ban Bí thư về “Chức
                        năng, nhiệm vụ của đảng bộ, chi bộ cơ sở trong các đơn vị sự nghiệp;</p>
                    <p style="text-indent: 25px">- Căn cứ Hướng dẫn số 10-HD/TU ngày 25/11/2019 của Thành ủy Cần Thơ về
                        <i>"kiểm điểm, đánh giá, xếp loại chất lượng hàng năm đối với tổ chức đảng, đảng viên và tập
                            thể, cá nhân cán bộ lãnh đạo, quản lý các cấp"</i>; Hướng dẫn số 03-HD/ĐU ngày 03/12/2021
                        của Đảng ủy Trường Đại học Cần Thơ về "kiểm điểm, đánh giá, xếp loại chất lượng tổ chức cơ sở
                        đảng
                        và đảng viên năm 2021”;</p>
                    <p style="text-indent: 25px">- Căn cứ kết quả đánh giá, xếp loại chất lượng của các chi bộ trực
                        thuộc; Kết quả kiểm phiếu xếp loại chất lượng chi bộ trực thuộc năm 2021,</p><br>
                    <p class="m-0 font-18 font-weight-bold text-center">BAN CHẤP HÀNH QUYẾT ĐỊNH</p><br>
                    <table class="mb-4">
                        <tr>
                            <td class="align-top" nowrap><p class="m-0 font-16 font-weight-bold">Điều 1.</p></td>
                            <td colspan="2"><p class="m-0 font-16">Xếp loại chất lượng các chi bộ trực thuộc
                                    năm {{$nam}}:</p>
                            </td>
                        </tr>
                        @foreach($data as $key => $cb)
                            <tr>
                                <td></td>
                                <td class="w-50"><p class="m-0 font-16"></p>{{++$key}})
                                    {{$cb->chibo != null ? $cb->chibo->tencb : ''}}</td>
                                <td class="w-50"><p class="m-0 font-16"></p>
                                    , {{\Modules\Rating\Models\Rating::getXeploai($cb->duk ?? '')}}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="align-top" nowrap><p class="m-0 font-16 font-weight-bold">Điều 2.</p></td>
                            <td colspan="2"><p class="m-0 font-16">Chi ủy các chi bộ trực thuộc có tên ở Điều 1 chịu
                                    trách nhiệm thi hành Quyết định này.</p>
                            </td>
                        </tr>
                    </table>

                    <table width="100%" class="mb-5">
                        <tr>
                            <td nowrap class="align-top">
                                <br>
                                <p class="m-0 font-18" style="text-decoration: underline">Nơi nhận:</p>
                                <p class="m-0 font-14">- Như điều 2,</p>
                                <p class="m-0 font-14">- VP Đảng uỷ (để báo cáo),</p>
                                <p class="m-0 font-14">- Lưu: Đảng ủy.</p>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="m-0 font-18 font-weight-bold">T/M ĐẢNG ỦY</p>
                                    <p class="m-0 font-18">BÍ THƯ</p>
                                    <p class="m-0 font-14"><i>(ký, ghi rõ họ tên)</i></p>
                                </div>
                            </td>
                        </tr>
                    </table>
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
