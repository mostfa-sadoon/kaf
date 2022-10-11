@extends('admin_temp')

@section('styles')
<script src="{{asset('/js/all.min.js')}}"></script>

<link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/global.css')}}">
<link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('/css/users.css')}}">
<link rel="stylesheet" href="{{asset('/css/addNoti.css')}}">
</head>
@endsection

@section('content')
<div class="title">
    <p> إضافة إشعار</p>
    <p id="trace">لوحة القيادة &gt; إضافة إشعار</p>
</div>
<div class="users-contect addNoti">
    <form action="javascript:void(0)">
        <select>
            <option selected disabled hidden>
                نوع المستخدم
            </option>
            <input type="text" placeholder="عنوان الإشعار">
            <textarea rows="10" placeholder="نص الإشعار"></textarea>
        </select>
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
