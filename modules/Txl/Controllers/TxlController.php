<?php

namespace Modules\Txl\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\ChuaDg\Models\Nam;
use Modules\DangVien\Models\DangVien;
use Modules\Dgdv\Models\Dgdv;
use Modules\Rating\Models\Rating;
use Modules\Txl\Requests\TxlRequest;


class TxlController extends Controller {

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
        $dangvien = DangVien::query()->where('user_id', Auth::id())->first();
        $data     = Dgdv::query()->where('madv', $dangvien->madv);
        $data     = $data->orderBy('nam')->paginate(20);
        $toyear   = Carbon::now()->year;

        return view("Txl::index", compact('data', 'toyear'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function getCreate(Request $request) {
        $xeploai = Rating::all()->pluck('tenxeploai', 'maxeploai')->toArray();
        $toyear  = Carbon::now()->year;
        $nam     = Nam::query()->where('nam','>=',$toyear)->pluck('nam', 'nam')->toArray();
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view('Txl::form', compact('xeploai', 'nam', 'toyear'))->render();
    }

    /**
     * @param TxlRequest $request
     * @return RedirectResponse
     */
    public function postCreate(TxlRequest $request) {
        $data     = $request->all();
        $dangvien = DangVien::query()->where('user_id', Auth::user()->id)->first();
        $txl      = Dgdv::query()->where('nam', $data['nam'])->where('madv', $dangvien->madv)->first();
        if ($txl != null) {
            $request->session()->flash('danger', trans('Năm này đã đánh giá rồi'));
            return back();
            //            $txl->update([
            //                'txl' => $data['txl']
            //            ]);
            //            $request->session()->flash('success', trans('Cập nhật thành công'));
        } else {
            Dgdv::create([
                'madv' => $dangvien->madv,
                'nam'  => $data['nam'],
                'txl'  => $data['txl'],
            ]);
            $request->session()->flash('success', trans('Thêm mới thành công'));
        }

        return back();
    }

    /**
     * @param Request $request
     * @param $madv
     * @param $nam
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View
     */
    public function getUpdate(Request $request, $madv, $nam) {
        $data    = Dgdv::query()->where('nam', $nam)->where('madv', $madv)->first();
        $xeploai = Rating::all()->pluck('tenxeploai', 'maxeploai')->toArray();
        $toyear  = Carbon::now()->year;
        $nam     = Nam::query()->where('nam','>=',$toyear)->pluck('nam', 'nam')->toArray();
        return view('Txl::form', compact('data', 'xeploai', 'nam', 'toyear'));
    }

    /**
     * @param TxlRequest $request
     * @param $madv
     * @param $nam
     * @return RedirectResponse
     */
    public function postUpdate(TxlRequest $request, $madv, $nam) {
        $data = $request->all();
        $txl  = Dgdv::query()->where('nam', $nam)->where('madv', $madv)->first();
        if ($txl != null) {

            if ($data['nam'] == $nam)
                $txl->update($data);
            else {
                $txl_new = Dgdv::query()->where('nam', $data['nam'])->where('madv', $madv)->first();
                if ($txl_new == null) {
                    $txl->update($data);
                } else {
                    $request->session()->flash('danger', trans('Năm này đã đánh giá rồi'));
                    return back();
                }
            }
        }

        $request->session()->flash('success', trans('Chỉnh sửa thành công'));

        return back();
    }

    /**
     * @param Request $request
     * @param $madv
     * @param $nam
     * @return RedirectResponse
     */
    public function delete(Request $request, $madv, $nam) {
        $txl = Dgdv::query()->where('nam', $nam)->where('madv', $madv)->first();

        if ($txl != null)
            if ($txl->cqxl != null || $txl->cuxl != null || $txl->cbxl != null || $txl->dtxl != null || $txl->dut != null || $txl->duk != null)
                $txl->update([
                    'txl' => NULL
                ]);
            else
                $txl->delete();

        $request->session()->flash('success', trans('Xoá thành công'));

        return back();
    }
}
