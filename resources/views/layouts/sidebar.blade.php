<header>
    <div class="links" id="links">
        <div class="times" id="close">
            <div class="time"></div>
            <div class="time"></div>
        </div>
        @if(Request::url() === route('admin.dashboard'))
        <a href="{{route('admin.dashboard')}}" class="item active">
        @else
        <a href="{{route('admin.dashboard')}}" class="item">
        @endif
            <img src="{{asset('assets/icons/white-arrow.svg')}}" class="itemArrow" alt="سهم أبيض">
            <span>لوحة القيادة</span>
        </a>
        @if(Request::url() === route('admin.user'))
        <a href="{{route('admin.user')}}" class="item active">
        @else
        <a href="{{route('admin.user')}}" class="item">
        @endif
            <img src="{{asset('assets/icons/white-arrow.svg')}}" class="itemArrow" alt="سهم أبيض">
            <span>المستخدمين</span>
        </a>
        @if(Request::url() === route('Admin.setuplogbook'))
        <a href="{{route('Admin.setuplogbook')}}" class="item active">
        @else
        <a href="{{route('Admin.setuplogbook')}}" class="item">
        @endif
            <img src="{{asset('assets/icons/white-arrow.svg')}}" class="itemArrow" alt="سهم أبيض">
            <span>إعداد سجل المتابعة</span>
        </a>
        @if(Request::url() === route('Admin.logbook'))
          <a href="{{route('Admin.logbook')}}" class="item active">
         @else
         <a href="{{route('Admin.logbook')}}" class="item">
         @endif
            <img src="{{asset('assets/icons/white-arrow.svg')}}" class="itemArrow" alt="سهم أبيض">
            <span>سجل المتابعة</span>
        </a>
        <a href="{{route('Admin.homework')}}" class="item @if(Request::url() === route('Admin.homework')) active @endif"">
            <img src="{{asset('assets/icons/white-arrow.svg')}}" class="itemArrow" alt="سهم أبيض">
            <span>الواجبات</span>
        </a>
        <a href="{{route('Admin.exam')}}" class="item @if(Request::url() === route('Admin.exam')) active @endif">
            <img src="../assets/icons/white-arrow.svg" class="itemArrow" alt="سهم أبيض">
            <span>الإختبارات</span>
        </a>
        <a href="{{route('admin.liberary')}}" class="item @if(Request::url() === route('admin.liberary')) active @endif">
            <img src="{{asset('assets/icons/white-arrow.svg')}}" class="itemArrow" alt="سهم أبيض">
            <span>المكتبة</span>
        </a>
        <a href="{{route('Admin.finance')}}" class="item @if(Request::url() === route('Admin.finance')) active @endif">
            <img src="{{asset('assets/icons/white-arrow.svg')}}" class="itemArrow" alt="سهم أبيض">
            <span>العمليات المالية</span>
        </a>
        <a href="{{ route('admin.subscribtions.index') }}" class="item @if(Request::url() === route('admin.subscribtions.index')) active @endif">
            <img src="{{asset('assets/icons/white-arrow.svg')}}" class="itemArrow" alt="سهم أبيض">
            <span>الإشتراكات</span>
        </a>
        <a href="{{route('Admin.notification')}}" class="item  @if(Request::url() === route('Admin.notification')) active @endif">
            <img src="{{asset('assets/icons/white-arrow.svg')}}" class="itemArrow" alt="سهم أبيض">
            <span>الإشعارات</span>
        </a>
        <div class="item setting" id="setting">
            <div class="title">
                <img src="{{asset('assets/icons/white-arrow.svg')}}" id="settingArrow" class="itemArrow" alt="سهم أبيض">
                <span>الإعدادات</span>
            </div>
            <div id="settingItems">
                <ul>
                    <li>
                        <a href="{{route('subjects.index')}}">المواد</a>
                    </li>
                    <li>
                        <a href="{{route('classes.index')}}">الصفوف</a>
                    </li>
                    <li>
                        <a href="{{route('semesters.index')}}">الأترام</a>
                    </li>
                    <li>
                        <a href="{{route('acadimicyears.index')}}">السنوات الدراسية</a>
                    </li>
                    <li>
                        <a href="{{route('bookcategories.index')}}">فئات الملفات</a>
                    </li>
                    <li>
                        <a href="{{route('fileextentions.index')}}">أنواع الملفات</a>
                    </li>
                    <li>
                        <a href="{{route('Admin.generalsetting')}}">الاعدادت العامة</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="dashboard">
       @yield('content')
    </div>
</header>
