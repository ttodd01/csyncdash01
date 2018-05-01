<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use App\Models\GearCategories;
use Illuminate\Http\Request;

use App\Http\Requests;

class GearController extends Controller
{

    public function getGear($category_id = null)
    {
        $gear = Gear::all();
        if(!$category_id == null) 
        {
            if($category_id == "all")
                $gear = Gear::all();
            else
                $gear = Gear::where('category_id', $category_id)->get();
        }

        return view('gear.gear', [
            'gear' => $gear,
            'all_categories' => GearCategories::all()
        ]);

    }

}
