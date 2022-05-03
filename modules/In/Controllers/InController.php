<?php

namespace Modules\In\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\DangVien\Models\DangVien;
use Modules\Dgdv\Models\Dgdv;

class InController extends Controller {

    public function index() {
        return view("In::index");
    }

    public function printMau1(Request $request) {
        $now  = Carbon::now()->year;
        $data = DangVien::query()->orderBy('hoten')->get();
        return view("In::mau1", compact('data', 'now'));
    }

    public function printMau2(Request $request) {
        $now  = Carbon::now()->year;
        $data = Dgdv::query()->where('nam', $now)->where('duk', 'HTXSNV')->get();
        return view("In::mau2", compact('data', 'now'));
    }

    public function printMau3(Request $request) {
        $now = Carbon::now()->year;
        return view("In::mau3", compact('now'));
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
}
