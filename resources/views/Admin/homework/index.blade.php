@extends('admin_temp')

@section('styles')
<script src="{{asset('/js/all.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/global.css')}}">
<link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('/css/users.css')}}">
<link rel="stylesheet" href="{{asset('/css/logbook.css')}}">
</head>
@endsection


@section('content')
<div class="title">
    <p>الواجبات</p>
    <p id="trace">لوحة القيادة &gt; الواجبات</p>
</div>
<div class="users-contect setup">
    <div class="filter">
        <div class="title">
            <p>فلتر</p>
            <div class="arrow" id="toggleFilter">
                <i class="fa-solid fa-angle-up"></i>
            </div>
        </div>
        <div class="filter-items" id="filterItems">
            <select name="subject" id="subject">
                <option selected disabled hidden>
                    المادة
                </option>
            </select>
            <select name="class" id="class">
                <option selected disabled hidden>
                    الصف
                </option>
            </select>
            <select name="term" id="term">
                <option selected disabled hidden>
                    الفصل التعليمي
                </option>
            </select>
            <select name="teacher" id="teacher">
                <option selected disabled hidden>
                    المعلم
                </option>
            </select>
        </div>
    </div>
    <div class="add-user">
        <a href="{{route('Admin.homework.create')}}">
            <span>إضافة واجب</span>
            <img src="../assets/icons/add-circle.svg" alt="إضافة مستخدم">
        </a>
    </div>
    <div class="table-responsive">
        <table>
            <tr>
                <th>المادة</th>
                <th>الصف</th>
                <th>الفصل التعليمي</th>
                <th>تفاصيل الواجب</th>
                <th>صورة الواجب</th>
                <th>العمليات</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <i class="fa-solid fa-pen-to-square"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <i class="fa-solid fa-pen-to-square"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <i class="fa-solid fa-pen-to-square"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <i class="fa-solid fa-pen-to-square"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <i class="fa-solid fa-pen-to-square"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
        </table>
    </div>
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
