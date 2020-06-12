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
                            <div class="col-lg-4 login-form-container">
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
                                                <h1 style="font-size 20px; font-weight: 700;">Sign In</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-8">
                                            <div class="login-input-container">
                                                <input type="email" class="login-input" name="email" placeholder="Email"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-8">
                                            <div class="login-input-container">
                                                <input type="password" class="login-input" name="password" placeholder="Kata Sandi"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                            <span class="forgot-link"><a href="#">Lupa Sandi</a></span>
                                        </div>
                                        <div class="col-lg-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="clean-login-button">Masuk</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span class="register-link">Belum punya akun? <br><a href="">Daftar disini.</a></span>
                                            {{-- <span class="forgot-link"><a href="">Forgot Your Password?</a></span> --}}
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