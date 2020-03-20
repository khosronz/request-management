<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function index()
    {
        $logs=DB::table('logs')->where('level','!=','ERROR')->orderByDesc('created_at')->get();

        return view('logs.index')
            ->with('logs',$logs);
    }

    /**
     * @param $id = user_id
     */
    public function logsUser($id)
    {

    }
}
