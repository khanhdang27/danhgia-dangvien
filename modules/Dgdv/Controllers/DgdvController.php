<?php

namespace Modules\Dgdv\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\ChiBo\Models\ChiBo;
use Modules\ChuaDg\Models\Nam;
use Modules\DangVien\Models\DangVien;
use Modules\Dgdv\Models\Dgdv;
use Modules\Dgdv\Requests\DgdvRequest;
use Modules\Rating\Models\Rating;


class DgdvController extends Controller {

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
     * @return Factory|View
     */
    public function index(Request $request) {
        $macb = ChiBo::query()->where('user_id', Auth::id())->first()->macb;
        $data = Dgdv::query()->whereHas('dangvien', function ($query) use ($macb) {
            $query->where('macb', $macb);
        })->orderBy('nam')->paginate(20);

        return view("Dgdv::index", compact('data'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function getCreate(Request $request) {
        $chibo    = ChiBo::query()->where('user_id', Auth::id())->first();
        $xeploai  = Rating::all()->pluck('tenxeploai', 'maxeploai')->toArray();
        $dangvien = DangVien::query()->where('macb', $chibo->macb)->pluck('hoten', 'madv');
        $nam      = Nam::all()->pluck('nam', 'nam')->toArray();
        $toyear   = Carbon::now()->year;
        $dangvien = $dangvien->map(function ($dv, $key) {
            return $key . ' - ' . $dv;
        })->toArray();
        return view('Dgdv::create', compact('xeploai', 'dangvien', 'nam', 'toyear'))->render();
    }

    /**
     * @param DgdvRequest $request
     * @return RedirectResponse
     */
    public function postCreate(DgdvRequest $request) {
        $data = $request->all();
        $dgdv = Dgdv::query()->where('nam', $data['nam'])->where('madv', $data['madv'])->first();
        if ($dgdv != null) {
            $dgdv->update($data);
            $request->session()->flash('success', trans('Cập nhật thành công'));
        } else {
            Dgdv::create($data);
            $request->session()->flash('success', trans('Thêm mới thành công'));
        }

        return redirect()->route('get.dgdv.list');
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View
     */
    public function getUpdate(Request $request, $madv, $nam) {
        $chibo    = ChiBo::query()->where('user_id', Auth::id())->first();
        $data     = Dgdv::query()->where('nam', $nam)->where('madv', $madv)->first();
        $dangvien = DangVien::query()->where('macb', $chibo->macb)->pluck('hoten', 'madv');
        $dangvien = $dangvien->map(function ($dv, $key) {
            return $key . ' - ' . $dv;
        })->toArray();
        $xeploai  = Rating::all()->pluck('tenxeploai', 'maxeploai')->toArray();
        $nam      = Nam::all()->pluck('nam', 'nam')->toArray();
        $toyear   = Carbon::now()->year;
        return view('Dgdv::update', compact('data', 'xeploai', 'dangvien', 'nam', 'toyear'));
    }

    /**
     * @param DgdvRequest $request
     * @param $madv
     * @param $nam
     * @return RedirectResponse
     */
    public function postUpdate(DgdvRequest $request, $madv, $nam) {
        $data = $request->all();
        $dgdv = Dgdv::query()->where('nam', $nam)->where('madv', $madv)->first();
        if ($dgdv != null) {
            if ($data['nam'] == $nam && $data['madv'] == $madv)
                $dgdv->update($data);
            else {
                $dgdv_new = Dgdv::query()->where('nam', $data['nam'])->where('madv', $data['madv'])->first();
                if ($dgdv_new == null) {
                    $dgdv->update($data);
                } else {
                    $request->session()->flash('danger', trans('Năm này đã đánh giá rồi'));
                    return back();
                }
            }
        }

        $request->session()->flash('success', trans('Chỉnh sửa thành công'));
        return redirect()->route('get.dgdv.list');
    }

    public function delete(Request $request, $madv, $nam) {
        $dgdv = Dgdv::query()->where('nam', $nam)->where('madv', $madv)->first();

        if ($dgdv != null)
            if ($dgdv->txl != null)
                $dgdv->update([
                    'cqxl' => NULL,
                    'cuxl' => NULL,
                    'cbxl' => NULL,
                    'dtxl' => NULL,
                ]);
            else
                $dgdv->delete();

        $request->session()->flash('success', trans('Xoá thành công'));
        return back();
    }
}