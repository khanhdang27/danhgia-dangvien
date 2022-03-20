@php($prompt = ['' => 'Chọn đảng viên'])
<div class="card">
    <form action="" method="post" class="form-material">
        @csrf
        <div id="member-info">
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="nam" class="title">Năm</label>
                    </div>
                    <div class="col-md-4">
                        {!! Form::select('nam', $nam, $data->nam ?? $toyear, [
                       'id' => 'nam',
                       'class' => 'select2 form-control',]) !!}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="madv">Đảng viên</label>
                    </div>
                    <div class="col-md-4">
                        {!! Form::select('madv', $prompt + $dangvien, $data->madv ?? NULL, [
                       'id' => 'madv',
                       'class' => 'select2 form-control',]) !!}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                       <label for="chuakd" class="title">Chưa kiểm điểm</label>
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="checkbox-custom" id="chuakd" name="chuakd"
                               value="1" {{$data->chuakd ?? old('chuakd') == 1 ? 'checked'  : ''}}>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="chuadg" class="title">Chưa đánh giá</label>
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="checkbox-custom" id="chuadg" name="chuadg"
                               value="1" {{$data->chuadg ?? old('chuadg') == 1 ? 'checked'  : ''}}>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="lydo" class="title">Lý do</label>
                    </div>
                    <div class="col-md-4">
                        <textarea type="text" id="lydo" class="form-control" rows="3"
                                  name="lydo">{{$data->lydo ?? old('lydo') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="p-2 mt-5">
                <button type="submit" id="save" class="btn btn-info mr-2">Lưu</button>
                <button type="reset" class="btn btn-default">Huỷ</button>
            </div>
        </div>
    </form>
</div>
@push('js')
    {!! JsValidator::formRequest('Modules\ChuaDg\Requests\ChuaDgRequest') !!}
    <script !src="">

        var datetime = $('input.datetime-modal-form');
        datetime.attr('autocomplete', "off");
        datetime.datetimepicker({
            format: 'yyyy',
            fontAwesome: true,
            startView: 'decade',
            minView: 'decade',
            autoclose: true,
            language: 'vi',
        });
    </script>
@endpush
