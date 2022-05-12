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
                        <p class="m-0 font-16 font-weight-bold">.........................................</p>
                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <div class="card-body px-5">
                <div class="table-responsive mb-1">
                    <p class="m-0 font-18 font-weight-bold text-center">DANH SÁCH ĐẢNG VIÊN </p>
                    <p class="m-0 font-18 font-weight-bold text-center">CHƯA KIỂM ĐIỂM, XẾP LOẠI CHẤT LƯỢNG</p>
                    <p class="m-0 font-18 font-weight-bold text-center">NĂM {{$nam}}</p><br>
                    <p class="m-0 text-center">-----</p><br>
                    <table class="table table-bordered" border="1">
                        <tr>
                            <th class="p-2 align-middle" width="20px">TT</th>
                            <th class="p-2 align-middle">Họ và tên</th>
                            <th class="p-2 align-middle">MSVC/ MSSV</th>
                            <th class="p-2 align-middle">Chi bộ</th>
                            <th class="p-2 align-middle">Ngày kết nạp</th>
                            <th class="p-2 align-middle">Chưa kiểm điểm, tự phê bình và phê bình</th>
                            <th class="p-2 align-middle">Chưa đánh giá xếp loại chất lượng</th>
                            <th class="p-2 align-middle">Lý do</th>
                        </tr>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr>
                                <td class="p-2 align-middle">{{ ++$key }}</td>
                                <td class="p-2 align-middle">{{ $item->dangvien != null ? ($item->dangvien->hoten) : '' }}</td>
                                <td class="p-2 align-middle">{{ $item->dangvien != null ? ($item->dangvien->mavc) : '' }}</td>
                                <td class="p-2 align-middle">{{ $item->dangvien != null ? ($item->dangvien->chibo != null ? $item->dangvien->chibo->tencb : '') : '' }}</td>
                                <td class="p-2 align-middle nowrap">{{ $item->dangvien != null ? (\Carbon\Carbon::parse($item->dangvien->ngayvaodang)->format('d-m-Y')) : '' }}</td>
                                <td class="p-2 align-middle text-center">{{ $item->chuakd ? 'X' : '' }}</td>
                                <td class="p-2 align-middle text-center">{{ $item->chuadg ? 'X' : '' }}</td>
                                <td class="p-2 align-middle">{{ $item->lydo ?? '' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <p class="m-0"><u>Ghi chú:</u> <i>Những đảng viên chưa kiểm điểm, tự phê bình và phê bình, chưa đánh
                            giá xếp loại thì chi bộ tổ chức đánh giá, xếp loại vào cuộc họp gần nhất khi đảng viên có
                            mặt và báo cáo bổ sung lên cấp ủy cấp trên.</i></p><br>
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
