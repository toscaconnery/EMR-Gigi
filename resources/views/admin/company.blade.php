<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <!-- sidenav start -->
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" id="close_sidenav_btn">&times;</a>
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
                <span style="font-size:30px;cursor:pointer" id="open_sidenav_btn">&#9776;</span>
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

        <div class="Container-fluid container col md-6">
            <div class="row">
                <div class="Container col-4">
                    <div class="card">
                        <div class="card-header mb-1">
                            Logo Company
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="ava">
                                    <img src="image/profile.png" class="mx-auto d-block"  style="width: 150px; height: 150px; border-radius: 50%; margin-right: 25px; margin-bottom: 10px;">
                                </div>
                                <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                       <span class="input-group-text mb-3">Upload</span>
                                     </div>
                                     <div class="custom-file">
                                       <input type="file" class="custom-file-input" id="inputGroupFile01">
                                       <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <form class="container col responsive">
                    <div class="card">
                        <div class="card-header text-white mb-1">
                            Edit Data
                        </div>
                        <div class="card-body">
                            <div class="container col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputname">Name<span>*</span></label>
                                        <input type="text" class="form-control" placeholder="GIW">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Email<span>*</span></label>
                                        <input type="email" class="form-control" id="inputEmail4" placeholder="mail@grahasataindowijaya.com">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputphone">Phone Number<span>*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <select id="phone" name="phone">
                                                <option value="indo">+62</option>
                                                <option value="spore">+65</option>
                                                <option value="malay">+60</option>
                                            </select>
                                            </div>
                                            <input type="Telp" class="form-control" id="inputnumber" placeholder="081220805453">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Start Join Date<span>*</span></label>
                                        <input type="text" class="form-control" placeholder="2020-03-11">
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Kaspea Bangunan, Jalan Raya Jati Asih, Jatirasa, Bekasi City, West Java, Indonesia">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputname">Start Work Date<span>*</span></label>
                                        <input type="text" class="form-control" placeholder="2020-03-11">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Username</label>
                                        <input type="email" class="form-control" id="inputEmail4" placeholder="giw">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputname">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password"  id="password" name="password" class="form-control">
                                            <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <i class="far fa-eye"></i>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Role">Role<span>*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="btn-group-edit btn-group-sm	ml-auto">
                                    <button type="button" class="btn btn-danger">
                                        <i class="fas fa-times"></i>Cancel</button>
                                        <div class="btn-group-edit btn-group-sm">
                                        <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown"><i class="far fa-save"></i>Save</button>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>

    @include('admin_layout.sidenav-script')
    {{-- <script>
        $(document).ready(function(){
			function openNav() {
				document.getElementById("mySidenav").style.width = "250px";
				document.getElementById("main").style.marginLeft = "250px";
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
				document.getElementById("main").style.marginLeft= "0";
			}

			$('#close_sidenav_btn').on('click', function() {
				closeNav();
			});

			$('#open_sidenav_btn').on('click', function() {
				openNav();
			});
	
			
	
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
		});
    </script> --}}

</html>