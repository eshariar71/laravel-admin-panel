<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Menu;
use Session;
use Auth;
use Hash;
use Image;
use File;

class MenuController extends Controller
{
    public function create(){
      $menus = Menu::get();
      return view('backend.pages.menu.create', compact('menus'));
    }

    public function edit($id){
      $data = [];
      $val =  Menu::find($id);
      $menus = Menu::get();
      $data['val'] = $val;
      $data['menus'] = $menus;
    if (!is_null($val)) {
      return view('backend.pages.menu.edit', $data);
    }
    else {
      return redirect()->route('menu.all');
      }
    }

    public function store(Request $request){
            if($request->isMethod('post')){
                $data = $request->all();
                // echo "<pre>";print_r($data); die;
                $rules = [
                  'name' =>'required|max:200'
                  ];
                $customMessage = [
                  'menu.required' =>'Menu Name is Required',
                ];
                $this->validate($request, $rules, $customMessage);

                $val = new Menu();
                $val->parent_id = $request->parent_id;
                $val->name = $request->name;
                $val->status = 1;
                $val->save();
                session()->flash('message', 'Menu save successfully!');
                // return redirect()->back();
                return redirect()->route('menu.all');
                }
                else{
                  return redirect()->route('menu.all');
                }
          }

    public function update(Request $request, $id){
        $val = Menu::find($id);
        $val->name = $request->name;
        $val->save();
        session()->flash('message', 'Menu has updated successfully!!');
    return redirect()->route('menu.all');
    }

    public function delete(Request $request, $id){
      $val = Menu::find($id);
      if(!is_null($val)){
         //Delete data
         $val->delete();
       }
       session()->flash('message',' Menu has deleted successfully!!');
       return back();
    }
    public function index(){
      $results = Menu::get();
      return view('backend.pages.menu.index', compact('results'));
    }

}
