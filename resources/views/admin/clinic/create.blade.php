<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        {{-- { S{d d(JWTAuth::user())}} --}}
        <!-- sidenav start -->
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" id="close_sidenav_btn">&times;</a>
                <div class="profile">
                    <center>
                        <img src="{{getasset('image/logo-square.png')}}" class="profile-img" alt="image"><hr class="bg-light">
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
            <h4 class="mr-auto">Clinic Form</h4>
                <li><a class="active">Clinic</a></li>
                <li><a href="#">Create</a></li>
                <a href="#" class="btn btn-dark btn-sm float-right"><i class="fas fa-plus-circle"></i>Add New</a>
        </ul>
        <!-- Breadcrumb End -->

        <div class="Container-fluid container col md-6">
            <div class="row">
                <div class="Container col-4">
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
                        <div class="card-header text-white mb-1">
                        <?php
                            $trydd = JWTAuth::user();
                            print_r($trydd);
                        ?>
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
                                        <input type="email" class="form-control" id="clinic_email" name="clinic_email" placeholder="Email address" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="clinic_phone_number">Clinic Phone<span>*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary" type="button" disabled>
                                                    +62
                                                </button>
                                            </div>
                                            <input type="tel" class="form-control" id="clinic_phone_number" placeholder="812341234" name="clinic_phone_number" autocomplete="off">
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

                    <div class="card mt-4">
                        <div class="card-header text-white mb-1">
                            Input clinic admin data
                        </div>
                        <div class="card-header text-white mb-1">
                            <?php
                                $token = JWTAuth::getToken();
                                dd($token);
                            ?>
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
                                            <input type="tel" class="form-control" id="admin_phone_number" placeholder="812341234" name="admin_phone_number" autocomplete="off">
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

                                    <div class="btn-group-edit btn-group-sm	ml-auto mr-2">
                                        <button type="button" class="btn btn-custom" data-toggle="dropdown" id="submit_button">
                                            <i class="far fa-save"></i>Submit
                                        </button>
                                    </div>
                                    <div class="btn-group-edit btn-group-sm">
                                        <button type="button" class="btn btn-danger" id="cancel_button">
                                            <i class="fas fa-times"></i>Cancel
                                        </button>
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
    @include('admin_layout.footscript')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#cancel_button').on('click', function() {
                alert('cancel button clicked');
            })
            
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                startDate: '-3d'
            });

            $('#submit_button').on('click', async function() {
                console.log('SENDING AXIOS POST REQUEST')
                let clinicData = {
                    'clinicName': 'Rumah Sakit Ibu dan Anak',
                    'clinicEmail': 'rumahsakit@gmail.com'
                }
                var base_url = window.location.origin
                console.log(base_url)
                // const axios = require('axios');
                const res = await axios.post(`${base_url}/api/admin/clinic/store`, clinicData);
                // const addedTodo = res.data;
                console.log('>>> HASIL')
                console.log(res);
            })
        });
    </script>

</html>