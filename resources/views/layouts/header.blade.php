<body>
<nav>
    <div class="logo">
        <img src="{{asset('assets/logo/Logo_kaaf.png')}}" alt="كاف">
        <div class="bars">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
    <div class="user">
        <div class="user-data" id="userData">
            <div class="hello">
                <p class="hi">أهلا</p>
                <p class="username">{{Auth::guard('admin')->user()->fullname}}</p>
            </div>
            <div class="user-pic">
                <p>ع</p>
            </div>
        </div>
        <div class="user-action" id="userAction">
            <a href="myAccount.html">معلومات الحساب</a>
            <form action="{{route('admin.signout')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{Auth::guard('admin')->user()->id}}">
                <button class="logout" type="submit">تسجيل الخروج</button>
            </form>
        </div>
    </div>
</nav>
