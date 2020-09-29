<nav class="auth-navbar">
    <div class="auth container-fluid">
        <div class="navbar-content">
            <div class="navbar-brand">
                <a href="{{route('auth.home')}}" class="navbar-header">
                    <i class="icons flaticon-id-card"></i>
                    <div class="text-navbar-brand"> ระบบสมาชิก</div>
                </a>
            </div>
            <div class="navbar-links">
                <ul class="nav-links main-nav">
                    <li class="items only-sm">
                        <div id="toggleBTN">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </li>
                    <li class="items hidden-sm">
                        <a href="{{route('auth.home')}}" class="links">ลงทะเบียน</a>
                    </li>
                    <li class="items hidden-sm">
                        <a href="{{route('login')}}" class="links">ลงชื่อเข้าใช้</a>
                    </li>
                </ul>
                <div id="Sidebar" class="sidebar isClose">
                    <ul class="nav-links">
                        <li class="items header">
                            {{config('app.name')}}
                        </li>
                        <li class="items">
                            <a href="{{route('auth.register')}}" class="links">Register</a>
                        </li>
                        <li class="items">
                            <a href="{{route('login')}}" class="links">ลงชื่อเข้าใช้</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

