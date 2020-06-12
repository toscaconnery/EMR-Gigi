<!doctype html>
<html class="no-js" lang="en">

@include('layouts.head')

<body class="materialdesign">
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

            <div class="col-lg-12 mg-t-15">
                <div class="sparkline10-list shadow-reset mg-t-10">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1><b>Sun, 21 Jun 2019</b></h1>
                            <span class="f-12">OPA1906230078 | dr. Michael, SpTHT | FULLERTON HEALTH INDONESIA</span>
                            <div class="outline-icon inline">
                                <div class="form-group data-custon-pick mt-6 ml-10">
                                    <select name="" id="" class="form-control" style="width: 200px">
                                        <option value="">-- All Items --</option>
                                        <option value="">GHIJKL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline10-graph">
                        <div class="static-table-list">
                            <table class="table border-table tablenormal">
                                <thead>
                                    <tr>
                                        <th style="width: 8%">XXXXXX</th>
                                        <th style="width: 10%">XXXX Date</th>
                                        <th style="width: 22%">Item</th>
                                        <th style="width: 5%">Dose</th>
                                        <th style="width: 6%">Dose UOM</th>
                                        <th style="width: 10%">Frequency</th>
                                        <th style="width: 6%">Route</th>
                                        <th style="width: 13%">Instruction</th>
                                        <th style="width: 5%">R/Qty</th>
                                        <th style="width: 5%">U.O.M</th>
                                        <th style="width: 5%">Iter</th>
                                        <th style="width: 5%">Routine</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($x = 1; $x < 10; $x++)
                                    <tr>
                                        <td>SHLV</td>
                                        <td>20 Apr 2020</td>
                                        <td>MONARIN 10MG TAB</td>
                                        <td>1</td>
                                        <td>TABLET</td>
                                        <td>1 X SEHARI</td>
                                        <td>ORAL</td>
                                        <td>SETELAH MAKAN</td>
                                        <td>20</td>
                                        <td>TAB</td>
                                        <td>0</td>
                                        <td>NO</td>
                                    </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

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