<form action="" method="post" id="chibo-form">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-4">
            <label for="madb">Đảng bộ</label>
        </div>
        <div class="col-md-8">
            {!! Form::select('madb', $dangbo, $data->madb ?? NULL, [
           'id' => 'madb',
           'class' => 'select2 form-control',
           'data-minimum-results-for-search'=>'Infinity']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="macb">Mã chi bộ</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="macb" name="macb" value="{{ $data->macb ?? old('macb') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="tencb">Tên chi bộ</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="tencb" name="tencb" value="{{ $data->tencb ?? old('tencb') }}">
        </div>
    </div>

    {{--    Tai khoan chi bo--}}
    <div class="form-group row">
        <div class="col-md-4">
            <label for="username">Tài khoản</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="username"  name="username"
                   value="{{ $user->username ?? old('username') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="password">Mật khẩu</label>
        </div>
        <div class="col-md-8">
            <input type="password" id="password" class="form-control" name="password">
        </div>
    </div>
    {{--    Tai khoan chi bo--}}

    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">Lưu</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ</button>
    </div>
</form>
{!! JsValidator::formRequest('Modules\ChiBo\Requests\ChiBoRequest','#chibo-form') !!}
