@extends('admin_temp')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard-g.css')}}">
    <link rel="stylesheet" href="{{asset('css/users.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')

<div class="title">
    <p> الإشتراكات</p>
    <p id="trace">لوحة القيادة &gt; الإشتراكات</p>
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
            
            
            <form action="{{route('admin.subscribtions.index')}}" method="get">
                @csrf

                <select name="subscribtion_kind_id">
                    <option selected disabled hidden> نوع الإشتراك </option>
                    @foreach ($subscribtions_kinds as $item)
                    <option {{ $item->id == $subscribtion_kind_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                
                <select name="user_type">
                    <option selected disabled hidden>المستخدم</option>
                    <option {{ $user_type == 1 ? 'selected' : '' }} value="1">طالب</option>
                    <option {{ $user_type == 2 ? 'selected' : '' }} value="2">معلم</option>
                </select>

                <input name="start_date" class="text-date" placeholder="تاريخ البداية" value="{{ $start_date }}" type="text" onfocus="(this.type = 'date')">

                <input name="end_date" class="text-date" placeholder="تاريخ النهاية" value="{{ $end_date }}" type="text" onfocus="(this.type = 'date')">

                <select name="status">
                    <option selected disabled hidden>الحالة</option>
                    <option {{ $status == 0 ? 'selected' : '' }} value="false">غير مفعل</option>
                    <option {{ $status == 1 ? 'selected' : '' }} value="1">مفعل</option>
                </select>

                <input type="submit"  class="btn btn-primary mt-2" value="بحث">

            </form>


        </div>
    </div>
    <div class="add-user">
        {{--  <a href="#" class="questions">
            <span>تصدير إكسل</span>
            <img src="../assets/icons/excel.svg" alt="تصدير إكسل">
        </a>  --}}
    </div>
    <div class="table-responsive">
        <table class="finacial">
            <tr>
                <th>نوع الخدمه</th>
                <th>نوع الإشتراك</th>
                <th>المستخدم</th>
                <th>تاريخ البداية</th>
                <th>تاريخ النهاية</th>
                <th>الحالة</th>
                <th>العمليات</th>
            </tr>
            
            @foreach ($subscribtions as $item)
                <tr>
                    <td>{{ $item->subscribtion_kind->name }}</td>
                    <td>{{ $item->getType() }}</td>
                    <td>{{ $item->getUser()->f_name ?? '--' }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date }}</td>
                    <td>{{ $item->getStatus() }}</td>
                    <td>
                        <i class="fa-solid fa-ellipsis"></i>
                    </td>
                </tr>
            @endforeach
           
        </table>
    </div>
</div>
    {!! $subscribtions->links() !!}

@endsection




@section('scripts')

    <script src="{{asset('js/jquery.min.js')}}"></script>

    <script>
        $('#user-type').change(function () {
            $('#form-user-type').submit();
        });
    </script>

@endsection