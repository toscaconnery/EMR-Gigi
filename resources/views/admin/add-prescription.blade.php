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
            <a href="#">Medical Prescription</a>
          </div>
      </div>
</div>
<!-- sidenav end -->
<div id="main">
<!-- navbar start -->
  <nav class="navbar navbar-light bg-light">
    <span style="color:black;font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;</span>
    <span class="navbar-brand mb-0 h1">Prescription</span>
  </nav>
  <!--Breadcrumb-->
    <div class="bread mr-auto">
      <ul class="breadcrumb-role ">
          <li><a class="active">Settings</a></li>
          <li><a href="#">Prescription</a></li>
          <li><a href="#">Add Prescription</a></li>
      </ul>
    </div>
  <!-- Breadcrumb End -->
  <!-- navbar end -->
  <div class="container fluid">
  <div class="card col-md-12">
    <div class="card-body mt-3 mb-5">
        <div class="form-group row">
          <label for="inputUname" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
              <input type="Text" class="form-control form-add mb-2" id="inputuname" placeholder="Name..">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputUname" class="col-sm-2 col-form-label">Stock</label>
          <div class="col-sm-10">
              <input type="Text" class="form-control form-add mb-2" id="inputuname" placeholder="Stock..">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputUname" class="col-sm-2 col-form-label">Price</label>
          <div class="col-sm-10">
              <input type="Text" class="form-control form-add mb-2" id="inputuname" placeholder="Price..">
          </div>
        </div>
        <div class="form-group row">
            <label for="inputklinik" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
                <select id="inputuser" class="form-control form-add mb-2">
                    <option selected>Type..</option>
                    <option>Pills</option>
                    <option>Capsules</option>
                    <option>...</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <label for="inputdoctors" class="col-sm-2 col-form-label">How to consume</label>
                <div class="col-sm-5">
                    <select id="inputuser" class="form-control form-add mb-2">
                      <option selected>How..</option>
                      <option>Drink</option>
                      <option>Swallow</option>
                      <option>...</option>
                    </select>
                </div>
                <div class="col-sm-5">
                    <select id="inputuser" class="form-control form-add mb-2">
                      <option selected>When..</option>
                      <option>Before eat</option>
                      <option>Before sleep</option>
                      <option>...</option>
                    </select>
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