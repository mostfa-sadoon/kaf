@extends('admin_temp')
@section('title')
   كاف|لوحه التحكم
@endsection
@section('styles')
<script src="{{asset('js/chart.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/global.css')}}">
<link rel="stylesheet" href="{{asset('css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection
@section('content')
<div class="title">
    <p>لوحة القيادة</p>
    <p id="trace">لوحة القيادة</p>
</div>
<div class="dashboard-contect">
    <div class="dash-item">
        <canvas class="canvas" id="myChart" width="400" height="400"></canvas>
        <a href="#">إحصائيات تحميل الكتب</a>
    </div>
    <div class="dash-item">
        <canvas class="canvas" id="myChart2" width="400" height="400"></canvas>
        <a href="#">إحصائيات البحث عن الكتب</a>
    </div>
    <div class="dash-item">
        <canvas class="canvas" id="myChart3" width="400" height="400"></canvas>
        <a href="#">....</a>
    </div>
    <div class="dash-item">
        <canvas class="canvas" id="myChart4" width="400" height="400"></canvas>
        <a href="#">إحصائيات المداخيل</a>
    </div>
    <div class="dash-item">
        <canvas class="canvas" id="myChart5" width="400" height="400"></canvas>
        <a href="#">إحصائيات عدد الاشتراكات</a>
    </div>
    <div class="dash-item">
        <canvas class="canvas" id="myChart6" width="400" height="400"></canvas>
        <a href="#">....</a>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/canvas.js')}}"></script>
@endsection


