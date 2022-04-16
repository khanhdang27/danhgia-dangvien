@php
    use \Modules\Rating\Models\Rating;
@endphp
@extends("Base::backend.master")

@section("content")
    <div id="txl-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">Đánh giá chi bộ</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đánh giá chi bộ</li>
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
                <form action="" method="post" id="dgcb-form">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>MSCB</th>
                                    <th>Chi bộ</th>
                                    <th>Tự xếp loại</th>
                                    <th>Đảng uỷ khoa xếp loại</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->macb ?? '' }}</td>
                                        <td>{{ $item->tencb ?? ''}}</td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach($xeploai as $key => $xl)
                                                    <div class="px-1 text-center">
                                                        <div>
                                                            <input style="width: 18px; height: 18px" type="radio"
                                                                   id="{{$item->macb}}txl{{$key}}" name="txl{{$item->macb}}"
                                                                   value="{{$key}}" disabled
                                                                {{ count($item->dgcb) > 0 ? ($item->dgcb[0]->txl == $key ? 'checked' : '') : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="{{$item->macb}}txl{{$key}}">{{$key}}</label>
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
                                                                   id="{{$item->macb}}duk{{$key}}" name="{{$item->macb}}[duk]"
                                                                   value="{{$key}}"
                                                                {{ count($item->dgcb) > 0 ? ($item->dgcb[0]->duk != null ? ($item->dgcb[0]->duk == $key ? 'checked' : '') : ($item->dgcb[0]->txl == $key ? 'checked' : '')) : ''}}
                                                            >
                                                        </div>
                                                        <label class="font-16 mb-0" for="{{$item->macb}}duk{{$key}}">{{$key}}</label>
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
