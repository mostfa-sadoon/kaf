<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Bookcategory;




class bookcategoryController  extends Controller
{
    //
    public function index(){
      $Bookcategories=Bookcategory::paginate(20);

      return view('Admin.setting.bookCategories.index',compact('Bookcategories'));
    }
    public function create(){

        return view('Admin.setting.bookCategories.create');
    }
    public function store(Request $request){
  //    dd($request->all());
      $request->validate([
        'ar.name'=>'required'
      ]);
      Bookcategory::create(
        $request->all(),
       );
       return redirect()->route('bookcategories.index');
    }
    public function edit($id){
        $Bookcategory=Bookcategory::find($id);
        return view('Admin.setting.bookCategories.edit',compact('Bookcategory'));
    }
    public function update(Request $request,$id){
     //   dd($request->all());
        $request->validate([
            'ar.name'=>'required'
        ]);
        $Bookcategory=Bookcategory::find($id);
        $Bookcategory->update($request->all());
        return redirect()->route('bookcategories.index');
    }
    public function destroy(Request $request,$id){
        $Bookcategory=Bookcategory::find($id)->delete();
        return redirect()->back();
    }
}
