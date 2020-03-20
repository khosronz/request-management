<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Response;

class LogAPIController extends AppBaseController
{
    /**
     * Back all logs
     */
    public function index()
    {
        $logs=DB::table('logs')->where('level','!=','ERROR')->orderByDesc('created_at')->get();

        return $this->sendResponse($logs->toArray(), 'Cards retrieved successfully');
    }

    /**
     * @param $id = user_id
     */
    public function logsUser($id)
    {

    }
}
