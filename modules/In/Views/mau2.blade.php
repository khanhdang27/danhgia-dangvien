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
                <a href="#" id="add" class="btn btn-info mr-1" data-toggle="modal" data-target="#modalAdd"><i
                        class="fa fa-plus"></i>&nbsp; Thêm</a>
                <a href="#" id="print" class="btn btn-info"><i class="fa fa-print"></i>&nbsp; In</a>
            @endif
        </div>
    </div>

    <div id="print-form" class="listing">
        <div class="card">
            <div class="card-body px-5">
                <div class="table-responsive mb-1">
                    <p class="m-0 font-20 font-weight-bold">Đảng ủy: Khoa CNTT&TT</p><br>
                    <p class="m-0 font-20 font-weight-bold text-center">PHIẾU BÌNH CHỌN ĐẢNG VIÊN HOÀN THÀNH XUẤT SẮC
                        NHIỆM VỤ</p>
                    <p class="m-0 font-20 font-weight-bold text-center">NĂM {{$now}}</p><br>
                    <table id="table-xs" class="table table-bordered" border="1">
                        <thead class="text-center">
                        <tr>
                            <th width="50px">Số TT</th>
                            <th>Họ và tên</th>
                            <th>Chi bộ</th>
                            <th>Đồng ý</th>
                            <th>Không đồng ý</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr>
                                <td id="key">{{ ++$key }}</td>
                                <td>{{ $item->dangvien != null ? $item->dangvien->hoten : '' }}</td>
                                <td>{{ $item->dangvien != null ? ($item->dangvien->chibo != null ? $item->dangvien->chibo->tencb : '') : '' }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="m-0 font-20"><strong>Ghi chú:</strong> Đánh 1 dấu X duy nhất để đánh giá trên mỗi dòng </p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title font-weight-bold font-18">Thêm đảng viên</p>
                </div>
                <div class="modal-body">
                    <table id="table-them" class="table table-bordered" border="1">
                        <tr>
                            <th>Họ và tên</th>
                            <th>Chi bộ</th>
                            <th>Thêm</th>
                        </tr>
                        @foreach($dangvien as $key => $dv)
                            <tr>
                                <td>{{$dv->dangvien != null ? $dv->dangvien->hoten : ''}}</td>
                                <td>{{$dv->dangvien != null ? ($dv->dangvien->chibo != null ? $dv->dangvien->chibo->tencb : '') : ''}}</td>
                                <td><a id="addDv{{$dv->madv}}" class="btn btn-info">Thêm</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        @foreach($dangvien as $dv)
        $('#addDv{{$dv->madv}}').click(function () {
            key = parseInt($('#table-xs tr:last').find('#key').html()) + 1;

            var html =
                `<tr>
                    <td id="key">` + key + `</td>
                    <td>{{ $dv->dangvien != null ? $dv->dangvien->hoten : '' }}</td>
                    <td>{{ $dv->dangvien != null ? ($dv->dangvien->chibo != null ? $dv->dangvien->chibo->tencb : '') : '' }}</td>
                    <td></td>
                    <td></td>
                </tr>`;
            $('#table-xs').append(html);
            $('#addDv{{$dv->madv}}').parents('td').parents('tr').remove();
        });
        @endforeach

        $('#print').click(function () {
            printJS({
                printable: 'print-form',
                type: 'html',
                css: '{{ asset('assets/backend/css/style-print.css') }}'
            });
        })
    </script>
@endpush
