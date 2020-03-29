<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class LogController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    public function index()
    {
        if (\Illuminate\Support\Facades\Gate::allows('all-auth-logs')){
            $logs = DB::table('logs')->where('level', '!=', 'ERROR')->orderByDesc('created_at')->get();

            return view('logs.index')
                ->with('logs', $logs);
        }

        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    /**
     * @param $id = user_id
     */
    public function logsUser($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('User') . ' ' . __('not found.'));

            return redirect(route('organizationUsers.index'));
        }

        $logs = DB::table('logs')
            ->where('level', '!=', 'ERROR')
            ->where('message', 'LIKE', '%'.$user->email.'%')
            ->orderByDesc('created_at')->get();

        return view('logs.users.index')
            ->with('logs', $logs);
    }

    public function logSessions()
    {
        $sessions=Auth::user()->sessions;
//        dd($sessions);
//        dd($sessions);
        return view('homes.superadmin.sessions.index')
            ->with('sessions',$sessions);
    }
    public function logAllSessions()
    {
//        $sessions=DB::table('sessions')->get();
        $sessions=Session::all();
//        dd($sessions);
        return view('homes.superadmin.sessions.index')
            ->with('sessions',$sessions);
    }
    public function deleteSession($id)
    {
        $session=Session::where('id','=',$id)->first();
        if (empty($session)) {
            Flash::error(__('Session') . ' ' . __('not found.'));

            return back();
        }
        Session::destroy($id);
        Flash::success(__('Session') . ' ' . __('closed successfully.'));
        return back();
    }

}
