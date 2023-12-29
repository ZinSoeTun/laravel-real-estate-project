<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //for contact from user
    public function contact(Request $request){
        Validator::make($request->all(),[
            'name' => 'required| string',
            'phone' => 'required |  numeric',
            'email' => 'required |  email',
            'address' => 'required| string',
            'citizen' => 'required| string',
        ])->validate();
         $data =[
            'agent_name' => $request->agent,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'citizen' => $request->citizen,
            'message' => $request->message,
         ];
       Contact::create($data);
       return back()->with(['success'=>'Your information has been sent!']);
}
}
