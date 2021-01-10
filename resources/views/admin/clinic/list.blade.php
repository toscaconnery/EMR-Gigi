<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
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
						<table id="tabel-data" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Address</th>
									<th>Phone Number</th>
									<th>Email</th>
									<th>Join Date</th>
									<th>Start Date</th>
								</tr>
							</thead>
							<tbody>
                                <tr id="hospital_placer"></tr>
							</tbody>
						</table>
						<div class="show">
							<p class="page-conf-left">Show</p>
							<div class="input-group page-conf-val">
								<div class="input-group-prepend">
									<select id="nominal" name="nominal">
										<option value="10">10</option>
										<option value="25">25</option>
										<option value="50">50</option>
										<option value="100">100</option>
									</select>
								</div>
							</div>
							<p>entries</p>
						</div>
					</div> 
				</div>
			</div>
			<!-- branch list end -->
        </div>
        <div class="lds-roller" id="loading_circle" style="display: none"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>

    </body>
    
    @include('admin_layout.sidenav-script')
    @include('admin_layout.footscript')

    <script>
        $(document).ready(function(){
            function fetchClinicList() {
                var base_url = window.location.origin;
                const userToken = $('#user_token').val();

                if (userToken != '') {
                    const fetchURL = `${base_url}/api/admin/clinic/list`;
                    const res = axios.get(fetchURL, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                        params: {
                            'limit': 10,
                            'page': 1
                        }
                    }).then(function (response) {
                        let responseData = response.data.data;
                        if (responseData.status == 'success') {
                            // Swal.fire({
                            //     icon: 'success',
                            //     title: 'Clinic fetched.',
                            //     showConfirmButton: false,
                            //     timer: 1500
                            // });
                            showLoadingCircle();
                            showData(responseData.hospital);
                        } else {
                            hideLoadingCircle();
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to fetch clinic.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                } else {
                    hideLoadingCircle();
                    Swal.fire({
                        icon: 'warning',
                        title: 'You are not logged in',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }

            }

            function showData(hospitalList) {
                let i = 1;
                hospitalList.forEach(function(item) {
                    console.log('++++++++++')
                    console.log(item)
                    $('#hospital_placer').before(`
                        <tr>
                            <td>${i++}</td>
                            <td>${item.name}</td>
                            <td>${item.address}</td>
                            <td>${item.phone}</td>
                            <td>${item.email}</td>
                            <td>${item.join_date}</td>
                            <td>${item.start_work_date}</td>
                        </tr>
                    `)
                });
                hideLoadingCircle();
            }

            function showLoadingCircle() {
                $('#loading_circle').show();
            }

            function hideLoadingCircle() {
                $('#loading_circle').hide();
            }

            fetchClinicList()

            // $('#submit_button').on('click', async function() {
            //     console.log('SENDING AXIOS POST REQUEST')

            //     let hasError = false;
            //     let errorMessage = '';

            //     let clinicName = $('#clinic_name').val();
            //     if (clinicName == '') {
            //         hasError = true;
            //         errorMessage += '<li>Clinic name is required</li>';
            //     }

            //     let clinicEmail = $('#clinic_email').val();
            //     if (clinicEmail == '') {
            //         hasError = true;
            //         errorMessage += '<li>Clinic email is required</li>';
            //     }

            //     let clinicPhone = $('#clinic_phone_number').val();
            //     if (clinicPhone == '') {
            //         hasError = true;
            //         errorMessage += '<li>Clinic phone is required</li>';
            //     }

            //     let clinicJoinDate = $('#clinic_join_date').val();
            //     if (clinicJoinDate == '') {
            //         hasError = true;
            //         errorMessage += '<li>Clinic join date is required</li>';
            //     }

            //     let clinicAddress = $('#clinic_address').val();
            //     if (clinicAddress == '') {
            //         hasError = true;
            //         errorMessage += '<li>Clinic address is required</li>';
            //     }

            //     let clinicStartWorkDate = $('#clinic_start_work_date').val();
            //     if (clinicStartWorkDate == '') {
            //         hasError = true;
            //         errorMessage += '<li>Clinic start work date is required</li>';
            //     }

            //     let adminName = $('#admin_name').val();
            //     if (adminName == '') {
            //         hasError = true;
            //         errorMessage += '<li>Admin name is required</li>';
            //     }

            //     let adminEmail = $('#admin_email').val();
            //     if (adminEmail == '') {
            //         hasError = true;
            //         errorMessage += '<li>Admin email is required</li>';
            //     }

            //     let adminPhone = $('#admin_phone_number').val();
            //     if (adminPhone == '') {
            //         hasError = true;
            //         errorMessage += '<li>Admin phone is required</li>';
            //     }

            //     // Admin password
            //     let adminPassword = $('#admin_password').val();
            //     console.log(adminPassword)
            //     let adminConfirmPassword = $('#admin_password_confirm').val();

            //     if (adminPassword == '' && adminConfirmPassword != '') {
            //         hasError = true;
            //         errorMessage += '<li>Admin password is required</li>';
            //     } else if (adminPassword != '' && adminConfirmPassword == '') {
            //         hasError = true;
            //         errorMessage += '<li>Admin password confirmation is required</li>';
            //     } else if (adminPassword.length < 8) {
            //         hasError = true;
            //         errorMessage += '<li>Admin password minimum length is 8</li>';
            //     } else if (adminPassword != adminConfirmPassword) {
            //         hasError = true;
            //         errorMessage += '<li>Admin password and password confirmation does not match</li>';
            //     }

            //     if (hasError) {
            //         toastr.warning(errorMessage)
            //     } else {
            //         let clinicData = {
            //             clinicName,
            //             clinicEmail,
            //             clinicPhone,
            //             clinicJoinDate,
            //             clinicAddress,
            //             clinicStartWorkDate,
            //             adminName,
            //             adminEmail,
            //             adminPhone,
            //             adminPassword,
            //             adminConfirmPassword
            //         }

            //         var base_url = window.location.origin

            //         const userToken = $('#user_token').val();

            //         const createURL = `${base_url}/api/admin/clinic/store`;
            //         const res = axios.post(createURL, clinicData, {
            //             headers: {
            //                 'Authorization': `Bearer ${userToken}`
            //             },
            //         }).then(function (response) {
            //             console.log(response);
            //             let responseData = response.data.data;
            //             if (responseData.status == 'success') {
            //                 Swal.fire({
            //                     icon: 'success',
            //                     title: 'Clinic created.',
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 });
            //             } else {
            //                 Swal.fire({
            //                     icon: 'warning',
            //                     title: 'Failed to create clinic.',
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 });
            //             }
            //         })
            //     }



            });
    </script>

</html>