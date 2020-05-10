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
            @include('layouts/patient-info')
            <!-- Breadcome End-->

            <div class="container-fluid" style="margin-top: 15px;">
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-range">
                                    <h4 class="card-reminder"> <i class="fa fa-bell"></i> <b>Reminder</b></h4>
                                    <p class="no-data"><i class="fas fa-ban"></i> No reminder</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-range">
                                    <h4 class="card-allergies"> <i class="fa fa-virus"></i> <b>Allergies</b></h4>
                                    <p class="no-data"><i class="fas fa-ban"></i> No allergies</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-range">
                                    <h4 class="card-routine-medication"><i class="fas fa-pills"></i> <b>Routine Medication</b></h4>
                                    <p class="no-data"><i class="fas fa-ban"></i> No routine medication</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-range">
                                    <h4 class="card-procedure-result"><i class="fas fa-poll"></i> <b>Procedure Result</b></h4>
                                    <p class="no-data"><i class="fas fa-ban"></i> No procedure result</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
         

            <!-- Patient List start -->
            <div class="col-lg-12 mg-b-30">
                <div class="sparkline10-list shadow-reset mg-t-10">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1 style="color:#7f0c96"><b>5 Latest SOAP</b></h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph">
                        <div class="static-table-list">
                            <table class="table border-table tablenormal">
                                <thead>
                                    <tr style="color: #0202bd">
                                        <th style="width: 12.5%">Date</th>
                                        <th style="width: 12.5%">Doctor</th>
                                        <th style="width: 12.5%">S</th>
                                        <th style="width: 12.5%">O</th>
                                        <th style="width: 12.5%">A</th>
                                        <th style="width: 12.5%">P</th>
                                        <th style="width: 25%">Prescription</th>
                                    </tr>
                                </thead>
                                <?php
                                    $s = [
                                        [
                                            'c_complaint'   => '',
                                            'anamnesis'     => ''
                                        ],
                                        [
                                            'c_complaint'   => 'melanjutkan perawatan',
                                            'anamnesis'     => 'tidak ada keluhan'
                                        ],
                                        [
                                            'c_complaint'   => 'melanjutkan perawatan',
                                            'anamnesis'     => 'tambalan ada yang lepas'
                                        ],
                                        [
                                            'c_complaint'   => 'melanjutkan perawatan',
                                            'anamnesis'     => 'gigi sudah ditambal sementara oleh dokter gigi lain. sudah 2 minggu.'
                                        ],
                                        [
                                            'c_complaint'   => 'melanjutkan perawatan',
                                            'anamnesis'     => 'tidak ada keluhan'
                                        ],
                                        [
                                            'c_complaint'   => 'melanjutkan perawatan',
                                            'anamnesis'     => 'tambalan ada yang lepas'
                                        ],
                                    ]
                                ?>
                                <tbody>
                                    @for ($x = 1; $x <= 5; $x++)
                                    <tr>
                                        <td>
                                            <div><b>07-Jan-2020</b></div>
                                            <div>OPA2001071365</div>
                                            <div>MR: 662565</div>
                                            <div class="support-list-img td-left">
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                            </div>
                                            <br>
                                            <div><b>Created Date</b></div>
                                            <div>07 Jan 2020 17:43:48</div>
                                            <div><b>Modified Date</b></div>
                                            <div>07 Jan 2020 17:43:48</div>
                                        </td>
                                        <td>drg. Monica Santosa, SpKGA</td>
                                        <td>
                                            <div>{{ $s[$x]['c_complaint'] }}</div>
                                            <div>{{ $s[$x]['anamnesis'] }}</div>
                                        </td>
                                        <td>143</td>
                                        <td>143</td>
                                        <td>143</td>
                                        <td>143</td>
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
            {{-- <div class="col-lg-12 mg-b-30">
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
                                        <th style="width: 8%">Time Slot</th>
                                        <th style="width: 5%">Visit No</th>
                                        <th style="width: 17%">Patient Name</th>
                                        <th style="width: 5%"></th>
                                        <th style="width: 7%"></th>
                                        <th style="width: 8%">Age</th>
                                        <th style="width: 4%">Sex</th>
                                        <th style="width: 10%">MR No</th>
                                        <th style="width: 21%">Payer</th>
                                        <th style="width: 7%">Status</th>
                                        <th style="width: 8%">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($x = 1; $x < 5; $x++)
                                    <tr class="tr-green">
                                        <td class="td-mid">00:00 - 00:00</td>
                                        <td>143</td>
                                        <td>Roshid</td>
                                        <td class="td-mid ">
                                            <button type="button" class="btn btn-custon-rounded-four btn-primary btn-sm" disabled>Call</button>
                                        </td>
                                        <td class="td-mid" style="padding-left: 5px;">
                                            <div class="support-list-img td-mid">
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                            </div>
                                        </td>
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
            </div> --}}
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