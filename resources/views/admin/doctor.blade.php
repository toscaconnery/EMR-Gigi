@include('admin_layout.head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
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
            <a href="#">Doctor</a>
          </div>
      </div>
</div>
<!-- sidenav end -->
<div id="main">
<!-- navbar start -->
  <nav class="navbar navbar-light bg-light">
    <span style="color:black;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <span class="navbar-brand mb-0 h1">Doctors</span>
  </nav>
  <!--Breadcrumb-->
    <div class="bread mr-auto">
      <ul class="breadcrumb-role ">
          <li><a class="active">Settings</a></li>
          <li><a href="#">Doctors</a></li>
      </ul>
    </div>
  <!-- Breadcrumb End -->
  <!-- navbar end -->
  <div class="container fluid">
    <div class="card col-md-12">
      <div class="class"><button type="button" class="btn btn-roles btn-addcustom btn-sm">Add Doctor</button></div>
      <table id="tabel-roles" class="table table-bordered">
          <thead class="thead-custom">
            <tr>
              <th width="340px">Doctors</th>
              <th width="400px">Last Update</th>
              <th width="340px">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr height="45px">
              <td>User 1</td>
              <td>20-Jun-2020</td>
              <td>
                <button type="button" class="btn btn-roles btn-edtcustom btn-sm">Edit</button>
                <button type="button" class="btn btn-roles btn-delcustom btn-sm">Del</button>
              </td>
            </tr>
            <tr height="45px">
              <td>User 2</td>
              <td>20-Jun-2020</td>
              <td>
                <button type="button" class="btn btn-roles btn-edtcustom btn-sm">Edit</button>
                <button type="button" class="btn btn-roles btn-delcustom btn-sm">Del</button>
              </td>
            </tr height="45px">
            <tr>
              <td>User 3</td>
              <td>20-Jun-2020</td>
              <td>
                <button type="button" class="btn btn-roles btn-edtcustom btn-sm">Edit</button>
                <button type="button" class="btn btn-roles btn-delcustom btn-sm">Del</button>
              </td>
            </tr>
          </tbody>
        </table>
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
 