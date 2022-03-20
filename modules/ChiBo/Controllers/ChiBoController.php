<?php

namespace Modules\ChiBo\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\ChiBo\Models\ChiBo;
use Modules\ChiBo\Requests\ChiBoRequest;
use Modules\DangBo\Models\DangBo;
use Modules\User\Models\User;


class ChiBoController extends Controller {

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
        $data = ChiBo::query();

        $data = $data->orderBy('macb')->paginate(20);
        return view("ChiBo::index", compact('data'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function getCreate(Request $request) {
        $dangbo = DangBo::all()->pluck("tendb", "madb")->toArray();
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view('ChiBo::form', compact('dangbo'))->render();
    }

    /**
     * @param ChiBoRequest $request
     * @return RedirectResponse
     */
    public function postCreate(ChiBoRequest $request) {
        $data = $request->all();

        $user = User::create([
            'name'     => $data['tencb'],
            'username' => $data['username'],
            'password' => $data['password'],
            'role_id'  => 3,
        ]);

        unset($data['username']);
        unset($data['password']);

        $data['user_id'] = $user->id;

        ChiBo::create($data);

        $request->session()->flash('success', trans('Thêm mới thành công'));

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View
     */
    public function getUpdate(Request $request, $id) {
        $dangbo = DangBo::all()->pluck("tendb", "madb")->toArray();
        $data   = ChiBo::query()->find($id);
        $user   = User::query()->find($data->user_id);

        return view('ChiBo::form', compact('data', 'dangbo', 'user'));
    }

    /**
     * @param ChiBoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(ChiBoRequest $request, $id) {
        $data = $request->all();
        $chibo = ChiBo::query()->find($id);

        // Update user
        $user     = User::query()->find($chibo->user_id);
        $user['username'] = $data['username'];
        $user['name'] = $data['tencb'];
        if (!empty($data['password'])) {
            $user['password'] = $data['password'];
        }
        $user->save();
        unset($data['username']);
        unset($data['password']);

        $chibo->update($data);
        $request->session()->flash('success', trans('Chỉnh sửa thành công'));

        return back();
    }

    public function delete(Request $request, $id) {
        $chibo = ChiBo::query()->find($id)->delete();
        $user     = User::query()->find($chibo->user_id);
        $user->delete();
        $request->session()->flash('success', trans('Xoá thành công'));

        return back();
    }
}
