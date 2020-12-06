@include('admin_layout.head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
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
        <span class="navbar-brand mb-0 h1">Roles</span>
    </nav>
<!--Breadcrumb-->
    <div class="bread mr-auto">
        <ul class="breadcrumb-role ">
            <li><a class="active">Settings</a></li>
            <li><a href="#">Roles</a></li>
            <li><a href="#">Add Role</a></li>
        </ul>
    </div>
<!-- Breadcrumb End -->
<!-- navbar end -->

    <div class="container fluid">
        <div class="card col-md-12">
            <div class="card-body mt-2 mb-2">
                <div class="form-group row has-feedback">
                    <label for="inputUname" class="col-sm col-form-label">Role Name</label>
                    <div class="input-group inputrole col-sm-10">
                        <div class="input-group-prepend">
                        <button class="btn inputrole btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                        </div>
                        <input type="Username" class="form-control" id="inputrole" placeholder="Search..">
                    </div>
                </div>
                <table id="tabel-add-roles" class="table table-bordered">
                    <thead class="thead-custom">
                        <tr>
                            <th width="300px">Menu</th>
                            <th width="200px">View</th>
                            <th width="200px">Add</th>
                            <th width="200px">Edit</th>
                            <th width="200px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr height="30px">
                            <td>Branch</td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                        </tr>
                        <tr height="30px">
                            <td>Company</td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                        </tr>
                        <tr height="30px">
                            <td>Master</td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                        </tr>
                        <tr height="30px">
                            <td>Settings</td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                        </tr>
                        <tr height="30px">
                            <td>Report</td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                            <td class="vcenter"><input type="checkbox" value="1"/></td>
                        </tr>
                        <tr height="30px">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr height="30px">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="button float-right">
                    <button type="button" class="btn btn-roles-save btn-sm">Save</button>
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