<?php

namespace Modules\DangBo\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\DangBo\Models\DangBo;
use Modules\DangBo\Requests\DangBoRequest;


class DangBoController extends Controller {

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
        $data = DangBo::query();
        $data = $data->orderBy('madb')->paginate(20);
        return view("DangBo::index", compact('data'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function getCreate(Request $request) {
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view('DangBo::form')->render();
    }

    /**
     * @param DangBoRequest $request
     * @return RedirectResponse
     */
    public function postCreate(DangBoRequest $request) {
        DangBo::create($request->all());
        $request->session()->flash('success', trans('Thêm mới thành công'));

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View
     */
    public function getUpdate(Request $request, $id) {
        $data     = DangBo::query()->find($id);

        return view('DangBo::form', compact('data'));
    }

    /**
     * @param DangBoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(DangBoRequest $request, $id) {
        $data = DangBo::query()->find($id);
        $data->update($request->all());
        $request->session()->flash('success', trans('Chỉnh sửa thành công'));

        return back();
    }

    public function delete(Request $request, $id) {
        DangBo::query()->find($id)->delete();
        $request->session()->flash('success', trans('Xoá thành công'));

        return back();
    }
}
