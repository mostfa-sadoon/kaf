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
    <p>إضافة ماده</p>
    <p id="trace">لوحة القيادة &gt; إضافة مستخدم</p>
</div>
<div class="users-contect addUser">
    <form action="{{route('subjects.store')}}" method="post">
        @csrf
        @foreach (config('translatable.locales') as $locale)
        <div>
            <label>{{ __('dashboard.'.$locale.'.name') }}</label>
            <input class="form-control" name="{{$locale}}[name]" type="text">
            </div>
            @if ($errors->has($locale.'.name'))
            <p class="text-danger">{{ $errors->first($locale.'.name')}}</p>
            @endif
         @endforeach
        <div class="save">
            <input type="submit" value="حفظ">
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="{{asset('/js/validate.js')}}"></script>
@endsection
