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
            <div class="card-body px-5">
                <div class="table-responsive mb-1">
                    <p class="font-20 font-weight-bold m-0">Đảng bộ: Khoa CNTT&TT</p><br>
                    <p class="font-20 font-weight-bold text-center m-0">PHIẾU ĐÁNH GIÁ ĐẢNG BỘ KHOA CNTT&TT</p>
                    <p class="font-20 font-weight-bold text-center m-0">NĂM {{$now}}</p><br>
                    <table class="table table-bordered" border="1">
                        <thead class="text-center">
                        <tr>
                            <th class="align-middle" width="50px">SỐ TT</th>
                            <th class="align-middle">TÊN TỔ CHỨC ĐẢNG/ TẬP THỂ LÃNH ĐẠO</th>
                            <th class="align-middle">ĐƠN VỊ TỰ XẾP LOẠI</th>
                            <td class="py-5"><i>Hoàn thành  Xuất sắc nhiệm vụ</i></td>
                            <td class="py-5"><i>Hoàn thành Tốt nhiệm vụ</i></td>
                            <td class="py-5"><i>Hoàn thành nhiệm vụ</i></td>
                            <td class="py-5"><i>Không hoàn thành nhiệm vụ</i></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($chibo as $key => $cb)
                            <tr>
                                <td class="text-center">{{++$key}}</td>
                                <td>{{$cb->tencb}}</td>
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
                <p class="m-0 font-20"><strong>Ghi chú:</strong> Đánh dấu X vào cột bình chọn để xếp loại cho mỗi chi bộ.</p>
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
