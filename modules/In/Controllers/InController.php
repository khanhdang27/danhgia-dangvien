<?php

namespace Modules\In\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\ChiBo\Models\ChiBo;
use Modules\ChuaDg\Models\ChuaDg;
use Modules\DangVien\Models\DangVien;
use Modules\Dgcb\Models\Dgcb;
use Modules\Dgdv\Models\Dgdv;

class InController extends Controller {

    public function index() {
        return view("In::index");
    }

    public function printMau1(Request $request) {
        $now = Carbon::now()->year;
        //        $data = DangVien::query()->orderBy('hoten')->get();
        $data = Dgdv::query()->where('nam', $now)->where('cbxl', '<>', NULL)->get();

        return view("In::mau1", compact('data', 'now'));
    }

    public function printMau2(Request $request) {
        $now      = Carbon::now()->year;
        $data     = Dgdv::query()->where('nam', $now)->where('duk', 'HTXSNV')->get();
        $dvxs     = Dgdv::query()->where('nam', $now)->where('duk', 'HTXSNV')->pluck('madv');
        $dangvien = Dgdv::query()->where('nam', $now)->whereNotIn('madv', $dvxs)->where('cbxl', '<>', NULL)->get();
        return view("In::mau2", compact('data', 'now', 'dangvien'));
    }

    public function printMau3(Request $request) {
        $now = Carbon::now()->year;
        return view("In::mau3", compact('now'));
    }

    public function printMau4(Request $request) {
        $now   = Carbon::now()->year;
        $chibo = ChiBo::query()->with('dgcb', function ($query) use ($now) {
            $query->where('nam', $now);
        })->get();
        return view("In::mau4", compact('now', 'chibo'));
    }

    public function printMau5(Request $request) {
        $carbon = Carbon::now();
        $ngay   = str_pad($carbon->day, 2, 0, 0);
        $thang  = str_pad($carbon->month, 2, 0, 0);
        $nam    = $carbon->year;
        $chibo  = ChiBo::query()->with('dgcb', function ($query) use ($nam) {
            $query->where('nam', $nam);
        })->get();
        return view("In::mau5", compact('ngay', 'thang', 'nam', 'chibo'));
    }

    public function printMau6(Request $request) {
        $carbon = Carbon::now();
        $ngay   = str_pad($carbon->day, 2, 0, 0);
        $thang  = str_pad($carbon->month, 2, 0, 0);
        $nam    = $carbon->year;
        $data   = DangVien::query()->with('dgdv', function ($query) use ($nam) {
            $query->where('nam', $nam);
        })->get();
        return view("In::mau6", compact('ngay', 'thang', 'nam', 'data'));
    }

    public function printMau7(Request $request) {
        $carbon = Carbon::now();
        $ngay   = str_pad($carbon->day, 2, 0, 0);
        $thang  = str_pad($carbon->month, 2, 0, 0);
        $nam    = $carbon->year;
        $data   = Dgdv::query()->where('nam', $nam)->get();

        return view("In::mau7", compact('ngay', 'thang', 'nam', 'data'));
    }

    public function printMau8(Request $request) {
        $carbon = Carbon::now();
        $ngay   = str_pad($carbon->day, 2, 0, 0);
        $thang  = str_pad($carbon->month, 2, 0, 0);
        $nam    = $carbon->year;
        $data   = Dgdv::query()->where('nam', $nam)->where('duk', 'HTXSNV')->get()->sortBy(function ($query) {
            return $query->dangvien->chibo->tencb;
        });
        return view("In::mau8", compact('ngay', 'thang', 'nam', 'data'));
    }

    public function printMau9(Request $request) {
        $carbon = Carbon::now();
        $ngay   = str_pad($carbon->day, 2, 0, 0);
        $thang  = str_pad($carbon->month, 2, 0, 0);
        $nam    = $carbon->year;
        $data   = Dgcb::query()->where('nam', $nam)->where('duk', '<>', NULL)->orderBy('macb')->get();
        return view("In::mau9", compact('ngay', 'thang', 'nam', 'data'));
    }

    public function printMau10(Request $request) {
        $carbon = Carbon::now();
        $ngay   = str_pad($carbon->day, 2, 0, 0);
        $thang  = str_pad($carbon->month, 2, 0, 0);
        $nam    = $carbon->year;
        $data   = Dgcb::query()->where('nam', $nam)->where('duk', 'HTXSNV')->orderBy('macb')->get();
        return view("In::mau10", compact('ngay', 'thang', 'nam', 'data'));
    }

    public function printMau11(Request $request) {
        $nam  = Carbon::now()->year;
        $data = ChuaDg::query()->where('nam', $nam)->orderBy('madv')->get();
        return view("In::mau11", compact('nam', 'data'));
    }
}
