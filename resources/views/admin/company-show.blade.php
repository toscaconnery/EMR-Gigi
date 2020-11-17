@include('admin_layout.head')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
	
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
		<h4 class="mr-auto">Company</h4>
		  <li><a class="active">Home</a></li>
		  <li><a href="#">Company</a></li>
		  <a href="#" class="btn btn-dark btn-sm float-right"><i class="fas fa-plus-circle"></i>Add New</a>
	</ul>

<!-- Breadcrumb End -->



	<div class="container col md-6">
		<div class="card ">
			<div class="card-header text-white mb-3">
				List Data
			</div>
			<div class="card-body">
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
					<p class="write-dua	">entries</p>
				</div>
					
					<table id="tabel-data" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No<i class="fas fa-sort"></i></th>
								<th>Name <i class="fas fa-sort"></i></th>
								<th>Username <i class="fas fa-sort"></i></th>
								<th>Email<i class="fas fa-sort"></i></th>
								<th>Role <i class="fas fa-sort"></i></th>
								<th>Status <i class="fas fa-sort"></i></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Alpa</td>
								<td>Alpa</td>
								<td>Alpa@gmail.co.id</td>
								<td>Company</td>
								<td>
									<span class="badge badge-dark" style="background-color: #09C6A0">Active</span>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Company</td>
								<td>company</td>
								<td>company@gmail.co.id</td>
								<td>Company</td>
								<td>
									<span class="badge badge-dark" style="background-color: #09C6A0">Active</span>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>GIW</td>
								<td>giw</td>
								<td>mail@grahasataindowijaya.com</td>
								<td>Company</td>
								<td>
									<span class="badge badge-dark" style="background-color: #09C6A0">Active</span>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Super Admin</td>
								<td>super_admin</td>
								<td>super_admin@gmail.co.id</td>
								<td>Super Admin</td>
								<td>
									<span class="badge badge-dark" style="background-color: #09C6A0">Active</span>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="pagination justify-content-between">
					<p>Showing 1 to 4 of 4 entries</p>
						<ul class="pagination pagination-sm" >
							<li class="page-item"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item ">
								<a class="page-link active" href="#">1</a></li>
		      				<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
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
