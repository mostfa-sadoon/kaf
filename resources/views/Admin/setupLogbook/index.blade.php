@extends('admin_temp')

@section('styles')
<script src="../js/all.min.js"></script>
<link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/global.css')}}">
<link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('/css/users.css')}}">
@endsection


@section('content')


<div class="title">
    <p>إعداد سجل المتابعة</p>
    <p id="trace">لوحة القيادة &gt; إعداد سجل المتابعة</p>
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
    <div class="add-user">
        <a href="addLogbook.html">
            <span>إضافة سجل متابعة</span>
            <img src="../assets/icons/add-circle.svg" alt="إضافة مستخدم">
        </a>
    </div>
    <div class="table-responsive">
        <table>
            <tr>
                <th>الإسم الأول</th>
                <th>إسم العائلة</th>
                <th>إسم المستخدم</th>
                <th>رقم السجل المدني</th>
                <th>رقم الحساب البنكي</th>
                <th>نوع المستخدم</th>
                <th>الرصيد</th>
                <th>الصلاحيات</th>
                <th>العمليات</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
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
