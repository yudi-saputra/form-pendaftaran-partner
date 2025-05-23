<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class RegionController extends Controller
{
    public function form()
    {
        $provinces = Province::all();
        return view('partner.form', compact('provinces'));
    }

    public function getRegencie(Request $request)
    {
        $provinceId = $request->input('provinces_id');
        $regencies = Regency::where('province_id', $provinceId)->get();

        $options = '<option value="">-- Pilih --</option>';
        foreach ($regencies as $regency) {
            $options .= "<option value='{$regency->id}'>{$regency->name}</option>";
        }

        return response($options);
    }

    public function getDistrict(Request $request)
    {
        $regencyId = $request->input('regency_id');
        $districts = District::where('regency_id', $regencyId)->get();

        $options = '<option value="">-- Pilih --</option>';
        foreach ($districts as $district) {
            $options .= "<option value='{$district->id}'>{$district->name}</option>";
        }

        return response($options);
    }

    public function getVillage(Request $request)
    {
        $districtId = $request->input('district_id');
        $villages = Village::where('district_id', $districtId)->get();

        $options = '<option value="">-- Pilih --</option>';
        foreach ($villages as $village) {
            $options .= "<option value='{$village->id}'>{$village->name}</option>";
        }

        return response($options);
    }
}
