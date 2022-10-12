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
    <p>إضافة نوع ملف</p>
    <p id="trace">لوحة القيادة &gt; إضافة نوع ملف </p>
</div>
<div class="users-contect addUser">
    <form action="{{route('fileextentions.store')}}" method="post">
        @csrf
        <div>
        <label>{{ __('dashboard.'.Config::get('app.locale').'.name') }}</label>
        <input class="form-control" name="name" type="text">
        @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif
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
