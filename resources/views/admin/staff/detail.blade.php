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
                            <label for="staff_name" class="col-sm-2 col-form-label">Staff Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="staff_name" class="form-control form-add mb-2" autocomplete="off" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" class="form-control form-add mb-2" autocomplete="off" value="" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="phone" id="phone" class="form-control form-add mb-2" autocomplete="off" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select id="gender" class="form-control form-add mb-2" disabled>
                                    <option selected disabled></option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
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
                        </div> --}}
                        <div class="form-row row">
                            <div class="button" style="margin-left: auto;padding-right: 4px;">
                                <button type="button" class="btn btn-add-sch btn-sm" id="save_staff">Edit Staff</button>
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

            function fetchDetailData()
            {
                console.log('fetching detail data')
                var baseUrl = window.location.origin;
                const staffId = $('#staff_id').val();
                const userToken = $('#user_token').val();
                const fetchURL = `${baseUrl}/api/admin/staff/detail`;
                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'staff_id': staffId
                    }
                }).then(function (response) {
                    let responseData = response.data.data;
                    console.log('STAFF DATA : ')
                    console.log(responseData.staff)
                    // responseData.actions.forEach(e => {
                    //     showData(responseData.staff)
                    // })
                    showData(responseData.staff)
                })

            }
            // fetchDetailData()

            function setBranchOptions()
            {
                console.log('inside set branch option')
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
                    console.log('success getting branch option')
                    responseData.branchs.forEach(e => {
                        var newBranchOption = document.createElement('option');
                        newBranchOption.text = e.name;
                        newBranchOption.value = e.id;
                        branchSelect.add(newBranchOption);
                    })
                })

                fetchDetailData()
            }
            setBranchOptions();

            function showData(data)
            {
                console.log('inside show data')
                console.log(data)
                $('#branch').val(data.branch)
                $('#staff_name').val(data.name)
                $('#email').val(data.email)
                $('#phone').val(data.phone)
                console.log('selecting gender')
                // $('#gender').val(data.gender)
                $('select[id="gender"]').val(data.gender);
            }

        });
    </script>

</html>