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
    <form action="{{route('bookcategories.update',$Bookcategory->id)}}" method="post">
        @method('put')
        @csrf
        <div>


            @foreach (config('translatable.locales') as $locale)

                <label>{{ __('dashboard.'.$locale.'.name') }}</label>
                <input class="form-control" name="{{$locale}}[name]" value="{{$Bookcategory->translateOrNew($locale)->name, true}}" type="text">
                @if ($errors->has($locale.'.name'))
                <p class="text-danger">{{ $errors->first($locale.'.name')}}</p>
                @endif
             @endforeach


            {{-- @if(old(Config::get('app.locale').'[name]'))
            <input name="Config::get('app.locale')}}[name]"  type="text" value="old('name')">
            @else
            <input name="{{Config::get('app.locale')}}[name]"  type="text" value="{{$Bookcategory->name}}">
                @if ($errors->has(Config::get('app.locale').'[name]'))
                <p class="text-danger">{{ $errors->first(Config::get('app.locale').'[name]')}}</p>
                @endif
            @endif --}}
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
