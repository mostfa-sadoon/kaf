<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Acadimicyear;


class acadimicyearController extends Controller
{
    //
    public function index(){
        $acadimicyears=Acadimicyear::paginate(20);
        return view('Admin.setting.acadimicyear.index',compact('acadimicyears'));
      }
      public function create(){
        return view('Admin.setting.acadimicyear.create');
    }
      public function store(Request $request){
        // dd($request->all());
        $request->validate([
          'ar.name'=>'required'
        ]);
        Acadimicyear::create($request->all());
         return redirect()->route('acadimicyears.index');
      }
      public function edit($id){
        $Acadimicyear=Acadimicyear::find($id);
        return view('Admin.setting.acadimicyear.edit',compact('Acadimicyear'));
        }
        public function update(Request $request,$id){
        //   dd($request->all());
            $request->validate([
                'ar.name'=>'required'
            ]);
            $Acadimicyear=Acadimicyear::find($id);
            $Acadimicyear->update($request->all());
            return redirect()->route('acadimicyears.index');
        }
        public function destroy(Request $request,$id){
            $Acadimicyear=Acadimicyear::find($id)->delete();
            return redirect()->back();
        }
}
