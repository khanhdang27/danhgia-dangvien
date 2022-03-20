<?php

namespace Modules\Dgcb\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\ChuaDg\Models\Nam;
use Modules\DangVien\Models\DangVien;
use Modules\Dgcb\Models\Dgcb;
use Modules\Dgcb\Requests\DgcbRequest;
use Modules\Rating\Models\Rating;


class DgcbController extends Controller {

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
        $data = Dgcb::query();
        $data = $data->orderBy('nam')->paginate(20);

        return view("Dgcb::index", compact('data'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function getCreate(Request $request) {
        $xeploai  = Rating::all()->pluck('tenxeploai', 'maxeploai')->toArray();
        $dangvien = DangVien::all()->pluck('hoten', 'madv');
        $nam      = Nam::all()->pluck('nam', 'nam')->toArray();
        $toyear   = Carbon::now()->year;

        return view('Dgcb::create', compact('xeploai', 'dangvien', 'nam', 'toyear'))->render();
    }

    /**
     * @param DgcbRequest $request
     * @return RedirectResponse
     */
    public function postCreate(DgcbRequest $request) {
        $data = $request->all();
        $dgdv = Dgcb::query()->where('nam', $data['nam'])->where('madv', $data['madv'])->first();
        if ($dgdv != null) {
            $dgdv->update($data);
            $request->session()->flash('success', trans('Cập nhật thành công'));
        } else {
            Dgcb::create($data);
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
        $data     = Dgcb::query()->where('nam', $nam)->where('madv', $madv)->first();
        $dangvien = DangVien::all()->pluck('hoten', 'madv');
        $xeploai  = Rating::all()->pluck('tenxeploai', 'maxeploai')->toArray();
        $nam      = Nam::all()->pluck('nam', 'nam')->toArray();
        $toyear   = Carbon::now()->year;
        return view('Dgcb::update', compact('data', 'xeploai', 'dangvien', 'nam', 'toyear'));
    }

    /**
     * @param DgcbRequest $request
     * @param $madv
     * @param $nam
     * @return RedirectResponse
     */
    public function postUpdate(DgcbRequest $request, $madv, $nam) {
        $data = $request->all();
        $dgdv = Dgcb::query()->where('nam', $nam)->where('madv', $madv)->first();
        if ($dgdv != null) {
            if ($data['nam'] == $nam && $data['madv'] == $madv)
                $dgdv->update($data);
            else {
                $dgdv_new = Dgcb::query()->where('nam', $data['nam'])->where('madv', $data['madv'])->first();
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
        $dgdv = Dgcb::query()->where('nam', $nam)->where('madv', $madv)->first();

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
