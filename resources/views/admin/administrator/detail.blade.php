<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$administratorId}}" id="administrator_id">

        @include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Administrator Form</h4>
                <li><a class="active">Administrator</a></li>
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
                            <label for="administrator_name" class="col-sm-2 col-form-label">Administrator Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="administrator_name" class="form-control form-add mb-2" autocomplete="off" disabled>
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
                            <div class="input-group col-sm-10 pr-15-px">
                                <div class="input-group-prepend form-add">
                                    <span class="input-group-text tlr-15 blr-15">+62</span>
                                </div>
                                <input type="phone" id="phone" class="form-control form-add" placeholder="Please input the administrator phone number" autocomplete="off" disabled>
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
                        <div class="form-row row">
                            <div class="button" style="margin-left: auto;padding-right: 4px;">
                                <a href="{{url('')}}/admin/administrator/edit/{{$administratorId}}">
                                    <button type="button" class="btn btn-add-sch btn-sm">Edit Administrator</button>
                                </a>
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
                const administratorId = $('#administrator_id').val();
                const userToken = $('#user_token').val();
                const fetchURL = `${baseUrl}/api/admin/administrator/detail`;
                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'administratorId': administratorId
                    }
                }).then(function (response) {
                    if (response.data.status == 'success') {
                        showData(response.data.data.administrator)
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Failed to fetch administrator.',
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
                $('#branch').val(data.branch_id)
                $('#administrator_name').val(data.name)
                $('#email').val(data.email)
                $('#phone').val(data.phone)
                $('select[id="gender"]').val(data.gender);
            }

        });
    </script>

</html>