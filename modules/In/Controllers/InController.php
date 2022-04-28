<?php

namespace Modules\In\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\DangVien\Models\DangVien;
use Modules\Dgdv\Models\Dgdv;

class InController extends Controller {

    public function index(){
        return view("In::index");
    }

    public function printMau1(Request $request) {
        $now = Carbon::now()->year;
        $data = DangVien::query()->orderBy('hoten')->get();
        return view("In::mau1", compact('data','now'));
    }

    public function printMau2(Request $request) {
        $now = Carbon::now()->year;
        $data = Dgdv::query()->where('nam', $now)->where('duk', 'HTXSNV')->get();
        return view("In::mau2", compact('data','now'));
    }

    public function printMau3(Request $request) {
        $now = Carbon::now()->year;
        return view("In::mau3", compact('now'));
    }
}
