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
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    {{-- <div class="col-lg-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                                                <input type="text" placeholder="Search..." class="form-control">
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6">
                                        <div class="form-group-inner">
                                            <div class="row">
                                                {{-- <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
                                                    <label class="login2 pull-right pull-right-pro">Default Radio</label>
                                                </div> --}}
                                                <div class="col-lg-9 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="bt-df-checkbox">
                                                        <label for="radio-opd" class="mr-10">
                                                            <input class="pull-left radio-checked" type="radio" id="radio-opd" name="pasien-list-status">
                                                            OPD
                                                        </label>
                                                        <label for="radio-ed" class="mr-10">
                                                            <input class="pull-left" type="radio"  id="radio-ed" name="pasien-list-status">
                                                            ED
                                                        </label>
                                                        <label for="radio-opd" class="mr-10">
                                                            <input class="pull-left" type="radio" id="radio-ipd" name="pasien-list-status">
                                                            IPD
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard 2</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="dashboard.html">Dashboard v.1</a>
                                                </li>
                                                <li><a href="dashboard-2.html">Dashboard v.2</a>
                                                </li>
                                                <li><a href="analytics.html">Analytics</a>
                                                </li>
                                                <li><a href="widgets.html">Widgets</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="inbox.html">Inbox</a>
                                                </li>
                                                <li><a href="view-mail.html">View Mail</a>
                                                </li>
                                                <li><a href="compose-mail.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a href="profile.html">Profile</a>
                                                </li>
                                                <li><a href="contact-client.html">Contact Client</a>
                                                </li>
                                                <li><a href="contact-client-v.1.html">Contact Client v.1</a>
                                                </li>
                                                <li><a href="project-list.html">Project List</a>
                                                </li>
                                                <li><a href="project-details.html">Project Details</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="google-map.html">Google Map</a>
                                                </li>
                                                <li><a href="data-maps.html">Data Maps</a>
                                                </li>
                                                <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                                </li>
                                                <li><a href="x-editable.html">X-Editable</a>
                                                </li>
                                                <li><a href="code-editor.html">Code Editor</a>
                                                </li>
                                                <li><a href="tree-view.html">Tree View</a>
                                                </li>
                                                <li><a href="preloader.html">Preloader</a>
                                                </li>
                                                <li><a href="images-cropper.html">Images Cropper</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="bar-charts.html">Bar Charts</a>
                                                </li>
                                                <li><a href="line-charts.html">Line Charts</a>
                                                </li>
                                                <li><a href="area-charts.html">Area Charts</a>
                                                </li>
                                                <li><a href="rounded-chart.html">Rounded Charts</a>
                                                </li>
                                                <li><a href="c3.html">C3 Charts</a>
                                                </li>
                                                <li><a href="sparkline.html">Sparkline Charts</a>
                                                </li>
                                                <li><a href="peity.html">Peity Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="login.html">Login</a>
                                                </li>
                                                <li><a href="register.html">Register</a>
                                                </li>
                                                <li><a href="captcha.html">Captcha</a>
                                                </li>
                                                <li><a href="checkout.html">Checkout</a>
                                                </li>
                                                <li><a href="contact.html">Contacts</a>
                                                </li>
                                                <li><a href="review.html">Review</a>
                                                </li>
                                                <li><a href="order.html">Order</a>
                                                </li>
                                                <li><a href="comment.html">Comment</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <!-- Breadcome start-->
            <div class="breadcome-area des-none mg-b-30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                                                <input type="text" placeholder="Search..." class="form-control">
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- income order visit user Start -->
            <div class="income-order-visit-user-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Income</h2>
                                        <div class="main-income-phara">
                                            <p>Monthly</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span>$</span><span class="counter">60888200</span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline1"></span>
                                        </div>
                                    </div>
                                    <div class="income-range">
                                        <p>Total income</p>
                                        <span class="income-percentange">98% <i class="fa fa-bolt"></i></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Orders</h2>
                                        <div class="main-income-phara order-cl">
                                            <p>Annual</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter">72320</span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline6"></span>
                                        </div>
                                    </div>
                                    <div class="income-range order-cl">
                                        <p>New Orders</p>
                                        <span class="income-percentange">66% <i class="fa fa-level-up"></i></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Visitor</h2>
                                        <div class="main-income-phara visitor-cl">
                                            <p>Today</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter">888200</span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline2"></span>
                                        </div>
                                    </div>
                                    <div class="income-range visitor-cl">
                                        <p>New Visitor</p>
                                        <span class="income-percentange">55% <i class="fa fa-level-up"></i></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>User activity</h2>
                                        <div class="main-income-phara low-value-cl">
                                            <p>Low Value</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter">888200</span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline5"></span>
                                        </div>
                                    </div>
                                    <div class="income-range low-value-cl">
                                        <p>In first month</p>
                                        <span class="income-percentange">33% <i class="fa fa-level-down"></i></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- income order visit user End -->
            <div class="dashtwo-order-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashtwo-order-list shadow-reset">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="flot-chart flot-chart-dashtwo">
                                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="skill-content-3">
                                            <div class="skill">
                                                <div class="progress">
                                                    <div class="lead-content">
                                                        <h3>2,346</h3>
                                                        <p>Total orders in period</p>
                                                    </div>
                                                    <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>95%</span>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="lead-content">
                                                        <h3>9,346</h3>
                                                        <p>Orders in last month</p>
                                                    </div>
                                                    <div class="progress-bar wow fadeInLeft" data-progress="85%" style="width: 85%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>85%</span> </div>
                                                </div>
                                                <div class="progress progress-bt">
                                                    <div class="lead-content">
                                                        <h3>2,34,600</h3>
                                                        <p>Monthly income from order</p>
                                                    </div>
                                                    <div class="progress-bar wow fadeInLeft" data-progress="93%" style="width: 93%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>93%</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feed-mesage-project-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sparkline11-list shadow-reset mg-tb-30">
                                <div class="sparkline11-hd">
                                    <div class="main-sparkline11-hd">
                                        <h1>Your daily feed</h1>
                                        <div class="sparkline11-outline-icon">
                                            <span class="sparkline11-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline11-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline11-graph dashone-comment dashtwo-comment comment-scrollbar">
                                    <div class="daily-feed-list">
                                        <div class="daily-feed-img">
                                            <a href="#"><img src="{{ asset('theme/img/notification/1.jpg') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="daily-feed-content">
                                            <h4><span class="feed-author">Monica Smith</span> posted blog on <span class="feed-author">John Smith</span>.</h4>
                                            <p class="res-ds-n-t">Today 5:60 pm - 12.06.2014</p>
                                            <span class="feed-ago">1m ago</span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="daily-feed-list">
                                        <div class="daily-feed-img">
                                            <a href="#"><img src="{{ asset('theme/img/notification/2.jpg') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="daily-feed-content">
                                            <h4><span class="feed-author">Joy Khan</span> posted message on <span class="feed-author">Joli Ray</span>.</h4>
                                            <p class="res-ds-n-t">Today 5:60 pm - 12.06.2014</p>
                                            <span class="feed-ago">5m ago</span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="daily-feed-list">
                                        <div class="daily-feed-img">
                                            <a href="#"><img src="{{ asset('theme/img/notification/3.jpg') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="daily-feed-content">
                                            <h4><span class="feed-author">Mamun</span> share 1 photo on <span class="feed-author">Sohag</span>. </h4>
                                            <p class="res-ds-n-t">Today 5:60 pm - 12.06.2014</p>
                                            <span class="feed-ago">5m ago</span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="daily-feed-list">
                                        <div class="daily-feed-img">
                                            <a href="#"><img src="{{ asset('theme/img/notification/4.jpg') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="daily-feed-content">
                                            <h4><span class="feed-author">Saliya</span> started following on <span class="feed-author">Jay</span>.</h4>
                                            <p class="res-ds-n-t">Today 5:60 pm - 12.06.2014</p>
                                            <span class="feed-ago">5m ago</span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="daily-feed-list">
                                        <div class="daily-feed-img">
                                            <a href="#"><img src="{{ asset('theme/img/notification/5.jpg') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="daily-feed-content">
                                            <h4><span class="feed-author">Holika</span> posted message on <span class="feed-author">Smith</span>.</h4>
                                            <p class="res-ds-n-t">Today 5:60 pm - 12.06.2014</p>
                                            <p class="message-feed-single">If you earn a BS in Justice of the Studies at GCU, you may be on able to pursue a career in an exciting field! Check out some future career options by reading our blog.</p>
                                            <div class="feed-like-bt">
                                                <a class="btn btn-xs btn-white-like"><i class="fa fa-thumbs-up"></i> Like </a>
                                                <a class="btn btn-xs btn-white-like"><i class="fa fa-heart"></i> Love </a>
                                            </div>
                                            <span class="feed-ago">5m ago</span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="daily-feed-list">
                                        <div class="daily-feed-img">
                                            <a href="#"><img src="{{ asset('theme/img/notification/6.jpg') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="daily-feed-content">
                                            <h4><span class="feed-author">Monica Smith</span> posted a new blog. </h4>
                                            <p class="res-ds-n-t">Today 5:60 pm - 12.06.2014</p>
                                            <span class="feed-ago">5m ago</span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="daily-feed-list daily-feed-bbm">
                                        <div class="daily-feed-img">
                                            <a href="#"><img src="{{ asset('theme/img/notification/1.jpg') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="daily-feed-content daily-feed-cbbm">
                                            <h4><span class="feed-author">Monica Smith</span> posted a new blog. </h4>
                                            <p class="res-ds-n-t">Today 5:60 pm - 12.06.2014</p>
                                            <span class="feed-ago">5m ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sparkline9-list shadow-reset mg-tb-30">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>User project list</h1>
                                        <div class="sparkline9-outline-icon">
                                            <span class="sparkline9-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline9-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <div id="toolbar1">
                                            <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                        </div>
                                        <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="5" data-page-list="[5, 10, 15, 20, 25]" data-cookie-id-table="saveId" data-show-export="true">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="id">ID</th>
                                                    <th data-field="status" data-editable="true">Status</th>
                                                    <th data-field="date" data-editable="true">Date</th>
                                                    <th data-field="phone" data-editable="true">User</th>
                                                    <th data-field="company" data-editable="true">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td>Pending</td>
                                                    <td>1:20pm</td>
                                                    <td>John</td>
                                                    <td>20%</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td class="complete-project-dashtwo">Complete</td>
                                                    <td>2:30pm</td>
                                                    <td>khan</td>
                                                    <td>25%</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td>Complete</td>
                                                    <td>4:50pm</td>
                                                    <td>hok</td>
                                                    <td>50%</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>4</td>
                                                    <td class="canceled-project-dashtwo">Canceled</td>
                                                    <td>5:30pm</td>
                                                    <td>dogi</td>
                                                    <td>80%</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>5</td>
                                                    <td>Complete</td>
                                                    <td>6:20pm</td>
                                                    <td>joyi</td>
                                                    <td>30%</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>6</td>
                                                    <td>Pending</td>
                                                    <td>7:40pm</td>
                                                    <td>joy</td>
                                                    <td>40%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sparkline8-list shadow-reset mg-tb-30">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Messages</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph dashone-comment messages-scrollbar dashtwo-messages">
                                    <div class="comment-phara">
                                        <div class="comment-adminpr">
                                            <a class="dashtwo-messsage-title" href="#">Toman Alva</a>
                                            <p class="comment-content">Start each day with a prayer and end your day with a prayer and thank God for a another day.</p>
                                        </div>
                                        <div class="admin-comment-month">
                                            <p class="comment-clock"><i class="fa fa-clock-o"></i> 1 minuts ago</p>
                                            <button class="comment-setting" data-toggle="collapse" data-target="#adminpro-demo1">...</button>
                                            <ul id="adminpro-demo1" class="comment-action-st collapse">
                                                <li><a href="#">Add</a>
                                                </li>
                                                <li><a href="#">Report</a>
                                                </li>
                                                <li><a href="#">Hide Message</a>
                                                </li>
                                                <li><a href="#">Turn on Message</a>
                                                </li>
                                                <li><a href="#">Turn off Message</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="comment-phara">
                                        <div class="comment-adminpr">
                                            <a class="dashtwo-messsage-title" href="#">William Jon</a>
                                            <p class="comment-content">Simple & easy online tools to increase the website visitors, improve SEO, marketing & sales, automatic blog!</p>
                                        </div>
                                        <div class="admin-comment-month">
                                            <p class="comment-clock"><i class="fa fa-clock-o"></i> 5 minuts ago</p>
                                            <button class="comment-setting" data-toggle="collapse" data-target="#adminpro-demo2">...</button>
                                            <ul id="adminpro-demo2" class="comment-action-st collapse">
                                                <li><a href="#">Add</a>
                                                </li>
                                                <li><a href="#">Report</a>
                                                </li>
                                                <li><a href="#">Hide Message</a>
                                                </li>
                                                <li><a href="#">Turn on Message</a>
                                                </li>
                                                <li><a href="#">Turn off Message</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="comment-phara">
                                        <div class="comment-adminpr">
                                            <a class="dashtwo-messsage-title" href="#">Mexicano</a>
                                            <p class="comment-content">Soy cursi, twitteo frases pedorras y vendo antojitos mexicanos. Santa Rosa, La Pampa, Argentina</p>
                                        </div>
                                        <div class="admin-comment-month">
                                            <p class="comment-clock"><i class="fa fa-clock-o"></i> 15 minuts ago</p>
                                            <button class="comment-setting" data-toggle="collapse" data-target="#adminpro-demo3">...</button>
                                            <ul id="adminpro-demo3" class="comment-action-st collapse">
                                                <li><a href="#">Add</a>
                                                </li>
                                                <li><a href="#">Report</a>
                                                </li>
                                                <li><a href="#">Hide Message</a>
                                                </li>
                                                <li><a href="#">Turn on Message</a>
                                                </li>
                                                <li><a href="#">Turn off Message</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="comment-phara">
                                        <div class="comment-adminpr">
                                            <a class="dashtwo-messsage-title" href="#">Bhadkamkar</a>
                                            <p class="comment-content">News love and follow Jesus and my family and friends l hope God bless you always.</p>
                                        </div>
                                        <div class="admin-comment-month">
                                            <p class="comment-clock"><i class="fa fa-clock-o"></i> 20 minuts ago</p>
                                            <button class="comment-setting" data-toggle="collapse" data-target="#adminpro-demo4">...</button>
                                            <ul id="adminpro-demo4" class="comment-action-st collapse">
                                                <li><a href="#">Add</a>
                                                </li>
                                                <li><a href="#">Report</a>
                                                </li>
                                                <li><a href="#">Hide Message</a>
                                                </li>
                                                <li><a href="#">Turn on Message</a>
                                                </li>
                                                <li><a href="#">Turn off Message</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="comment-phara">
                                        <div class="comment-adminpr">
                                            <a class="dashtwo-messsage-title" href="#">SHAKHAWAT</a>
                                            <p class="comment-content">Make the Best Use of What You Have.You Never Know When & Where You Find Yourself..</p>
                                        </div>
                                        <div class="admin-comment-month">
                                            <p class="comment-clock"><i class="fa fa-clock-o"></i> 25 minuts ago</p>
                                            <button class="comment-setting" data-toggle="collapse" data-target="#adminpro-demo5">...</button>
                                            <ul id="adminpro-demo5" class="comment-action-st collapse">
                                                <li><a href="#">Add</a>
                                                </li>
                                                <li><a href="#">Report</a>
                                                </li>
                                                <li><a href="#">Hide Message</a>
                                                </li>
                                                <li><a href="#">Turn on Message</a>
                                                </li>
                                                <li><a href="#">Turn off Message</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="comment-phara comment-bd-phara">
                                        <div class="comment-adminpr">
                                            <a class="dashtwo-messsage-title" href="#">Sarah</a>
                                            <p class="comment-content">A 'Power Chick' committed to using my superpowers for good. Author, speaker, radio host.</p>
                                        </div>
                                        <div class="admin-comment-month">
                                            <p class="comment-clock"><i class="fa fa-clock-o"></i> 27 minuts ago</p>
                                            <button class="comment-setting" data-toggle="collapse" data-target="#adminpro-demo6">...</button>
                                            <ul id="adminpro-demo6" class="comment-action-st collapse">
                                                <li><a href="#">Add</a>
                                                </li>
                                                <li><a href="#">Report</a>
                                                </li>
                                                <li><a href="#">Hide Message</a>
                                                </li>
                                                <li><a href="#">Turn on Message</a>
                                                </li>
                                                <li><a href="#">Turn off Message</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Transitions Start-->
            <div class="transition-world-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="transition-world-list shadow-reset">
                                <div class="sparkline7-list">
                                    <div class="sparkline7-hd">
                                        <div class="main-spark7-hd">
                                            <h1>Transitions <span class="res-ds-n">Worldwide</span></h1>
                                            <div class="sparkline7-outline-icon">
                                                <span class="sparkline7-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                                <span><i class="fa fa-wrench"></i></span>
                                                <span class="sparkline7-collapse-close"><i class="fa fa-times"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sparkline7-graph">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                                    <div id="toolbar">
                                                        <select class="form-control">
                                                            <option value="">Export Basic</option>
                                                            <option value="all">Export All</option>
                                                            <option value="selected">Export Selected</option>
                                                        </select>
                                                    </div>
                                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="5" data-page-list="[5, 10, 15, 20, 25]" data-cookie-id-table="saveId" data-show-export="true">
                                                        <thead>
                                                            <tr>
                                                                <th data-field="state" data-checkbox="true"></th>
                                                                <th data-field="id">No</th>
                                                                <th data-field="method" data-editable="true">Method</th>
                                                                <th data-field="date" data-editable="true">Date</th>
                                                                <th data-field="country" data-editable="true">Country</th>
                                                                <th data-field="amount" data-editable="true">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>1</td>
                                                                <td>Paypal</td>
                                                                <td>11:20pm</td>
                                                                <td>United State</td>
                                                                <td>$2413</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>2</td>
                                                                <td>Payoneer</td>
                                                                <td>5:20am</td>
                                                                <td>Canada</td>
                                                                <td>$4565</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>3</td>
                                                                <td>Skill</td>
                                                                <td>1 day Ago</td>
                                                                <td>China</td>
                                                                <td>$6888</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>4</td>
                                                                <td>Credit Card</td>
                                                                <td>2 day Ago</td>
                                                                <td>France</td>
                                                                <td>$8789</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>5</td>
                                                                <td>Master Card</td>
                                                                <td>5 days ago</td>
                                                                <td>Brazil</td>
                                                                <td>$4565</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>6</td>
                                                                <td>Visa</td>
                                                                <td>10 days ago</td>
                                                                <td>United Kingdom</td>
                                                                <td>$4554</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="vectorjsmarp" id="world-map"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Transitions End-->
        </div>
    </div>

    @include('layouts/footer') 

    @include('layouts/footscript') 

</body>

</html>