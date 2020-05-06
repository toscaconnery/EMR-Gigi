<!doctype html>
<html class="no-js" lang="en">

@include('layouts.head')

<body class="materialdesign">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Header top area start-->
    <div class="wrapper-pro">
        @include('layouts/sidebar') 
        
        
        <div class="content-inner-all">
            <!-- Header top area start-->
            @include('layouts/header')
            <!-- Header top area end-->
    
            <!-- Breadcome start-->
            @include('layouts/filter-info')
            <!-- Breadcome End-->

            
            <div class="pull-right">
                <div class="sparkline10-list">
                    <div class="row" style="width: 268px;">

                        <div class="col-lg-1" style="height: 30px; margin-right: 6px;">
                            <ul class="pagination" style="width: 40px; max-widht: 40px;">
                                <li class="page-pre"><a href="#">‹</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3" style="height: 30px;">
                            <ul class="pagination" style="width: 40px; max-widht: 40px; margin-right: 150px;">
                                <li class="page-number">
                                    <div class="form-group data-custon-pick" id="data_1" style="width: 100px; display:inline;" >
                                        <div class="input-group date" style="margin-right: 0px; width:150px;">
                                            <input type="text" class="form-control" value="10/04/2018">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-1" style="margin-left: 90px; height: 50px;">
                            <ul class="pagination" style="width: 40px; max-widht: 40px;">
                                <li class="number"><a href="#">›</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
         

            <!-- Patient List start -->
            <div class="col-lg-12">
                <div class="sparkline10-list shadow-reset mg-t-10">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1>PATIENT LIST</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph">
                        <div class="static-table-list">
                            <table class="table border-table tablenormal">
                                <thead>
                                    <tr>
                                        <th style="width: 7%">Time Slot</th>
                                        <th style="width: 5%">Visit No</th>
                                        <th style="width: 21%">Patient Name</th>
                                        <th style="width: 5%"></th>
                                        <th style="width: 5%"></th>
                                        <th style="width: 8%">Age</th>
                                        <th style="width: 4%">Sex</th>
                                        <th style="width: 10%">MR No</th>
                                        <th style="width: 21%">Payer</th>
                                        <th style="width: 7%">Status</th>
                                        <th style="width: 7%">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($x = 1; $x < 5; $x++)
                                    <tr>
                                        <td class="td-mid">00:00 - 00:00</td>
                                        <td>143</td>
                                        <td>Roshid</td>
                                        <td class="td-mid">smting</td>
                                        <td class="td-mid">smting</td>
                                        <td class="td-mid">19Y 11M 22D</td>
                                        <td class="td-mid">F</td>
                                        <td>LCODESS</td>
                                        <td>ADM-ASURANSI SOMPO JAPAN NIPPONKOA INDONESIA</td>
                                        <td>Submit</td>
                                        <td class="td-mid">00:00 - 00:00</td>
                                    </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Patient List end -->

            <!-- Submited Patient start -->
            <div class="col-lg-12 mg-b-30">
                <div class="sparkline10-list shadow-reset mg-t-30">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1>SUBMITTED PATIENT</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph">
                        <div class="static-table-list">
                            <table class="table border-table tablenormal">
                                <thead>
                                    <tr>
                                        <th style="width: 7%">Time Slot</th>
                                        <th style="width: 5%">Visit No</th>
                                        <th style="width: 21%">Patient Name</th>
                                        <th style="width: 5%"></th>
                                        <th style="width: 5%"></th>
                                        <th style="width: 8%">Age</th>
                                        <th style="width: 4%">Sex</th>
                                        <th style="width: 10%">MR No</th>
                                        <th style="width: 21%">Payer</th>
                                        <th style="width: 7%">Status</th>
                                        <th style="width: 7%">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($x = 1; $x < 5; $x++)
                                    <tr class="tr-green">
                                        <td class="td-mid">00:00 - 00:00</td>
                                        <td>143</td>
                                        <td>Roshid</td>
                                        <td class="td-mid">smting</td>
                                        <td class="td-mid">smting</td>
                                        <td class="td-mid">19Y 11M 22D</td>
                                        <td class="td-mid">F</td>
                                        <td>LCODESS</td>
                                        <td>ADM-ASURANSI SOMPO JAPAN NIPPONKOA INDONESIA</td>
                                        <td>Submit</td>
                                        <td class="td-mid">00:00 - 00:00</td>
                                    </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Submited Patient end -->
            
            <div class="feed-mesage-project-area">
                <div class="container-fluid">
                    <div class="row">
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    @include('layouts/footer') 

    @include('layouts/footscript')

</body>

</html>