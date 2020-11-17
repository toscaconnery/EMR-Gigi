@include('admin_layout.head')
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
  <nav>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      <ul>
        <div class="nav-menu">
        <li><a href=""><i class="far fa-envelope"></i></a></li>
        <li><a href=""><i class="far fa-edit"></i></a></li>
        <li><a href=""><i class="fas fa-cog"></i></a></li>
        <li><a href=""><i class="fas fa-sign-out-alt"></i></a></li>
      </div>
    </ul>
  </nav>
<!-- navbar end -->

<!--Breadcrumb-->

  <ul class="breadcrumb">
    <h4 class="mr-auto">Branch</h4>
      <li><a class="active">Home</a></li>
      <li><a href="#">Branch</a></li>
      <a href="#" class="btn btn-dark btn-sm float-right"><i class="fas fa-plus-circle"></i>Add New</a>
  </ul>

<!-- Breadcrumb End -->

<!-- start branch list -->
  <div class="container col md-6">
    <div class="card ">
      <div class="card-header text-white mb-3" style="background-color: #ff9a76">
        List Data
      </div>
      <div class="form-group  col-md-3">
        <label for="inputname">Search</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <input type="text" class="form-control" placeholder="">
        </div>
      </div>
      <div class="card-body">
        <div class="button text-right">
          <button type="button" class="btn text-white" style="background-color: #ff9a76"><i class="fas fa-search"></i>Search</button>
        </div>
        <div class="Show">
          <p class="write-satu">Show</p>
          <div class="input-group">
            <div class="input-group-prepend">
              <select id="nominal" name="nominal">
                <option value="satu">10</option>
                <option value="dua">25</option>
                <option value="tiga">50</option>
              </select>
            </div>
          </div>
          <p class="write-dua ">entries</p>
        </div>
          
          <table id="tabel-data" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No<i class="fas fa-sort"></i></th>
                <th>Name <i class="fas fa-sort"></i></th>
                <th>Address <i class="fas fa-sort"></i></th>
                <th>Phone Number<i class="fas fa-sort"></i></th>
                <th>Latitude <i class="fas fa-sort"></i></th>
                <th>Longitude <i class="fas fa-sort"></i></th>
                <th>Radius <i class="fas fa-sort"></i></th>
                <th>Status <i class="fas fa-sort"></i></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Cabang Bandung</td>
                <td>Griya Pesantren Indah. Jalan Pesantren, cibabat, C</td>
                <td>081200001</td>
                <td>-6.878278029915829</td>
                <td>107.5579755353232</td>
                <td>100</td>
                <td>
                  <span class="badge badge-dark bg-success">Active</span>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Center</td>
                <td>Kaspea Bangunan, Jalan Raya Jati Asih, RT.007/RW.0</td>
                <td></td>
                <td>-6.2928153</td>
                <td>106.9604993</td>
                <td>100</td>
                <td>
                  <span class="badge badge-dark bg-success">Active</span>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Gudang</td>
                <td>Dualitas Coffee,Jalan Prof.DR Soepomo RT.5/RW.</td>
                <td>081220805453</td>
                <td>-6.2406953999999999</td>
                <td>106.8452503</td>
                <td>3000</td>
                <td>
                  <span class="badge badge-dark bg-success">Active</span>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Gudang</td>
                <td>Indomaret Bendungan Hilir Raya 78, Jalan Bendungan</td>
                <td></td>
                <td>-6.212236</td>
                <td>106.8124042</td>
                <td>3000</td>
                <td>
                  <span class="badge badge-dark bg-success">Active</span>
                </td>
              </tr>
            </tbody>
          </table>
      </div> 
    </div>
  </div>
<!-- branch list end -->
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