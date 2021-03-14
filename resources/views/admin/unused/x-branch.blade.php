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
	  		<img src="image/logo-square.png" class="profile-img" alt="image"><hr class="bg-light">
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

<!-- add branch  -->
	<div class="Container-fluid">
		<div class="row">
			<div class="Container col-4">
				<div class="card"">
					<div class="card-header text-white mb-1">
						Add Data
					</div>
					<div class="card-body">
						<div class="container col-md-12">
							<div class="form-row">
					    		<div class="form-group  col-md-12">
						    		<label for="inputname">Name<span>*</span></label>
						      		<input type="text" class="form-control" placeholder="">
							    </div>
							    <div class="form-group  col-md-12">
							    	<label for="inputphone">Phone Number</label>
							     	<input type="tel" class="form-control" id="inputnumber" placeholder="">
							    </div>
							</div>
							<div class="btn-group-edit btn-group-sm">
								<button type="button" class="btn btn-danger">
									<i class="fas fa-times"></i>Cancel
								</button>
								<div class="btn-group-edit btn-group-sm">
									<button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown">
										<i class="far fa-save"></i>Save
									</button>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
	<!-- add branch end -->

	<!-- Location branch -->
			<form class="container col responsive">
				<div class="card">
					<div class="card-header text-white mb-1">
						Location
					</div>
					<div class="card-body">
						<div class="container col-md-12">
							<div class="form-row" method:"POST">
								<div class="form-group col-md-12">
							    	<label for="inputAddress">Address<span>*</span></label>
							    	<input type="text" class="form-control" name="address" placeholder="Enter a Location">
							  	</div>
							  	<div class="form-group col-md-4">
						    		<label for="inputname">Latitude<span>*</span></label>
						      		<input type="text" class="form-control" name="latitude" readonly placeholder="Automatic">
							    </div>
							    <div class="form-group col-md-4">
							    	<label for="inputEmail">Longitude<span>*</span></label>
							      	<input type="text" class="form-control" name="longitude" readonly placeholder="Automatic">
							    </div>
							    <div class="form-group col-md-4">
						    		<label for="inputname">Radius (Meters)<span>*</span></label>
						     		<div class="input-group mb-3">
									  <input type="Number" name="radius" class="form-control" value="1" min="0">
									</div>
							    </div>
							    <div class="form-group col-md-12">
							    	<div class="card card-box"></div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</form>
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

