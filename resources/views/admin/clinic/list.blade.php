<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="1" id="clinic_page">

        @include('admin_layout.sidenav')

		<div id="main">
			@include('admin_layout.navbar')

			<ul class="breadcrumb">
				<h4 class="mr-auto">Clinic</h4>
				<li><a class="active">Clinic</a></li>
				<li><a href="#">List</a></li>
			</ul>

			<div class="container col-lg-12 col md-6">
				<div class="card ">
					<div class="card-header text-white mb-3" style="background-color: #ff9a76">
						Clinic List
					</div>
					<div class="row ml-0 mr-0">
                        <div class="form-group col-md-3 mb-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" disabled type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control" placeholder="Search clinic" id="search">
                            </div>
                        </div>
                        @role('superadmin')
                            <a href="{{url('/admin/clinic/create')}}" class="btn create-button">
                                Add Clinic
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
									<th>Email</th>
									<th>Join Date</th>
									<th>Start Date</th>
								</tr>
							</thead>
							<tbody>
                                <tr id="hospital_placer"></tr>
							</tbody>
						</table>
						<div class="show">
							<p class="page-conf-left">Show</p>
							<div class="input-group page-conf-val">
								<div class="input-group-prepend">
									<select id="clinic_limit" name="clinic_limit">
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
            function fetchClinicList() {
                var baseUrl = window.location.origin;
                const userToken = $('#user_token').val();
                var clinicLimit = $('#clinic_limit').val();
                var clinicPage = $('#clinic_page').val();
                let searchValue = $('#search').val();

                if (userToken != '') {
                    showLoadingCircle();

                    const fetchURL = `${baseUrl}/api/admin/clinic/list`;
                    const res = axios.get(fetchURL, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                        params: {
                            'limit': clinicLimit,
                            'page': clinicPage,
                            'search': searchValue
                        }
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            let responseData = response.data.data;
                            showData(responseData.hospitals, responseData.pagination);
                            if (responseData.hospitals.length === 0) {
                                Swal.fire({
                                icon: 'info',
                                title: 'Clinic is empty.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            }
                        } else {
                            hideLoadingCircle();
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to fetch clinic.',
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

            function showData(hospitalList, pagination) {
                let i = (pagination.page * pagination.limit) - pagination.limit + 1;
                $('tbody tr.tr-list').remove();
                var baseUrl = window.location.origin;
                hospitalList.forEach(function(item) {
                    $('#hospital_placer').before(`
                        <tr class="tr-list">
                            <td>${i++}</td>
                            <td><a href="${baseUrl}/admin/branch/list/${item.id}">${item.name}</a></td>
                            <td>${item.address}</td>
                            <td>+62${item.phone}</td>
                            <td>${item.email}</td>
                            <td>${item.join_date}</td>
                            <td>${item.start_work_date}</td>
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
                    $('#clinic_page').val(direction)
                    fetchClinicList();
                })
            }

            var typingTimer;                //timer identifier
            var doneTypingInterval = 1000;  //time in ms, 1 second for example
            var $search = $('#search');
            var $entriesLimit = $('#clinic_limit');

            $search.on('keyup', function () {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            });

            $entriesLimit.on('change', () => {
                fetchClinicList();
            });

            $search.on('keydown', function () {
                clearTimeout(typingTimer);
            });

            function doneTyping () {
                fetchClinicList();
            }

            fetchClinicList()
        });
    </script>

</html>