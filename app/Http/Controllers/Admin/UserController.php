<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
  public function editProfileView(){

      $title = 'User Edit Profile';

      $breadcrum = [
          'User Profile',
          'Edit Profile',
      ];

      $user = auth()->user();

      return view('admin.user.edit',compact('title','breadcrum','user'));
  }

  public function editProfile(EditProfileRequest $request){

      $user = auth()->user();

      if ($user){

          $data = $request->except('_token');

          if ($request->hasFile('image')) {

              $data['image'] = file_upload($request->file('image'), 'users');

          }

          if($user->update($data)){
               return redirect()->route('admin.user.edit.view')->with('success-status','profile updated');
          }
          return redirect()->route('admin.user.edit.view')->with('error-status','something went wrong');

      }


  }

  public function editPassword(Request $request){
     $validate = [
        'old_password' => 'required',
         'password' => 'required|confirmed'
     ];

     $request->validate($validate);

     $user_pass = auth()->user();

     $old_password = $request['old_password'];

     if (Hash::check($old_password,$user_pass->password)){

         $new_password = $request['password_confirmation'];

         if ($user_pass->update(['password'=>Hash::make($new_password)])){

             return redirect()->route('admin.user.edit.view')->with('success-status','password updated');
         }

         return redirect()->route('admin.user.edit.view')->with('error-status','something went wrong');

     }


  }

  public function importUser(Request $request){

      if ($request->hasFile('excel_file')) {
          Excel::import(new UsersImport(), request()->file('excel_file'));
          return redirect('/')->with('success-status', 'file import successfully');
      }
      else {
          return back()->with('error-status','Please upload file');
      }
  }
}
