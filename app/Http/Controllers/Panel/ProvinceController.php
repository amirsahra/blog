<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use Config;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function __construct()
    {
        $this->middleware(SuperAdmin::class);
    }

    public function index()
    {
        $data = [
            'provinces' => Province::orderByDesc('id')->paginate(Config::get('dornicasettings.paginate.region')),
        ];
        return view('panel.region.index', compact('data'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('panel.region.create-province', compact('provinces'));
    }


    public function store(ProvinceRequest $provinceRequest)
    {
        Province::create($provinceRequest->only('name', 'slug'));
        return redirect()->back()->with('success', 'Create province successfully');
    }

    public function edit(Province $province)
    {
        return view('panel.region.edit-province', compact('province'));
    }

    public function update(ProvinceRequest $provinceRequest, Province $province)
    {
        $province->update($provinceRequest->only('name', 'slug'));
        return redirect()->back()->with('success', 'Update province successfully');
    }

    public function destroy(Province $province)
    {
        try {
            $province->delete();
            return redirect()->back()->with('success', 'Delete province successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Can not delete this province');
        }
    }
}
