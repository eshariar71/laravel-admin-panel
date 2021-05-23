<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Admin;
use Session;
use Auth;
use Hash;
use Image;
use File;

class AdminController extends Controller
{
    public function dashboard(){

      return view('backend.pages.index');
    }
    public function userDashboard(){
      return view('backend.pages.user.index');
    }


    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
            	'email' =>'required|email|max:255',
            	'password' => 'required',
              ];
            $customMessage = [
              'email.required' => 'Email is required',
              'email.email' => 'Valid Email is required',
              'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules,$customMessage);
              // echo "<pre>"; print_r($data); die;
            if(Auth::guard('admin')->attempt(['email' =>$data['email'], 'password' =>$data['password'], 'type' =>'admin'])){
                Session::flash('message','Welcome To Admin Dashboard');
                return redirect()->route('dashboard');
            }
            elseif(Auth::guard('admin')->attempt(['email' =>$data['email'], 'password' =>$data['password'], 'type' =>'user'])) {
              Session::flash('message','Welcome To your Dashboard');
              return redirect()->route('userDashboard');
            }
            else{
              Session::flash('error_message','Invalid Email or Password');
                return redirect()->back();
            }
        }
        return view('backend.pages.admin.login');
    }

    public function settings(){
      Session::put('page','settings');
      // echo "<pre>"; print_r(Auth::guard('admin')->user()); die;
      $data=[];
      $admindetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
      $data['admin'] = $admindetails;
      return view('backend.pages.admin.settings', $data);
    }

    public function checkCurrPwd(Request $request){
      $data = $request->all();

      if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password))
      {
        echo "true";
      }
      else {
        echo "false";
      }
    }
      public function updateCurrPwd(Request $request){
      if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        //Check if current password is correct
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password))
        {
          // Chekc if new & conf password is matching
          if($data['npass'] == $data['conpass'])
          {
            echo "true";
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['npass'])]);
            Session::flash('message', 'Password has been updated successfully');
            // return redirect()->route('dashboard');
            return redirect()->back();
          }
          else {
            echo "false";
            Session::flash('error_message','New & Confirm password is not match');
            return redirect()->back();
          }
        }
        else {
          Session::flash('error_message','Your current password is incorrect');
          return redirect()->back();
        }
      }
    }

    public function userPass(Request $request){
      if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        //Check if current password is correct
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password))
        {
          // Chekc if new & conf password is matching
          if($data['npass'] == $data['conpass'])
          {
            echo "true";
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['npass'])]);
            Session::flash('message', 'Password has been updated successfully');
            // return redirect()->route('profile');
            return redirect()->back();
          }
          else {
            echo "false";
            Session::flash('error_message','New & Confirm password is not match');
            return redirect()->back();
          }
        }
        else {
          Session::flash('error_message','Your current password is incorrect');
          return redirect()->back();
        }
      }
    }

    public function updateDetails(Request $request){
      Session::put('page','update_details');
      if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>";print_r($data); die;
        $rules = [
          'name' => 'required|regex:/^[\pL\s\-]+$/u',
          'mobile' => 'required|numeric',
          // 'image' => 'mimes:jpeg,jpg,png|required|max:10000'
        ];
        $customMessage = [
          'name.required' =>'Name is Required',
          'name.alpha' =>'Valid Name is Required',
          'mobile.required' =>'Mobile is Required',
          'mobile.numeric' =>'Valid Mobile is Required',
          // 'image.required' =>'Image is Required',
          // 'image.image' =>'Valid Image is Required'
        ];
        $this->validate($request, $rules, $customMessage);
        //upload image
        if($request->hasFile('image')){
          $image_temp = $request->file('image');
          if($image_temp->isValid()){
            //Get Image extension_loaded
            $extension = $image_temp->getClientOriginalExtension();
            //Generate new Image name
            $imageName = rand(111,99999).'.'.$extension;
            $imagePath = 'images/'.$imageName;
            //Upload Image
            Image::make($image_temp)->resize(300,300)->save($imagePath);
          }else if(!empty($data['curr_image'])){
            $imageName = $data['curr_image'];
          }
          else {
            $imageName = "";
          }

        }
        Admin::where('email', Auth::guard('admin')->user()->email)->update(['name'=>$data['name'], 'mobile'=>$data['mobile'], 'image'=>$imageName]);
        Session::flash('message','Data has been updated successfully');
        return redirect()->back();
      }
      $data1=[];
      $admindetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
      $data1['admin'] = $admindetails;
      return view('backend.pages.admin.details', $data1);
    }

    // public function userProfile(){
    // }

    public function logout(){
        Auth::guard('admin')->logout();
        Session::flash('message','Successfully Done Logout!');
        return redirect()->route('login');
    }
}
