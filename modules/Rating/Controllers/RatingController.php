<?php

namespace Modules\Rating\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Rating\Models\Rating;
use Modules\Rating\Requests\RatingRequest;

class RatingController extends Controller {

    /**
     * @return Factory|View
     */
    public function index(Request $request) {
        $data = Rating::query()->paginate(20);

        return view("Rating::index", compact('data'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function getCreate(Request $request) {
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view('Rating::form')->render();
    }

    /**
     * @param RatingRequest $request
     * @return RedirectResponse
     */
    public function postCreate(RatingRequest $request) {
        Rating::create($request->all());
        $request->session()->flash('success', 'Thêm mới thành công');

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|RedirectResponse
     */

    public function getUpdate(Request $request, $id) {
        $data = Rating::query()->find($id);

        return view('Rating::form', compact('data'));
    }

    /**
     * @param RatingRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(RatingRequest $request, $id) {
        $data = Rating::query()->find($id);
        $data->update($request->all());
        $request->session()->flash('success', 'Chỉnh sửa thành công');

        return back();
    }

    public function delete(Request $request, $id) {
        Rating::query()->find($id)->delete();
        $request->session()->flash('success', 'Xoá thành công');

        return back();
    }
}
