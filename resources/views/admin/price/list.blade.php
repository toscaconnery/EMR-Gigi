<!DOCTYPE html>

<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="1" id="clinic_page">    {{-- delete --}}
        <input type="hidden" value="{{$branchId}}" id="branch_id">

        @include('admin_layout.sidenav')

		<div id="main">
			@include('admin_layout.navbar')

			<ul class="breadcrumb">
				<h4 class="mr-auto">Price</h4>
				<li><a class="active">Price</a></li>
				<li><a href="#">List</a></li>
            </ul>
            
            <div class="container col-lg-12 col md-6">
                <div class="card col-md-12 pb-5">
                    <div class="tab">
                        <button class="tablinks btn create-button mt-2 mr-0 active" onclick="openTable(event, 'table-prescription')">Prescriptions</button>
                        <button class="tablinks btn create-button mt-2 mr-0" onclick="openTable(event, 'table-action')">Actions</button>
                        <button class="tablinks btn create-button mt-2 mr-0" onclick="openTable(event, 'table-item')">Items</button>
                    </div>
                      
                    <table id="table-prescription" class="table table-bordered tabcontent">
                        <thead class="thead-custom">
                            <tr>
                                <th width="400px">Prescription Name</th>
                                <th width="300px">Price</th>
                                <th width="300px">Stocks</th>
                                <th width="300px">Type</th>
                                <th width="300px">How To Consume</th>
                                <th width="300px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="prescription_placer"></tr>
                        </tbody>
                        <tfoot style="position: relative; height: 100%">
                            <button class="btn add-price-button" id="table-prescription-add-button">
                                Add Prescription
                            </button>
                        </tfoot>
                    </table>

                    <table id="table-action" class="table table-bordered tabcontent" style="display: none">
                        <thead class="thead-custom">
                            <tr>
                                <th width="400px">Action Name</th>
                                <th width="300px">Price</th>
                                <th width="300px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="action_placer"></tr>
                        </tbody>
                        <tfoot style="position: relative; height: 100%">
                            <button class="btn add-price-button" style="display: none" id="table-action-add-button">
                                Add Action
                            </button>
                        </tfoot>
                    </table>

                    <table id="table-item" class="table table-bordered tabcontent" style="display: none">
                        <thead class="thead-custom">
                            <tr>
                                <th width="400px">Item Name</th>
                                <th width="300px">Price</th>
                                <th width="300px">Stocks</th>
                                <th width="300px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="item_placer"></tr>
                        </tbody>
                        <tfoot style="position: relative; height: 100%">
                            <button class="btn add-price-button" style="display: none" id="table-item-add-button">
                                Add Item
                            </button>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

        @include('admin_layout.loading-animation')

    </body>
    
    @include('admin_layout.sidenav-script')
    @include('admin_layout.footscript')

    <script>
        function openTable(evt, tableType) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            addbutton = document.getElementsByClassName("add-price-button");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                addbutton[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tableType).style.display = "table";
            document.getElementById(tableType + '-add-button').style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    <script>
        $(document).ready(function(){
            function fetchPrescription(baseUrl, branchId, userToken) {
                const fetchURL = `${baseUrl}/api/admin/branch/price/prescription`;
                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'branch_id': branchId
                    }
                }).then(function (response) {
                    let responseData = response.data.data;
                    if (responseData.status == 'success') {
                        showPrescription(responseData.prescriptionlist);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Failed to fetch prescription.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }

            function fetchAction(baseUrl, branchId, userToken) {
                const fetchURL = `${baseUrl}/api/admin/branch/price/action`;
                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'branch_id': branchId
                    }
                }).then(function (response) {
                    let responseData = response.data.data;
                    if (responseData.status == 'success') {
                        showAction(responseData.actionlist);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Failed to fetch action.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }

            function fetchItem(baseUrl, branchId, userToken) {
                const fetchURL = `${baseUrl}/api/admin/branch/price/item`;
                const res = axios.get(fetchURL, {
                    headers: {
                        'Authorization': `Bearer ${userToken}`
                    },
                    params: {
                        'branch_id': branchId
                    }
                }).then(function (response) {
                    let responseData = response.data.data;
                    if (responseData.status == 'success') {
                        showItem(responseData.itemlist);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Failed to fetch item.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }

            function showPrescription(prescriptionList) {
                var base_url = window.location.origin;
                var branch_id = $('#branch_id').val();
                prescriptionList.forEach(function(item) {
                    $('#prescription_placer').before(`
                        <tr height="45px">
                            <td>${item.name}</td>
                            <td>IDR ${item.price}</td>
                            <td>${item.stock}</td>
                            <td>${ucFirst(item.type)}</td>
                            <td>${ucFirst(item.how_to_consume)}</td>
                            <td>
                                <a href="${base_url}/admin/branch/price/${branch_id}/prescription/edit/${item.id}">
                                    <button type="button" class="btn btn-roles btn-edtcustom btn-sm">Edit</button>
                                </a>
                                <button type="button" class="btn btn-roles btn-delcustom btn-sm trigger-delete" data-id="${item.id}" data-type="prescription">Del</button>
                            </td>
                        </tr>
                    `)
                });
                listenDeleteButton();
            }

            function showAction(actionList) {
                var base_url = window.location.origin;
                var branch_id = $('#branch_id').val();
                actionList.forEach(function(item) {
                    $('#action_placer').before(`
                        <tr height="45px">
                            <td>${item.name}</td>
                            <td>IDR ${item.price}</td>
                            <td>
                                <a href="${base_url}/admin/branch/price/${branch_id}/action/edit/${item.id}">
                                    <button type="button" class="btn btn-roles btn-edtcustom btn-sm">Edit</button>
                                </a>
                                <button type="button" class="btn btn-roles btn-delcustom btn-sm trigger-delete" data-id="${item.id}" data-type="action">Del</button>
                            </td>
                        </tr>
                    `)
                });
                listenDeleteButton();
            }

            function showItem(itemList) {
                var base_url = window.location.origin;
                var branch_id = $('#branch_id').val();
                itemList.forEach(function(item) {
                    $('#item_placer').before(`
                        <tr height="45px">
                            <td>${item.name}</td>
                            <td>IDR ${item.price}</td>
                            <td>${item.stock}</td>
                            <td>
                                <button type="button" class="btn btn-roles btn-edtcustom btn-sm">Edit</button>
                                <button type="button" class="btn btn-roles btn-delcustom btn-sm">Del</button>
                            </td>
                        </tr>
                    `)
                });
            }

            function fetchPriceList() {
                var baseUrl = window.location.origin;
                const userToken = $('#user_token').val();
                const branchId = $('#branch_id').val();

                if (userToken != '') {
                    showLoadingCircle();
                    fetchPrescription(baseUrl, branchId, userToken);
                    fetchAction(baseUrl, branchId, userToken);
                    fetchItem(baseUrl, branchId, userToken);
                    hideLoadingCircle();
                }
            }

            function showLoadingCircle() {
                $('#loading_circle').show();
            }

            function hideLoadingCircle() {
                $('#loading_circle').hide();
            }

            function ucFirst(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
       
            $('#table-prescription-add-button').on('click', () => {
                const branchId = $('#branch_id').val();
                window.location.href = window.location.origin + "/admin/branch/price/" + branchId + "/prescription/add" ;
            })

            $('#table-action-add-button').on('click', () => {
                const branchId = $('#branch_id').val();
                window.location.href = window.location.origin + "/admin/branch/price/" + branchId + "/action/add" ;
            })

            function listenDeleteButton()
            {
                $('.trigger-delete').on('click', function() {
                    var baseUrl = window.location.origin;
                    var type = $(this).data('type');
                    var componentId = $(this).data('id');
                    var branchId = $('#branch_id').val();
                    var userToken = $('#user_token').val();
                    
                    const deleteUrl = `${baseUrl}/api/admin/branch/price/${branchId}/${type}/delete/${componentId}`
                    const res = axios.get(deleteUrl, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        }
                    }).then(function (response) {
                        let responseData = response.data.data;
                        if (responseData.status == 'success') {
                            location.reload();
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to delete the data.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                })
            }

            fetchPriceList()
        });
    </script>

</html>