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

            <div class="container-fluid" style="margin-top: -2px;">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30" style="background-color: #c5c5c5">
                            <div class="row">
                                <div class="col-lg-1 pt-15 template" >
                                    Template
                                </div>
                                <div class="col-lg-3 pt-10 pb-10">
                                    <select class="form-control">
                                        <option value="">GENERAL PRACTITIONER</option>
                                    </select>
                                </div>
                                <div class="col-lg-1 pt-10 pl-0">
                                    <button type="button" class="btn btn-success">Choose</button>
                                </div>
                                <div class="col-lg-7 pt-15 template-last-edited">
                                    Last modified : 10 Dec 2019 18:00:52
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="margin-top: 15px;">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-range">
                                    <h4 class="card-reminder"> <i class="fa fa-bell"></i> <b>Reminder</b></h4>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control br-5" placeholder="Type reminder here...">
                                        </div>
                                        <div class="col-lg-1 pl-0">
                                            <button type="button" class="btn btn-blue">Add</button>
                                        </div>
                                        <div class="col-lg-4 mg-t-10 pr-40">
                                            <div class="i-checks pull-right">
                                                <label> <input type="checkbox" class="mr-10" value=""> Hide Others Doctor's Reminder </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
         

            <!-- SOAP -->
            <div class="col-lg-12 mg-b-30">
                <div class="sparkline10-list shadow-reset mg-t-10">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1 style="color:#0c0e96"><b> SOAP</b></h1>
                            <div class="outline-icon">
                                <span style="color: orange;"><u><b>Reset SOAP</b></u></span>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="padding-left: 29px; padding-right: 29px;">
                        <div class="static-table-list">
                            <table class="table border-table tablenormal">
                                <tbody>
                                    <tr>
                                        <div class="row" style="border: 1px solid lightgray;">
                                            <div class="col-lg-12 pt-10">
                                                <div class="inline">
                                                    <h4><b class="required-label">S</b></h4>
                                                </div>
                                            </div>

                                            <div class="col-lg-3" style=" box-sizing: border-box; top: 83px; right: 29px; border-bottom-left-radius: 12px; padding: 10px; padding-left: 20px; border: 1px solid lightgray; z-index: 10; position: absolute;">
                                                <div class="row">
                                                    <div class="col-lg-6 mg-t-10">
                                                        <b>Is pregnant</b>
                                                    </div>
                                                    <div class="bt-df-checkbox col-lg-6">
                                                        <label for="pregnant_no">
                                                            <input class="" type="radio" id="pregnant_no" name="pregnant_status" value="no">
                                                            <span class="ml-10">No</span>
                                                        </label>
                                                        <label for="pregnant_yes" style="margin-left: 15px;">
                                                            <input class="" type="radio"  id="pregnant_yes" name="pregnant_status" value="yes">
                                                            <span class="ml-10">Yes</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 mg-t-10">
                                                        <b>Breast Feeding</b>
                                                    </div>
                                                    <div class="bt-df-checkbox col-lg-6">
                                                        <label for="breast_feeding_no">
                                                            <input class="" type="radio" id="breast_feeding_no" name="breast_feeding_status" value="no">
                                                            <span class="ml-10">No</span>
                                                        </label>
                                                        <label for="breast_feeding_yes" style="margin-left: 15px;">
                                                            <input class="" type="radio"  id="breast_feeding_yes" name="breast_feeding_status" value="yes">
                                                            <span class="ml-10">Yes</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-lg-3">
                                                <div class="thick-label">Chief Complaint:</div>
                                                <div>
                                                    <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="thick-label">Anamnesis:</div>
                                                <div class="row">
                                                    <div style="width: 68%; box-sizing: border-box; margin-left: 16px; margin-bottom: 16px">
                                                        <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize:none" cols="30" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="row" style="border: 1px solid lightgray">
                                            <div class="col-lg-12 pt-10 pb-10">
                                                <div class="inline">
                                                    <h4><b class="required-label">O</b></h4>
                                                </div>
                                                <div>
                                                    <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="row" style="border: 1px solid lightgray">
                                            <div class="col-lg-12">
                                                <div class="inline pt-10 pb-10">
                                                    <h4><b>Vital Sign</b></h4>
                                                    <div class="ml-20">
                                                        <div class="small-form-label">Blood Pressure</div>
                                                        <div class="small-form">
                                                            <input type="text" class=" br-5"> / <input type="text" class="br-5"> mmHg
                                                        </div>
                                                    </div>
                                                    <div class="ml-20">
                                                        <div class="small-form-label">Pulse Rate</div>
                                                        <div class="small-form">
                                                            <input type="text" class="br-5"> X/mnt
                                                        </div>
                                                    </div>
                                                    <div class="ml-20">
                                                        <div class="small-form-label">Respiratory Rate</div>
                                                        <div class="small-form">
                                                            <input type="text" class="br-5"> X/mnt
                                                        </div>
                                                    </div>
                                                    <div class="ml-20">
                                                        <div class="small-form-label">SpO2</div>
                                                        <div class="small-form">
                                                            <input type="text" class="br-5"> %
                                                        </div>
                                                    </div>
                                                    <div class="ml-20">
                                                        <div class="small-form-label">Temperature</div>
                                                        <div class="small-form">
                                                            <input type="text" class="br-5"> °C
                                                        </div>
                                                    </div>
                                                    <div class="ml-20">
                                                        <div class="small-form-label">Weight</div>
                                                        <div class="small-form">
                                                            <input type="text" class="br-5"> kg
                                                        </div>
                                                    </div>
                                                    <div class="ml-20">
                                                        <div class="small-form-label">Height</div>
                                                        <div class="small-form">
                                                            <input type="text" class="br-5"> cm
                                                        </div>
                                                    </div>
                                                    <div class="ml-20">
                                                        <div class="small-form-label">Head Circumference</div>
                                                        <div class="small-form">
                                                            <input type="text" class="br-5"> cm
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="row" style="border: 1px solid lightgray">
                                            <div class="col-lg-12">
                                                <div class="inline pt-10 pb-10">
                                                    <h4><b class="required-label">A</b></h4>
                                                    <div class="ml-20 dark-gray">
                                                        <div class="inline">
                                                            <h4><b>ICD 10</b></h4>
                                                            <div class="small-form">
                                                                <select name="" id="" class="br-5 ml-10" style="width: 180px;">
                                                                    <option value="">ABC</option>
                                                                    <option value="">DEF</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ml-80">
                                                        <span class="btn btn-custon-rounded-three btn-gray f-12 small-tag">HBS</span>
                                                    </div>
                                                    <div class="ml-20">
                                                        <span class="btn btn-custon-rounded-three btn-gray f-12 small-tag">HCS</span>
                                                    </div>
                                                    <div class="ml-20">
                                                        <span class="btn btn-custon-rounded-three btn-gray f-12 small-tag">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                    </div>
                                                    <div class="ml-20">
                                                        <span class="btn btn-custon-rounded-three btn-gray f-12 small-tag">HAD</span>
                                                    </div>
                                                    <div class="ml-20">
                                                        <span class="btn btn-custon-rounded-three btn-gray f-12 small-tag">HCS</span>
                                                    </div>
                                                    <div class="ml-20">
                                                        <span class="btn btn-custon-rounded-three btn-gray f-12 small-tag">RHN</span>
                                                    </div>
                                                    <div class="ml-20">
                                                        <span class="btn btn-custon-rounded-three btn-gray f-12 small-tag">MRS</span>
                                                    </div>
                                                    <div class="ml-20">
                                                        <span class="btn btn-custon-rounded-three btn-gray f-12 small-tag">CV&nbsp;&nbsp;&nbsp;</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="ml-0" style="width: 68%; box-sizing: border-box; margin-left: 16px; margin-bottom: 16px">
                                                    <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize:none" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>


                                    <tr>
                                        <div class="row" style="border: 1px solid lightgray">
                                            <div class="col-lg-12">
                                                <div class="inline pt-10 pb-10">
                                                    <h4><b class="required-label">P</b></h4>
                                                    <div class="ml-20 dark-gray">
                                                        <div class="inline">
                                                            <div class="thick-label">Quick scroll to : </div>
                                                            <span class="btn btn-gray ml-10 scroll-button">Lab/Rad</span>
                                                            <span class="btn btn-gray ml-10 scroll-button">Prescription</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="ml-0" style="width: 68%; box-sizing: border-box; margin-left: 16px; margin-bottom: 16px">
                                                    <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize:none" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="row" style="border: 1px solid lightgray">
                                            <div class="col-lg-12">
                                                <div class="inline pt-10 pb-10">
                                                    <h4><b class="">Procedure Result</b></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="ml-0" style="width: 68%; box-sizing: border-box; margin-left: 16px; margin-bottom: 16px">
                                                    <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize:none" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SOAP -->

            {{--  Allergies, Drugs, And Routine Medication --}}
            <div class="col-lg-9 mg-b-30">
                <div class="sparkline10-list shadow-reset mg-t-10">
                    <div class="sparkline10-graph" style="padding-left: 29px; padding-right: 29px;">
                        <div class="static-table-list">
                            <table class="table border-table tablenormal">
                                <tbody>
                                    <tr>
                                        <div class="row gray-b">
                                            <div class="col-lg-6 pt-10 gray-b">
                                                <div class="inline">
                                                    <div class="thick-label">Laboratory</div>
                                                    <div class="title-dropdown">
                                                        <select name="" id="" class="form-control">
                                                            <option value="">Add item here</option>
                                                            <option value="">ABC</option>
                                                            <option value="">DEF</option>
                                                        </select>
                                                    </div>
                                                    <div style="height: 100px;"></div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 pt-10 gray-b">
                                                <div class="inline">
                                                    <div class="thick-label">Radiology</div>
                                                    <div class="title-dropdown">
                                                        <select name="" id="" class="form-control">
                                                            <option value="">Add item here</option>
                                                            <option value="">ABC</option>
                                                            <option value="">DEF</option>
                                                        </select>
                                                    </div>
                                                    <div style="height: 100px;"></div>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 gray-b pt-10 pb-10">
                                                <div class="thick-label">Others<span class="hint-label"> (Misal: order diagnostik atau order lab/radiology yang tidak ada dalam form</span></div>
                                                <div>
                                                    <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="5" placeholder="Type here..."></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 gray-b pt-10 pb-10">
                                                <div class="thick-label">Clinical diagnosis</div>
                                                <div>
                                                    <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="5" placeholder="Type here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="sparkline10-list shadow-reset mg-t-10">
                    <div class="sparkline10-hd col-lg-6" style="background-color: #c43e32; color: white">
                        <div class="inline">
                            <h4 class=""> <i class="fas fa-virus"></i> <b>Allergies</b></h4>
                            <div class="ml-auto inline header-right-checkbox">
                                <input type="radio" name="has_allergies" id="has_allergies_no">
                                <label for="has_allergies_no">No</label>
                                <input type="radio" name="has_allergies" id="has_allergies_yes" style="margin-left: 10px;">
                                <label for="has_allergies_yes">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline10-hd col-lg-6" style="background-color: #7b88ff; color: white">
                        <div class="inline">
                            <h4 class=""> <i class="fa fa-pills"></i> <b>Current/Routine Medication</b></h4>
                            <div class="ml-auto inline header-right-checkbox">
                                <input type="radio" name="current_medication" id="current_medication_no">
                                <label for="current_medication_no">No</label>
                                <input type="radio" name="current_medication" id="current_medication_yes" style="margin-left: 10px;">
                                <label for="current_medication_yes">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="padding-left: 29px; padding-right: 29px; padding-bottom: 0px;">
                        <div class="static-table-list">
                            <table class="table border-table tablenormal">
                                <tbody>
                                    <tr>
                                        <div class="row p-none ml-n-30 mr-n-30">

                                            <div class="col-lg-6 gray-b p-none">

                                                <div class="col-lg-4 pt-10 pb-10">
                                                    <div class="thick-label">Drugs</div>
                                                    <div>
                                                        <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="3" placeholder="No Drugs Allergy"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 pt-10 pb-10 pl-0">
                                                    <div class="thick-label">Foods</div>
                                                    <div>
                                                        <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="3" placeholder="No Food Allergy"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 pt-10 pb-10 pl-0">
                                                    <div class="thick-label">Others</div>
                                                    <div>
                                                        <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="3" placeholder="No other allergy"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-6 gray-b p-none">
                                                <div class="col-lg-12 pt-10 pb-10">
                                                    <div>
                                                        <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="4" placeholder="No Routine Medication"></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="sparkline10-hd col-lg-3 pb-10" style="background-color: #f88705; color: white">
                        <h4 class=""> <i class="fas fa-prescription"></i> <b>Drugs Prescription</b></h4>
                    </div>
                    <div class="sparkline10-hd col-lg-9 pb-10" style="background-color: #fff; color: white">
                        <div class="i-checks c-black pull-right">
                            <label class="mr-30"><u>Save As Order Set</u></label>
                            <label> <input type="checkbox" class="mr-5">Drugs Outside Formulation </label>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="padding-left: 3px; padding-right: 3px; padding-bottom: 0px;">
                        <div class="static-table-list">
                            <table class="table sparkle-table br-5 f-12">
                                <tr>
                                    <th>Item</th>
                                    <th>Dose</th>
                                    <th>Dose UoM</th>
                                    <th>Frequency</th>
                                    <th>Route</th>
                                    <th>Instruction</th>
                                    <th>Qty</th>
                                    <th>UoM</th>
                                    <th>Iter</th>
                                    <th>Routine</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>ABACAVIR 300MG TAB (DINKES)</td>
                                    <td><input name="" type="text" style="width: 40px"></td>
                                    <td>
                                        <select name="" id="" style="width: 100px">
                                            <option value="">TABLET</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="" style="width: 100px">
                                            <option value="">1 X SEHARI</option>
                                            <option value="">2 X SEHARI</option>
                                            <option value="">3 X SEHARI</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="" style="width: 100px;">
                                            <option value="">ORAL</option>
                                        </select>
                                    </td>
                                    <td><input type="text" value="SESUDAH MAKAN" style="width: 130px"></td>
                                    <td><input type="text" style="width: 40px"></td>
                                    <td><label>TAB</label></td>
                                    <td><input type="text" style="width: 40px"></td>
                                    <td><input type="checkbox"></td>
                                    <td><span class="sparkline11-collapse-close"><i class="fa fa-times"></i></span></td>
                                </tr>
                                <tr>
                                    <td>ABACAVIR 300MG TAB (DINKES)</td>
                                    <td><input name="" type="text" style="width: 40px"></td>
                                    <td>
                                        <select name="" id="" style="width: 100px">
                                            <option value="">TABLET</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="" style="width: 100px">
                                            <option value="">1 X SEHARI</option>
                                            <option value="">2 X SEHARI</option>
                                            <option value="">3 X SEHARI</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="" style="width: 100px;">
                                            <option value="">ORAL</option>
                                        </select>
                                    </td>
                                    <td><input type="text" value="SESUDAH MAKAN" style="width: 130px"></td>
                                    <td><input type="text" style="width: 40px"></td>
                                    <td><label>TAB</label></td>
                                    <td><input type="text" style="width: 40px"></td>
                                    <td><input type="checkbox"></td>
                                    <td><span class="sparkline11-collapse-close"><i class="fa fa-times"></i></span></td>
                                </tr>
                                <tr>
                                    <td>ABACAVIR 300MG TAB (DINKES)</td>
                                    <td><input name="" type="text" style="width: 40px"></td>
                                    <td>
                                        <select name="" id="" style="width: 100px">
                                            <option value="">TABLET</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="" style="width: 100px">
                                            <option value="">1 X SEHARI</option>
                                            <option value="">2 X SEHARI</option>
                                            <option value="">3 X SEHARI</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="" style="width: 100px;">
                                            <option value="">ORAL</option>
                                        </select>
                                    </td>
                                    <td><input type="text" value="SESUDAH MAKAN" style="width: 130px"></td>
                                    <td><input type="text" style="width: 40px"></td>
                                    <td><label>TAB</label></td>
                                    <td><input type="text" style="width: 40px"></td>
                                    <td><input type="checkbox"></td>
                                    <td><span class="sparkline11-collapse-close"><i class="fa fa-times"></i></span></td>
                                </tr>
                            </table>
                            <div>
                                <select name="" id="" class="ml-10 mb-10" style="width: 200px;">
                                    <option value="">Add item here..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="padding-left: 3px; padding-right: 3px; padding-bottom: 0px;">
                        <div class="static-table-list">
                            <table class="table sparkle-table br-5 f-12">
                                <div class="static-table-list">
                                    <div class="col-lg-12 gray-b pt-10 pb-10">
                                        <div class="thick-label">Prescription Notes</div>
                                        <div>
                                            <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="3" placeholder="Type here..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="padding-left: 3px; padding-right: 3px; padding-bottom: 0px;">
                        <div class="static-table-list">
                            <table class="table sparkle-table br-5 f-12">
                                <div class="static-table-list">
                                    <div class="col-lg-12 gray-b pt-10 pb-10">
                                        <div class="thick-label">Pharmacist Notes</div>
                                        <div>
                                            <textarea class="br-5 ta-soft" name="" id="" style="width: 100%; resize: none;" cols="30" rows="3" placeholder="Type here..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Allergies, Drugs, And Routine Medication --}}

            {{-- Frequently Used Drugs --}}
            <div class="col-lg-3 mg-b-30 br-5">
                <div class="sparkline10-list shadow-reset mg-t-10 br-5">
                    <div class="br-5">
                        <table class="table sparkle-table br-5">
                            <tr>
                                <th>Frequently Used Drugs</th>
                            </tr>
                            <tr>
                                <td>CLANEKSI FORTE 250MG/5ML-60ML DRY SYR</td>
                            </tr>
                            <tr>
                                <td>TEMPRA FORTE 250MG/5ML-60ML SYR</td>
                            </tr>
                            <tr>
                                <td>ALOCRAIL PLUS 8ML GEL</td>
                            </tr>
                            <tr>
                                <td>AMOXAN FORTE 250MG/5ML-60ML SYR</td>
                            </tr>
                            <tr>
                                <td>AMOXAN 250MG/5ML-60ML SYR</td>
                            </tr>
                            <tr>
                                <td>OXYFRESH DENTAL 285GRAM GEL</td>
                            </tr>
                            <tr>
                                <td>CEFAT FORTE 250MG/5ML-60ML SYR</td>
                            </tr>
                            <tr>
                                <td>CATAFLAM 5OMG TAB</td>
                            </tr>
                            <tr>
                                <td>CATAFLAM 25MG TAB</td>
                            </tr>
                            <tr>
                                <td>TEMPRA 160MG/5ML-100ML SYR</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="sparkline10-list shadow-reset mg-t-10 br-5">
                    <div class="br-5">
                        <table class="table sparkle-table br-5">
                            <tr>
                                <th>Order set</th>
                            </tr>
                            <tr>
                                <td>CLANEKSI FORTE 250MG/5ML-60ML DRY SYR</td>
                            </tr>
           
                        </table>
                    </div>
                </div>
            </div>
            {{-- Frequently Used Drugs --}}


            
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