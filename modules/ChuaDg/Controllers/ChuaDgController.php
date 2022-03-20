<?php

namespace Modules\ChuaDg\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\ChiBo\Models\ChiBo;
use Modules\ChuaDg\Models\ChuaDg;
use Modules\ChuaDg\Models\Nam;
use Modules\ChuaDg\Requests\ChuaDgRequest;
use Modules\DangVien\Models\DangVien;

class ChuaDgController extends Controller {

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
        $macb = ChiBo::query()->where('user_id', Auth::id())->first()->macb;
        $data = ChuaDg::query()->whereHas('dangvien', function ($query) use ($macb) {
            $query->where('macb', $macb);
        })->orderBy('nam')->paginate(15);

        return view("ChuaDg::index", compact('data'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function getCreate() {
        $chibo    = ChiBo::query()->where('user_id', Auth::id())->first();
        $dangvien = DangVien::query()->where('macb', $chibo->macb)->pluck('hoten', 'madv');
        $nam      = Nam::all()->pluck('nam', 'nam')->toArray();
        $toyear   = Carbon::now()->year;
        $dangvien = $dangvien->map(function ($dv, $key) {
            return $key . ' - ' . $dv;
        })->toArray();
        return view('ChuaDg::create', compact('dangvien', 'nam', 'toyear'));
    }

    /**
     * @param ChuaDgRequest $request
     * @return RedirectResponse
     */
    public function postCreate(ChuaDgRequest $request) {
        $data = $request->all();
        $dvdg = ChuaDg::query()->where('madv', $data['madv'])->where('nam', $data['nam'])->first();
        if ($dvdg == null)
            ChuaDg::create($data);
        else {
            $request->session()->flash('danger', 'Đã có dữ liệu của đảng viên này ở năm ' . $data['nam']);
            return back();
        }

        $request->session()->flash('success', trans('Thêm mới thành công'));
        return redirect()->route('get.chuadg.list');
    }

    /**
     * @param $madv
     * @param $nam
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function getUpdate($madv, $nam) {
        $chibo    = ChiBo::query()->where('user_id', Auth::id())->first();
        $data     = ChuaDg::query()->where('madv', $madv)->where('nam', $nam)->first();
        $dangvien = DangVien::query()->where('macb', $chibo->macb)->pluck('hoten', 'madv');
        $dangvien = $dangvien->map(function ($dv, $key) {
            return $key . ' - ' . $dv;
        })->toArray();
        $nam      = Nam::all()->pluck('nam', 'nam')->toArray();
        $toyear   = Carbon::now()->year;
        return view('ChuaDg::update', compact('data', 'dangvien', 'nam', 'toyear'));
    }

    /**
     * @param ChuaDgRequest $request
     * @param $madv
     * @param $nam
     * @return RedirectResponse
     */
    public function postUpdate(ChuaDgRequest $request, $madv, $nam) {
        $data = $request->all();
        $dvdg = ChuaDg::query()->where('madv', $madv)->where('nam', $nam)->first();
        if ($dvdg != null)
            if ($data['nam'] == $nam && $data['madv'] == $madv) {
                $data['chuakd'] = isset($data['chuakd']);
                $data['chuadg'] = isset($data['chuadg']);
                $dvdg->update($data);
            } else {
                $dvdg_new = ChuaDg::query()->where('nam', $data['nam'])->where('madv', $data['madv'])->first();
                if ($dvdg_new == null) {
                    $dvdg->update($data);
                } else {
                    $request->session()->flash('danger', 'Đã có dữ liệu của đảng viên này ở năm ' . $data['nam']);
                    return back();
                }
            }

        $request->session()->flash('success', trans('Chỉnh sửa thành công'));
        return redirect()->route('get.chuadg.list');
    }

    /**
     * @param Request $request
     * @param $madv
     * @param $nam
     * @return RedirectResponse
     */
    public function delete(Request $request, $madv, $nam) {
        $chuadg = ChuaDg::query()->where('madv', $madv)->where('nam', $nam)->first();
        $chuadg->delete();
        $request->session()->flash('success', trans('Xoá thành công'));

        return redirect()->back();
    }
}
