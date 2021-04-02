<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$clinic_id}}" id="clinic_id">

        @include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Branch Form</h4>
                <li><a class="active">Branch</a></li>
                <li><a href="#">Create</a></li>
            </ul>

            <div class="container-fluid container col md-6">
                <div class="row">

                    <div class="container col-4">
                        <div class="card">
                            <div class="card-header text-white mb-1">
                                Main Info
                            </div>
                            <div class="card-body">
                                <div class="container col-md-12">
                                    <div class="form-row">
                                        @role('superadmin')
                                        <div class="form-group  col-md-12">
                                            <label for="clinic">Clinic<span>*</span></label>
                                            <select class="form-control" name="clinic" id="clinic"></select>
                                        </div>
                                        @endrole
                                        <div class="form-group  col-md-12">
                                            <label for="branch_name">Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="" id="branch_name" name="branch_name">
                                        </div>
                                        <div class="form-group  col-md-12">
                                            <label for="branch_phone_number">Phone Number</label>
                                            <input type="tel" class="form-control" id="branch_phone_number" name="branch_phone_number" placeholder="">
                                        </div>
                                    </div>
                                    <div class="btn-group-edit btn-group-sm">
                                        <button type="button" class="btn btn-danger" id="cancel_button">
                                            <i class="fas fa-times"></i>Cancel
                                        </button>
                                        <div class="btn-group-edit btn-group-sm ml-1">
                                            <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown" id="submit_button">
                                                <i class="far fa-save"></i>Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="container col responsive" id="create_branch">
                        <div class="card">
                            <div class="card-header text-white mb-1">
                                Additional Info
                            </div>
                            <div class="card-body">
                                <div class="container col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="branch_address">Branch Address</label>
                                            <input type="text" class="form-control" id="branch_address" placeholder="Address" name="branch_address" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="latitude">Latitude<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Latitude" autocomplete="off" id="branch_latitude" name="latitude">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="longitude">Longitude<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Longitude" autocomplete="off" id="branch_longitude" name="longitude">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        @include('admin_layout.loading-animation')

    </body>

    @include('admin_layout.sidenav-script')
    @include('admin_layout.footscript')

    <script>
        $(document).ready(function(){
            $('#cancel_button').on('click', function() {
                window.location.href = window.location.origin + "/admin/branch/list";
            })

            $('#submit_button').on('click', async function() {
                let hasError = false;
                let errorMessage = '';

                let branchName = $('#branch_name').val();
                if (branchName == '') {
                    hasError = true;
                    errorMessage += '<li>Branch name is required</li>';
                }

                let branchPhone = $('#branch_phone_number').val();
                if (branchPhone == '') {
                    hasError = true;
                    errorMessage += '<li>Branch phone number is required</li>';
                }

                let branchAddress = $('#branch_address').val();
                if (branchAddress == '') {
                    hasError = true;
                    errorMessage += '<li>Branch address is required</li>';
                }

                let branchLatitude = $('#branch_latitude').val();
                if (branchLatitude == '') {
                    hasError = true;
                    errorMessage += '<li>Branch latitude is required</li>';
                }

                let branchLongitude = $('#branch_longitude').val();
                if (branchLongitude == '') {
                    hasError = true;
                    errorMessage += '<li>Branch longitude is required</li>';
                }

                if (hasError) {
                    toastr.warning(errorMessage)
                } else {
                    let branchData = {
                        branchName,
                        branchPhone,
                        branchAddress,
                        branchLatitude,
                        branchLongitude
                    }

                    var baseUrl = window.location.origin

                    const userToken = $('#user_token').val();
                    let clinicId = $('#clinic_id').val();
                    if (clinicId === '') {
                        superAdminSelectedClinic = $('#clinic').val();
                        if (superAdminSelectedClinic === '') {
                            toastr.warning('Please select a clinic')
                        } else {
                            clinicId = superAdminSelectedClinic
                        }
                    }

                    const createURL = `${baseUrl}/api/admin/branch/store/${clinicId}`;
                    const res = axios.post(createURL, branchData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Branch created.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.href = window.location.origin + "/admin/branch/list";
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to create branch.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }).catch(function (error) {
                        console.log('HAVE ERROR')
                        if (error.response) {
                            // Request made and server responded
                            console.log(error.response.data);
                            console.log(error.response.status);
                            console.log(error.response.headers);
                        } else if (error.request) {
                            // The request was made but no response was received
                            console.log(error.request);
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.log('Error', error.message);
                        }
                    })
                }
            });

            $('#branch_latitude').on('change', function() {
                console.log(this.value)
                if (this.value > 90) {
                    toastr.warning('Latitude cannot be greater than 90.')
                    this.value = ''
                }
                if (this.value < -90) {
                    toastr.warning('Latitude cannot be less than -90.')
                    this.value = ''
                }
            })

            $('#branch_longitude').on('change', function() {
                if (this.value > 180) {
                    toastr.warning('Longitude cannot be greater than 180.')
                    this.value = ''
                }
                if (this.value < -180) {
                    toastr.warning('Longitude cannot be less than -180.')
                    this.value = ''
                }
            })

            $('#branch_phone_number').on('keyup', () => {
                let content = $('#branch_phone_number').val()
                let clean = content.replace(/\D/g,'')
                $('#branch_phone_number').val(clean)
            })

            function showPosition(position) {
                $('#branch_latitude').val(position.coords.latitude)
                $('#branch_longitude').val(position.coords.longitude)
            }

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError, {timeout:10000});
                }
            }

            function showError(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        console.log('User denied the request for Geolocation.')
                        break;
                    case error.POSITION_UNAVAILABLE:
                        console.log('Location information is unavailable.')
                        break;
                    case error.TIMEOUT:
                        console.log('The request to get user location timed out.')
                        break;
                    case error.UNKNOWN_ERROR:
                        console.log('An unknown error occurred.')
                        break;
                }
            }

            function fetchClinicList()
            {
                let baseUrl = window.location.origin
                const userToken = $('#user_token').val();
                const clinicId = $('#clinic_id').val();

                if (clinicId === '') {
                    showLoadingCircle()
                    const fetchURL = `${baseUrl}/api/admin/clinic/list`;
                    const res = axios.get(fetchURL, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        hideLoadingCircle()
                        if (response.data.status == 'success') {
                            createClinicOption(response.data.data.hospitals)
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to fetch clinics.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                    hideLoadingCircle()
                }
            }

            function createClinicOption(clinicList)
            {
                clinicList.forEach(c => {
                    let optionText = c.name
                    let optionValue = c.id
                    $('#clinic').append(`<option value="${optionValue}">${optionText}</option>`)
                });
            }

            function showLoadingCircle() {
                $('#loading_circle').show()
            }

            function hideLoadingCircle() {
                $('#loading_circle').hide()
            }

            fetchClinicList()

            getLocation()

        });
    </script>

</html>
