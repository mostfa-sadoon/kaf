@extends('admin_temp')
@section('styles')
<link rel="stylesheet" href="{{asset('css/global.css')}}">
<link rel="stylesheet" href="{{asset('css/dashboard-g.css')}}">
<link rel="stylesheet" href="{{asset('css/users.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="title">
    <p>المستخدمين</p>
    <p id="trace">لوحة القيادة &gt; المستخدمين</p>
</div>
<div class="users-contect">
    <div class="filter">
        <div class="title">
            <p>فلتر</p>
            <div class="arrow" id="toggleFilter">
                <img src="../assets/icons/arrow-up.svg" alt="إخفاء الفلاتر" id="toggleImg">
            </div>
        </div>
        <div class="filter-items" id="filterItems">
            <form id="form-user-type" action="{{route('admin.usertype')}}" method="post">
                @csrf
                <select name="user_type" id="user-type">
                    @foreach ($types as $usertype)
                     @if($type==$usertype->id)
                     <option  value="{{$usertype->id}}" selected>  {{$usertype->name}} </option>
                     @else
                     <option  value="{{$usertype->id}}">  {{$usertype->name}} </option>
                     @endif
                    @endforeach
                </select>
            </form>
            <form action="{{route('admin.searchuser')}}" method="post">
             @csrf
                <input type="hidden" name="usertype" value="{{$type}}">
                <input type="text" name="name" placeholder="الإسم">
                <input type="number" name="national_id" placeholder="رقم السجل المدني">
                <input type="submit"  class="btn btn-primary" value="search">
            </form>
        </div>
    </div>
    <div class="add-user">
        <a href="{{route('admin.usercreate')}}">
            <span>إضافة مستخدم</span>
            <img src="{{asset('assets/icons/add-circle.svg')}}" alt="إضافة مستخدم">
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
            @foreach ($users as $user)
            <tr>
                <td>{{$user->f_name}}</td>
                <td>{{$user->l_name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->national_id }}</td>
                <td>{{$user->Bank_account_number  }}</td>
                <td>طالب</td>
                <td></td>
                <td></td>
                <td>
                   <a href="{{route('admin.useredit',[$user->id,$user->usertype])}}"> <img src="{{asset('assets/icons/edit.svg')}}"  alt="تعديل"></a>
                      <form action="{{route('admin.userdestroy')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="usertype" value="{{$user->usertype}}">
                        <button type="submit" class="btn"><img src="{{asset('assets/icons/delete.svg')}}" alt="مسح"></button>
                      </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
{!! $users->links() !!}
@endsection
@section('scripts')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
$('#user-type').change(function(){
   $('#form-user-type').submit();
});
</script>
@endsection
