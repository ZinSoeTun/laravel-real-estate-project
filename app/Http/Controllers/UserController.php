<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //user account profile
    public function profile(){
        return view('users.profile');
    }
    //user edit function
    public function edit(){
        return view('users.profileEdit');
    }
    //user profile edited and save change
    public function saveChange(Request $request){
        //recall back vali function for validation
        $this->vali($request);
        //recall back dataArrange function for data arranging
        $data = $this->dataArrange($request);
        //for image data arrange
        if($request->hasFile('image')){
            //if exist delete in local storage
         $dbImage =   User::where('id', Auth::user()->id)->value('image');
             if($dbImage == !NULL) {
                Storage::delete('public/profile/' . $dbImage);
             }
             //for data update
           $imgName = uniqid(). $request->file('image')->getClientOriginalName();
           //image save in local storage
             $request->file('image')->storeAs('public/profile/' , $imgName);
               //image save in database
             $data ['image'] = $imgName;
            }
            //profile update in Database
             User::where('id', Auth::user()->id)->update($data);
             return back()->with(['success'=> 'Your Profile updating process is finished!']);

    }
      //user change password function
      public function toChangePassword(){
        return view('users.userChangePassword');
    }

    //change password
    public function changePassword(Request $request){
        //call back function for validaing passowrd
        $this->passwordVali($request);
        $dbData = User::where('id', Auth::user()->id)->first();
       $dbPassword= $dbData->password;
       //password update
       if(Hash::check($request->oldPassword,$dbPassword)){
         $newPassword = Hash::make($request->newPassword);
         User::where('id',Auth::user()->id)->update(['password'=> $newPassword]);
         Auth::guard('web')->logout();
         return redirect()->route('login')->with(['success'=>'Changing passowrd is successed!']);
       }else{
         return back()->with(['error'=>'Old password do not match']);
       };
    }
      //private function for data arrange
      private function dataArrange($request)
      {
          return [
              'name' => $request->name,
              'phone' => $request->phone,
              'address' => $request->address
          ];
      }
      //private function for validation edit
      private function vali($request)
      {
          $rules = [
              'name' => 'required| string',
              'phone' => 'required |  numeric',
              'image' => 'image |  mimes:png,jpg,jpeg'
          ];

          $messages = [
              'name.required' => 'Please enter your name',
              'name.string' => 'Please enter only letters',
              'phone.required' => 'Please enter your phone number',
              'phone.numeric' => 'Please enter only numbers',
              'image.image' => 'We will only accept image file types',
              'image.mimes' => 'Jpeg,png,jpg are only accepted'
          ];

          Validator::make($request->all(), $rules, $messages)->validate();
      }
        //private function for password validation
        private function passwordVali($request){
            $rules =[
             'oldPassword'=> 'required',
             'newPassword'=> 'required | min:6 |different:oldPassword',
             'comfirmPassword'=> 'required |same:newPassword',
            ];
             Validator::make($request->all(),$rules)->validate();
            }
}
