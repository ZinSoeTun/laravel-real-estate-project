<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //for admin home page
    public function home()
    {
        return  view('admin.home');
    }
    //for admin profile page
    public function profile()
    {
        return  view('admin.profile');
    }
    //user profile edited and save change
    public function AdminSaveChange(Request $request)
    {
        //recall back vali function for validation
        $this->vali2($request);
        //recall back dataArrange function for data arranging
        $data = $this->dataArrange2($request);
        //for image data arrange
        if ($request->hasFile('image')) {
            //if exist delete in local storage
            $dbImage =   User::where('id', Auth::user()->id)->value('image');
            if ($dbImage == !NULL) {
                Storage::delete('public/profile/' . $dbImage);
            }
            //for data update
            $imgName = uniqid() . $request->file('image')->getClientOriginalName();
            //image save in local storage
            $request->file('image')->storeAs('public/profile/', $imgName);
            //image save in database
            $data['image'] = $imgName;
        }
        //profile update in Database
        User::where('id', Auth::user()->id)->update($data);
        return back()->with(['success' => 'Your Profile updating process is finished!']);
    }

    //change password
    public function AdminChangePassword(Request $request)
    {
        //call back function for validaing passowrd
        $this->passwordVali($request);
        $dbData = User::where('id', Auth::user()->id)->first();
        $dbPassword = $dbData->password;
        //password update
        if (Hash::check($request->oldPassword, $dbPassword)) {
            $newPassword = Hash::make($request->newPassword);
            User::where('id', Auth::user()->id)->update(['password' => $newPassword]);
            Auth::guard('web')->logout();
            return redirect()->route('admin.loginPage')->with(['success' => 'Changing passowrd is successed!']);
        } else {
            return back()->with(['error' => 'Old password do not match']);
        };
    }
    // admin log out
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.loginPage');
    }

    //  user list
    public function userList()
    {
          $data =  User::where('role','user')->paginate(4);
        return view('admin.userList', compact('data'));
    }
      // user detail
      public function userDetail($id)
      {
         $data = User::where('id', $id)->first();
          return view('admin.userDetail', compact('data'));
      }
      //user status changing to admin status
      public function userStatus($id)
      {
          User::where('id', $id)->update([
            'user_status' => 'true',
            'role' => 'admin'
         ]);
         Auth::guard('web')->logout();
         return redirect()->route('login');
      }
       // user delete
       public function userDelete($id)
       {
              User::where('id', $id)->delete();
              return back()->with(['success' => 'U deleting process is finished!']);
       }


    // admin list
    public function adminList()
    {
        $data =  User::where('role','admin')->paginate(4);
        return view('admin.adminList', compact('data'));
    }
    //admin detail
    public function  adminDetail($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.adminDetail', compact('data'));
    }
      // admin delete
      public function adminDelete($id)
      {
             User::where('id', $id)->delete();
             return back()->with(['success' =>'Admin deleting process is finished!']);
      }





















    //private function for data arrange
    private function dataArrange2($request)
    {
        return [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ];
    }
    //private function for validation edit
    private function vali2($request)
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
    private function passwordVali($request)
    {
        $rules = [
            'oldPassword' => 'required',
            'newPassword' => 'required | min:6 |different:oldPassword',
            'comfirmPassword' => 'required |same:newPassword',
        ];
        Validator::make($request->all(), $rules)->validate();
    }




    ////private function for admin register
    //private function for data arrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'role' =>   $request->role
        ];
    }
    //private function for validation edit
    private function vali($request)
    {
        $rules = [
            'name' => 'required| string',
            'email' => 'required |  email',
            'phone' => 'required |  numeric',
            'password' => $this->passwordRules(),
            'password_confirmation' => 'required | same:password'
        ];

        Validator::make($request->all(), $rules)->validate();
    }
    //private function for passowrd rules
    private function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}
