<nav>
    <span style="font-size:30px;cursor:pointer" id="open_sidenav_btn">&#9776;</span>
    <ul>
            <div class="nav-menu">
            <li class="mr-4">{{Auth::user()->name}}</li>
            <li><a href="{{url('/logout')}}">Logout <i class="fas fa-sign-out-alt"></i></a></li>
        </div>
    </ul>
</nav>