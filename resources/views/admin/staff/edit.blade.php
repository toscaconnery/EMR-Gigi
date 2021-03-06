<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$staffId}}" id="staff_id">

        @include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Staff Form</h4>
                <li><a class="active">Staff</a></li>
                <li><a href="#">Edit</a></li>
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
                                <select id="branch" class="form-control form-add mb-2" disabled>
                                    <option selected disabled></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staff_name" class="col-sm-2 col-form-label">Staff Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="staff_name" class="form-control form-add mb-2" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" class="form-control form-add mb-2" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="phone" id="phone" class="form-control form-add mb-2" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select id="gender" class="form-control form-add mb-2">
                                    <option selected disabled></option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="password" class="form-control form-add mb-2" placeholder="Left this blank if you dont want to change the password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-2 col-form-label">Password Confirmation</label>
                            <div class="col-sm-10">
                                <input type="password" id="confirm_password" class="form-control form-add mb-2" placeholder="Left this blank if you dont want to change the password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="button" style="margin-left: auto;padding-right: 4px;">
                                <button type="button" class="btn btn-add-sch btn-sm" id="save_staff">Save Data</button>
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
            
            $('#save_staff').on('click', async function() {
                // let branch = $('#branch').val();
                // if (branch === null) {
                //     pushErrMsg('Branch is required')
                // }

                let staffName = $('#staff_name').val();
                if (staffName === '') {
                    pushErrMsg('Staff name is required')
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
                if (password === '' && confirmPassword !== '') {
                    pushErrMsg('Left both password and password confirmation empty if you don\'t want to change the password')
                } else if (password !== '' && confirmPassword === '') {
                    pushErrMsg('Left both password and password confirmation empty if you don\'t want to change the password')
                }
                if (password !== confirmPassword) {
                    pushErrMsg('Password doesn\'t match')
                }

                
                if (hasError) {
                    toastr.warning(errorMessage)
                    errorMessage = ''
                    hasError = false
                } else {
                    const staffId = $('#staff_id').val()
                    let staffData = {
                        // branch,
                        staffId,
                        staffName,
                        email,
                        phone,
                        gender,
                        password,
                        confirmPassword
                    }
    
                    var baseUrl = window.location.origin

                    const userToken = $('#user_token').val();

                    const updatedURL = `${baseUrl}/api/admin/staff/update`
                    const res = axios.post(updatedURL, staffData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Staff edited.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.href = `${baseUrl}/admin/staff/list`;
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to edit staff.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }
            });

            function setClinicValue()
            {
                var baseUrl = window.location.origin
                const userToken = $('#user_token').val()
                const fetchURL = `${baseUrl}/api/admin/get-current-clinic`

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

            function fetchDetailData()
            {
                var baseUrl = window.location.origin;
                const staffId = $('#staff_id').val();
                const userToken = $('#user_token').val();
                const fetchURL = `${baseUrl}/api/admin/staff/detail`;
                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'staffId': staffId
                    }
                }).then(function (response) {
                    if (response.data.status == 'success') {
                        showData(response.data.data.staff)
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Failed to fetch staff.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })

            }

            function setBranchOptions()
            {
                var baseUrl = window.location.origin;
                const userToken = $('#user_token').val();
                const fetchURL = `${baseUrl}/api/admin/get-available-branch-option`;

                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                }).then(function (response) {
                    if (response.data.status == 'success') {
                        var branchSelect = document.getElementById("branch");
                        response.data.data.branchs.forEach(e => {
                            var newBranchOption = document.createElement('option');
                            newBranchOption.text = e.name;
                            newBranchOption.value = e.id;
                            branchSelect.add(newBranchOption);
                        })
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Failed to fetch branchs.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })

                fetchDetailData()
            }
            setBranchOptions();

            function showData(data)
            {
                console.log(data)
                $('#branch').val(data.branch_id)
                $('#staff_name').val(data.name)
                $('#email').val(data.email)
                $('#phone').val(data.phone)
                $('select[id="gender"]').val(data.gender);
            }

        });
    </script>

</html>