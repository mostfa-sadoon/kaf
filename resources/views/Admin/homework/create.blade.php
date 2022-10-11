@extends('admin_temp')

@section('styles')
<script src="{{asset('/js/all.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/global.css')}}">
<link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('/css/users.css')}}">
<link rel="stylesheet" href="{{asset('/css/logbook.css')}}">
<link rel="stylesheet" href="{{asset('/css/addHomework.css')}}">
</head>
@endsection


@section('content')
<div class="title">
    <p> إضافة واجب</p>
    <p id="trace">لوحة القيادة &gt; إضافة واجب</p>
</div>
<div class="users-contect addHomework">
    <form action="javascript:void(0)">
        <select>
            <option selected disabled hidden>إختر المادة</option>
        </select>
        <input type="text" placeholder="عنوان الواجب">
        <textarea rows="5" placeholder="تفاصيل الواجب"></textarea>
        <label class="upload dateBtn">
            <input type="file" class="dateInput">
            <img src="../assets/icons/add-circle.svg">
            <span>أرفق صورة</span>
            <img src="../assets/icons/file.png">
        </label>
        <div class="all-students">
            <div class="input">
                <input type="radio" name="type">
                <span>جميع الطلاب</span>
            </div>
            <div class="select">
                <span>حدد الفصول</span>
                <select>
                    <option selected disabled hidden></option>
                </select>
            </div>
        </div>
        <div class="a-student">
            <div class="input">
                <input type="radio" name="type">
                <span>أرسل لطالب</span>
            </div>
            <div class="select">
                <span>إختر الطالب</span>
                <select>
                    <option selected disabled hidden></option>
                </select>
            </div>
        </div>
        <div class="save">
            <input type="submit" value="حفظ">
        </div>
    </form>
</div>
@endsection




@section('scripts')
<script src="{{asset('/js/dashboard.js')}}"></script>
<script src="{{asset('/js/filter.js')}}"></script>
<script src="{{asset('/js/upload.js')}}"></script>

    <script src="{{asset('js/jquery.min.js')}}"></script>

    <script>
        $('#user-type').change(function () {
            $('#form-user-type').submit();
        });
    </script>

@endsection
