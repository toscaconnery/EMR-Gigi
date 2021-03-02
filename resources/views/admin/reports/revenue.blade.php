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
                                        <button type="button" class="btn btn-primary">Add Payment Method</button>
                                    </div>
                                    <div class="col-md-4">
                                        <p><small>Enter your capital here</small></p>
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
                    data: [20, 50, 10, 100, 63, 70],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#000'
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
                    position: 'right'
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
