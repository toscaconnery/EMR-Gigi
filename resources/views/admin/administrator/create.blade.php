<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">

        @include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Administrator Form</h4>
                <li><a class="active">Administrator</a></li>
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
                            <label for="administrator_name" class="col-sm-2 col-form-label">Administrator Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="administrator_name" class="form-control form-add mb-2" placeholder="Please input administrator name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" class="form-control form-add mb-2" placeholder="Please input the administrator email address, it will be used for login credential" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="input-group col-sm-10 pr-15-px">
                                <div class="input-group-prepend form-add">
                                    <span class="input-group-text tlr-15 blr-15">+62</span>
                                </div>
                                <input type="phone" id="phone" class="form-control form-add" placeholder="Please input the administrator phone number" autocomplete="off">
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
                                <input type="password" id="password" class="form-control form-add mb-2" placeholder="Please input administrator password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-2 col-form-label">Password Confirmation</label>
                            <div class="col-sm-10">
                                <input type="password" id="confirm_password" class="form-control form-add mb-2" placeholder="Please input administrator password confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="button" style="margin-left: auto;padding-right: 4px;">
                                <button type="button" class="btn btn-add-sch btn-sm" id="save_administrator">Add Administrator</button>
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

            $('#save_administrator').on('click', async function() {
                let administratorName = $('#administrator_name').val();
                if (administratorName === '') {
                    pushErrMsg('Administrator name is required')
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
                    let administratorData = {
                        administratorName,
                        email,
                        phone,
                        gender,
                        password,
                        confirmPassword
                    }
    
                    var baseUrl = window.location.origin

                    const userToken = $('#user_token').val();

                    const createURL = `${baseUrl}/api/admin/administrator/register`;
                    const res = axios.post(createURL, administratorData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Administrator created.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.href = `${baseUrl}/admin/administrator/list`;
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to create administrator.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }
            });

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
        });
    </script>

</html>