<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">

		@include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Clinic Form</h4>
                <li><a class="active">Clinic</a></li>
                <li><a href="#">Create</a></li>
            </ul>

            <div class="container-fluid container col md-6">
                <div class="row">
                    <div class="container col-4">
                        <div class="card">
                            <div class="card-header mb-1">
                                Clinic Logo
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="ava">
                                        <img src="{{getasset('image/logo-square.png')}}" class="mx-auto d-block"  style="width: 150px; height: 150px; border-radius: 50%; margin-right: 25px; margin-bottom: 10px;">
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

                    <form class="container col responsive" id="create_clinic">
                        <div class="card">
                            <div class="card-header text-white mb-1">
                                Input clinic data
                            </div>
        
                            <div class="card-body">
                                <div class="container col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="clinic_name">Clinic Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Name" autocomplete="off" id="clinic_name" name="clinic_name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="clinic_email">Clinic Email<span>*</span></label>
                                            <input type="email" class="form-control" id="clinic_email" name="clinic_email" placeholder="Email address" autocomplete="new-password">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="clinic_phone_number">Clinic Phone<span>*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary" type="button" disabled>
                                                        +62
                                                    </button>
                                                </div>
                                                <input type="tel" class="form-control" id="clinic_phone_number" placeholder="812341xxx" name="clinic_phone_number" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6" >
                                            <label for="clinic_join_date">Join Date<span>*</span></label>
                                            <input type="text" class="form-control datepicker" placeholder="Start joining platform since date..." id="clinic_join_date" name="clinic_join_date" autocomplete="off" data-provide="datepicker">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="clinic_address">Clinic Address</label>
                                            <input type="text" class="form-control" id="clinic_address" placeholder="Address" name="clinic_address" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="clinic_start_work_date">Start Work Date<span>*</span></label>
                                            <input type="text" class="form-control datepicker" placeholder="Start work date" id="clinic_start_work_date" name="clinic_start_work_date" data-provide="datepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4 mb-4">
                            <div class="card-header text-white mb-1">
                                Input clinic administrator data
                            </div>

                            <div class="card-body mt-3">
                                <div class="container col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="admin_name">Admin Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Full name" autocomplete="off" id="admin_name" name="admin_name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="admin_email">Admin Email<span>*</span></label>
                                            <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="Email address" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="admin_phone_number">Admin Phone<span>*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary" type="button" disabled>
                                                        +62
                                                    </button>
                                                </div>
                                                <input type="tel" class="form-control" id="admin_phone_number" placeholder="812341xxx" name="admin_phone_number" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6"></div>

                                        <div class="form-group col-md-6">
                                            <label for="admin_password">Password<span>*</span></label>
                                            <input type="password" class="form-control" placeholder="Admin password" id="admin_password" name="admin_password" autocomplete="off">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="admin_password_confirm">Confirm Password<span>*</span></label>
                                            <input type="password" class="form-control" placeholder="Confirm admin password" id="admin_password_confirm" name="admin_password_confirm" autocomplete="off">
                                        </div>

                                        <input type="hidden" id="user_token" value="{{$jwtToken}}">

                                        <div class="btn-group-edit btn-group-sm ml-auto mr-2">
                                            <button type="button" class="btn btn-danger" id="cancel_button">
                                                <i class="fas fa-times"></i>Cancel
                                            </button>
                                        </div>

                                        <div class="btn-group-edit btn-group-sm">
                                            <button type="button" class="btn btn-custom" data-toggle="dropdown" id="submit_button">
                                                <i class="far fa-save"></i>Submit
                                            </button>
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

    @include('admin_layout.sidenav-script')
    @include('admin_layout.footscript')

    <script>
        $(document).ready(function(){
            $('#cancel_button').on('click', function() {
                alert('cancel button clicked');
            })
            
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                // startDate: '-3d'
            });

            $('#submit_button').on('click', async function() {
                console.log('SENDING AXIOS POST REQUEST')

                let hasError = false;
                let errorMessage = '';

                let clinicName = $('#clinic_name').val();
                if (clinicName == '') {
                    hasError = true;
                    errorMessage += '<li>Clinic name is required</li>';
                }

                let clinicEmail = $('#clinic_email').val();
                if (clinicEmail == '') {
                    hasError = true;
                    errorMessage += '<li>Clinic email is required</li>';
                }

                let clinicPhone = $('#clinic_phone_number').val();
                if (clinicPhone == '') {
                    hasError = true;
                    errorMessage += '<li>Clinic phone is required</li>';
                }

                let clinicJoinDate = $('#clinic_join_date').val();
                if (clinicJoinDate == '') {
                    hasError = true;
                    errorMessage += '<li>Clinic join date is required</li>';
                }

                let clinicAddress = $('#clinic_address').val();
                if (clinicAddress == '') {
                    hasError = true;
                    errorMessage += '<li>Clinic address is required</li>';
                }

                let clinicStartWorkDate = $('#clinic_start_work_date').val();
                if (clinicStartWorkDate == '') {
                    hasError = true;
                    errorMessage += '<li>Clinic start work date is required</li>';
                }

                let adminName = $('#admin_name').val();
                if (adminName == '') {
                    hasError = true;
                    errorMessage += '<li>Admin name is required</li>';
                }

                let adminEmail = $('#admin_email').val();
                if (adminEmail == '') {
                    hasError = true;
                    errorMessage += '<li>Admin email is required</li>';
                }

                let adminPhone = $('#admin_phone_number').val();
                if (adminPhone == '') {
                    hasError = true;
                    errorMessage += '<li>Admin phone is required</li>';
                }

                // Admin password
                let adminPassword = $('#admin_password').val();
                console.log(adminPassword)
                let adminConfirmPassword = $('#admin_password_confirm').val();

                if (adminPassword == '' && adminConfirmPassword != '') {
                    hasError = true;
                    errorMessage += '<li>Admin password is required</li>';
                } else if (adminPassword != '' && adminConfirmPassword == '') {
                    hasError = true;
                    errorMessage += '<li>Admin password confirmation is required</li>';
                } else if (adminPassword.length < 8) {
                    hasError = true;
                    errorMessage += '<li>Admin password minimum length is 8</li>';
                } else if (adminPassword != adminConfirmPassword) {
                    hasError = true;
                    errorMessage += '<li>Admin password and password confirmation does not match</li>';
                }

                if (hasError) {
                    toastr.warning(errorMessage)
                } else {
                    let clinicData = {
                        clinicName,
                        clinicEmail,
                        clinicPhone,
                        clinicJoinDate,
                        clinicAddress,
                        clinicStartWorkDate,
                        adminName,
                        adminEmail,
                        adminPhone,
                        adminPassword,
                        adminConfirmPassword
                    }

                    var base_url = window.location.origin

                    const userToken = $('#user_token').val();

                    const createURL = `${base_url}/api/admin/clinic/store`;
                    const res = axios.post(createURL, clinicData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        console.log(response);
                        let responseData = response.data.data;
                        if (responseData.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Clinic created.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.history.back();
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to create clinic.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }

                // let clinicData = {
                //     'clinicName': 'Rumah Sakit Ibu dan Anak',
                //     'clinicEmail': 'rumahsakit@gmail.com'
                // }
                // var base_url = window.location.origin
                // console.log(base_url)
                // const axios = require('axios');
                // const res = await axios.post(`${base_url}/api/admin/clinic/store`, clinicData);
                // const addedTodo = res.data;
                // console.log('>>> HASIL')
                // console.log(res);
                // const userToken = $('#user_token').val();
                // console.log('USER TOKEN')
                // console.log(userToken)
                // const createURL = `${base_url}/api/admin/clinic/store`;
                // const res = axios.post(createURL, clinicData, {
                //     headers: {
                //         'Authorization': `Bearer ${userToken}`
                //     },
                // })
            });

            // function getJWTToken() {
            //     console.log('GETTING JWT TOKEN')
            //     axios.get('/api/jwt/get-current-token')
            //         .then((response)=>{
            //             console.log(response)
            //             this.users = response.data.users
            //         })
            // }
        });
    </script>

</html>