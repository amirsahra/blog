<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Province;
use Config;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware(SuperAdmin::class);
    }

    public function index()
    {
        $data = [
            'cities' => City::orderByDesc('province_id')->paginate(Config::get('dornicasettings.paginate.city')),
        ];
        return view('panel.region.index-city', compact('data'));
    }

    public function create()
    {
        $provinces= Province::all();
        return view('panel.region.create-city',compact('provinces'));
    }

    public function store(CityRequest $cityRequest)
    {
        City::create($cityRequest->only('name', 'slug', 'province_id'));
        return redirect()->back()->with('success', 'Create city successfully');
    }


    public function edit(City $city)
    {
        return view('panel.region.edit-city', compact('city'));
    }

    public function update(CityRequest $cityRequest, City $city)
    {
        $city->update($cityRequest->only('name', 'slug'));
        return redirect()->back()->with('success', 'Update province successfully');
    }


    public function destroy(City $city)
    {
        try {
            $city->delete();
            return redirect()->back()->with('success', 'Delete city successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Can not delete this city');
        }
    }
}
