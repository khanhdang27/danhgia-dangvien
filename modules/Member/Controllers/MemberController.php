<?php

namespace Modules\Member\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Base\Models\Status;
use Modules\Member\Models\DangVien;
use Modules\Member\Requests\DangVienRequest;


class MemberController extends Controller {

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
     * @return Application|Factory|View
     */
    public function index(Request $request) {
        $filter   = $request->all();
        $statuses = Status::getStatuses();
        $members  = DangVien::filter($filter)->orderBy('name')->paginate(15);
        return view("Member::backend.index", compact('members', 'filter', 'statuses'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function getCreate() {
        $statuses = Status::getStatuses();
        return view('Member::backend.create', compact('statuses'));
    }

    /**
     * @param DangVienRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postCreate(DangVienRequest $request) {
        $data             = $request->all();
        $data['birthday'] = Carbon::parse($data['birthday'])->format('Y-m-d');
        $member           = new DangVien($data);
        $member->save();
        $request->session()->flash('success', trans('Created successfully.'));

        return redirect()->route('get.member.list');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function getUpdate($id) {
        $member   = DangVien::query()->find($id);
        $statuses = Status::getStatuses();
        return view('Member::backend.update', compact('member', 'statuses'));
    }

    /**
     * @param DangVienRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(DangVienRequest $request, $id) {
        if ($request->post()) {
            $data   = $request->all();
            $member = DangVien::query()->find($id);
            if (empty($data['password'])) {
                unset($data['password']);
            }
            unset($data['password_re_enter']);
            $data['birthday'] = Carbon::parse($data['birthday'])->format('Y-m-d');
            $member->update($data);
            $request->session()->flash('success', trans('Updated successfully.'));
        }

        return redirect()->route('get.member.list');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id) {
        $member = DangVien::query()->find($id);
        $member->delete();
        $request->session()->flash('success', trans('Deleted successfully.'));

        return redirect()->back();
    }
}
