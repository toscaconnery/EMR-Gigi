<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$branchId}}" id="branch_id">

        @include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Branch Form</h4>
                <li><a class="active">Branch</a></li>
                <li><a href="#">Detail</a></li>
            </ul>

            <div class="container-fluid container col md-6">
                <div class="row">

                    <div class="container col-4">
                        <div class="card"">
                            <div class="card-header text-white mb-1">
                                Main Info
                            </div>
                            <div class="card-body">
                                <div class="container col-md-12">
                                    <div class="form-row">
                                        <div class="form-group  col-md-12">
                                            <label for="branch_name">Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="" id="branch_name" name="branch_name" disabled>
                                        </div>
                                        <div class="form-group  col-md-12">
                                            <label for="branch_phone_number">Phone Number</label>
                                            <input type="tel" class="form-control" id="branch_phone_number" name="branch_phone_number" placeholder="" disabled>
                                        </div>
                                    </div>
                                    {{-- <div class="btn-group-edit btn-group-sm">
                                        <button type="button" class="btn btn-danger" id="cancel_button">
                                            <i class="fas fa-times"></i>Cancel
                                        </button>
                                        <div class="btn-group-edit btn-group-sm ml-1">
                                            <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown" id="submit_button">
                                                <i class="far fa-save"></i>Save
                                            </button>
                                        </div>	
                                    </div> --}}
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
                                            <input type="text" class="form-control" id="branch_address" placeholder="Address" name="branch_address" autocomplete="off" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="latitude">Latitude<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Latitude" autocomplete="off" id="branch_latitude" name="latitude" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="longitude">Longitude<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Longitude" autocomplete="off" id="branch_longitude" name="longitude" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="row mt-4">
                    <div class="Container col-4">
                        <div class="card">
                            <div class="card-header text-white mb-1">
                                Action
                            </div>
                            <div class="card-body">
                                <div class="container col-md-12">
                                    <div class="btn-group-edit btn-group-sm">
                                        <div class="btn-group-edit btn-group-sm ml-1 mb-2">
                                            <a href="#" id="manage_price_button">
                                                <button type="button" class="btn btn-custom">
                                                    <i class="fas fa-cog"></i>Manage Price
                                                </button>
                                            </a>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Container col-8">
                        <div class="card">
                            <img src="workplace.jpg" alt="Workplace" usemap="#workmap" width="400" height="379">

                            <map name="workmap">
                                <area shape="rect" coords="34,44,270,350" alt="Computer" href="computer.htm">
                                <area shape="rect" coords="290,172,333,250" alt="Phone" href="phone.htm">
                                <area shape="circle" coords="337,300,44" alt="Cup of coffee" href="coffee.htm">
                            </map>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('admin_layout.loading-animation')

    </body>

    @include('admin_layout.sidenav-script')
    @include('admin_layout.footscript')

    <script>
        $(document).ready(function(){
            function showLoadingCircle() {
                $('#loading_circle').show();
            }

            function hideLoadingCircle() {
                $('#loading_circle').hide();
            }

            function fetchBranchDetail()
            {
                var baseUrl = window.location.origin;
                const userToken = $('#user_token').val();
                const branchId = $('#branch_id').val();

                if (userToken != '') {
                    showLoadingCircle();

                    const fetchURL = `${baseUrl}/api/admin/branch/detail/${branchId}`;
                    const res = axios.get(fetchURL, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            showData(response.data.data.branch, branchId);
                        } else {
                            hideLoadingCircle();
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to fetch branch detail.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                } else {
                    hideLoadingCircle();
                    Swal.fire({
                        icon: 'warning',
                        title: 'You are not logged in',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }

            function showData(branch, branchId)
            {
                $('#branch_name').val(branch.name);
                $('#branch_phone_number').val(branch.phone);
                $('#branch_address').val(branch.address);
                $('#branch_latitude').val(branch.latitude);
                $('#branch_longitude').val(branch.longitude);

                var baseUrl = window.location.origin;
                $('#manage_price_button').attr('href', baseUrl + '/admin/branch/price/' + branchId);
                hideLoadingCircle();
            }

            fetchBranchDetail();

        });
    </script>

</html>