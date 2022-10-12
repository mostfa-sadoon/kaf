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
    <form action="{{route('fileextentions.update',$fileextention->id)}}" method="post">
        @method('put')
        @csrf
        <input type="hidden" name="id" value="{{$fileextention->id}}">
        <div>
           @if (old('name'))
              <input type="text" name="name" value="{{old('name')}}">
            @else
            <input type="text" name="name" value="{{$fileextention->name}}">
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
