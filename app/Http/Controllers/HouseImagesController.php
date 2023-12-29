<?php

namespace App\Http\Controllers;

use App\Models\HouseImages;
use App\Models\Overview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HouseImagesController extends Controller
{
    //For house Image page
    public function creHouse()
    {
        $data =  Overview::get();
        return view('admin.houseImage', compact('data'));
    }
     //  house overview create
     public function houseImg(Request $request)
     {
        //validation for Request data
      Validator::make($request->all(), [
        'price' =>  'required | string',
          'houseImg.*'=>'required |image |  mimes:png,jpg,jpeg'
      ])->validate();
         //data arrange for request data
         $data = [
                'overview_id' => $request->overviewId,
                'price' => $request->price
              ];
              $imageData = array();
              //Image create for request data image
      if ($request->hasFile('houseImg')) {
          for ($i = 0; $i < count($request->file('houseImg')); $i++) {
              // dd( $request->file('houseImg')[$i]);
              $imgName = uniqid() . $request->file('houseImg')[$i]->getClientOriginalName();
               //store in public
               $request->file('houseImg')[$i]->storeAs('public/house', $imgName);
               $imageData[] = $imgName;
                 $data['image'] =    implode(",",  $imageData);
          }
      }
        HouseImages::create($data);
      return back()->with(['success' => 'Overview image data inserting process is finished!']);
     }


}
