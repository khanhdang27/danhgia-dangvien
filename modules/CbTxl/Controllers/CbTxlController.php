<?php

namespace Modules\CbTxl\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\CbTxl\Requests\CbTxlRequest;
use Modules\ChiBo\Models\ChiBo;
use Modules\ChuaDg\Models\Nam;
use Modules\Dgcb\Models\Dgcb;
use Modules\Rating\Models\Rating;


class CbTxlController extends Controller {

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
        $chibo    = ChiBo::query()->where('user_id', Auth::id())->first();
        $data = Dgcb::query()->where('macb',$chibo->macb);
        $data = $data->orderBy('nam')->paginate(20);

        return view("CbTxl::index", compact('data'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function getCreate(Request $request) {
        $xeploai = Rating::all()->pluck('tenxeploai', 'maxeploai')->toArray();
        $nam     = Nam::all()->pluck('nam', 'nam')->toArray();
        $toyear  = Carbon::now()->year;
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view('CbTxl::form', compact('xeploai', 'nam', 'toyear'))->render();
    }

    /**
     * @param CbTxlRequest $request
     * @return RedirectResponse
     */
    public function postCreate(CbTxlRequest $request) {
        $data  = $request->all();
        $chibo = ChiBo::query()->where('user_id', Auth::user()->id)->first();
        $txl   = Dgcb::query()->where('nam', $data['nam'])->where('macb', $chibo->macb)->first();
        if ($txl != null) {
            $txl->update($data);
            $request->session()->flash('success', trans('Cập nhật thành công'));
        } else {
            Dgcb::create([
                'macb' => $chibo->macb,
                'nam'  => $data['nam'],
                'txl'  => $data['txl'],
            ]);
            $request->session()->flash('success', trans('Thêm mới thành công'));
        }

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View
     */
    public function getUpdate(Request $request, $macb, $nam) {
        $data    = Dgcb::query()->where('nam', $nam)->where('macb', $macb)->first();
        $xeploai = Rating::all()->pluck('tenxeploai', 'maxeploai')->toArray();
        $nam     = Nam::all()->pluck('nam', 'nam')->toArray();
        $toyear  = Carbon::now()->year;
        return view('CbTxl::form', compact('data', 'xeploai', 'nam', 'toyear'));
    }

    /**
     * @param CbTxlRequest $request
     * @param $macb
     * @param $nam
     * @return RedirectResponse
     */
    public function postUpdate(CbTxlRequest $request, $macb, $nam) {
        $data = $request->all();
        $txl  = Dgcb::query()->where('nam', $nam)->where('macb', $macb)->first();
        if ($txl != null) {
            if ($data['nam'] == $nam)
                $txl->update($data);
            else {
                $txl_new = Dgcb::query()->where('nam', $data['nam'])->where('macb', $macb)->first();
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

    public function delete(Request $request, $macb, $nam) {
        $txl = Dgcb::query()->where('nam', $nam)->where('macb', $macb)->first();

        if ($txl != null)
            if ($txl->dut != null || $txl->duk != null)
                $txl->update([
                    'txl' => NULL
                ]);
            else
                $txl->delete();

        $request->session()->flash('success', trans('Xoá thành công'));

        return back();
    }
}
