<form action="" method="post" id="dangbo-form">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-4">
            <label for="madb">Mã đảng bộ</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="madb" name="madb" value="{{ $data->madb ?? old('madb') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="tendb">Tên đảng bộ</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="tendb" name="tendb" value="{{ $data->tendb ?? old('tendb') }}">
        </div>
    </div>
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">Lưu</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ</button>
    </div>
</form>
{!! JsValidator::formRequest('Modules\DangBo\Requests\DangBoRequest','#dangbo-form') !!}
