<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
        {{-- <input type="hidden" value="{{$jwtToken}}" id="user_token"> --}}

		@include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Revenue</h4>
                <li><a class="active">Report</a></li>
                <li><a href="#">Revenue</a></li>
            </ul>

            <div class="Container-fluid container col md-6">
                <div class="row">
                    <div class="Container col-12">
                        <div class="card">
                            <div class="card-header mb-1">
                                Report Revenue
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Payment Method</button>

                                          <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                ...
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group row">
                                            <label for="typeNumber" class="col-form-label"><small>Enter your capital here</small></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="typeNumber" placeholder="e.g Rp500.000">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-2 box">
                                            <h3>IDR 1000</h3>
                                            <p>This year</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>IDR 500</h3>
                                            <p>This month</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>IDR 100</h3>
                                            <p>This week</p>
                                        </div>
                                        <div class="col-md-2 box">
                                            <h3>IDR 80</h3>
                                            <p>Today</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10">
                                            <canvas id="myChart" height="40vh" width="80vw"></canvas>
                                        </div>
                                    </div>
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

    <script>


            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'March', 'April', 'Mai', 'June'],
                    datasets: [{
                        label: 'Revenue',
                        data: [20, 30, 35, 40, 70, 100],
                        backgroundColor: [
                            'rgba(8, 144, 248, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1,
                        hoverBorderWidth: 2,
                        hoverBorderColor: 'tomato'
                    },
                    {
                        label: 'New Chart',
                        data: [30, 20, 55, 80, 73, 80],
                        backgroundColor: [
                            'rgba(8, 248, 16, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1,
                        hoverBorderWidth: 2,
                        hoverBorderColor: 'tomato'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend:{
                        align: 'end',
                    },
                    layout:{
                        padding:{
                            top:30,
                        }
                    }
                }
            });

    </script>

</html>
