<?php

namespace Modules\DangVien\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\ChiBo\Models\ChiBo;
use Modules\DangVien\Models\DangVien;
use Modules\DangVien\Requests\DangVienRequest;
use Modules\User\Models\User;

class DangVienController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        # parent::__construct();
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request) {
        if(Auth::user()->role_id == 2){
            // Dang uy khoa
            $filter = $request->all();
            $chibo = ChiBo::all()->pluck('tencb','macb');
            $data = DangVien::filter($filter)->orderBy('madv')->paginate(15);
            return view("DangVien::index", compact('chibo','data', 'filter'));

        }else{
            //Chi bo
            $chibo = ChiBo::query()->where('user_id',Auth::id())->first();
            $data = DangVien::query()->where('macb',$chibo->macb)->orderBy('madv')->paginate(15);
            return view("DangVien::index", compact('data'));
        }
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function getCreate() {
        $chibo = ChiBo::all()->pluck('tencb', 'macb')->toArray();
        $cb = ChiBo::query()->where('user_id',Auth::id())->first();
        return view('DangVien::create', compact('cb','chibo'));
    }

    /**
     * @param DangVienRequest $request
     * @return RedirectResponse
     */
    public function postCreate(DangVienRequest $request) {
        $data                  = $request->all();
        $data['ngaysinh']      = Carbon::parse($data['ngaysinh'])->format('Y-m-d');
        $data['ngayvaodang']   = Carbon::parse($data['ngayvaodang'])->format('Y-m-d');
        $data['ngaychinhthuc'] = Carbon::parse($data['ngaychinhthuc'])->format('Y-m-d');

        $user = User::create([
            'name'     => $data['hoten'],
            'username' => $data['username'],
            'password' => $data['password'],
            'role_id'  => 4,
        ]);

        unset($data['username']);
        unset($data['password']);
        $data['user_id'] = $user->id;
        $cb = ChiBo::query()->where('user_id',Auth::id())->first();
        if($cb != null)
            $data['macb'] = $cb->macb;
        $dangvien = new DangVien($data);
        $dangvien->save();

        $request->session()->flash('success', trans('Thêm mới thành công'));

        return redirect()->route('get.dangvien.list');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function getUpdate($id) {
        $chibo    = ChiBo::all()->pluck('tencb', 'macb')->toArray();
        $dangvien = DangVien::query()->find($id);
        $user     = User::query()->find($dangvien->user_id);
        $cb = ChiBo::query()->where('user_id',Auth::id())->first();
        return view('DangVien::update', compact('cb','dangvien', 'chibo', 'user'));
    }

    /**
     * @param DangVienRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(DangVienRequest $request, $id) {
        if ($request->post()) {
            $data     = $request->all();
            $dangvien = DangVien::query()->find($id);

            // Update user
            $user     = User::query()->find($dangvien->user_id);
            $user['username'] = $data['username'];
            $user['name'] = $data['hoten'];
            if (!empty($data['password'])) {
                $user['password'] = $data['password'];
            }
            $user->save();
            unset($data['username']);
            unset($data['password']);

            $data['ngaysinh']      = Carbon::parse($data['ngaysinh'])->format('Y-m-d');
            $data['ngayvaodang']   = Carbon::parse($data['ngayvaodang'])->format('Y-m-d');
            $data['ngaychinhthuc'] = Carbon::parse($data['ngaychinhthuc'])->format('Y-m-d');

            $dangvien->update($data);
            $request->session()->flash('success', trans('Chỉnh sửa thành công'));
        }

        return redirect()->route('get.dangvien.list');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id) {
        $dangvien = DangVien::query()->find($id);
        $user     = User::query()->find($dangvien->user_id);
        $user->delete();
        $dangvien->delete();

        $request->session()->flash('success', trans('Xoá thành công'));

        return redirect()->back();
    }
}
