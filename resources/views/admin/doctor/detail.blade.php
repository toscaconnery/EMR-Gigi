<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$doctorId}}" id="doctor_id">

        @include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb mr-auto">
				<li><a class="active">Doctor</a></li>
				<li><a href="{{url('/admin/doctor/list')}}">List</a></li>
                <li><a href="{{url('/admin/doctor/detail/' . $doctorId )}}">Detail</a></li>
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
                                <input type="text" id="doctor_name" class="form-control form-add mb-2" autocomplete="off" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputdoctors" class="col-sm-2 col-form-label">Action</label>
                            <div class="col-sm-10 row">
                                <span class="form-add mb-2 ml-3" style="color: gray" id="action_placeholder">
                                    <i>Fetching actions...</i>
                                </span>
                                <span id="action_placer"></span>
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
                                <input type="phone" id="phone" class="form-control form-add" placeholder="Please input the doctor phone number" autocomplete="off" disabled>
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
                                <a href="{{url('')}}/admin/doctor/edit/{{$doctorId}}">
                                    <button type="button" class="btn btn-add-sch btn-sm">Edit Doctor</button>
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
                var baseUrl = window.location.origin
                const doctorId = $('#doctor_id').val()
                const userToken = $('#user_token').val()
                const fetchURL = `${baseUrl}/api/admin/get-current-clinic`

                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'userFindId': doctorId
                    }
                }).then(function (response) {
                    let responseContent = response.data;
                    var clinic = $('#clinic').val(responseContent.data.hospital.name)
                })
            }
            setClinicValue();

            function setActionOptions(selectedActions)
            {
                $('.action-list-content').remove();
                $('#action_placeholder').remove();

                var selectedBranch = $('#branch').val();
                console.log('x', selectedBranch)
                console.log('x2', $('#branch'))
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
                    let responseContent = response.data;
                    console.log('s', selectedActions)
                    console.log('s2', responseContent.data.actions)
                    responseContent.data.actions.forEach(e => {
                        let isSelected = checkIfActionSelected(selectedActions,e)
                        $('#action_placer').before(`
                            <div class="col-sm-2 action-list-content">
                                <input type="checkbox" id="action_option_${e.id}" name="action[${e.id}]" value="${e.id}" data-action_id=${e.id} ${isSelected} disabled>
                                <label for="action_option_${e.id}">${e.name}</label><br>
                            </div>
                        `);
                    })
                })
            }
            // setActionOptions()

            function checkIfActionSelected(selectedActionList, actionOption) {
                // console.log('a', actionOption)
                let isSelected = ''
                selectedActionList.forEach(e => {
                    // console.log('t', e)
                    if (e.action_id === actionOption.id) {
                        isSelected = 'checked'
                    }
                })
                return isSelected
            }

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
                        console.log('y',response.data.data)
                        showData(response.data.data.doctor, response.data.data.actions)
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

            function showData(data, actions)
            {
                console.log(data)
                $('#branch').val(data.branch_id)
                $('#doctor_name').val(data.name)
                $('#email').val(data.email)
                $('#phone').val(data.phone)
                $('select[id="gender"]').val(data.gender);
                setActionOptions(actions)
            }

        });
    </script>

</html>