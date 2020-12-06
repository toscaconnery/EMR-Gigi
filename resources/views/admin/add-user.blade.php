@include('admin_layout.head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
<!-- sidenav start -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <div class="profile">
      <center>
        <img src="image/logo-square.png" class="profile-img" alt="image">
      </center>
    </div>
      <div class="main-menu">
        <a href="#">Company</a>
        <a href="#">Branch</a>
        <button class="dropdown-btn">Master <i class="fa fa-caret-down"></i></button>
          <div class="dropdown-container">
            <a href="#">Roles</a>
            <a href="#">User</a>
          </div>
      </div>
</div>
<!-- sidenav end -->

<div id="main">
<!-- navbar start -->
  <nav class="navbar navbar-light bg-light">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <span class="navbar-brand mb-0 h1">Users</span>
  </nav>
<!--Breadcrumb-->
  <div class="bread mr-auto">
    <ul class="breadcrumb-role ">
        <li><a class="active">Settings</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Add User</a></li>
    </ul>
  </div>
<!-- Breadcrumb End -->
<!-- navbar end -->
  <div class="container fluid">
    <div class="card col-md-12">
      <div class="card-body mt-3 mb-2">
          <div class="form-group row">
              <label for="inputuser" class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10">
                  <select id="inputuser" class="form-control form-add mb-2">
                      <option selected>Select Role..</option>
                      <option>...</option>
                  </select>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputUname" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                  <input type="Username" class="form-control form-add mb-2" id="inputuname" placeholder="">
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputEmail4">Password</label>
                  <input type="password" class="form-control form-add mb-2" placeholder="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputPassword4">Confirm Password</label>
                  <input type="password" class="form-control form-add mb-2" placeholder="">
              </div>
          </div>
          <div class="button float-right">
              <button type="button" class="btn btn-roles-save btn-sm">Save</button>
          </div>
      </div>
  </div>
</div>

</body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
</html>