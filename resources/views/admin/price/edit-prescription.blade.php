<!DOCTYPE html>

<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="{{$branchId}}" id="branch_id">
        <input type="hidden" value="{{$prescription['id']}}" id="prescription_id">

        @include('admin_layout.sidenav')

		<div id="main">
			@include('admin_layout.navbar')

            <ul class="breadcrumb mr-auto">
				<li><a class="active">Branch</a></li>
				<li><a href="{{url('/admin/branch/list')}}">List</a></li>
                <li><a href="{{url('/admin/branch/detail/' . $branchId)}}">Detail</a></li>
                <li><a href="{{url('/admin/branch/price/' . $branchId)}}">Price List</a></li>
                <li><a href="{{url('/admin/branch/price/' . $branchId . '/prescription/edit/' . $prescription['id'])}}">Edit Prescription</a></li>
			</ul>
            
            <div class="container col-lg-12 col md-6">
                <div class="card col-md-12">
                    <div class="card-body mt-3 mb-5">
                        <div class="form-group row">
                            <label for="prescription_name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="Text" class="form-control form-add mb-2" id="prescription_name" name="prescription_name" value="{{$prescription['name']}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prescription_stock" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-add mb-2" id="prescription_stock" name="prescription_stock" value="{{$prescription['stock']}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prescription_price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-add mb-2" id="prescription_price" name="prescription_price" value="{{$prescription['price']}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prescription_type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select id="prescription_type" class="form-control form-add mb-2" name="prescription_type">
                                    <option disabled>Please select item type</option>
                                    <option value="strip" {{$prescription['type'] == 'strip' ? 'selected' : ''}}>Strip</option>
                                    <option value="pack" {{$prescription['type'] == 'pack' ? 'selected' : ''}}>Pack</option>
                                    <option value="bottle" {{$prescription['type'] == 'bottle' ? 'selected' : ''}}>Bottle</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="prescription_way_to_consume" class="col-sm-2 col-form-label">How to consume</label>
                            <div class="col-sm-10">
                                <select id="prescription_way_to_consume" class="form-control form-add mb-2" name="prescription_way_to_consume">
                                    <option disabled>Please select how to consume it</option>
                                    <option value="drink" {{$prescription['how_to_consume'] == 'drink' ? 'selected' : ''}}>Drink</option>
                                    <option value="swallow" {{$prescription['how_to_consume'] == 'swallow' ? 'selected' : ''}}>Swallow</option>
                                    <option value="inhale" {{$prescription['how_to_consume'] == 'inhale' ? 'selected' : ''}}>Inhale</option>
                                    <option value="injection" {{$prescription['how_to_consume'] == 'injection' ? 'selected' : ''}}>Injection</option>
                                    <option value="patch" {{$prescription['how_to_consume'] == 'patch' ? 'selected' : ''}}>Patch</option>
                                    <option value="drop" {{$prescription['how_to_consume'] == 'drop' ? 'selected' : ''}}>Drop</option>
                                    <option value="other" {{$prescription['how_to_consume'] == 'other' ? 'selected' : ''}}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <button class="btn btn-primary mt-4" id="save_prescription">Update Prescription</button>
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
            $('#save_prescription').on('click', () => {
                checkFieldsValue();
            })

            function checkFieldsValue()
            {
                let hasError = false;
                let errorMessage = '';

                let prescription_name = $('#prescription_name').val()
                if (prescription_name == '') {
                    hasError = true;
                    errorMessage += '<li>Name is required</li>';
                }

                let prescription_stock = $('#prescription_stock').val();
                if (prescription_stock == '') {
                    hasError = true;
                    errorMessage += '<li>Stock is required</li>';
                }

                let prescription_price = $('#prescription_price').val();
                if (prescription_price == '') {
                    hasError = true;
                    errorMessage += '<li>Price is required</li>';
                }

                let prescription_type = $('#prescription_type').val();
                if (prescription_type == '') {
                    hasError = true;
                    errorMessage += '<li>Type is required</li>';
                }

                let prescription_way_to_consume = $('#prescription_way_to_consume').val();
                if (prescription_way_to_consume == '') {
                    hasError = true;
                    errorMessage += '<li>How to consume is required</li>';
                }

                if (hasError) {
                    toastr.warning(errorMessage)
                } else {
                    branchId = $('#branch_id').val()
                    prescriptionId = $('#prescription_id').val()
                    let branchData = {
                        branch_id: branchId,
                        prescription_id: prescriptionId,
                        name: prescription_name,
                        price: prescription_price,
                        stock: prescription_stock,
                        type: prescription_type,
                        how_to_consume: prescription_way_to_consume,
                    }

                    var baseUrl = window.location.origin

                    const userToken = $('#user_token').val();
                    const branch_id = $('#branch_id').val();

                    const createURL = `${baseUrl}/api/admin/branch/price/${branch_id}/prescription/update`;
                    const res = axios.post(createURL, branchData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Prescription updated.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            const redirectURL = `${baseUrl}/admin/branch/price/${branchId}`
                            window.location.href = redirectURL
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to update prescription.',
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