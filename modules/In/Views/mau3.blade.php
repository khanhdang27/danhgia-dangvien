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
                    <p class="font-20 font-weight-bold m-0">Đảng ủy: Khoa CNTT&TT</p><br>
                    <p class="font-20 font-weight-bold text-center m-0">PHIẾU ĐÁNH GIÁ ĐẢNG BỘ KHOA CNTT&TT</p>
                    <p class="font-20 font-weight-bold text-center m-0">NĂM {{$now}}</p><br>
                    <table class="table table-bordered" border="1">
                        <thead class="text-center">
                        <tr>
                            <th width="50px">STT</th>
                            <th>XẾP LOẠI CHẤT LƯỢNG ĐẢNG BỘ</th>
                            <th>ĐÁNH GIÁ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Hoàn thành xuất sắc nhiệm vụ</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Hoàn thành tốt nhiệm vụ</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Hoàn thành nhiệm vụ</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Không hoàn thành nhiệm vụ</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <p class="m-0 font-20"><strong>Ghi chú:</strong> Đánh dấu X vào 01 dòng duy nhất trên cột ĐÁNH GIÁ để xếp loại Đảng bộ.</p>
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
