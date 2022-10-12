@extends('admin_temp')

@section('styles')
<script src="../js/all.min.js"></script>
<link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/global.css')}}">
<link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('/css/users.css')}}">
<link rel="stylesheet" href="{{asset('/css/addLogbook.css')}}">
@endsection


@section('content')


<div class="title">
    <p>إضافة سجل المتابعة</p>
    <p id="trace">لوحة القيادة &gt; إضافة سجل المتابعة</p>
</div>
<div class="users-contect addLogbook">
    <div class="filter">
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
            <select name="peroid" id="peroid">
                <option selected disabled hidden>
                    الفترة
                </option>
            </select>
            <select name="year" id="year">
                <option selected disabled hidden>
                    السنة الدراسية
                </option>
            </select>
            <select name="teacher" id="teacher">
                <option selected disabled hidden>
                    المعلم
                </option>
            </select>
        </div>
    </div>
    <div class="download">
        <button>
            <span>تنزيل البيانات من نظام نور</span>
            <img src="{{asset('/assets/icons/download.svg')}}" alt="تنزيل">
        </button>
    </div>
    <div class="add-col">
        <img src="{{asset('/assets/icons/add-circle.svg')}}" alt="إضافة" id="addColBtn">
    </div>
    <div class="table-responsive">
        <table id="table">
            <tr>
                <th>رقم الطالب</th>
                <th>إسم الطالب</th>
                <th>العمود الأول</th>
                <th>العمود الثاني</th>
                <th>العمود الثالث</th>
                <th>العمود الرابع</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="save-log">
        <button>
            <span>حفظ السجل</span>
            <img src="../assets/icons/save.svg" alt="حفظ">
        </button>
    </div>
</div>

@endsection




@section('scripts')
        <script src="{{asset('/js/dashboard.js')}}"></script>
        <script src="{{asset('/js/filter.js')}}"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('/js/addCol.js')}}"></script>

    <script>
        $('#user-type').change(function () {
            $('#form-user-type').submit();
        });
    </script>

@endsection
