<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Classe;


class classesController extends Controller
{
    //
    public function index(){
        $classess=Classe::paginate(20);
        return view('Admin.setting.classes.index',compact('classess'));
      }
      public function create(){
        return view('Admin.setting.classes.create');
    }
      public function store(Request $request){
        // dd($request->all());
        $request->validate([
          'ar.name'=>'required'
        ]);
         Classe::create($request->all());
         return redirect()->route('classes.index');
      }
      public function edit($id){
        $Classe=Classe::find($id);
        return view('Admin.setting.classes.edit',compact('Classe'));
        }
        public function update(Request $request,$id){
        //   dd($request->all());
            $request->validate([
                'ar.name'=>'required'
            ]);
            $Classee=Classe::find($id);
            $Classee->update($request->all());
            return redirect()->route('classes.index');
        }
        public function destroy(Request $request,$id){
            $Classe=Classe::find($id)->delete();
            return redirect()->back();
        }
}
