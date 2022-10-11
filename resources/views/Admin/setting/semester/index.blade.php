@extends('admin_temp')
@section('title')

@endsection
@section('styles')
    <script src="{{asset('/js/all.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/global.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dashboard-g.css')}}">
    <link rel="stylesheet" href="{{asset('/css/users.css')}}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endsection
@section('content')
<div class="title">
    <p> الفصول الدراسيه</p>
    <p id="trace">لوحة القيادة &gt; الفصول الدراسيه</p>
</div>

<div class="users-contect subjects">
    <div class="filter">
        <div class="title">
            <p>فلتر</p>
            <div class="arrow" id="toggleFilter">
                <i class="fa-solid fa-angle-up"></i>
            </div>
        </div>
        <div class="filter-items" id="filterItems">
            <input type="text" placeholder="إسم الفصل الدارسي">
        </div>
    </div>
    <div class="add-user">
        <a href="{{route('semesters.create')}}">
            <span>إضافة فصل دراسي</span>
            <img src="../assets/icons/add-circle.svg" alt="إضافة مستخدم">
        </a>
    </div>
    <div class="table-responsive">
        <table>
            <tr>
                <th>إسم الفصل الدارسي</th>
                <th>العمليات</th>
            </tr>
             @foreach ($Semesters as $semester)
             <tr>
                <td>{{$semester->name}}</td>
                <td>
                   <a href="{{route('semesters.edit',$semester->id)}}"> <i class="fa-solid fa-pen-to-square"></i> </a>
                   <form action="{{route('semesters.destroy',$semester->id)}}" method="post">
                    @csrf
                    @method('delete')
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

<script src="{{asset('/js/dashboard.js')}}"></script>
<script src="{{asset('/js/filter.js')}}"></script>
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script>

</script>
@endsection
