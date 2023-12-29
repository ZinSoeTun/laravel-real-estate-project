<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
     //  agent create
     public function agentCreate()
     {
         return view('admin.agentCreate');
     }
       //user profile edited and save change
   public function agentData(Request $request)
   {
       //recall back vali function for validation
       $this->vali($request);
       //recall back dataArrange function for data arranging
       $data = $this->dataArrange($request);
       //for image data arrange
       if ($request->hasFile('agentImage')) {
        $imageName = uniqid() . $request->file('agentImage')->getClientOriginalName();
        $request->file('agentImage')->storeAs('public/agent', $imageName);
        $data['image'] = $imageName;
    }
       //agent creating in Database
       Agent::create($data);
       return back()->with(['success' => 'Agent data inserting process is finished!']);
   }
     // agent list
     public function agentList()
     {
       $data = Agent::paginate(5);
         return view('admin.agentList', compact('data'));
     }
       // agent detail
       public function agentDetail($id)
       {
         $data = Agent::where('id', $id)->first();
           return view('admin.agentDetail', compact('data'));
       }
         // agent update page
         public function updatePage($id)
         {
           $data = Agent::where('id', $id)->first();
             return view('admin.agentUpdate', compact('data'));
         }
        //agent update
    public function update($id, Request $request)
    {
        $this->vali($request);
        $data = $this->dataArrange($request);
        //image store
        if ($request->hasFile('agentImage')) {
            $dbImage = Agent::where('id', $id)->value('image');
            if ($dbImage != NULL) {
                //delete image from storage
                Storage::delete('public/product/' . $dbImage);
            }
            $imgName = uniqid() . $request->file('agentImage')->getClientOriginalName();
            //store in public
            $request->file('agentImage')->storeAs('public/agent', $imgName);
            //store in db
            $data['image'] = $imgName;
        }
        //profile update in db
        Agent::where('id', $id)->update($data);
        return back()->with(['success' => 'Agent Has Been Updated']);
    }

      //agent delete
      public function delete($id)
      {
          $dbImage =    Agent::where('id', $id)->value('image');
          if($dbImage != NULL)
          Storage::delete('public/agent/'.  $dbImage );
          Agent::where('id', $id)->delete();
          return back()->with(['success' => 'Agent Has Been Deleted']);
      }



       //private function for data arrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->agentName,
            'phone' => $request->agentPhone,
            'address' => $request->agentAddress,
            'email' => $request->agentEmail,
            'language' => $request->language,
            'citizen' =>   $request->citizen
        ];
    }
    //private function for validation edit
    private function vali($request)
    {
        $rules = [
            'agentName' => 'required| string',
            'agentEmail' => 'required |  email',
            'agentPhone' => 'required |  numeric',
            'agentAddress' => 'required |  string',
            'language' => 'required | string',
            'citizen' => 'required |  string',
            'agentImage' => ' required | image |  mimes:png,jpg,jpeg'
        ];

        Validator::make($request->all(), $rules)->validate();
    }
}
