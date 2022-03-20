<form action="" method="post" id="rating-form">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-4">
            <label for="maxeploai">Mã xếp loại</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="maxeploai" name="maxeploai" value="{{ $data->maxeploai ?? old('maxeploai') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="tenxeploai">Tên xếp loại</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="tenxeploai" name="tenxeploai" value="{{ $data->tenxeploai ?? old('tenxeploai') }}">
        </div>
    </div>

    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">Lưu</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ</button>
    </div>
</form>
{!! JsValidator::formRequest('Modules\Rating\Requests\RatingRequest','#rating-form') !!}
