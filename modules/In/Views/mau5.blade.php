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
                        <p style="text-decoration: underline" class="m-0 font-18 font-weight-bold">ĐẢNG CỘNG SẢN VIỆT NAM</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="m-0 font-16 font-weight-bold">ĐẢNG BỘ KHOA CNTT&TT</p>
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
                </tbody>
            </table>
            <div class="card-body px-5">
                <div class="table-responsive mb-1">

                    <p class="m-0 font-20 font-weight-bold text-center">PHIẾU XIN Ý KIẾN</p>
                    <p class="m-0 font-18 font-weight-bold text-center">Đánh giá chất lượng và xếp loại (tổ chức Đảng hoặc tập thể lãnh đạo)</p>
                    <hr style="width: 100px;" class="mt-1 mb-5 border-dark">
                    <table class="m-3">
                        <tr>
                            <td>Kính gửi:</td>
                            <td><strong>Đảng ủy Khoa CNTT&TT</strong></td>
                        </tr><tr>
                            <td></td>
                            <td><strong>BCH Công đoàn và BCH Đoàn TN CS HCM Khoa CNTT&TT</strong></td>
                        </tr>
                    </table>
                    <p style="text-indent: 25px">&emsp;&emsp;&emsp;Thực hiện công tác kiểm điểm và đánh giá, xếp loại chất lượng đối với tổ chức đảng, tập thể lãnh đạo, quản lý năm 2020.</p>
                    <p style="text-indent: 25px">&emsp;&emsp;&emsp;Đề nghị các đồng chí cho ý kiến tham gia đánh giá, các tổ chức đảng hoặc tập thể lãnh đạo (theo Phụ lục 3 đính kèm) bằng cách đánh dấu X vào ô tương ứng, trong đó, số lượng được xếp loại Hoàn thành xuất sắc nhiệm vụ không vượt quá 20% trên tổng số hoàn thành tốt nhiệm vụ.</p>
                    <table class="table table-bordered" border="1">
                        <thead class="text-center">
                        <tr>
                            <th class="align-middle" rowspan="2" width="50px">SỐ TT</th>
                            <th class="align-middle" rowspan="2">TÊN TỔ CHỨC ĐẢNG/ TẬP THỂ LÃNH ĐẠO</th>
                            <th class="align-middle" rowspan="2">ĐƠN VỊ TỰ XẾP LOẠI</th>
                            <th class="align-middle p-2" colspan="4">Ý KIẾN THAM GIA ĐÁNH GIÁ, XẾP LOẠI CỦA CÁC CHỦ THỂ CẤP TRÊN</th>

                        </tr>
                        <tr>
                            <td class="py-2"><i>Hoàn thành  Xuất sắc nhiệm vụ</i></td>
                            <td class="py-2"><i>Hoàn thành Tốt nhiệm vụ</i></td>
                            <td class="py-2"><i>Hoàn thành nhiệm vụ</i></td>
                            <td class="py-2"><i>Không hoàn thành nhiệm vụ</i></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($chibo as $key => $cb)
                            <tr>
                                <td class="text-center">{{++$key}}</td>
                                <td>{{$cb->tencb}}</td>
                                <td>{{$cb->dgcb != '[]' ? $cb->dgcb[0]->txl : ''}}</td>
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
                        <p class="m-0 font-18 font-weight-bold">ĐẢNG ỦY KHOA CNTT&TT</p>
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
