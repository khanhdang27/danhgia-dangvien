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
                    <p class="m-0 font-18 font-weight-bold text-center">Về việc khen thưởng đảng viên</p><br>
                    <p class="m-0 text-center">-----</p><br>
                    <p style="text-indent: 25px">- Căn cứ Quy định số 24-QĐ/TW ngày 30/07/2021 của Ban Chấp hành Trung
                        ương về "Thi hành Điều lệ Đảng";</p>
                    <p style="text-indent: 25px">- Căn cứ Hướng dẫn số 56-HD/VPTW, ngày 27/10/2015 của Văn phòng Trung
                        ương đảng hướng dẫn "về mức chi tiền thưởng kèm theo các hình thức khen thưởng đối với tổ chức
                        đảng và đảng viên";</p>
                    <p style="text-indent: 25px">- Căn cứ Hướng dẫn số 03-HD/ĐU ngày 03/12/2021 của Đảng ủy Trường Đại
                        học Cần Thơ về <i>"kiểm điểm, đánh giá, xếp loại chất lượng tổ chức cơ sở đảng và đảng viên năm
                            2021”</i> và kết quả xếp loại chất lượng đảng viên năm 2021</p><br>
                    <p class="m-0 font-18 font-weight-bold text-center">BAN CHẤP HÀNH QUYẾT ĐỊNH</p><br>
                    <table class="mb-4">
                        <tr>
                            <td class="align-top" nowrap><p class="m-0 font-16 font-weight-bold">Điều 1.</p></td>
                            <td colspan="2"><p class="m-0 font-16">Tặng Giấy khen cho {{count($data)}} đảng viên xếp
                                    loại <strong>"Hoàn thành xuất sắc nhiệm vụ"</strong> năm {{$nam}}:</p>
                            </td>
                        </tr>
                        @php($i = 0)
                        @foreach($data as $dv)
                            <tr>
                                <td></td>
                                <td class="w-50"><p class="m-0 font-16"></p>{{++$i}}. Đ/c {{$dv->dangvien != null ? $dv->dangvien->hoten : ''}}</td>
                                <td class="w-50"><p class="m-0 font-16"></p>, {{$dv->dangvien != null ? ($dv->dangvien->chibo != null ? $dv->dangvien->chibo->tencb : '') : ''}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="align-top" nowrap><p  class="m-0 font-16 font-weight-bold">Điều 2.</p></td>
                            <td colspan="2"><p class="m-0 font-16">Mức tiền thưởng kèm theo giấy khen là 450.000 đồng/giấy khen, trích từ quỹ đảng phí của Đảng bộ.</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top" nowrap><p  class="m-0 font-16 font-weight-bold">Điều 3.</p></td>
                            <td colspan="2"><p class="m-0 font-16">Chi ủy các chi bộ trực thuộc và đảng viên có tên ở Điều 1 chịu trách nhiệm thi hành Quyết định này.</p>
                            </td>
                        </tr>
                    </table>

                    <table width="100%" class="mb-5">
                        <tr>
                            <td nowrap class="align-top">
                                <br>
                                <p class="m-0 font-18" style="text-decoration: underline">Nơi nhận:</p>
                                <p class="m-0 font-14">- Như điều 3,</p>
                                <p class="m-0 font-14">- Đảng ủy trường (để báo cáo),</p>
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
