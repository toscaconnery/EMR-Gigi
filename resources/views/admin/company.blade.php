@include('admin_layout.head')

<input type="checkbox" checked="checked" id="check">
{{-- header nav --}}
<header>
    <label for="check">
        <i class="fas fa-bars" id="sidebar-btn"></i>
    </label>

    <div class="icn-area">
        <a href="#" class="icon-btn"><i class="fas fa-sign-out-alt" data-toggle="tooltip" title="Sign Out"></i></a>
        <a href="#" class="icon-btn"><i class="fas fa-cogs" data-toggle="tooltip" title="Setting"></i></a>
        <a href="#" class="icon-btn"><i class="far fa-edit" data-toggle="tooltip" title="Edit"></i></a>
        <a href="#" class="icon-btn"><i class="far fa-envelope" data-toggle="tooltip" title="Message"></i></a>
    </div>
</header> 
{{-- header end --}}

{{-- second header --}}
<section class="scn-head">
    <div class="left-area">
        <h3>emr <span>gigi</span></h3>
    </div>

    <div class="right-area">
        <a href="#" class="add-btn"><i class="fas fa-plus-circle"></i>Add New</a>
        
        <ul class="breadcrumb">
            <li>Home</li>
            <li><a href="#">Company</a></li>
        </ul>
    </div>
</section>
{{-- second header end --}}

{{-- sidebar --}}
<div class="sidebar">
    <center>
        <img src="image/logo-square.png" class="profile-img" alt="image">
        <h4>Admin</h4>
    </center>
    <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
    <a href="#"><i class="fas fa-cogs"></i><span>Component</span></a>
    <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
    <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
    <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
    <a href="#"><i class="fas fa-sliders-h"></i><span>Setting</span></a>
</div>
{{-- sidebar end --}}

{{-- content --}}
<section class="content">

</section>
{{-- content end --}}