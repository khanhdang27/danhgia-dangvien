@php($prompt = ['' => 'Chọn xếp loại'])
<form action="" method="post" id="cbtxl-form">
    {{ csrf_field() }}
    <div class="row form-group">
        <div class="col-md-4">
            <label for="nam" class="title">Năm</label>
        </div>
        <div class="col-md-8">
            {!! Form::select('nam', $nam, $data->nam ?? $toyear, [
           'id' => 'nam',
           'class' => 'select2 form-control',]) !!}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label for="txl">Xếp loại</label>
        </div>
        <div class="col-md-8">
            {!! Form::select('txl', $prompt+$xeploai, $data->txl ?? NULL, [
           'id' => 'txl',
           'class' => 'select2 form-control',
           'data-minimum-results-for-search'=>'Infinity']) !!}
        </div>
    </div>

    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">Lưu</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ</button>
    </div>
</form>
{!! JsValidator::formRequest('Modules\CbTxl\Requests\CbTxlRequest','#cbtxl-form') !!}
