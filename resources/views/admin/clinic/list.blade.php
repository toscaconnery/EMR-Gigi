<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>

		<!-- sidenav start -->
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" id="close_sidenav_btn">&times;</a>
			<div class="profile">
				<center>
					<img src="{{getasset('image/logo-square.png')}}" class="profile-img" alt="image"><hr class="bg-light">
				</center>
			</div>
			<div class="main-menu">
				<a href="#">Clinic</a>
				<a href="#">List</a>
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
				<h4 class="mr-auto">Clinic</h4>
				<li><a class="active">Clinic</a></li>
				<li><a href="#">List</a></li>
				{{-- <a href="#" class="btn btn-dark btn-sm float-right"><i class="fas fa-plus-circle"></i>Add New</a> --}}
			</ul>

			<!-- Breadcrumb End -->

			<!-- start branch list -->
			<div class="container col md-6">
				<div class="card ">
					<div class="card-header text-white mb-3" style="background-color: #ff9a76">
						List Data
					</div>
					<div class="form-group col-md-3 mb-0">
						{{-- <label for="inputname">Search</label> --}}
						<div class="input-group">
							<div class="input-group-prepend">
								<button class="btn btn-outline-secondary" disabled type="button">
									<i class="fas fa-search"></i>
								</button>
							</div>
							<input type="text" class="form-control" placeholder="Search clinic">
						</div>
					</div>
					<div class="card-body">
						{{-- <div class="button text-right">
							<button type="button" class="btn text-white" style="background-color: #ff9a76"><i class="fas fa-search"></i>Search</button>
						</div> --}}
						{{-- <div class="Show">
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
						</div> --}}

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
						<div class="show">
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
					</div> 
				</div>
			</div>
			<!-- branch list end -->
		</div>

    </body>
    
    @include('admin_layout.sidenav-script')
    @include('admin_layout.footscript')

    <script>
        
    </script>

</html>