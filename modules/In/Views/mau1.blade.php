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
                    <p class="m-0 font-20 font-weight-bold">Đảng ủy: Khoa CNTT&TT</p>
                    <p class="m-0 font-20 font-weight-bold text-center">PHIẾU XẾP LOẠI CHẤT LƯỢNG ĐẢNG VIÊN</p>
                    <p class="m-0 font-20 font-weight-bold text-center">NĂM {{$now}}</p>
                    <table class="table table-bordered" border="1">
                        <thead class="text-center">
                        <tr>
                            <th class="align-middle" rowspan="2" width="50px">TT</th>
                            <th class="align-middle" rowspan="2">Họ và tên</th>
                            <th colspan="3">Xếp loại chất lượng đảng viên</th>
                        </tr>
                        <tr>
                            <th>Mức 2</th>
                            <th>Mức 3</th>
                            <th>Mức 4</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->hoten }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="m-0 font-20"><strong>Ghi chú:</strong> Đánh 1 dấu X duy nhất để đánh giá trên mỗi dòng</p>
                <p class="m-0 font-20">&emsp;&emsp;&emsp;&emsp;- Mức 2. Hoàn thành tốt nhiệm vụ.</p>
                <p class="m-0 font-20">&emsp;&emsp;&emsp;&emsp;- Mức 3. Hoàn thành nhiệm vụ.</p>
                <p class="m-0 font-20">&emsp;&emsp;&emsp;&emsp;- Mức 4. Không hoàn thành nhiệm vụ</p>
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
