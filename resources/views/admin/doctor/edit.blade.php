<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$doctorId}}" id="doctor_id">

        @include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Doctor Form</h4>
                <li><a class="active">Doctor</a></li>
                <li><a href="#">Detail</a></li>
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
                            <label for="doctor_name" class="col-sm-2 col-form-label">Doctor Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="doctor_name" class="form-control form-add mb-2" autocomplete="off">
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
                                <input type="email" id="email" class="form-control form-add mb-2" autocomplete="off" value="">
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
                        {{-- <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="phone" id="phone" class="form-control form-add mb-2" autocomplete="off">
                            </div>
                        </div> --}}
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
                                <button type="button" class="btn btn-add-sch btn-sm" id="save_doctor">Save Data</button>
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
                // let branch = $('#branch').val();
                // if (branch === null) {
                //     pushErrMsg('Branch is required')
                // }

                const doctorId = $('#doctor_id').val()

                let doctorName = $('#doctor_name').val()
                if (doctorName === '') {
                    pushErrMsg('Doctor name is required')
                }

                let actions = $('input[name^="action"]:checkbox:checked')
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
                    let doctorData = {
                        doctorId,
                        doctorName,
                        selectedActions,
                        email,
                        phone,
                        gender,
                        password,
                        confirmPassword
                    }
    
                    var baseUrl = window.location.origin

                    const userToken = $('#user_token').val();

                    const updateURL = `${baseUrl}/api/admin/doctor/update`;
                    const res = axios.post(updateURL, doctorData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Doctor updated.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.href = `${baseUrl}/admin/doctor/list`;
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to edit doctor.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }
            });

            function setActionOptions(selectedActions)
            {
                // The branch is already selected
                $('.action-list-content').remove();
                $('#action_placeholder').remove();

                var selectedBranch = $('#branch').val();
                var baseUrl = window.location.origin;
                const userToken = $('#user_token').val();
                const fetchURL = `${baseUrl}/api/admin/get-available-action-option`;

                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'branch_id': selectedBranch
                    }
                }).then(function (response) {
                    let formatSelectedActions = []
                    for (let i = 0; i < selectedActions.length; i++) {
                        formatSelectedActions.push(selectedActions[i].action_id)
                    }

                    let responseContent = response.data;
                    responseContent.data.actions.forEach(e => {
                        let checkedString = ''
                        if (formatSelectedActions.includes(e.id)) {
                            checkedString = 'checked '
                        }
                        $('#action_placer').before(`
                            <div class="col-sm-2 action-list-content">
                                <input type="checkbox" id="action_option_${e.id}" name="action[${e.id}]" value="${e.id}" class="action-checkbox" data-action_id="${e.id}" ${checkedString}>
                                <label for="action_option_${e.id}">${e.name}</label><br>
                            </div>
                        `);
                    })
                })
            }

            function setClinicValue()
            {
                var baseUrl = window.location.origin;
                const userToken = $('#user_token').val();
                const fetchURL = `${baseUrl}/api/admin/get-current-clinic`;

                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                }).then(function (response) {
                    let responseContent = response.data;
                    var clinic = $('#clinic').val(responseContent.data.hospital.name)
                })
            }
            setClinicValue();

            function fetchDetailData()
            {
                var baseUrl = window.location.origin;
                const doctorId = $('#doctor_id').val();
                const userToken = $('#user_token').val();
                const fetchURL = `${baseUrl}/api/admin/doctor/detail`;
                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'doctorId': doctorId
                    }
                }).then(function (response) {
                    if (response.data.status == 'success') {
                        showData(response.data.data.doctor)
                        setActionOptions(response.data.data.actions)
                        // selectActions(response.data.data.actions)
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Failed to fetch doctor.',
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

            function showData(data) {
                console.log(data)
                $('#branch').val(data.branch_id)
                $('#doctor_name').val(data.name)
                $('#email').val(data.email)
                $('#phone').val(data.phone)
                $('select[id="gender"]').val(data.gender);
            }

        });
    </script>

</html>