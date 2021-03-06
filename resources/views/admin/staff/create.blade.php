<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">

        @include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb mr-auto">
				<li><a class="active">Staff</a></li>
				<li><a href="{{url('/admin/staff/list')}}">List</a></li>
                <li><a href="{{url('/admin/staff/create')}}">Create</a></li>
			</ul>

            <div class="container-fluid">
                <div class="card col-md-12">
                    <div class="card-body mt-3 mb-2">
                        <div class="form-group row">
                            <label for="clinic" class="col-sm-2 col-form-label">Clinic</label>
                            <div class="col-sm-10">
                                @role('admin')
                                    <input type="text" id="clinic" class="form-control form-add mb-2" value="" disabled>
                                @endrole
                                @role('superadmin')
                                    <select id="clinic" class="form-control form-add mb-2">
                                        <option selected disabled>Please select a clinic</option>
                                    </select>
                                    <input type="hidden" id="is_superadmin" value="true">
                                @endrole
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
                            <label for="staff_name" class="col-sm-2 col-form-label">Staff Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="staff_name" class="form-control form-add mb-2" placeholder="Please input staff name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" class="form-control form-add mb-2" placeholder="Please input the staff email address, it will be used for login credential" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="input-group col-sm-10 pr-15-px">
                                <div class="input-group-prepend form-add">
                                    <span class="input-group-text tlr-15 blr-15">+62</span>
                                </div>
                                <input type="phone" id="phone" class="form-control form-add" placeholder="Please input the staff phone number" autocomplete="off">
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
                                <input type="password" id="password" class="form-control form-add mb-2" placeholder="Please input staff password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-2 col-form-label">Password Confirmation</label>
                            <div class="col-sm-10">
                                <input type="password" id="confirm_password" class="form-control form-add mb-2" placeholder="Please input staff password confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="button" style="margin-left: auto;padding-right: 4px;">
                                <button type="button" class="btn btn-add-sch btn-sm" id="save_staff">Add Staff</button>
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
                if (isSuperadmin()) {
                    let clinic = $('#clinic').val()
                    if (clinic === null) {
                        pushErrMsg('Clinic is required')
                    }
                }

                let branch = $('#branch').val();
                if (branch === null) {
                    pushErrMsg('Branch is required')
                }

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
                    let staffData = {
                        branch,
                        staffName,
                        email,
                        phone,
                        gender,
                        password,
                        confirmPassword
                    }
                    if (isSuperadmin()) {
                        staffData['clinic'] = clinic
                    }
    
                    var baseUrl = window.location.origin

                    const userToken = $('#user_token').val()

                    const createURL = `${baseUrl}/api/admin/staff/register`
                    const res = axios.post(createURL, staffData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Staff created.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.href = `${baseUrl}/admin/staff/list`
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to create staff.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })
                }
            })

            function setBranchOptions(hospitalId)
            {
                var baseUrl = window.location.origin
                const userToken = $('#user_token').val()
                const fetchURL = `${baseUrl}/api/admin/get-available-branch-option`

                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'hospitalId': hospitalId
                    }
                }).then(function (response) {
                    let responseContent = response.data
                    if (responseContent.data.branchs.length === 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Clinic doesn\'t have any branch.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        var branchSelect = document.getElementById("branch")
                        responseContent.data.branchs.forEach(e => {
                            var newBranchOption = document.createElement('option')
                            newBranchOption.text = e.name
                            newBranchOption.value = e.id
                            branchSelect.add(newBranchOption)
                        })
                    }

                })
            }

            function isSuperadmin()
            {
                var isSuperadmin = $('#is_superadmin')
                if (isSuperadmin.length > 0) {
                    return true
                } else {
                    return false
                }
            }

            function setClinicValue()
            {
                var baseUrl = window.location.origin
                const userToken = $('#user_token').val()
                
                if (isSuperadmin()) {
                    let fetchURL = `${baseUrl}/api/admin/clinic/list`

                    const res = axios.get(fetchURL, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        }
                    }).then(function (response) {
                        let responseContent = response.data
                        clinicSelect = document.getElementById("clinic")
                        console.log('CLINIC')
                        console.log(responseContent)

                        responseContent.data.hospitals.forEach(e => {
                            var newClinicOption = document.createElement('option')
                            newClinicOption.text = e.name
                            newClinicOption.value = e.id
                            clinicSelect.add(newClinicOption)
                        })
                        $('#clinic').on('change', function() {
                            let selectedClinic = $('#clinic').val()
                            $('#branch').empty()
                            setBranchOptions(selectedClinic)
                        })
                    })
                } else {
                    let staffId = ''
                    let fetchURL = `${baseUrl}/api/admin/get-current-clinic`

                    const res = axios.get(fetchURL, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        }
                    }).then(function (response) {
                        let responseContent = response.data
                        var clinic = $('#clinic').val(responseContent.data.hospital.name)
                        setBranchOptions(null)
                    })
                }

                
                

            }
            setClinicValue()
        });
    </script>

</html>