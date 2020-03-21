<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Laracasts\Flash\Flash;
use Response;

class LogAPIController extends AppBaseController
{
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }
    /**
     * Back all logs
     */
    public function index(Request $request)
    {
        $logs=DB::table('logs')->where('level','!=','ERROR')->orderByDesc('created_at')->get();

        return $this->sendResponse($logs->toArray(), 'Logs retrieved successfully');
    }

    /**
     * @param $id = user_id
     */
    public function logsUser($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('User') . ' ' . __('not found.'));
            $logs=[];

            return $this->sendResponse($logs, 'User not found.');
        }
        $logs = DB::table('logs')
            ->where('level', '!=', 'ERROR')
            ->where('message', 'LIKE', '%'.$user->email.'%')
            ->orderByDesc('created_at')->get();
//        dd($logs);

        return $this->sendResponse($logs->toArray(), 'Logs retrieved successfully');
    }
}
