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
    <p>سجل المتابعة</p>
    <p id="trace">لوحة القيادة &gt; سجل المتابعة</p>
</div>
<div class="users-contect logbook">
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
    <div class="action">
        <button id="openQr">
            <span>توليد باركود الطلاب</span>
            <img src="../assets/icons/qr.svg" alt="QR Code">
        </button>
        <button>
            <span>تصدير إكسل</span>
            <img src="../assets/icons/excel.svg" alt="Excel">
        </button>
        <button id="print">
            <span>طباعة بي دي اف</span>
            <img src="../assets/icons/pdf.svg" alt="PDF">
        </button>
    </div>
    <div class="table-responsive">
        <table id="table">
            <tr>
                <td></td>
                <td></td>
                <td>
                    <label class="container-checkbox">
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        <span>ترحيل إلى نور</span>
                    </label>
                </td>
                <td>
                    <label class="container-checkbox">
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        <span>ترحيل إلى نور</span>
                    </label>
                </td>
                <td>
                    <label class="container-checkbox">
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        <span>ترحيل إلى نور</span>
                    </label>
                </td>
                <td>
                    <label class="container-checkbox">
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        <span>ترحيل إلى نور</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="max-mark">
                    <input type="number" placeholder="الدرجة الكبرى">
                </td>
                <td class="max-mark">
                    <input type="number" placeholder="الدرجة الكبرى">
                </td>
                <td class="max-mark">
                    <input type="number" placeholder="الدرجة الكبرى">
                </td>
                <td class="max-mark">
                    <input type="number" placeholder="الدرجة الكبرى">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <div class="table-add">
                        <input type="number">
                        <img src="../assets/icons/add-circle-outline.svg" alt="إضافة">
                    </div>
                </td>
                <td>
                    <div class="table-add">
                        <input type="number">
                        <img src="../assets/icons/add-circle-outline.svg" alt="إضافة">
                    </div>
                </td>
                <td>
                    <div class="table-add">
                        <input type="number">
                        <img src="../assets/icons/add-circle-outline.svg" alt="إضافة">
                    </div>
                </td>
                <td>
                    <div class="table-add">
                        <input type="number">
                        <img src="../assets/icons/add-circle-outline.svg" alt="إضافة">
                    </div>
                </td>
            </tr>
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
<script src="{{asset('/js/print.js')}}"></script>
<script src="{{asset('/js/qrCode.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <script>
        $('#user-type').change(function () {
            $('#form-user-type').submit();
        });
    </script>

@endsection
