<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Semester;


class semesterController extends Controller
{
    //
    public function index(){
        $Semesters=Semester::paginate(20);
        return view('Admin.setting.semester.index',compact('Semesters'));
      }
      public function create(){
        return view('Admin.setting.semester.create');
    }
      public function store(Request $request){
        // dd($request->all());
        $request->validate([
          'ar.name'=>'required'
        ]);
        Semester::create($request->all());
         return redirect()->route('semesters.index');
      }
      public function edit($id){
        $Semester=Semester::find($id);
        return view('Admin.setting.semester.edit',compact('Semester'));
        }
        public function update(Request $request,$id){
        //   dd($request->all());
            $request->validate([
                'ar.name'=>'required'
            ]);
            $Semester=Semester::find($id);
            $Semester->update($request->all());
            return redirect()->route('semesters.index');
        }
        public function destroy(Request $request,$id){
            $Semester=Semester::find($id)->delete();
            return redirect()->back();
        }
}
