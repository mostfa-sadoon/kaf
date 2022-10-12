<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Fileextension;


class fileextentionController extends Controller
{
    //
    public function index(){
        $fileextentions=Fileextension::paginate(20);
        return view('Admin.setting.fileextentions.index',compact('fileextentions'));
      }

     public function create(){
        return view('Admin.setting.fileextentions.create');
     }


     public function store(Request $request){
        $request->validate([
          'name'=>'required'
        ]);
        Fileextension::create([
         'name'=>$request->name,
        ]);
        return redirect()->route('fileextentions.index');
     }

    public function edit($id){
        $fileextention=Fileextension::find($id);
        return view('Admin.setting.fileextentions.edit',compact('fileextention'));
    }

    public function update(Request $request){
         $fileextention=Fileextension::find($request->id)->update(['name'=>$request->name]);
         return redirect()->route('fileextentions.index');
    }

    public function destroy(Request $request){
        Fileextension::find($request->id)->delete();
        return redirect()->back();
    }
}
