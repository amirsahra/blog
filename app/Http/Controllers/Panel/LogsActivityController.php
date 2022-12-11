<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogsActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware(SuperAdmin::class);
    }

    public function index()
    {
        $logs = Activity::orderBy('created_at','desc')->paginate('10');
        return view('panel.logs',compact('logs'));
    }
}
