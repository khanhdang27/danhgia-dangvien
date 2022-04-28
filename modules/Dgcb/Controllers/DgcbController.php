<?php

namespace Modules\Dgcb\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\ChiBo\Models\ChiBo;
use Modules\DangVien\Models\DangVien;
use Modules\Dgcb\Models\Dgcb;
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
        $nam     = Carbon::now()->year;
        $xeploai = Rating::query()->orderBy('created_at')->pluck('tenxeploai', 'maxeploai')->toArray();

        $data = ChiBo::query()->with('dgcb', function ($query) use ($nam) {
            $query->where('nam', $nam);
        })->get();
        return view("Dgcb::index", compact('data', 'xeploai'));

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateDgcb(Request $request) {

        $data = $request->post();
        $nam  = Carbon::now()->year;
        foreach ($data as $macb => $xeploai) {
            $dgcb = Dgcb::query()->where('nam', $nam)->where('macb', $macb)->first();
            if ($dgcb != null) {
                $dgcb->update($xeploai);
            } else {
                $xeploai['macb'] = $macb;
                $xeploai['nam']  = $nam;
                Dgcb::create($xeploai);
            }
        }
        $request->session()->flash('success', trans('Cập nhật thành công'));
        $requestUrl = $request->getRequestUri();
        return redirect($requestUrl);
    }
}
