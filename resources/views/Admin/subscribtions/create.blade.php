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
    <form action="{{route('admin.user.store')}}" method="post">
        @csrf
        <div>
            <span>الإسم الأول</span>
            <input name="f_name" type="text">
                @if ($errors->has('f_name'))
                  <p class="text-danger">{{ $errors->first('f_name')}}</p>

                @endif
        </div>
        <div>
            <span>إسم العائلة</span>
            <input name="l_name" type="text">
                @if ($errors->has('l_name'))
                <p class="text-danger">{{ $errors->first('l_name')}}</p>
                @endif
        </div>
        <div>
            <span>إسم المستخدم</span>
            <input name="username" type="text">
                @if ($errors->has('username'))
                <p class="text-danger">{{ $errors->first('username')}}</p>
                @endif
        </div>
        <div>
            <span>البريد الالكتروني </span>
            <input name="email" type="text">
                @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email')}}</p>
                @endif
        </div>
        <div>
            <span>نوع المستخدم</span>
            <select name="usertype">
                 @foreach ($types as $type)
                      <option value="{{$type->id}}">{{$type->name}}</p>
                 @endforeach
            </select>
        </div>
        <div>
            <span>كلمة السر</span>
            <input name="password" type="password">
            @if ($errors->has('password'))
               <p class="text-danger">{{ $errors->first('password')}}</p>
            @endif
        </div>
        <div>
            <span>تكرار كلمة السر</span>
            <input name="password_confirmation" type="password">
            @if ($errors->has('password_confirmation'))
                <p class="text-danger">{{ $errors->first('password_confirmation')}}</p>
            @endif
        </div>
        <div>
            <span>رقم السجل المدني</span>
            <input name="national_id" type="number">
            @if ($errors->has('national_id'))
               <p class="text-danger">{{ $errors->first('national_id')}}</p>
            @endif
        </div>
        <div>
            <span>البنك</span>
            <input  type="text">
        </div>
        <div>
            <span>رقم الحساب البنكي</span>
            <input name="Bank_account_number" type="number">

            @if ($errors->has('Bank_account_number'))
               <p class="text-danger">{{ $errors->first('Bank_account_number')}}</p>
            @endif

        </div>
        <div class="prom">
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
        </div>
        <div class="save">
            <input type="submit" value="حفظ">
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="{{asset('/js/validate.js')}}"></script>
@endsection
