<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = User::query();
        if ($request->has('gender') && !is_null($request->get('gender')))
            $user = $user->where('gender',$request->get('gender'));
        if ($request->has('province_id') && !is_null($request->get('province_id')))
            $user = $user->where('province_id',$request->get('province_id'));
        if ($request->has('city_id') && !is_null($request->get('city_id')))
            $user = $user->where('city_id',$request->get('city_id'));

        //dd($user->toSql());
        $users = $user->get();
        return view('panel.report.index',compact('users'));
    }
}
