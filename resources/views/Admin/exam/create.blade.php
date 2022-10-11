@extends('admin_temp')

@section('styles')
<script src="{{asset('/js/all.min.js')}}"></script>

<link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/global.css')}}">
<link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('/css/users.css')}}">
<link rel="stylesheet" href="{{asset('/css/addExam.css')}}">
</head>
@endsection

@section('content')
<div class="title">
    <p> إضافة إختبار</p>
    <p id="trace">لوحة القيادة &gt; إضافة إختبار</p>
</div>
<div class="users-contect addExam">
    <form action="javascript:void(0)">
        <select>
            <option selected disabled hidden>
                المادة
            </option>
        </select>
        <select>
            <option selected disabled hidden>
                توجيه الدرجة
            </option>
        </select>
        <input class="text-date dark" placeholder="تاريخ الإختبار" type="text"
            onfocus="(this.type = 'date')">
        <select>
            <option selected disabled hidden>
                المدة
            </option>
        </select>
        <div class="all-students">
            <input type="radio">
            <span>جميع الطلاب</span>
        </div>
        <select>
            <option selected disabled hidden>
                حدد الفصول
            </option>
        </select>
        <div class="all-students">
            <input type="radio">
            <span>أرسل لطالب</span>
        </div>
        <select>
            <option selected disabled hidden>
                إختر الطالب
            </option>
        </select>
        <div class="add-question">
            <a href="addQuestion.html">
                <img src="../assets/icons/add-circle-outline.png" alt="إضافة سؤال">
                <span>إضافة سؤال</span>
            </a>
        </div>
        <div class="questions">
            <div class="question">
                <div class="title">
                    <div class="number">2</div>
                    <p>عنوان السؤال التجريبي</p>
                </div>
                <div class="info">
                    <div class="marks">
                        10 نقاط
                    </div>
                    <div class="action">
                        <img src="../assets/icons/edit.svg" alt="تعديل">
                        <img src="../assets/icons/delete-red.png" alt="مسح">
                    </div>
                </div>
            </div>
            <div class="question">
                <div class="title">
                    <div class="number">3</div>
                    <p>عنوان السؤال التجريبي</p>
                </div>
                <div class="info">
                    <div class="marks">
                        10 نقاط
                    </div>
                    <div class="action">
                        <img src="../assets/icons/edit.svg" alt="تعديل">
                        <img src="../assets/icons/delete-red.png" alt="مسح">
                    </div>
                </div>
            </div>
            <div class="question">
                <div class="title">
                    <div class="number">2</div>
                    <p>عنوان السؤال التجريبي</p>
                </div>
                <div class="info">
                    <div class="marks">
                        10 نقاط
                    </div>
                    <div class="action">
                        <img src="../assets/icons/edit.svg" alt="تعديل">
                        <img src="../assets/icons/delete-red.png" alt="مسح">
                    </div>
                </div>
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
