<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Acadimicyear;
use App\Models\setting\Classe;
use App\Models\setting\Semester;
use App\Models\setting\Subject;
use App\Models\setting\Fileextension;
use App\Models\setting\Bookcategory;
use App\Models\setting\Pricesetting;
use App\Models\Book;
use App\Traits\fileTrait;
use Auth;
Use Alert;

class liberaryController extends Controller
{
    //
    use fileTrait;
    public function index(){
        $acadimicyears=Acadimicyear::paginate(20);
        $Semesters=Semester::paginate(20);
        $classes=Classe::paginate(20);
        $subjects=Subject::paginate(20);
        $fileextensions=Fileextension::get();
        $Bookcategories=Bookcategory::paginate(20);
        $Pricesettings=Pricesetting::get();
        $books=Book::with('Bookcategory','fileextention','classe','subject','Pricesetting','semester')->paginate(20);
         return view('Admin.liberary.index',compact('books','subjects','fileextensions','Bookcategories','classes','Semesters','Pricesettings'));
    }
    public function create(){
        $acadimicyears=Acadimicyear::paginate(20);
        $Semesters=Semester::paginate(20);
        $classes=Classe::paginate(20);
        $subjects=Subject::paginate(20);
        $fileextensions=Fileextension::get();
        $Bookcategories=Bookcategory::paginate(20);
        $Pricesettings=Pricesetting::get();
         return view('Admin.liberary.createbook',compact('subjects','fileextensions','Bookcategories','classes','Semesters','Pricesettings'));
    }
    public function store(Request $request){
         $request->validate([
              'price'=>'required',
              'file'=>'required',
              'photo'=>'required',
         ]);
        $photo=$this->MoveImage($request->file('photo'),'uploads/book/photo');
        $file=$this->MoveImage($request->file('file'),'uploads/book/file');
        $data=[];
        $data=[
            'owner_type'=>'App\Models\Admin',
            'owner_id'=>Auth::guard('admin')->user()->id,
            'img'=>$photo,
            'file'=>$file,
            'status'=>'new',
            'price_id'=>$request->price,
            'bookcategory_id'=>$request->Bookcategory,
            'classe_id'=>$request->class,
            'subject_id'=>$request->subject,
            'semester_id'=>$request->semester,
            'fileextension_id'=>$request->fileextension
        ];
        if($request->price==2){
            $data['price']=$request->price_value;
        }elseif($request->price==3){
           $price= Pricesetting::find(3);
           $data['price']= $price->value;
        }else{
            $data['price']=null;
        }
        Book::create($data);
        return redirect()->route('admin.liberary');
    }
    public function edit($id){
        $book=Book::with('Bookcategory','fileextention','classe','subject','Pricesetting','semester')->find($id);
        $acadimicyears=Acadimicyear::paginate(20);
        $Semesters=Semester::paginate(20);
        $classes=Classe::paginate(20);
        $subjects=Subject::paginate(20);
        $fileextensions=Fileextension::get();
        $Bookcategories=Bookcategory::paginate(20);
        $Pricesettings=Pricesetting::get();
        return view('Admin.liberary.edit',compact('book','subjects','fileextensions','Bookcategories','classes','Semesters','Pricesettings'));
    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required',
             'price'=>'required'
        ]);
        $Book=Book::find($request->id)->update([
            'name'=>$request->name,
            'owner_type'=>'App\Models\Teacher',
            'owner_id'=>Auth::guard('admin')->user()->id,
            'status'=>'new',
            'price_id'=>$request->price,
            'bookcategory_id'=>$request->Bookcategory,
            'classe_id'=>$request->class,
            'subject_id'=>$request->subject,
            'semester_id'=>$request->semester,
            'fileextension_id'=>$request->fileextension
        ]);
        return redirect()->route('admin.liberary');
    }

     public function search(Request $request){
          $acadimicyears=Acadimicyear::paginate(20);
          $Semesters=Semester::paginate(20);
          $classes=Classe::paginate(20);
          $subjects=Subject::paginate(20);
           $fileextensions=Fileextension::get();
          $Bookcategories=Bookcategory::paginate(20);
          $Pricesettings=Pricesetting::get();
          if($request->user=='teacher'){$usertype='App\Models\Teacher';}else{$usertype='App\Models\Student';}
          $books=Book::with('Bookcategory','fileextention','classe','subject','Pricesetting')
          ->where('subject_id',$request->subject)
          ->where('fileextension_id',$request->fileextension)
          ->where('classe_id',$request->class)
          ->where('semester_id',$request->semester)
          ->where('owner_type',$usertype)
          ->paginate(20);
          return view('Admin.liberary.index',compact('books','subjects','fileextensions','Bookcategories','classes','Semesters','Pricesettings'));
     }

    public function updatestatus($id,$newstatus){
        $book=Book::find($id)->update([
            'Acceptance'=>$newstatus
        ]);
        ($newstatus=='true')?$message="تم قبول الكتاب":$message="تم رفض الكتاب";
        Alert::success('success',$message);
        return redirect()->back();
    }

    public function destroy(Request $request){
        $Book=Book::find($request->id)->delete();
        return redirect()->back();
    }
}
