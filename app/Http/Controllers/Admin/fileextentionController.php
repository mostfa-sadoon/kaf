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
}
