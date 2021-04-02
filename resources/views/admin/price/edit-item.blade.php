<!DOCTYPE html>

<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$branchId}}" id="branch_id">
        <input type="hidden" value="{{$item['id']}}" id="item_id">

        @include('admin_layout.sidenav')

		<div id="main">
			@include('admin_layout.navbar')

			<ul class="breadcrumb">
				<h4 class="mr-auto">Price</h4>
				<li><a class="active">Price</a></li>
				<li><a href="#">Edit Item</a></li>
            </ul>
            
            <div class="container col-lg-12 col md-6">
                <div class="card col-md-12">
                    <div class="card-body mt-3 mb-5">
                        <div class="form-group row">
                            <label for="item_name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="Text" class="form-control form-add mb-2" id="item_name" name="item_name" value="{{$item['name']}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_stock" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-add mb-2" id="item_stock" name="item_stock" value="{{$item['stock']}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-add mb-2" id="item_price" name="item_price" value="{{$item['price']}}"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <button class="btn btn-primary mt-4" id="save_item">Update Item</button>
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
            $('#save_item').on('click', () => {
                checkFieldsValue();
            })

            function checkFieldsValue()
            {
                let hasError = false;
                let errorMessage = '';

                let item_name = $('#item_name').val()
                if (item_name == '') {
                    hasError = true;
                    errorMessage += '<li>Name is required</li>';
                }

                let item_stock = $('#item_stock').val();
                if (item_stock == '') {
                    hasError = true;
                    errorMessage += '<li>Stock is required</li>';
                }

                let item_price = $('#item_price').val();
                if (item_price == '') {
                    hasError = true;
                    errorMessage += '<li>Price is required</li>';
                }


                if (hasError) {
                    toastr.warning(errorMessage)
                } else {
                    branchId = $('#branch_id').val()
                    itemId = $('#item_id').val()
                    let branchData = {
                        branch_id: branchId,
                        item_id: itemId,
                        name: item_name,
                        price: item_price,
                        stock: item_stock,
                    }

                    var baseUrl = window.location.origin

                    const userToken = $('#user_token').val();
                    const branch_id = $('#branch_id').val();

                    const createURL = `${baseUrl}/api/admin/branch/price/${branch_id}/item/update`;
                    const res = axios.post(createURL, branchData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Item updated.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.history.back();
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to update item.',
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