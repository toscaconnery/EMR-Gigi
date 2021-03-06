<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="1" id="branch_page">
        @role('superadmin')
            <input type="hidden" value="" id="clinic_id">
        @endrole

		@include('admin_layout.sidenav')

		<div id="main">
			@include('admin_layout.navbar')

            <ul class="breadcrumb mr-auto">
				<li><a class="active">Branch</a></li>
				<li><a href="{{url('/admin/branch/list')}}">List</a></li>
			</ul>

			<div class="container col-lg-12 col-md-6">
				<div class="card ">
					<div class="card-header text-white mb-3" style="background-color: #ff9a76">
						Branch List <span id="hospital_name"></span>
                    </div>
                    <div class="row ml-0 mr-0">
                        <div class="form-group col-md-3 mb-0">
                            <div class="input-group">
                                @role('superadmin')
                                    <select name="" id="clinic_filter" class="form-control">
                                        <option value="" disabled selected>Filter by clinic</option>
                                    </select>
                                @endrole
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" disabled type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control" placeholder="Search branch" id="search">
                            </div>
                        </div>
                        @role('admin')
                            <a href="{{url('/admin/branch/create')}}" class="btn create-button">
                                Add Branch
                            </a>
                        @endrole
                        @role('superadmin')
                            <a href="{{url('/admin/branch/create')}}" class="btn create-button">
                                Add Branch
                            </a>
                        @endrole
                    </div>
					<div class="card-body">
						<table id="tabel-data" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Address</th>
									<th>Phone Number</th>
									<th>Created At</th>
								</tr>
							</thead>
							<tbody>
                                <tr id="branch_placer"></tr>
							</tbody>
						</table>
						<div class="show">
							<p class="page-conf-left">Show</p>
							<div class="input-group page-conf-val">
								<div class="input-group-prepend">
									<select id="branch_limit" name="branch_limit">
                                        <option value="5" selected>5</option>
										<option value="10">10</option>
										<option value="25">25</option>
										<option value="50">50</option>
										<option value="100">100</option>
									</select>
								</div>
							</div>
							<p>entries</p>
                        </div>

                        <div class="show">
                            <ul class="pagination">
                                <li id="pagination_list">
                                </li>
                            </ul>
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
            function fetchBranchList() {
                var baseUrl = window.location.origin;
                const userToken = $('#user_token').val();
                var branchLimit = $('#branch_limit').val();
                var branchPage = $('#branch_page').val();
                let searchValue = $('#search').val();

                var selectedClinic = $('#clinic_id').val();

                if (userToken != '') {
                    showLoadingCircle();

                    clinicId = null
                    if (selectedClinic !== '') {
                        clinicId = selectedClinic
                    }

                    const fetchURL = `${baseUrl}/api/admin/branch/list`;
                    const res = axios.get(fetchURL, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                        params: {
                            'limit': branchLimit,
                            'page': branchPage,
                            'clinicId': clinicId,
                            'search': searchValue
                        }
                    }).then(function (response) {
                        let responseContent = response.data;
                        if (response.data.status == 'success') {
                            if (responseContent.data.hospital !== null) {
                                $('#hospital_name').text(' - ' + responseContent.data.hospital.name);
                            }

                            showData(responseContent.data.branchs, responseContent.data.pagination);
                        } else {
                            hideLoadingCircle();
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to fetch branch.',
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

            function showData(branchList, pagination) {
                let i = (pagination.page * pagination.limit) - pagination.limit + 1;
                $('tbody tr.tr-list').remove();
                var baseUrl = window.location.origin;
                branchList.forEach(function(item) {
                    $('#branch_placer').before(`
                        <tr class="tr-list">
                            <td>${i++}</td>
                            <td><a href="${baseUrl}/admin/branch/detail/${item.id}">${item.name}</a></td>
                            <td>${item.address}</td>
                            <td>${item.phone}</td>
                            <td>${item.created_at}</td>
                        </tr>
                    `)
                });

                handlePagination(pagination);

                hideLoadingCircle();
            }

            function handlePagination(pagination) {
                $('#pagination_list a').remove();

                if (pagination.lastButton > 1) {
                    $('#pagination_list').append(`
                        <a href="#" class="pagination-button" direction="1">First</a>
                    `);
                }

                pagination.index.forEach(function(item) {
                    $('#pagination_list').append(`
                        <a href="#" class="pagination-button" direction="${item}">${item}</a>
                    `);
                });

                if (pagination.lastButton > 1) {
                    $('#pagination_list').append(`
                        <a href="#" class="pagination-button" direction="${pagination.lastButton}">Last</a>
                    `);
                }

                listenPageChange();
            }

            function showLoadingCircle() {
                $('#loading_circle').show();
            }

            function hideLoadingCircle() {
                $('#loading_circle').hide();
            }

            function listenPageChange() {
                $('.pagination-button').on('click', function(e) {
                    let direction = $(this).attr('direction');
                    $('#branch_page').val(direction)
                    fetchBranchList();
                })
            }

            function fetchClinicList() {
                if ($('#clinic_filter').length > 0) {
                    var baseUrl = window.location.origin;
                    const userToken = $('#user_token').val();
                    if (userToken != '') {
                        const fetchURL = `${baseUrl}/api/admin/clinic/list/for-options`;
                        const res = axios.get(fetchURL, {
                            headers: {
                                'Authorization': `Bearer ${userToken}`
                            }
                        }).then(function (response) {
                            if (response.data.status == 'success') {
                                if (response.data.data.hospitals !== null) {
                                    let responseContent = response.data.data.hospitals
                                    var clinicSelect = document.getElementById("clinic_filter")
                                    for (let i = 0; i < responseContent.length; i++) {
                                        var newClinicOption = document.createElement('option');
                                        newClinicOption.text = responseContent[i].name;
                                        newClinicOption.value = responseContent[i].id;
                                        clinicSelect.add(newClinicOption);
                                    }
                                }

                                $('#clinic_filter').on('change', function() {
                                    $('#clinic_id').val(this.value)
                                    fetchBranchList()
                                })
                            }
                        })
                    }
                }
            }
            fetchClinicList()

            var typingTimer;                //timer identifier
            var doneTypingInterval = 1000;  //time in ms, 1 second for example
            var $search = $('#search');
            var $entriesLimit = $('#branch_limit');

            $search.on('keyup', function () {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            });

            $entriesLimit.on('change', () => {
                fetchBranchList();
            });

            $search.on('keydown', function () {
                clearTimeout(typingTimer);
            });

            function doneTyping () {
                fetchBranchList();
            }

            fetchBranchList()
        });
    </script>

</html>
