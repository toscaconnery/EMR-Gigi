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

            <div class="container-fluid" style="margin-top: -2px;">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30" style="background-color: #c5c5c5">
                            <div class="inline">
                                <div class="pt-10 pl-30 pb-10">
                                    <button type="button" class="btn btn-light-gray">Electronic MR</button>
                                </div>
                                <div class="pt-10 pl-10">
                                    <button type="button" class="btn btn-light-gray">Other Unit MR</button>
                                </div>
                                <div class="pt-10 pl-10">
                                    <button type="button" class="btn btn-light-gray">Scanned MR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mg-t-15">
                <div class="sparkline10-list shadow-reset mg-t-10">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1>PATIENT HISTORY</h1>
                            <div class="outline-icon inline">
                                <label class="mr-10">Filter : </label>
                                <div class="form-group data-custon-pick mt-n-5" id="data_1">
                                    <div class="input-group date">
                                        <span class="input-group-addon" style="display: none"></span>
                                        <input type="text" class="form-control" value="10/04/2018" style="width: 100px;">
                                    </div>
                                </div>
                                <label class="mr-10 ml-10"> - </label>
                                <div class="form-group data-custon-pick mt-n-5" id="data_1">
                                    <div class="input-group date">
                                        <span class="input-group-addon" style="display: none"></span>
                                        <input type="text" class="form-control" value="10/04/2018" style="width: 100px;">
                                    </div>
                                </div>
                                <div class="form-group data-custon-pick mt-n-5 ml-10">
                                    <select name="" id="" class="form-control" style="width: 200px">
                                        <option value="">All</option>
                                        <option value="">GHIJKL</option>
                                    </select>
                                </div>
                                <div class="form-group data-custon-pick mt-n-5 ml-10">
                                    <select name="" id="" class="form-control" style="width: 200px">
                                        <option value="">Dokter</option>
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
                                        <th style="width: 10%">Admisi</th>
                                        <th style="width: 10%">Dokter</th>
                                        <th style="width: 15%">S</th>
                                        <th style="width: 15%">O</th>
                                        <th style="width: 15%">A</th>
                                        <th style="width: 15%">P</th>
                                        <th style="width: 20%">Obat & Alkes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($x = 1; $x < 10; $x++)
                                    <tr>
                                        <td>
                                            <div><b>10 Dec 2019</b></div>
                                            <div class="f-12">OPA1912101085</div>
                                            <div class="f-12"><b>Tanggal dibuat</b></div>
                                            <div class="f-12">10 Dec 2019</div>
                                            <div class="f-12">18:51:58</div>
                                            <div class="f-12"><b>Terakhir diubah</b></div>
                                            <div class="f-12">10 Dec 2019</div>
                                            <div class="f-12">18:51:58</div>
                                            <div class="support-list-img td-mid">
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                                <a href="#"><img src="theme/img/notification/1.jpg" alt="">
                                                </a>
                                            </div>
                                        </td>
                                        <td>drg. Monica Santosa, SpKGA</td>
                                        <td>ingin cek gigi <br> gigi ada yg tumbuh keatas</td>
                                        <td>
                                            <div>gigi 22 ada bukal</div>
                                            <div class="mt-10 pt-10">TTV</div>
                                            <div>Tekanan darah: -/- mmHg</div>
                                            <div>Nadi: - x/mnt</div>
                                            <div>Pernapasan: - x/mnt</div>
                                            <div>SpO2: -%</div>
                                            <div>Suhu: -°C</div>
                                            <div>Berat badan: - kg</div>
                                            <div>Tinggi badan: - cm</div>
                                            <div>Lingkar kepala: - cm</div>
                                        </td>
                                        <td>22 bukoversi</td>
                                        <td>22 observasi</td>
                                        <td></td>
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