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
         

            <!-- 5 Latest SOAP -->
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
                                        <th style="width: 17.5%">O</th>
                                        <th style="width: 12.5%">A</th>
                                        <th style="width: 12.5%">P</th>
                                        <th style="width: 20%">Prescription</th>
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
                                        <td style="font-size: 13px">
                                            <div class="mb-1">Gigi 22 ada bukal</div>
                                            <div class="mb-05">Vital Sign</div>
                                            <div class="mb-05">Blood Pressure: <span class="data-value">80/120 mmHg</span></div>
                                            <div class="mb-05">Pulse Rate: <span class="data-value">60 X/mnt</span></div>
                                            <div class="mb-05">Respiratory Rate: <span class="data-value">60 X/mnt</span></div>
                                            <div class="mb-05">SpO2: <span class="data-value">80%</span></div>
                                            <div class="mb-05">Temperature: <span class="data-value">28°C</span></div>
                                            <div class="mb-05">Weight: <span class="data-value">78kg</span></div>
                                            <div class="mb-05">Height: <span class="data-value">170cm</span></div>
                                            <div class="mb-05">Head Circumference: <span class="data-value">40cm</span></div>
                                        </td>
                                        <td>
                                            <div>75: GP</div>
                                            <div>85: GP + abses</div>
                                        </td>
                                        <td>
                                            <div>75 pengisian +GIC</div>
                                            <div>85: Fc+ts</div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 5 Latest SOAP -->

            <!-- Admission History -->
            <div class="col-lg-12 mg-b-30">
                <div class="sparkline10-list shadow-reset mg-t-10">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <div class="inline">

                                <h1 style="color:#F29200"><b><i class="fas fa-calendar-alt"></i> Admission History</b></h1>
                                <div class="admission-history-year">
                                    <div class="inline" style="padding: 4px;">
                                        <button class="col-lg-2 ah-year ah-year-edge"><</button>
                                        <div id="selected-admission-history-year" class="col-lg-8 ah-year" style="width: 100px;">2020</div>
                                        <button class="col-lg-2 ah-year ah-year-edge">></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="padding: 0;">
                        <div class="static-table-list">
                            <table class="table border-table tablenormal">
                                <thead>
                                    <tr style="color: #0202bd">
                                        <th class="admission-history-head">Specialities</th>
                                        <th class="admission-history-head" colspan="4">January</th>
                                        <th class="admission-history-head" colspan="4">February</th>
                                        <th class="admission-history-head" colspan="4">March</th>
                                        <th class="admission-history-head" colspan="4">April</th>
                                        <th class="admission-history-head" colspan="4">May</th>
                                        <th class="admission-history-head" colspan="4">June</th>
                                        <th class="admission-history-head" colspan="4">July</th>
                                        <th class="admission-history-head" colspan="4">August</th>
                                        <th class="admission-history-head" colspan="4">September</th>
                                        <th class="admission-history-head" colspan="4">October</th>
                                        <th class="admission-history-head" colspan="4">November</th>
                                        <th class="admission-history-head" colspan="4">December</th>
                                    </tr>
                                </thead>
                        
                                <tbody>
                                    <tr>
                                        <td class="center-horizon"><b>OPD</b></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                    </tr>
                                    @for ($x = 1; $x <= 5; $x++)
                                        <tr style="height: 20px;">
                                            <td class="admission-history-spec">Dentistry</td>

                                            {{-- January --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- February --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- March --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- April --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- May --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- June --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- July --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- August --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- September --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- October --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- November --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            {{-- December --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Admission History -->

            
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