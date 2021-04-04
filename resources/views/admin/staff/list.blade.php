<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        <input type="hidden" value="{{$jwtToken}}" id="user_token">
        <input type="hidden" value="1" id="data_page">

        @include('admin_layout.sidenav')

		<div id="main">
			@include('admin_layout.navbar')

			<ul class="breadcrumb mr-auto">
				<li><a class="active">Staff</a></li>
				<li><a href="{{url('/admin/staff/list')}}">List</a></li>
			</ul>

			<div class="container col-lg-12 col md-6">
				<div class="card ">
					<div class="card-header text-white mb-3" style="background-color: #ff9a76">
						Staff List
					</div>
					<div class="row ml-0 mr-0">
                        <div class="form-group col-md-3 mb-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" disabled type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control" placeholder="Search staff" id="search">
                            </div>
                        </div>
                        @role('admin')
                            <a href="{{url('/admin/staff/create')}}" class="btn create-button">
                                Add Staff
                            </a>
                        @endrole
                        @role('superadmin')
                            <a href="{{url('/admin/staff/create')}}" class="btn create-button">
                                Add Staff
                            </a>
                        @endrole
                    </div>
					<div class="card-body">
						<table id="tabel-data" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
                                    <th>Branch</th>
									<th>Email</th>
									<th>Phone Number</th>
									<th>Gender</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                <tr id="staff_placer"></tr>
							</tbody>
						</table>
						<div class="show">
							<p class="page-conf-left">Show</p>
							<div class="input-group page-conf-val">
								<div class="input-group-prepend">
									<select id="data_limit" name="data_limit">
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
            function listenEditButton() {
                $('.edit-button').on('click', function() {
                    let staffId = $(this).data('user-id')
                    let staffData = {
                        staffId
                    }
                    var baseUrl = window.location.origin
                    const userToken = $('#user_token').val()
                    const editURL = `${baseUrl}/admin/staff/edit/${staffId}`
                    window.location.href = editURL
                })
            }

            function listenDeleteButton() {
                $('.delete-button').on('click', function() {
                    let staffId = $(this).data('user-id')
                    let staffData = {
                        staffId
                    }
                    var baseUrl = window.location.origin
                    const userToken = $('#user_token').val()
                    const deleteURL = `${baseUrl}/api/admin/staff/delete/`
                    const res = axios.post(deleteURL, staffData, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Staff deleted.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            window.location.href = window.location.origin + "/admin/staff/list"
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to delete staff.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })
                })
            }

            function fetchStaffList() {
                var baseUrl = window.location.origin
                const userToken = $('#user_token').val()
                var dataLimit = $('#data_limit').val()
                var dataPage = $('#data_page').val()
                let searchValue = $('#search').val()

                if (userToken != '') {
                    showLoadingCircle()

                    const fetchURL = `${baseUrl}/api/admin/staff/list`
                    const res = axios.get(fetchURL, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                        params: {
                            'limit': dataLimit,
                            'page': dataPage,
                            'search': searchValue
                        }
                    }).then(function (response) {
                        if (response.data.status === 'success') {
                            showData(response.data.data.staffs, response.data.data.pagination)
                        } else {
                            hideLoadingCircle()
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to fetch staff.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })
                } else {
                    hideLoadingCircle()
                    Swal.fire({
                        icon: 'warning',
                        title: 'You are not logged in',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            }

            function showData(dataList, pagination) {
                let i = (pagination.page * pagination.limit) - pagination.limit + 1
                $('tbody tr.tr-list').remove()
                var baseUrl = window.location.origin
                dataList.forEach(function(item) {
                    let gender = ''
                    if (item.gender === 'm') {
                        gender = 'Male'
                    } else {
                        gender = 'Female'
                    }
                    $('#staff_placer').before(`
                        <tr class="tr-list">
                            <td>${i++}</td>
                            <td><a href="${baseUrl}/admin/staff/detail/${item.id}">${item.name}</a></td>
                            <td>${item.work_branch.name}</td>
                            <td>${item.email}</td>
                            <td>+62${item.phone}</td>
                            <td>${gender}</td>
                            <td>
                                <button class="btn btn-primary edit-button" data-user-id="${item.id}"><i class="fas fa-wrench" style="padding: 0;"></i></button>
                                <button class="btn btn-primary delete-button" data-user-id="${item.id}"><i class="fas fa-trash-alt" style="padding: 0;"></i></button>
                            </td>
                        </tr>
                    `)
                })

                handlePagination(pagination)

                hideLoadingCircle()

                listenDeleteButton()
                
                listenEditButton()
            }

            function handlePagination(pagination) {
                $('#pagination_list a').remove()

                if (pagination.lastButton > 1) {
                    $('#pagination_list').append(`
                        <a href="#" class="pagination-button" direction="1">First</a>
                    `)
                }

                pagination.index.forEach(function(item) {
                    $('#pagination_list').append(`
                        <a href="#" class="pagination-button" direction="${item}">${item}</a>
                    `)
                })

                if (pagination.lastButton > 1) {
                    $('#pagination_list').append(`
                        <a href="#" class="pagination-button" direction="${pagination.lastButton}">Last</a>
                    `)
                }

                listenPageChange()
            }

            function showLoadingCircle() {
                $('#loading_circle').show()
            }

            function hideLoadingCircle() {
                $('#loading_circle').hide()
            }

            function listenPageChange() {
                $('.pagination-button').on('click', function(e) {
                    let direction = $(this).attr('direction')
                    $('#data_page').val(direction)
                    fetchStaffList()
                })
            }

            var typingTimer                 //timer identifier
            var doneTypingInterval = 1000   //time in ms, 1 second for example
            var $search = $('#search')
            var $entriesLimit = $('#data_limit')

            $search.on('keyup', function () {
                clearTimeout(typingTimer)
                typingTimer = setTimeout(doneTyping, doneTypingInterval)
            })

            $entriesLimit.on('change', () => {
                fetchStaffList()
            })

            //on keydown, clear the countdown 
            $search.on('keydown', function () {
                clearTimeout(typingTimer)
            })

            //user is "finished typing," do something
            function doneTyping () {
                fetchStaffList()
            }

            fetchStaffList()
        })
    </script>

</html>