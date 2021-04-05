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
				<li><a class="active">Role</a></li>
				<li><a href="{{url('/admin/role/list')}}">List</a></li>
			</ul>

			<div class="container col-lg-12 col md-6">
				<div class="card ">
					<div class="card-header text-white mb-3" style="background-color: #ff9a76">
						Role List
					</div>
                    <div class="m-3" style="font-style: italic; color: gray;">These roles are tied to system code. You can only view the roles.</div>
					<div class="card-body">
						<table id="tabel-data" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th style="width: 30px">No</th>
									<th>Name</th>
								</tr>
							</thead>
							<tbody>
                                <tr id="role_placer"></tr>
							</tbody>
						</table>
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
            function fetchRoleList() {
                var baseUrl = window.location.origin;
                const userToken = $('#user_token').val();

                if (userToken != '') {
                    showLoadingCircle();

                    const fetchURL = `${baseUrl}/api/admin/role/list`;
                    const res = axios.get(fetchURL, {
                        headers: {
                            'Authorization': `Bearer ${userToken}`
                        },
                    }).then(function (response) {
                        if (response.data.status == 'success') {
                            showData(response.data.data.roles);
                        } else {
                            hideLoadingCircle();
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to fetch role.',
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

            function showData(dataList) {
                $('tbody tr.tr-list').remove();
                let i = 1
                dataList.forEach(function(item) {
                    $('#role_placer').before(`
                        <tr class="tr-list">
                            <td>${i++}</td>
                            <td>${item.name}</td>
                        </tr>
                    `)
                });

                hideLoadingCircle();
            }

            function showLoadingCircle() {
                $('#loading_circle').show();
            }

            function hideLoadingCircle() {
                $('#loading_circle').hide();
            }

            fetchRoleList()
        });
    </script>

</html>