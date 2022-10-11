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
    <p> الإشعارات</p>
    <p id="trace">لوحة القيادة &gt; الإشعارات</p>
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
            <select>
                <option selected disabled hidden>
                    نوع المستخدم
                </option>
            </select>
            <select>
                <option selected disabled hidden>
                    عنوان الإشعار
                </option>
            </select>
            <input class="text-date" placeholder="تاريخ الإرسال" type="text" onfocus="(this.type = 'date')">
        </div>
    </div>
    <div class="add-user">
        <a href="{{route('Admin.notification.create')}}">
            <span>إضافة إشعار</span>
            <img src="../assets/icons/add-circle.svg" alt="إضافة مستخدم">
        </a>
    </div>
    <div class="table-responsive">
        <table class="finacial">
            <tr>
                <th>نوع المستخدم</th>
                <th>عنوان الإشعار</th>
                <th>نص الإشعار</th>
                <th>تاريخ الإرسال</th>
                <th>العمليات</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <i class="fa-solid fa-trash"></i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
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
