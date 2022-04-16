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
        <div class="row">
            <div class="col-10">
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
            </div>
            <div class="col-2">
                <div class="card bg-transparent">
                    <div class="card-body p-0">
                        <div class="bg-white p-3">
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
            </div>
        </div>

        <div class="listing">

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
                                    <th>Đảng uỷ khoa xếp loại</th>
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
                                                                   id="{{$item->madv}}txl{{$key}}" name="txl{{$item->madv}}"
                                                                   value="{{$key}}" disabled
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->txl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="{{$item->madv}}txl{{$key}}">{{$key}}</label>
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
                                                                   id="{{$item->madv}}cqxl{{$key}}" name="{{$item->madv}}[cqxl]"
                                                                   value="{{$key}}" disabled
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->cqxl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="{{$item->madv}}cqxl{{$key}}">{{$key}}</label>
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
                                                                   id="{{$item->madv}}cuxl{{$key}}" name="{{$item->madv}}[cuxl]"
                                                                   value="{{$key}}" disabled
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->cuxl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="{{$item->madv}}cuxl{{$key}}">{{$key}}</label>
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
                                                                   id="{{$item->madv}}cbxl{{$key}}" name="{{$item->madv}}[cbxl]"
                                                                   value="{{$key}}" disabled
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->cbxl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="{{$item->madv}}cbxl{{$key}}">{{$key}}</label>
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
                                                                   id="{{$item->madv}}duk{{$key}}" name="{{$item->madv}}[duk]"
                                                                   value="{{$key}}"
                                                                {{ count($item->dgdv) > 0 ? ($item->dgdv[0]->duk != null ? ($item->dgdv[0]->duk == $key ? 'checked' : '') : ($item->dgdv[0]->cbxl == $key ? 'checked' : '')) : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="{{$item->madv}}duk{{$key}}">{{$key}}</label>
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
