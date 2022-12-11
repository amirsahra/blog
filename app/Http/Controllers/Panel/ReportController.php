<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Models\Province;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(SuperAdmin::class);
    }

    public function index(Request $request)
    {
        $user = User::query();
        if ($request->has('gender') && !is_null($request->get('gender')))
            $user = $user->where('gender', $request->get('gender'));
        if ($request->has('province_id') && !is_null($request->get('province_id')))
            $user = $user->where('province_id', $request->get('province_id'));
        if ($request->has('city_id') && !is_null($request->get('city_id')))
            $user = $user->where('city_id', $request->get('city_id'));

        //dd($user->toSql());
        $users = $user->get();
        return view('panel.report.index', compact('users'));
    }

    public function chart()
    {
        $results = DB::select("SELECT pro.name, count(users.province_id) as count  FROM `users` left Join provinces as pro on  users.province_id=pro.id group by pro.id");
        $labels=array();
        $counts=array();
        foreach ($results as $result){
            $labels[] = $result->name;
            $counts[] = $result->count;
        }

        return view('panel.report.chart', compact('counts', 'labels'));
    }

}
