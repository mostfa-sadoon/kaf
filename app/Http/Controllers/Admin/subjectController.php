<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Subject;


class subjectController extends Controller
{
    //
    public function index(){
      $subjects=Subject::paginate(20);
      return view('Admin.setting.subject.index',compact('subjects'));
    }
    public function create(){
        return view('Admin.setting.subject.create');
    }
    public function store(Request $request){
      //dd($request->all());
      $request->validate([
        'ar.name'=>'required'
      ]);
       Subject::create(
        $request->all(),
       );
       return redirect()->route('subjects.index');
    }
    public function edit($id){
        $subject=Subject::find($id);
        return view('Admin.setting.subject.edit',compact('subject'));
    }
    public function update(Request $request,$id){
     //   dd($request->all());
        $request->validate([
            'ar.name'=>'required'
        ]);
        $subject=Subject::find($id);
        $subject->update($request->all());
        return redirect()->route('subjects.index');
    }
    public function destroy(Request $request,$id){
        $subject=Subject::find($id)->delete();
        return redirect()->back();
    }
}
