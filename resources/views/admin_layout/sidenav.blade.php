<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" id="close_sidenav_btn">&times;</a>
    <div class="profile">
        <center>
            <img src="{{getasset('image/logo-square.png')}}" class="profile-img" alt="image"><hr class="bg-light">
        </center>
    </div>
    <div class="main-menu">
        <a href="{{url('/admin/dashboard')}}">Dashboard</a>
        <a href="{{url('/admin/clinic/list')}}">Clinic</a>
        <a href="{{url('/admin/branch/list')}}">Branch</a>
        <button class="dropdown-btn">Settings <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <a href="#">Roles</a>
            <a href="#">User</a>
            <a href="#">Doctors</a>
            <a href="#">Price</a>
        </div>
        <button class="dropdown-btn">Reports <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <a href="#">Patients</a>
            <a href="#">Revenue</a>
        </div>
        <a href="#">Cashier</a>
    </div>
</div>