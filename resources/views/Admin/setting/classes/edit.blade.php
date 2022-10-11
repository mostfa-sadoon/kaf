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
    <form action="{{route('classes.update',$Classe->id)}}" method="post">
        @method('put')
        @csrf
        <div>
            @foreach (config('translatable.locales') as $locale)
                <label>{{ __('dashboard.'.$locale.'.name') }}</label>
                <input class="form-control" name="{{$locale}}[name]" value="{{$Classe->translateOrNew($locale)->name, true}}" type="text">
                @if ($errors->has($locale.'.name'))
                <p class="text-danger">{{ $errors->first($locale.'.name')}}</p>
                @endif
            @endforeach
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
