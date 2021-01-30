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
                <div class="card col-md-12">
                    {{-- <div class="row ml-0 mr-0">
                        <a href="{{url('/admin/clinic/create')}}" class="btn create-button mt-2 mr-0">
                            Add Price
                        </a>
                    </div> --}}
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
                                <th width="300px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="prescription_placer"></tr>
                        </tbody>
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
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tableType).style.display = "block";
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
                console.table('FETCHING ACTION', baseUrl, branchId, userToken)
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
                prescriptionList.forEach(function(item) {
                    $('#prescription_placer').before(`
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

            function showAction(actionList) {
                var base_url = window.location.origin;
                actionList.forEach(function(item) {
                    $('#action_placer').before(`
                        <tr height="45px">
                            <td>${item.name}</td>
                            <td>IDR ${item.price}</td>
                            <td>
                                <button type="button" class="btn btn-roles btn-edtcustom btn-sm">Edit</button>
                                <button type="button" class="btn btn-roles btn-delcustom btn-sm">Del</button>
                            </td>
                        </tr>
                    `)
                });
            }

            function showItem(itemList) {
                var base_url = window.location.origin;
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

            // function showData(hospitalList, pagination) {
            //     let i = (pagination.page * pagination.limit) - pagination.limit + 1;
            //     $('tbody tr.tr-list').remove();
            //     var base_url = window.location.origin;
            //     hospitalList.forEach(function(item) {
            //         $('#hospital_placer').before(`
            //             <tr class="tr-list">
            //                 <td>${i++}</td>
            //                 <td><a href="${base_url}/admin/branch/list/${item.id}">${item.name}</a></td>
            //                 <td>${item.address}</td>
            //                 <td>+62${item.phone}</td>
            //                 <td>${item.email}</td>
            //                 <td>${item.join_date}</td>
            //                 <td>${item.start_work_date}</td>
            //             </tr>
            //         `)
            //     });

            //     // handlePagination(pagination);

            //     // hideLoadingCircle();
            // }

            // function handlePagination(pagination) {
            //     $('#pagination_list a').remove();

            //     if (pagination.lastButton > 1) {
            //         $('#pagination_list').append(`
            //             <a href="#" class="pagination-button" direction="1">First</a>
            //         `);
            //     }

            //     pagination.index.forEach(function(item) {
            //         $('#pagination_list').append(`
            //             <a href="#" class="pagination-button" direction="${item}">${item}</a>
            //         `);
            //     });

            //     if (pagination.lastButton > 1) {
            //         $('#pagination_list').append(`
            //             <a href="#" class="pagination-button" direction="${pagination.lastButton}">Last</a>
            //         `);
            //     }

            //     listenPageChange();
            // }

            // function listenPageChange() {
            //     $('.pagination-button').on('click', function(e) {
            //         let direction = $(this).attr('direction');
            //         $('#clinic_page').val(direction)
            //         fetchClinicList();
            //     })
            // }

            // var typingTimer;                //timer identifier
            // var doneTypingInterval = 1000;  //time in ms, 1 second for example
            // var $search = $('#search');
            // var $entriesLimit = $('#clinic_limit');

            // $search.on('keyup', function () {
            //     clearTimeout(typingTimer);
            //     typingTimer = setTimeout(doneTyping, doneTypingInterval);
            // });

            // $entriesLimit.on('change', () => {
            //     fetchClinicList();
            // });

            //on keydown, clear the countdown 
            // $search.on('keydown', function () {
            //     clearTimeout(typingTimer);
            // });

            //user is "finished typing," do something
            // function doneTyping () {
            //     fetchClinicList();
            // }

            fetchPriceList()
        });
    </script>

</html>