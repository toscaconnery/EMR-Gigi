<!doctype html>
<html class="no-js" lang="en">

@include('layouts.head')

<body class="materialdesign">
    <div class="wrapper-pro">
        {{-- @include('layouts/sidebar')  --}}
        
        
        <div class="">
            <!-- Header top area start-->
            {{-- @include('layouts/header') --}}
            <!-- Header top area end-->
    
            <!-- Breadcome start-->
            {{-- @include('layouts/patient-info') --}}
            <!-- Breadcome End-->

            <!-- login Start-->
            <div class="login-form-area mg-t-30 mg-b-40">
                <div class="container-fluid">
                    <div class="row">
                        {{-- <div class="col-lg-4"></div> --}}
                        <form id="adminpro-form" class="adminpro-form">
                            <div class="col-lg-4 register-form-container">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="logo">
                                                <img src="{{url('')}}/image/logo-long.png" alt="" class="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="login-title" style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
                                                <h1 style="font-size 20px; font-weight: 700;">Daftar</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Nama</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="name" placeholder="Nama"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Email</span>
                                            <div class="login-input-container">
                                                <input type="email" class="login-input" name="email" placeholder="Email"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Kata Sandi</span>
                                            <div class="login-input-container">
                                                <input type="password" class="login-input" name="password" placeholder="Kata Sandi"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Konfirmasi Password</span>
                                            <div class="login-input-container">
                                                <input type="password" class="login-input" name="password_confirmation" placeholder="Konfirmasi Kata Sandi"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="clean-register-button">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- <div class="col-lg-4"></div> --}}
                    </div>
                </div>
            </div>
            <!-- login End-->
         


            
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