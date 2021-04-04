<!DOCTYPE html>

<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$branchId}}" id="branch_id">

        @include('admin_layout.sidenav')

		<div id="main">
			@include('admin_layout.navbar')

			<ul class="breadcrumb mr-auto">
				<li><a class="active">Branch</a></li>
				<li><a href="{{url('/admin/branch/list')}}">List</a></li>
                <li><a href="{{url('/admin/branch/detail/' . $branchId)}}">Detail</a></li>
                <li><a href="{{url('/admin/branch/price/' . $branchId)}}">Price List</a></li>
                <li><a href="{{url('/admin/branch/price/' . $branchId . '/action/add')}}">Add Action</a></li>
			</ul>
            
            <div class="container col-lg-12 col md-6">
                <div class="card col-md-12">
                    <div class="card-body mt-3 mb-5">
                        <div class="form-group row">
                            <label for="action_name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="Text" class="form-control form-add mb-2" id="action_name" name="action_name"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="action_price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-add mb-2" id="action_price" name="action_price"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <button class="btn btn-primary mt-4" id="save_action">Save Action</button>
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
            $('#save_action').on('click', () => {
                checkFieldsValue();
            })

            function checkFieldsValue()
            {
                let hasError = false;
                let errorMessage = '';

                let action_name = $('#action_name').val()
                if (action_name == '') {
                    hasError = true;
                    errorMessage += '<li>Name is required</li>';
                }

                let action_price = $('#action_price').val();
                if (action_price == '') {
                    hasError = true;
                    errorMessage += '<li>Price is required</li>';
                }

                if (hasError) {
                    toastr.warning(errorMessage)
                } else {
                    branchId = $('#branch_id').val()
                    let branchData = {
                        branch_id: branchId,
                        name: action_name,
                        price: action_price,
                    }

                    var baseUrl = window.location.origin

                    const userToken = $('#user_token').val();
                    const branch_id = $('#branch_id').val();

                    const createURL = `${baseUrl}/api/admin/branch/price/${branch_id}/action/add`;
                    const res = axios.post(createURL, branchData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Action created.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.replace(document.referrer);
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to create action.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }
            }
        });
    </script>

</html>