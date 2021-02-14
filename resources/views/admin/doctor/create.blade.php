<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">

        @include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Doctor Form</h4>
                <li><a class="active">Doctor</a></li>
                <li><a href="#">Add</a></li>
            </ul>

            <div class="container-fluid">
                <div class="card col-md-12">
                    <div class="card-body mt-3 mb-2">
                        <div class="form-group row">
                            <label for="clinic" class="col-sm-2 col-form-label">Clinic</label>
                            <div class="col-sm-10">
                                <input type="text" id="clinic" class="form-control form-add mb-2" value="" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="branch" class="col-sm-2 col-form-label">Branch</label>
                            <div class="col-sm-10">
                                <select id="branch" class="form-control form-add mb-2">
                                    <option selected disabled>Please select a branch</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="doctor_name" class="col-sm-2 col-form-label">Doctor Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="doctor_name" class="form-control form-add mb-2" placeholder="Please input doctor name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputdoctors" class="col-sm-2 col-form-label">Action</label>
                            <div class="col-sm-10 row">
                                <span class="form-add mb-2 ml-3" style="color: gray" id="action_placeholder">
                                    <i>Please select a branch.</i>
                                </span>
                                <span id="action_placer"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" class="form-control form-add mb-2" placeholder="Please input the doctor email address, it will be used for login credential" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="phone" id="phone" class="form-control form-add mb-2" placeholder="Please input the doctor phone number" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select id="gender" class="form-control form-add mb-2">
                                    <option selected disabled>Select gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="password" class="form-control form-add mb-2" placeholder="Please input doctor password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-2 col-form-label">Password Confirmation</label>
                            <div class="col-sm-10">
                                <input type="password" id="confirm_password" class="form-control form-add mb-2" placeholder="Please input doctor password confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        
                        {{-- <div class="form-row">
                            <label for="inputdoctors" class="col-sm-2 col-form-label">Schedule</label>
                            <div class="col-sm-5">
                                <select id="inputuser" class="form-control form-add mb-2">
                                    <option selected>Schedule..</option>
                                    <option>Monday</option>
                                    <option>Tuesday</option>
                                    <option>Wednesday</option>
                                    <option>Thrusday</option>
                                    <option>Friday</option>
                                    <option>Saturday</option>
                                    <option>Sunday</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-add mb-2" placeholder="Time..">
                            </div>
                        </div> --}}
                        <div class="form-row row">
                            <div class="button" style="margin-left: auto;padding-right: 4px;">
                                <button type="button" class="btn btn-add-sch btn-sm" id="save_doctor">Add Doctor</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>

    @include('admin_layout.sidenav-script')
    @include('admin_layout.footscript')

    <script>
        $(document).ready(function(){
            let hasError = false
            let errorMessage = ''
            function pushErrMsg(newError) {
                errorMessage += '<li>' + newError + '</li>'
                hasError = true
            }
            $('#save_doctor').on('click', async function() {
                console.log('submitting')

                let branch = $('#branch').val();
                if (branch === null) {
                    pushErrMsg('Branch is required')
                }

                let doctorName = $('#doctor_name').val();
                if (doctorName === '') {
                    pushErrMsg('Doctor name is required')
                }

                let actions = $('input[name^="action"]:checkbox:checked')
                // console.log('ACTIONS : ')
                // console.log(actions)
                let selectedActions = [];
                if (actions.length === 0) {
                    pushErrMsg('Action list is required')
                } else {
                    actions.each(act => {
                        selectedActions.push($(actions[act]).val())
                    })
                }

                let email = $('#email').val()
                if (email === '') {
                    pushErrMsg('Email is required')
                }

                let phone = $('#phone').val()
                if (phone === '') {
                    pushErrMsg('Phone is required')
                }

                let gender = $('#gender').val()
                if (gender === null) {
                    pushErrMsg('Gender has to be selected')
                }

                let password = $('#password').val()
                let confirmPassword = $('#confirm_password').val()
                if (password === '') {
                    pushErrMsg('Password is required')
                }
                if (confirmPassword === '') {
                    pushErrMsg('Password confirmation is required')
                }
                if (password !== confirmPassword) {
                    pushErrMsg('Password doesn\'t match')
                }

                
                if (hasError) {
                    toastr.warning(errorMessage)
                    errorMessage = ''
                    hasError = false
                } else {
                    let doctorData = {
                        branch,
                        doctorName,
                        selectedActions,
                        email,
                        phone,
                        gender,
                        password,
                        confirmPassword
                    }
    
                    var base_url = window.location.origin

                    const userToken = $('#user_token').val();

                    const createURL = `${base_url}/api/doctor/register-doctor`;
                    const res = axios.post(createURL, doctorData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        console.log(response);
                        let responseData = response.data.data;
                        if (responseData.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Doctor created.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.href = `${base_url}/admin/doctor/list`;
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to create doctor.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }
            });

            // Setting form options
            function setBranchOptions()
            {
                var base_url = window.location.origin;
                const userToken = $('#user_token').val();
                const fetchURL = `${base_url}/api/admin/get-available-branch-option`;

                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                }).then(function (response) {
                    let responseData = response.data.data;

                    var branchSelect = document.getElementById("branch");
                    responseData.branchs.forEach(e => {
                        var newBranchOption = document.createElement('option');
                        newBranchOption.text = e.name;
                        newBranchOption.value = e.id;
                        branchSelect.add(newBranchOption);
                    })
                })
            }
            setBranchOptions();

            function setClinicValue()
            {
                var base_url = window.location.origin;
                const userToken = $('#user_token').val();
                const fetchURL = `${base_url}/api/admin/get-current-clinic`;

                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                }).then(function (response) {
                    let responseData = response.data.data;
                    var clinic = $('#clinic').val(responseData.hospital.name)
                })
            }
            setClinicValue();

            function setActionOptions()
            {
                $('.action-list-content').remove();
                $('#action_placeholder').remove();

                var selectedBranch = $('#branch').val();
                var base_url = window.location.origin;
                const userToken = $('#user_token').val();
                const fetchURL = `${base_url}/api/admin/get-available-action-option`;

                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'branch_id': selectedBranch
                    }
                }).then(function (response) {
                    let responseData = response.data.data;
                    console.log(responseData)
                    responseData.actions.forEach(e => {
                        $('#action_placer').before(`
                            <div class="col-sm-2 action-list-content">
                                <input type="checkbox" id="action_option_${e.id}" name="action[${e.id}]" value="${e.id}" data-action_id=${e.id}}>
                                <label for="action_option_${e.id}">${e.name}</label><br>
                            </div>
                        `);
                    })
                })
            }

            $('#branch').change(function() {
                setActionOptions();
            });

        });
    </script>

</html>