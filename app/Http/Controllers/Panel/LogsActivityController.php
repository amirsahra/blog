<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogsActivityController extends Controller
{
    public function index()
    {
        $logs = Activity::paginate('10');
        return view('panel.logs',compact('logs'));
    }
}
