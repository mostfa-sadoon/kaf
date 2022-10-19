@extends('admin_temp')
@section('title')

@endsection
@section('styles')
<script src="{{asset('/js/all.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/global.css')}}">
<link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('/css/users.css')}}">
<link rel="stylesheet" href="{{asset('/css/addBook.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="title">
    <p> تعديل كتاب</p>
    <p id="trace">لوحة القيادة &gt;  تعديل كتاب</p>
</div>
<div class="users-contect addBook">
    <form action="{{route('admin.updatebook')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$book->id}}">
        <div class="book">
            <div class="book-info">
                <label>فئه الملف</label>
                <select  name="Bookcategory">
                     @foreach ($Bookcategories as  $Bookcategory)
                     @if($book->Bookcategory->id==$Bookcategory->id)
                     <option value="{{$Bookcategory->id}}" selected>{{$Bookcategory->translate(Config::get('app.locale'))->name }}</option>
                     @else
                       <option value="{{$Bookcategory->id}}">{{$Bookcategory->translate(Config::get('app.locale'))->name }}</option>
                    @endif
                   @endforeach
                </select>

                <label>نوع الملف</label>
                <select  name="fileextension">
                    @foreach ($fileextensions as  $fileextension)
                        @if($book->fileextention->id==$fileextension->id)
                          <option value="{{$fileextension->id}}" selected>{{$fileextension->name}}</option>
                        @else
                          <option value="{{$fileextension->id}}">{{$fileextension->name}}</option>
                        @endif
                    @endforeach

                </select>
                <label>الماده</label>
                <select  name="subject">
                    @foreach ($subjects as  $subject)
                    @if($book->subject->id==$subject->id)
                    <option value="{{$subject->id}}" selected>{{$subject->translate(Config::get('app.locale'))->name }}</option>
                    @else
                    <option value="{{$subject->id}}">{{$subject->translate(Config::get('app.locale'))->name }}</option>
                    @endif
                    @endforeach
                </select>
                <label>الصف</label>
                <select  name="class">
                    @foreach ($classes as  $class)
                    @if($book->classe->id==$class->id)
                    <option value="{{$class->id}}" selected>{{$class->translate(Config::get('app.locale'))->name }}</option>
                    @else
                    <option value="{{$class->id}}">{{$class->translate(Config::get('app.locale'))->name }}</option>
                    @endif
                    @endforeach
                </select>
                <label>الترم</label>
                <select  name="semester">
                    @foreach ($Semesters as  $semester)
                    <option value="{{$semester->id}}">{{$semester->translate(Config::get('app.locale'))->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="book-upload">
                <div class="upload-file dateBtn">
                    <input type="file" name="file" class="dateInput">
                    <p>أرفق ملف</p>
                    <div class="img">
                        <img src="{{asset('/assets/icons/upload-pdf.png')}}">
                    </div>
                </div>
                <div class="upload-img dateBtn">
                    <input type="file" name="photo" class="dateInput">
                    <p>أرفق صورة للملف</p>
                    <div class="img">
                        <img src="{{asset('/assets/icons/upload-img.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="price">
            @foreach ($Pricesettings as $Pricesetting)
            <div>
                <label>
                    @if($book->pricesetting->id==$Pricesetting->id)
                        <input type="radio" name="price" value="{{$Pricesetting->id}}" checked>
                        <span>{{$Pricesetting->translate(Config::get('app.locale'))->name}} @if($Pricesetting->value!=0){{$Pricesetting->value}}@endif</span>
                    @else
                        <input type="radio" name="price" value="{{$Pricesetting->id}}">
                        <span>{{$Pricesetting->translate(Config::get('app.locale'))->name}} @if($Pricesetting->value!=0){{$Pricesetting->value}}@endif</span>
                    @endif
                </label>
                @if($Pricesetting->type=='constrain')
                <input type="text" class="" name="price_value" id="constrain_value" style="width:150px" value="{{$book->price}}">
                @endif
            </div>
            @endforeach
            @if ($errors->has('price'))
            <p class="text-danger">{{ $errors->first('price')}}</p>
            @endif
            <p>ملاحظة : نسبة العمولة التطبيق هي 2% </p>
        </div>
        <div class="save">
            <input type="submit" value="حفظ">
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="{{asset('/js/dashboard.js')}}"></script>
<script src="{{asset('/js/upload.js')}}"></script>

@endsection
