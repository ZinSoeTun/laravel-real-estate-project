<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    // for admin home page
    public function home()
    {
        return view('admin.home');
    }

    // for admin profile page
    public function profile()
    {
        return view('admin.profile');
    }

    //user profile edited and save change
    public function AdminSaveChange(UpdateProfileRequest $request)
    {
        // validation for update profile
        $data = $request->validated();

        //for image data
        if ($request->hasFile('image')) {
            $user = Auth::user();
            if ($user->image) {
                Storage::delete('public/profile/' . $user->image);
            }
            $imgName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/profile/', $imgName);
            $data['image'] = $imgName;
        }

        //profile update in Database
        $this->userRepo->update(Auth::id(), $data);
        return back()->with(['success' => 'Your Profile updating process is finished!']);
    }

    //change password
    public function AdminChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->oldPassword, $user->password)) {
            return back()->with(['error' => 'Old password does not match']);
        }

        $user->update(['password' => Hash::make($request->newPassword)]);
        Auth::logout();
        return redirect()->route('login');
    }

    // admin log out
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    //  user list
    public function userList()
    {
        $data = $this->userRepo->getByRole('user');
        return view('admin.userList', compact('data'));
    }

    // user detail
    public function userDetail($id)
    {
        $data = $this->userRepo->findById($id);
        return view('admin.userDetail', compact('data'));
    }

    //user status changing to admin status
    public function userStatus($id)
    {
        $this->userRepo->updateRoleAndStatus($id, 'true', 'admin');
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }

    // user delete
    public function userDelete($id)
    {
        $this->userRepo->delete($id);

        return back()->with(['success' => 'User deleted successfully!']);
    }

    // admin list
    public function adminList()
    {
        $data = $this->userRepo->getByRole('admin');

        return view('admin.adminList', compact('data'));
    }

    //admin detail
    public function adminDetail($id)
    {
        $data = $this->userRepo->findById($id);
        return view('admin.adminDetail', compact('data'));
    }

    // admin delete
    public function adminDelete($id)
    {
        $this->userRepo->delete($id);

        return back()->with(['success' => 'Admin deleted successfully!']);
    }
}