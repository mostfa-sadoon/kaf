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
    <p> المعاملات المالية</p>
    <p id="trace">لوحة القيادة &gt; المعاملات المالية</p>
</div>
<div class="users-contect setup">
    <div class="filter">
        <div class="title">
            <p>فلتر</p>
            <div class="arrow" id="toggleFilter">
                <img src="../assets/icons/arrow-up.svg" alt="إخفاء الفلاتر" id="toggleImg">
            </div>
        </div>
        <div class="filter-items" id="filterItems">
            <select>
                <option selected disabled hidden>
                    معرف العملية
                </option>
            </select>
            <select>
                <option selected disabled hidden>
                    البائع
                </option>
            </select>
            <select>
                <option selected disabled hidden>
                    المشتري
                </option>
            </select>
            <input class="text-date" placeholder="تاريخ البيع" type="text" onfocus="(this.type = 'date')">
        </div>
    </div>
    <div class="add-user">
        <a href="#" class="questions">
            <span>تصدير إكسل</span>
            <img src="../assets/icons/excel.svg" alt="تصدير إكسل">
        </a>
    </div>
    <div class="table-responsive">
        <table class="finacial">
            <tr>
                <th>معرف العملية</th>
                <th>البائع</th>
                <th>الحساب البنكي</th>
                <th>المشتري</th>
                <th>تاريخ البيع</th>
                <th>المبلغ</th>
                <th>الملف المباع</th>
                <th>الحالة</th>
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
                    <img src="../assets/icons/more.svg" alt="المزيد">
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
                    <img src="../assets/icons/more.svg" alt="المزيد">
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
                    <img src="../assets/icons/more.svg" alt="المزيد">
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
                    <img src="../assets/icons/more.svg" alt="المزيد">
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
                    <img src="../assets/icons/more.svg" alt="المزيد">
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
