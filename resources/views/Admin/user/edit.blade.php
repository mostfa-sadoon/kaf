@extends('admin_temp')
@section('title')
<title>كاف | إضافة مستخدم</title>
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('css/global.css')}}">
<link rel="stylesheet" href="{{asset('css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('css/users.css')}}">
<link rel="stylesheet" href="{{asset('css/addUser.css')}}">
@endsection
@section('content')
<div class="title">
    <p>إضافة مستخدم</p>
    <p id="trace">لوحة القيادة &gt; إضافة مستخدم</p>
</div>
<div class="users-contect addUser">
    <form action="{{route('admin.userupdate')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="hidden" name="usertype" value="{{$user->usertype}}">
        <div>
            <span>الإسم الأول</span>
                @if(old('f_name'))
                <input name="f_name" type="text" value="{{old('f_name')}}">
                @else
                <input name="f_name" type="text" value="{{$user->f_name}}">
                @endif
                @if ($errors->has('f_name'))
                  <span class="text-danger">{{ $errors->first('f_name')}}</span>
                @endif
        </div>
        <div>
            <span>إسم العائلة</span>
                @if(old('l_name'))
                <input name="l_name" type="text" value="{{old('l_name')}}">
                @else
                <input name="l_name" type="text" value="{{$user->l_name}}">
                @endif
                @if ($errors->has('f_name'))
                  <span class="text-danger">{{ $errors->first('l_name')}}</span>
                @endif
        </div>
        <div>
            <span>إسم المستخدم</span>
            @if(old('username'))
            <input name="username" type="text" value="{{old('username')}}">
            @else
            <input name="username" type="text" value="{{$user->username}}">
            @endif
            @if ($errors->has('username'))
              <span class="text-danger">{{ $errors->first('username')}}</span>
            @endif
        </div>
        <div>
            <span>البريد الالكتروني </span>
            @if(old('email'))
            <input name="email" type="text" value="{{old('username')}}">
            @else
            <input name="email" type="text" value="{{$user->username}}">
            @endif
            @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email')}}</span>
            @endif
        </div>
        <div>
            <span>نوع المستخدم</span>
            <select name="usertype">
                 @foreach ($types as $type)
                      @if ($user->usertype==$type->id)
                        <option value="{{$type->id}}" selected>{{$type->name}}</option>
                      @else
                        <option value="{{$type->id}}">{{$type->name}}</option>
                      @endif
                 @endforeach
            </select>
        </div>
        <div>
            <span>كلمة السر</span>
            <input name="password" type="password">
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password')}}</span>
            @endif
        </div>
        <div>
            <span>تكرار كلمة السر</span>
            <input name="password_confirmation" type="password">
            @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation')}}</span>
            @endif
        </div>
        <div>
            <span>رقم السجل المدني</span>
            @if(old('national_id'))
            <input name="national_id" type="text" value="{{old('national_id')}}">
            @else
            <input name="national_id" type="text" value="{{$user->national_id}}">
            @endif
            @if ($errors->has('national_id'))
              <span class="text-danger">{{ $errors->first('national_id')}}</span>
            @endif
        </div>
        <div>
            <span>البنك</span>
            <input  type="text">
        </div>
        <div>
            <span>رقم الحساب البنكي</span>
            @if(old('Bank_account_number'))
            <input name="Bank_account_number" type="text" value="{{old('Bank_account_number')}}">
            @else
            <input name="Bank_account_number" type="text" value="{{$user->Bank_account_number}}">
            @endif
            @if ($errors->has('Bank_account_number'))
              <span class="text-danger">{{ $errors->first('Bank_account_number')}}</span>
            @endif
        </div>
        {{-- <div class="prom">
            <span>الصلاحيات</span>
            <div class="prom-items">
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>لوحة القيادة</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>المستخدمين</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>إعداد سجل المتابعة</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>سجل المتابعة</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>الواجبات</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>الإختبارات</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>المكتبة</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>العمليات المالية</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>الإشتراكات</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>الإشعارات</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>الإعدادات</span>
                </label>
            </div>
        </div> --}}
        <div class="save">
            <input type="submit" value="حفظ">
        </div>
    </form>
</div>
@endsection
@section('scripts')

@endsection
