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

            <div class="pull-right">
                <div class="sparkline10-list">
                    <div class="col-lg-1" style="margin-top: 20px; height: 50px;">
                        <select name="" id="" class="form-control" style="width: 200px">
                            <option value="">-- All Items --</option>
                            <option value="">GHIJKL</option>
                        </select>
                    </div>
                </div>
            </div>

            @for ($tableIndex = 1; $tableIndex < 3; $tableIndex++)
            <div class="col-lg-12 mg-b-15">
                <div class="sparkline10-list shadow-reset mg-t-10">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1><b>Sun, 21 Jun 2019</b></h1>
                            <span class="f-12">OPA1906230078 | dr. Michael, SpTHT | FULLERTON HEALTH INDONESIA</span>
                        </div>
                    </div>
                    <div class="sparkline10-graph">
                        <div class="static-table-list">
                            <table class="table border-table f-12" style="border-radius: 14px; border-collapse: unset;">
                                <thead>
                                    <tr>
                                        <td colspan="12" class="f-16"><b>Drug Prescription</b></td>
                                    </tr>
                                    <tr>
                                        <th class="bo-r" style="width: 8%;">Organization</th>
                                        <th class="bo-r bo-l" style="width: 10%">Transac. Date</th>
                                        <th class="bo-r bo-l" style="width: 22%">Item</th>
                                        <th class="bo-r bo-l" style="width: 5%">Dose</th>
                                        <th class="bo-r bo-l" style="width: 7%">Dose UOM</th>
                                        <th class="bo-r bo-l" style="width: 9%">Frequency</th>
                                        <th class="bo-r bo-l" style="width: 6%">Route</th>
                                        <th class="bo-r bo-l" style="width: 13%">Instruction</th>
                                        <th class="bo-r bo-l" style="width: 5%">R/Qty</th>
                                        <th class="bo-r bo-l" style="width: 5%">U.O.M</th>
                                        <th class="bo-r bo-l" style="width: 5%">Iter</th>
                                        <th class="bo-l" style="width: 5%;">Routine</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($x = 1; $x < 10; $x++)
                                    <tr>
                                        <td class="bo-r">SHLV</td>
                                        <td class="bo-l bo-r">20 Apr 2020</td>
                                        <td class="bo-l bo-r">MONARIN 10MG TAB</td>
                                        <td class="bo-l bo-r">1</td>
                                        <td class="bo-l bo-r">TABLET</td>
                                        <td class="bo-l bo-r">1 X SEHARI</td>
                                        <td class="bo-l bo-r">ORAL</td>
                                        <td class="bo-l bo-r">SETELAH MAKAN</td>
                                        <td class="bo-l bo-r">20</td>
                                        <td class="bo-l bo-r">TAB</td>
                                        <td class="bo-l bo-r">0</td>
                                        <td class="bo-l">NO</td>
                                    </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endfor

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