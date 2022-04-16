@extends("Base::backend.master")

@section("content")
    <div id="dangvien-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">Đảng viên</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đảng viên</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route('get.dangvien.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp; Thêm mới
            </a>
        </div>
    </div>
    <!--Search box-->
    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2)
        <div class="search-box">
            <div class="card">
                <div class="card-header" data-toggle="collapse" data-target="#form-search-box" aria-expanded="false"
                     aria-controls="form-search-box">
                    <div class="title">Lọc</div>
                </div>
                <div class="card-body collapse show" id="form-search-box">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="chibo">Chi bộ</label>
                                    <select name="chibo" id="chibo" class="select2 form-control">
                                        <option value="">Tất cả</option>
                                        @foreach($chibo as $key => $cb)
                                            <option value="{{ $key }}"
                                                    @if(isset($filter['chibo']) && $filter['chibo'] == $key) selected @endif>{{ $cb }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn btn-info mr-2">Lọc</button>
                            <button type="button" class="btn btn-default clear">Huỷ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <div class="listing">
        <div class="card">
            <div class="card-body">
                <div class="sumary">
                    {!! summaryListing($data) !!}
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th>Mã đảng viên</th>
                            <th>Mã viên chức</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Ngày vào đảng</th>
                            <th>Ngày chính thức</th>
                            <th>Số điện thoại</th>
                            <th>Chi bộ</th>
                            <th style="width: 10%" class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ str_pad($item->madv,6,0, STR_PAD_LEFT) }}</td>
                                <td>{{ $item->mavc }}</td>
                                <td>{{ $item->hoten }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->ngaysinh)->format('d-m-Y') }}</td>
                                <td>{{ \Modules\DangVien\Models\DangVien::getSex($item->gioitinh) }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->ngayvaodang)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->ngaychinhthuc)->format('d-m-Y') }}</td>
                                <td>{{ $item->sodt }}</td>
                                <td>{{ $item->chibo != null ? $item->chibo->tencb : "" }}</td>
                                <td class="text-center">
                                    <a href="{{ route('get.dangvien.update',$item->madv) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('get.dangvien.delete',$item->madv) }}"
                                       class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 pagination-style">
                        {{ $data->withQueryString()->render('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
