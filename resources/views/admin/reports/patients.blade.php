<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        {{-- <input type="hidden" value="{{$jwtToken}}" id="user_token"> --}}

		@include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb mr-auto">
				<li><a class="active">Report</a></li>
				<li><a href="{{url('/admin/reports/patients')}}">Patients</a></li>
			</ul>


            <div class="Container-fluid container col md-6">
                <div class="row">
                    <div class="Container col-12">
                        <div class="card">
                            <div class="card-header mb-1">
                                Report Patients( EMR )
                            </div>
                            <div class="card-body">

                                <div class="container">
                                    <div class="row ml-auto mr-auto justify-content-between">
                                        <div class="col-md-2 box">
                                            <h3>80</h3>
                                            <h4>Patients</h4>
                                            <p>This year</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>80</h3>
                                            <h4>Patients</h4>
                                            <p>This month</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>80</h3>
                                            <h4>Patients</h4>
                                            <p>This week</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>80</h3>
                                            <h4>Patients</h4>
                                            <p>Today</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>100</h3>
                                            <h4>Patients</h4>
                                            <p>Register</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>500</h3>
                                            <h4>Patients</h4>
                                            <p>Check In</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>100</h3>
                                            <h4>Patients</h4>
                                            <p>Submit</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>80</h3>
                                            <h4>Patients</h4>
                                            <p>Cancel</p>
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-end mt-4">
                                        <label for="patients">Date:</label>
                                        <div class="col-md-3">
                                            <input type="date" class="form-control" id="patients" placeholder="From">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" class="form-control" id="patients" placeholder="to">
                                        </div>
                                    </div>

                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Patients</th>
                                                <th scope="col">Last Check In</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>05 - Apr - 2020</td>
                                                <td><button type="button" class="btn btn-primary">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Jacob</td>
                                                <td>05 - Apr - 2020</td>
                                                <td><button type="button" class="btn btn-primary">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Fredd</td>
                                                <td>05 - Apr - 2020</td>
                                                <td><button type="button" class="btn btn-primary">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

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
