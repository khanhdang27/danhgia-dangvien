@php
    $prompt = ['' => 'Chọn xếp loại'];
    $prodv = ['' => 'Chọn đảng viên'];
@endphp
<div class="card">
    <form action="" method="post" id="dgdv-form">
        @csrf
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
                <label for="madv">Đảng viên</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('madv', $prodv + $dangvien, $data->madv ?? NULL, [
               'id' => 'madv',
               'class' => 'select2 form-control',]) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
                <label for="cqxl">Chính quyền xếp loại</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('cqxl', $prompt+$xeploai, $data->cqxl ?? NULL, [
               'id' => 'cqxl',
               'class' => 'select2 form-control',
               'data-minimum-results-for-search'=>'Infinity']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
                <label for="cuxl">Chính uỷ xếp loại</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('cuxl', $prompt+$xeploai, $data->cuxl ?? NULL, [
               'id' => 'cuxl',
               'class' => 'select2 form-control',
               'data-minimum-results-for-search'=>'Infinity']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
                <label for="cbxl">Chi bộ xếp loại</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('cbxl', $prompt+$xeploai, $data->cbxl ?? NULL, [
               'id' => 'cbxl',
               'class' => 'select2 form-control',
               'data-minimum-results-for-search'=>'Infinity']) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
                <label for="dtxl">Đoàn trường xếp loại</label>
            </div>
            <div class="col-md-8">
                {!! Form::select('dtxl', $prompt+$xeploai, $data->dtxl ?? NULL, [
               'id' => 'dtxl',
               'class' => 'select2 form-control',
               'data-minimum-results-for-search'=>'Infinity']) !!}
            </div>
        </div>

        <div class="input-group mt-5">
            <button type="submit" class="btn btn-info mr-2">Lưu</button>
            <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ</button>
        </div>
    </form>
</div>
@push('js')
    {!! JsValidator::formRequest('Modules\Dgdv\Requests\DgdvRequest','#dgdv-form') !!}
@endpush
