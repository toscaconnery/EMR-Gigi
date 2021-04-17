<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        {{-- <input type="hidden" value="{{$jwtToken}}" id="user_token"> --}}

		@include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb mr-auto">
				<li><a class="active">Patients</a></li>
				<li><a href="{{url('/admin/reports/patient')}}">Patient</a></li>
			</ul>

            <div class="Container-fluid container col md-6">
                <div class="row">
                    <div class="Container col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row ml-auto justify-content-between">
                                    <div class="col-md-7">
                                        <p><strong>Patient Name:</strong> Rudy</p>
                                        <p><strong>Sex:</strong> Male</h4>
                                        <p><strong>Address:</strong> Jln.Kenanga 2B No.06</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Register Date:</strong> 20-January-2021</p>
                                        <p><strong>Age:</strong> 65</p>
                                        <p><strong>Phone:</strong> +6281225425</p>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-end mt-4">
                                    <label for="patients">Date</label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" id="patients" placeholder="From">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" id="patients" placeholder="to">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <a href="#" class="btn create-button">
                                        Download Report
                                    </a>
                                </div>

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Check In</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>1</td>
                                            <td>10 - Apr - 2020</td>
                                            <td><a href="#" class="btn create-button">
                                                MR
                                            </a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>07 - Apr - 2020</td>
                                            <td><a href="#" class="btn create-button">
                                                MR
                                            </a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>05 - Apr - 2020</td>
                                            <td><a href="#" class="btn create-button">
                                                MR
                                            </a></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    @include('admin_layout.sidenav-script')
    @include('admin_layout.footscript')

</html>
