<!doctype html>
<html class="no-js" lang="en">

@include('layouts.head')

<body class="materialdesign">
    <div class="wrapper-pro">
        
        <div class="">
            <!-- login Start-->
            <div class="login-form-area mg-t-30 mg-b-40">
                <div class="container-fluid">
                    <div class="row">
                        <form id="adminpro-form" method="POST" class="adminpro-form" action="{{ route('register') }}">
                            @csrf
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
                                            {{-- <button type="button" id="save_button" class="clean-register-button">Daftar</button> --}}
                                            <button type="submit" id="save_button" class="clean-register-button">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    {{-- @include('admin_layout.footscript') --}}

</body>

<script>
    $(document).ready(function(){
        // $('#save_button').on('click', () => {
        //     // alert('clicked')
        //     let baseUrl = window.location.origin
        //     const createURL = `${baseUrl}/register`;
        //     let data = {
        //         data: 'oke'
        //     }
        //     const res = axios.post(createURL, data).then(function (response) {
        //         if (response.data.status == 'success') {
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'Action updated.',
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             });
        //             const redirectURL = `${baseUrl}/admin/branch/price/${branchId}`
        //             window.location.href = redirectURL
        //         } else {
        //             Swal.fire({
        //                 icon: 'warning',
        //                 title: 'Failed to update action.',
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             });
        //         }
        //     })
        // })
    })
</script>

</html>