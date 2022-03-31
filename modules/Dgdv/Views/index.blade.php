@php
    use \Modules\Rating\Models\Rating;
@endphp
@extends("Base::backend.master")

@section("content")
    <div id="txl-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">Đánh giá đảng viên</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đánh giá đảng viên</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="listing">
            <div class="card bg-transparent">
                <div class="card-body p-0">
                    <div class="float-right bg-white p-3">
                        <table>
                            <tr>
                                <td><p class="font-18 font-weight-bold">Chú thích:</p></td>
                            </tr>
                            @foreach($xeploai as $key=>$item)
                                <tr>
                                    <td>{{$key}}: {{$item}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
            <div class="card">
                <form action="" method="post" id="dgdv-form">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>MSĐV</th>
                                    <th>Họ tên</th>
                                    <th>Tự xếp loại</th>
                                    <th>Chính quyền xếp loại</th>
                                    <th>Chi uỷ xếp loại</th>
                                    <th>Chi bộ xếp loại</th>
                                    <th>Đoàn trường xếp loại</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->madv != null ? str_pad($item->madv,6,0,STR_PAD_LEFT) : '' }}</td>
                                        <td>{{ $item->hoten ?? ''}}</td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach($xeploai as $key => $xl)
                                                    <div class="px-1 text-center">
                                                        <div>
                                                            <input style="width: 18px; height: 18px" type="radio"
                                                                   id="txl{{$key}}" name="txl{{$item->madv}}"
                                                                   value="{{$key}}" disabled
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->txl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="txl{{$key}}">{{$key}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach($xeploai as $key => $xl)
                                                    <div class="px-1 text-center">
                                                        <div>
                                                            <input style="width: 18px; height: 18px" type="radio"
                                                                   id="cqxl{{$key}}" name="{{$item->madv}}[cqxl]"
                                                                   value="{{$key}}"
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->cqxl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="cqxl{{$key}}">{{$key}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach($xeploai as $key => $xl)
                                                    <div class="px-1 text-center">
                                                        <div>
                                                            <input style="width: 18px; height: 18px" type="radio"
                                                                   id="cuxl{{$key}}" name="{{$item->madv}}[cuxl]"
                                                                   value="{{$key}}"
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->cuxl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="cuxl{{$key}}">{{$key}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach($xeploai as $key => $xl)
                                                    <div class="px-1 text-center">
                                                        <div>
                                                            <input style="width: 18px; height: 18px" type="radio"
                                                                   id="cbxl{{$key}}" name="{{$item->madv}}[cbxl]"
                                                                   value="{{$key}}"
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->cbxl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="cbxl{{$key}}">{{$key}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach($xeploai as $key => $xl)
                                                    <div class="px-1 text-center">
                                                        <div>
                                                            <input style="width: 18px; height: 18px" type="radio"
                                                                   id="dtxl{{$key}}" name="{{$item->madv}}[dtxl]"
                                                                   value="{{$key}}"
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->dtxl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="dtxl{{$key}}">{{$key}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-info mr-2">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
