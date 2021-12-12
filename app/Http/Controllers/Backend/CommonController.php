<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Districts;
use App\Models\Thanas;

class CommonController extends Controller
{
    public function devisionToDistrict($division)
    {
        $districts = Districts::select('id', 'division_id', 'district_en')->with('division:id,division_en')->whereHas('division', function($q) use($division){
            $q->where('division_en', 'like', '%'.$division.'%');
        })->get();
        return json_encode($districts);
    }

    public function devisionToDistrictWID($division_id)
    {
        $districts = Districts::select('id', 'division_id', 'district_en')->with('division:id,division_en')->whereHas('division', function($q) use($division_id){
            $q->where('id', $division_id);
        })->get();
        return json_encode($districts);
    }

    public function districtToThana($district)
    {
        $thanas = Thanas::select('id', 'district_id', 'thana_en')->with('district:id,district_en')->whereHas('district', function($q) use($district){
            $q->where('district_en', 'like', '%'.$district.'%');
        })->get();
        return json_encode($thanas);
    }

    public function districtToThanaWithEndDateCheck($district)
    {
        $thanas = Thanas::select('id', 'district_id', 'thana_en')->with('district:id,district_en')->whereDate('end_date', '>=', getToday())->whereHas('district', function($q) use($district){
            $q->where('district_en', 'like', '%'.$district.'%');
        })->get();
        return json_encode($thanas);
    }

    public function districtToThanaWID($district_id)
    {
        $thanas = Thanas::select('id', 'district_id', 'thana_en')->with('district:id,district_en')->whereHas('district', function($q) use($district_id){
            $q->where('id', $district_id);
        })->get();
        return json_encode($thanas);
    }

    public function districtToThanaWIDWithEndDateCheck($district_id)
    {
        $thanas = Thanas::select('id', 'district_id', 'thana_en')->with('district:id,district_en')->whereDate('end_date', '>=', getToday())->whereHas('district', function($q) use($district_id){
            $q->where('id', $district_id);
        })->get();
        return json_encode($thanas);
    }

    public function clearSession($session_name)
    {
        session()->forget($session_name);

        return '<h1> Session '.$session_name.' removed!</h1>';
    }

}
