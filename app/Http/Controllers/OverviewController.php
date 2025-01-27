<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\House;
use App\Models\HouseImages;
use App\Models\Overview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OverviewController extends Controller
{
     //  house overview create
     public function createOv()
     {
       $house =   House::get();
       $agent =  Agent::get();
         return view('admin.createOverview', compact('house','agent'));
     }
      // house overview create url
      public function overview(Request $request)
      {
          //dd($request->toArray());
         //recall back vali function for validation
         $this->vali($request);
         //recall back dataArrange function for data arranging
         $data = $this->dataArrange($request);
           //dd($data);

         try {
            Overview::create($data);
            return back()->with(['success' => 'Overview data inserting process is finished!']);
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
        //   //house overview creating in Database
        //   Overview::create($data);
        //  return back()->with(['success' => 'Overview data inserting process is finished!']);
     }
     // house overview list
     public function listOv()
     {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
            ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
            ->paginate(6);
        $agentData =    Agent::get();
         return view('admin.listOverview', compact('data'));
     }
     //house detail for admin
     public function houseDetail($id){
        $houseImg =  HouseImages::where('overview_id', $id)->first();
        $houseDetail =   Overview::where('id', $id)->first();
        $houseProperty = House::where('id', $houseDetail->house_id)->first();
        $agent = Agent::where('id', $houseDetail->agent_id)->first();
       return view('admin.overviewDetail', compact('houseImg', 'houseDetail', 'agent', 'houseProperty'));
     }
     //house edit blade for admin
     public function editPage($id){
        $houseImg =  HouseImages::where('overview_id', $id)->first();
        $houseDetail =   Overview::where('id', $id)->first();
        $house = House::get();
        $agent = Agent::get();
        // dd($agent->toArray());
       return view('admin.overviewEdit', compact('houseImg', 'houseDetail', 'agent', 'house'));
     }
     //house edit route for admin
     public function Edit($id,Request $request){
              //recall back vali function for validation
         $this->vali($request);
         //recall back dataArrange function for data arranging
         $houseDetail = $this->dataArrange($request);
         $houseImg = [
            'price' => $request->price
          ];
           //Image update for request data image
          $imageData = array();
          if ($request->hasFile('houseImg')) {
              for ($i = 0; $i < count($request->file('houseImg')); $i++) {
                  // dd( $request->file('houseImg')[$i]);
                  $imgName = uniqid() . $request->file('houseImg')[$i]->getClientOriginalName();
                   //store in public
                   $request->file('houseImg')[$i]->storeAs('public/house', $imgName);
                   $imageData[] = $imgName;
                     $houseImg['image'] =    implode(",",  $imageData);
              }
          }
          //house overview upDating in Database
          Overview::where('id', $id)->update($houseDetail);
           //house Image upDating in Database
           HouseImages::where('overview_id', $id)->update($houseImg);
           return back()->with(['success' => 'Overview data updating process is finished!']);
     }
       //house delete for admin
       public function Delete($id){
             //house overview deleting in Database
          Overview::where('id', $id)->delete();
          //house Image deleting in Database
          HouseImages::where('overview_id', $id)->delete();
          return back()->with(['success' => 'Overview data deleting process is finished!']);
       }
           //private function for data arrange
    private function dataArrange($request)
    {
        return [
            'house_id' => $request->houseId,
            'agent_id' => $request->agentId,
            'discover' => $request->discover,
            'title' => $request->title,
            'type' => $request->type,
            'location' =>   $request->location,
            'bedrooms' =>   $request->bedroom,
            'bathrooms' =>   $request->bathroom,
            'garages' =>   $request->garage,
            'sqft' =>   $request->sqft,
            'description' =>   $request->houseDescription
        ];
    }

    //private function for validation edit
    private function vali($request)
    {
        $rules = [
            'houseId' => 'required | string',
            'agentId' => 'required |  string',
            'discover' => 'required |  string',
            'title' => 'required |  string',
            'type' => 'required | string',
            'location' => 'required |  string',
            'bedroom' => 'required| numeric',
            'bathroom' => 'required | numeric',
            'garage' => 'required |  numeric',
            'sqft' => 'required |  string',
           'houseDescription' => 'required | string',
           'houseImg.*'=>'required |image |  mimes:png,jpg,jpeg'
        ];

        Validator::make($request->all(), $rules)->validate();
    }
}
