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
    <p> إضافة كتاب</p>
    <p id="trace">لوحة القيادة &gt; إضافة كتاب</p>
</div>
<div class="users-contect addBook">
    <form action="{{route('admin.storeebook')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="book">
            <div class="book-info">
                <label>اسم الكتاب</label>
                <input class="form-control" name="name" type="text">
                 @if ($errors->has('name'))
                   <p class="text-danger">{{ $errors->first('name')}}</p>
                 @endif
                <label>فئه الملف</label>
                <select  name="Bookcategory">
                     @foreach ($Bookcategories as  $Bookcategory)
                       <option value="{{$Bookcategory->id}}">{{$Bookcategory->translate(Config::get('app.locale'))->name }}</option>
                     @endforeach

                </select>
                <label>نوع الملف</label>
                <select  name="fileextension">
                    @foreach ($fileextensions as  $fileextension)
                    <option value="{{$fileextension->id}}">{{$fileextension->name}}</option>
                    @endforeach

                </select>
                <label>الماده</label>
                <select  name="subject">
                    @foreach ($subjects as  $subject)
                    <option value="{{$subject->id}}">{{$subject->translate(Config::get('app.locale'))->name }}</option>
                    @endforeach
                </select>
                <label>الصف</label>
                <select  name="class">
                    @foreach ($classes as  $class)
                    <option value="{{$class->id}}">{{$class->translate(Config::get('app.locale'))->name }}</option>
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
                    @if ($errors->has('file'))
                      <p class="text-danger">{{ $errors->first('file')}}</p>
                    @endif
                </div>
                <div class="upload-img dateBtn">
                    <input type="file" name="photo" class="dateInput">
                    <p>أرفق صورة للملف</p>
                    <div class="img">
                        <img src="{{asset('/assets/icons/upload-img.png')}}">
                    </div>
                    @if ($errors->has('photo'))
                    <p class="text-danger">{{ $errors->first('photo')}}</p>
                  @endif
                </div>
            </div>
        </div>
        <div class="price">
            @foreach ($Pricesettings as $Pricesetting)
            <label>
                <input type="radio" name="price" value="{{$Pricesetting->id}}">
                <span>{{$Pricesetting->translate(Config::get('app.locale'))->name}} @if($Pricesetting->value!=0){{$Pricesetting->value}}@endif</span>
            </label>
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
