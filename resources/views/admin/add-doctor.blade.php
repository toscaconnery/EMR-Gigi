@include('admin_layout.head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
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
    <span style="color:black;font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;</span>
    <span class="navbar-brand mb-0 h1">Doctors</span>
  </nav>
  <!--Breadcrumb-->
    <div class="bread mr-auto">
      <ul class="breadcrumb-role ">
          <li><a class="active">Settings</a></li>
          <li><a href="#">Doctors</a></li>
          <li><a href="#">Add Doctors</a></li>
      </ul>
    </div>
  <!-- Breadcrumb End -->
  <!-- navbar end -->
  <div class="container fluid">
    <div class="card col-md-12">
      <div class="card-body mt-3 mb-2">
          <div class="form-group row">
              <label for="inputklinik" class="col-sm-2 col-form-label">Klinik</label>
              <div class="col-sm-10">
                  <select id="inputuser" class="form-control form-add mb-2">
                      <option selected>Select Klinik..</option>
                      <option>...</option>
                  </select>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputbranch" class="col-sm-2 col-form-label">Branch</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control form-add mb-2" placeholder="Select Branch..">
                  </div>
          </div>
          <div class="form-group row">
              <label for="inputdoctors" class="col-sm-2 col-form-label">Doctors Name</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control form-add mb-2" placeholder="">
                  </div>
          </div>
          <div class="form-row">
              <label for="inputdoctors" class="col-sm-2 col-form-label">Action</label>
                  <div class="col-sm-5">
                      <select id="inputuser" class="form-control form-add mb-2">
                      <option selected>Actions..</option>
                      <option>Checkup</option>
                      <option>Tooth Filling</option>
                      <option>Cleaning</option>
                      <option>...</option>
                  </select>
                  </div>
                  <div class="col-sm-5">
                      <input type="password" class="form-control form-add mb-2" placeholder="Price..">
                  </div>
          </div>
          <div class="form-row row">
            <div class="button" style="margin-left: auto;padding-right: 4px;">
                <button type="button" class="btn btn-add-act btn-sm">Add Action</button>
            </div>
          </div>
          <div class="form-row">
              <label for="inputdoctors" class="col-sm-2 col-form-label">Schedule</label>
                  <div class="col-sm-5">
                      <select id="inputuser" class="form-control form-add mb-2">
                      <option selected>Schedule..</option>
                      <option>Monday</option>
                      <option>Tuesday</option>
                      <option>Wednesday</option>
                      <option>Thrusday</option>
                      <option>Friday</option>
                      <option>Saturday</option>
                      <option>Sunday</option>
                  </select>
                  </div>
                  <div class="col-sm-5">
                      <input type="text" class="form-control form-add mb-2" placeholder="Time..">
                  </div>
            </div>
            <div class="form-row row">
              <div class="button" style="margin-left: auto;padding-right: 4px;">
                  <button type="button" class="btn btn-add-sch btn-sm">Add Schedule</button>
              </div>
          </div>
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