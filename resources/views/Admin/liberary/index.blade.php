@extends('admin_temp')
@section('title')

@endsection
@section('styles')
<script src="{{asset('/js/all.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/global.css')}}">
<link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('/css/users.css')}}">
<link rel="stylesheet" href="{{asset('/css/addBook.css')}}">
@endsection
@section('content')
<div class="title">
    <p> المكتبة</p>
    <p id="trace">لوحة القيادة &gt; المكتبة</p>
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
            <form action="{{route('liberary.search')}}" method="post" id="search-form">
                @csrf
                <select name="subject">
                    @foreach ($subjects as  $subject)
                    <option value="{{$subject->id}}">{{$subject->translate(Config::get('app.locale'))->name }}</option>
                    @endforeach
                </select>
                <select  name="fileextension">
                    @foreach ($fileextensions as  $fileextension)
                    <option value="{{$fileextension->id}}">{{$fileextension->name}}</option>
                    @endforeach
                </select>
                <select  name="class">
                    @foreach ($classes as  $class)
                    <option value="{{$class->id}}">{{$class->translate(Config::get('app.locale'))->name }}</option>
                    @endforeach
                </select>
                <select  name="semester">
                    @foreach ($Semesters as  $semester)
                    <option value="{{$semester->id}}">{{$semester->translate(Config::get('app.locale'))->name }}</option>
                    @endforeach
                </select>
            <select name="user">
                <option selected value="teacher">معلم</option>
                <option  value="student">طالب</option>
            </select>

            <input type="submit" value="search" class="btn btn-primary mb-1" style="width: 75px">
            </form>
        </div>
    </div>
    <div class="add-user">
        <a href="{{route('admin.createbook')}}">
            <span>إضافة كتاب</span>
            <img src="{{asset('/assets/icons/add-circle.svg')}}">
        </a>
    </div>
    <div class="table-responsive">
        <table>
            <tr>
                <th>صنف المكتبة</th>
                <th>فئة الملف</th>
                <th>نوع الملف</th>
                <th>المادة</th>
                <th>الصف</th>
                <th>سعر الملف</th>
                <th>العمليات</th>
            </tr>
            @foreach ($books as $book)
            <tr>
                <td>
                    @if($book->owner_type=='App\Models\Teacher')
                        مكتبه معلم
                    @else
                        مكتبه طالب
                    @endif
                </td>
                <td>{{$book->bookcategory->name}}</td>
                <td>{{$book->fileextention->name}}</td>
                <td>{{$book->subject->name}}</td>
                <td>{{$book->classe->name}}</td>
                <td>{{$book->Pricesetting->value}}</td>
                <td>
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                   <a href="{{route('admin.editbook',$book->id)}}"> <i class="fa-solid fa-pen-to-square"></i> </a>
                    <form action="{{route('book.destroy')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$book->id}}">
                        <button type="submit" class="btn"> <i class="fa-solid fa-trash"></i></button>
                       </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/filter.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
{{-- <script>
  $('<option>').change(function(){
    alert('fdfd');
  });
</script> --}}
@endsection