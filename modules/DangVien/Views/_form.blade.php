<div class="card">
    <form action="" method="post" class="form-material" >
        @csrf
        <div id="member-info">
            <div class="card-header">
                <h4 class="title">Thông tin</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="macb">Chi bộ</label>
                        {!! Form::select('macb', $chibo, $data->macb ?? NULL, [
                       'id' => 'macb',
                       'class' => 'select2 form-control',]) !!}
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="madv">Mã đảng viên</label>
                        <input type="text" id="madv" class="form-control" name="madv"
                               value="{{ $dangvien->madv ?? old('madv') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="mavc">Mã viên chức</label>
                        <input type="text" id="mavc" class="form-control" name="mavc"
                               value="{{ $dangvien->mavc ?? old('mavc') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="hoten">Họ tên</label>
                        <input type="text" id="hoten" class="form-control" name="hoten"
                               value="{{ $dangvien->hoten ?? old('hoten') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="ngaysinh">Ngày sinh</label>
                        <input type="text" class="form-control date" id="ngaysinh" name="ngaysinh"
                               value="{{ !empty($dangvien) ? \Carbon\Carbon::parse($dangvien->ngaysinh)->format('d-m-Y') : old('ngaysinh') }}"
                               placeholder="dd-mm-yyyy">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="gioitinh">Giới tinh</label>
                        <select name="gioitinh" id="gioitinh" class="form-control select2">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="sodt">Số điện thoại</label>
                        <input type="text" id="sodt" class="form-control" name="sodt"
                               value="{{ $dangvien->sodt ?? old('sodt') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="ngayvaodang">Ngày vào đảng</label>
                        <input type="text" class="form-control date" id="ngayvaodang" name="ngayvaodang"
                               value="{{ !empty($dangvien) ? \Carbon\Carbon::parse($dangvien->ngayvaodang)->format('d-m-Y') : old('ngayvaodang') }}"
                               placeholder="dd-mm-yyyy">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="ngaychinhthuc">Ngày chính thức</label>
                        <input type="text" class="form-control date" id="ngaychinhthuc" name="ngaychinhthuc"
                               value="{{ !empty($dangvien) ? \Carbon\Carbon::parse($dangvien->ngaychinhthuc)->format('d-m-Y') : old('ngaychinhthuc') }}"
                               placeholder="dd-mm-yyyy">
                    </div>
                </div>
            </div>
        </div>
        <div class="member-account">
            <div class="card-header">
                <h4 class="title">Tài khoản</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="username">Tài khoản</label>
                                <input type="text" id="username" class="form-control" name="username"
                                       value="{{ $user->username ?? old('username') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" id="password" class="form-control" name="password">
                            </div>
                        </div>
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
    {!! JsValidator::formRequest('Modules\DangVien\Requests\DangVienRequest') !!}
@endpush
