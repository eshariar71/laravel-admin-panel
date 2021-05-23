<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use Session;
use Auth;
use Hash;
use Image;
use File;
class LogoController extends Controller
{
    public function create(){
      return view('backend.pages.logo.create');
    }

    public function edit($id){
      $val =  Logo::find($id);
    if (!is_null($val)) {
      return view('backend.pages.logo.edit', compact('val'));
    }
    else {
      return redirect()->route('logo.all');
      }
    }

    public function store(Request $request){
            if($request->isMethod('post')){
                $data = $request->all();
                // echo "<pre>";print_r($data); die;
                $rules = [
                  'logo' =>'mimes:jpeg,jpg,png|required|max:10000'
                  ];
                $customMessage = [
                  'logo.required' =>'Image is Required',
                  'logo.image' =>'Valid Image is Required'
                ];
                $this->validate($request, $rules, $customMessage);

                $val = new Logo();
                $val->name = $request->name;
                $val->save();

                if($request->hasFile('logo')){
                // insert singel iamge
                $image = $request->file('logo');
                $img = rand(111,99999).'.'.$image->getClientOriginalExtension();

                $location = public_path('images/'.$img);
                Image::make($image)->save($location);
                $val->logo = $img;
                $val->save();
              }

              session()->flash('message', ' Logo save successfully!');
              // return redirect()->back();
              return redirect()->route('logo.all');
              }
              else{
                return redirect()->route('logo.all');
              }
          }

    public function update(Request $request, $id){
        $val = Logo::find($id);
        $val->name = $request->name;
        $val->save();

        if($request->hasFile('logo')){
          // insert singel iamge
          if(File::exists('images/'.$val->logo))
            {
          File::delete('images/'.$val->logo);
            }

          $image = $request->file('logo');
          $img = time(). '.' .$image->getClientOriginalExtension();

          $location = public_path('images/'.$img);
          Image::make($image)->save($location);
          $val->logo = $img;
          $val->save();
        }
        session()->flash('message', 'Logo has updated successfully!!');
    return redirect()->route('logo.all');
    }

    public function delete(Request $request, $id){
      $val = Logo::find($id);
      if(!is_null($val)){
         //Delete brand image
         if(File::exists('images/'.$val->logo))
          {
            File::delete('images/'.$val->logo);
          }
         $val->delete();
       }
       session()->flash('message',' Logo has deleted successfully!!');
       return back();
    }
    public function index(){
      $results = Logo::get();
      return view('backend.pages.logo.index', compact('results'));
    }

}
