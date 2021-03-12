<!DOCTYPE html>

<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$branchId}}" id="branch_id">
        <input type="hidden" value="{{$action['id']}}" id="action_id">

        @include('admin_layout.sidenav')

		<div id="main">
			@include('admin_layout.navbar')

			<ul class="breadcrumb">
				<h4 class="mr-auto">Price Edit</h4>
				<li><a class="active">Price</a></li>
				<li><a href="#">Edit Action</a></li>
            </ul>
            
            <div class="container col-lg-12 col md-6">
                <div class="card col-md-12">
                    <div class="card-body mt-3 mb-5">
                        <div class="form-group row">
                            <label for="action_name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="Text" class="form-control form-add mb-2" id="action_name" name="action_name" value="{{$action['name']}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="action_price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-add mb-2" id="action_price" name="action_price" value="{{$action['price']}}"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <button class="btn btn-primary mt-4" id="save_action">Update Action</button>
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
                // alert('clicked');
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
                    const actionId = $('#action_id').val();
                    const userToken = $('#user_token').val();
                    const branchId = $('#branch_id').val();
                    let branchData = {
                        branch_id: branchId,
                        action_id: actionId,
                        name: action_name,
                        price: action_price,
                    }

                    var baseUrl = window.location.origin

                    const createURL = `${baseUrl}/api/admin/branch/price/${branchId}/action/update`;
                    const res = axios.post(createURL, branchData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Action updated.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.history.back();
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to update action.',
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