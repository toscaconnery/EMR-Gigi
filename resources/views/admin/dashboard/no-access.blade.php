<!DOCTYPE html>
<html>
    @include('admin_layout.head')
    <body>
		@include('admin_layout.sidenav')

        <div id="main">
            @include('admin_layout.navbar')

            <ul class="breadcrumb">
                <h4 class="mr-auto">Dashboard</h4>
                <li><a class="active">Admin</a></li>
                <li><a href="#">Dashboard</a></li>
            </ul>

            <div class="Container-fluid container col md-6">
                <div class="row">
                    <div class="Container col-12">
                        <div class="card">
                            <div class="card-header mb-1">
                                Admin Dashboard
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="ava">
                                        <h1 style="text-align: center">We couldn't display this page to you</h1>
                                        <img src="{{getasset('image/logo-square.png')}}" class="mx-auto d-block"  style="width: 150px; height: 150px; border-radius: 50%; margin-right: 25px; margin-bottom: 10px;">
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
        $(document).ready(function(){

        });
    </script>

</html>