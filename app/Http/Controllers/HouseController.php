<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
      //  house create
      public function createPage()
      {
          return view('admin.houseCreate');
      }
         //  house list
         public function listPage()
         {
            $data = House::paginate(5);
             return view('admin.houseList', compact('data'));
         }
      //house create data
      public function houseCreate(Request $request){
        //validation for house
        Validator::make($request->all(), [
            'houseType' => 'required| string'
        ])->validate();
        //create data into db
            House::create([
              'property_type' => $request->houseType
            ]);
            return back()->with(['success' => 'Your house creating process is finished!']);
      }

}
