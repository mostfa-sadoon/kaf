@extends('admin_temp')

@section('styles')
<script src="{{asset('/js/all.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/global.css')}}">
<link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('/css/users.css')}}">
<link rel="stylesheet" href="{{asset('/css/logbook.css')}}">
<link rel="stylesheet" href="{{asset('/css/generalSetting.css')}}">

</head>
@endsection


@section('content')
<div class="title">
    <p> الإعدادات العامة</p>
    <p id="trace">لوحة القيادة &gt; الإعدادات العامة</p>
</div>
<div class="users-contect logbook generalSetting">
    <form action="javascript:void(0)">
        <div class="input-container">
            <div class="text">
                <p>السعر الشهري لجميع الخدمات ماعدا أداة كاف</p>
            </div>
            <div class="input">
                <input type="number">
            </div>
        </div>
        <div class="input-container">
            <div class="text">
                <p>السعر الشهري آداة </p>
            </div>
            <div class="input">
                <input type="number">
            </div>
        </div>
        <div class="input-container">
            <div class="text">
                <p>السعر السنوي لجميع الخدمات ماعدا أداة كاف</p>
            </div>
            <div class="input">
                <input type="number">
            </div>
        </div>
        <div class="input-container">
            <div class="text">
                <p>السعر السنوي آداة</p>
            </div>
            <div class="input">
                <input type="number">
            </div>
        </div>
        <div class="input-container">
            <div class="text">
                <p>نسبة الربح من مكتبة المعلم</p>
            </div>
            <div class="input">
                <input type="number">
            </div>
        </div>
        <div class="input-container">
            <div class="text">
                <p>نسبة الربح من مكتبة الطالب</p>
            </div>
            <div class="input">
                <input type="number">
            </div>
        </div>
        <div class="input-container">
            <div class="text">
                <p>خيارات أسعار ملفات المكتبة</p>
            </div>
            <div class="input checks">
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>مجانا</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <input type="number">
                    <span>ريال</span>
                </label>
                <label class="container-checkbox">
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                    <span>سعر مقيد</span>
                </label>
            </div>
        </div>
        <div class="save-log">
            <button>
                <span>حفظ الإعدادات</span>
                <img src="../assets/icons/save.svg" alt="حفظ">
            </button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="{{asset('/js/dashboard.js')}}"></script>
<script src="{{asset('/js/filter.js')}}"></script>

    <script src="{{asset('js/jquery.min.js')}}"></script>

    <script>
        $('#user-type').change(function () {
            $('#form-user-type').submit();
        });
    </script>

@endsection
