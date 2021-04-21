<!doctype html>
<html class="no-js" lang="en">

@include('layouts.head')

<style>
    .logo img {
        object-fit: cover;
        height: 60px !important;
        margin-left: auto;
        margin-right: auto;
        display: table;
    }
    .login-input {
        border: 1px solid cyan;
    }

    .register-step-indicator {
        width: 20px;
        height: 20px;
        border: 2px solid cyan;
        border-radius: 50%;
        float: left;
        margin-left: 5px;
        margin-right: 5px;
    }

    .current-register-step {
        background-color: cyan;
    }

    .step-container {
        text-align: center;
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
</style>

<body class="materialdesign">
    <div class="wrapper-pro">
        
        <div class="">
            <!-- login Start-->
            <div class="login-form-area mg-t-30 mg-b-40">
                <div class="container-fluid">
                    <div class="row">
                        <form id="adminpro-form" method="POST" class="adminpro-form" action="{{ route('register') }}">
                            @csrf
                            <div class="col-lg-8 register-form-container-new" id="page_1">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="logo">
                                                <img src="{{url('')}}/image/logo-long.png" alt="" class="" style="height: 40%">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 step-container">
                                            <div class="register-step-indicator to-page-1 current-register-step"></div>
                                            <div class="register-step-indicator to-page-2"></div>
                                            <div class="register-step-indicator to-page-3"></div>
                                            <div class="register-step-indicator to-page-4"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Nomor KTP</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="nomor_ktp" id="nomor_ktp" placeholder="Nomor KTP"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Nama Depan</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="nama_depan" id="nama_depan" placeholder="Nama Depan"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Nama Belakang</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Nomor Telepon</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="nomor_telepon" id="nomor_telepon" placeholder="Nomor Telepon"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="button" id="to_login_page" class="clean-register-button" style="background-color: #e7eff6">Login</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="button" class="clean-register-button to-page-2">Lanjut</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 register-form-container-new" id="page_2" style="display: none">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="logo">
                                                <img src="{{url('')}}/image/logo-long.png" alt="" class="" style="height: 40%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 step-container">
                                            <div class="register-step-indicator to-page-1"></div>
                                            <div class="register-step-indicator to-page-2 current-register-step"></div>
                                            <div class="register-step-indicator to-page-3"></div>
                                            <div class="register-step-indicator to-page-4"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Email</span>
                                            <div class="login-input-container">
                                                <input type="email" class="login-input" name="email" id="email" placeholder="Email"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Alamat</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="alamat" id="alamat" placeholder="Alamat"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Tempat Lahir</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Tanggal Lahir</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="button" class="clean-register-button to-page-1">Kembali</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="button" class="clean-register-button to-page-3">Lanjut</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 register-form-container-new" id="page_3" style="display: none">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="logo">
                                                <img src="{{url('')}}/image/logo-long.png" alt="" class="" style="height: 40%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 step-container">
                                            <div class="register-step-indicator to-page-1"></div>
                                            <div class="register-step-indicator to-page-2"></div>
                                            <div class="register-step-indicator to-page-3 current-register-step"></div>
                                            <div class="register-step-indicator to-page-4"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Jenis Kelamin</span>
                                            <div class="login-input-container">
                                                <select name="jenis_kelamin" class="login-input" id="jenis_kelamin">
                                                    <option value="" selected disabled>Silahkan pilih salah satu</option>
                                                    <option value="">Laki-laki</option>
                                                    <option value="">Perempuan</option>
                                                </select>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Pekerjaan</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Alergi</span>
                                            <div class="login-input-container">
                                                <select name="alergi_status" class="login-input" id="alergi_status">
                                                    <option value="" selected disabled>Silahkan pilih salah satu</option>
                                                    <option value="1">Punya alergi</option>
                                                    <option value="0">Tidak ada alergi</option>
                                                </select>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Deskripsi alergi</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="alergi" id="alergi" placeholder="Silahkan deskripsikan alergi yand dimiliki" disabled/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="button" class="clean-register-button to-page-2">Kembali</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="button" class="clean-register-button to-page-4">Lanjut</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 register-form-container-new" id="page_4" style="display: none">
                                <div class="login-bg">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="logo">
                                                <img src="{{url('')}}/image/logo-long.png" alt="" class="" style="height: 40%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 step-container">
                                            <div class="register-step-indicator to-page-1"></div>
                                            <div class="register-step-indicator to-page-2"></div>
                                            <div class="register-step-indicator to-page-3"></div>
                                            <div class="register-step-indicator to-page-4 current-register-step"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <span class="register-placeholder">Username</span>
                                            <div class="login-input-container">
                                                <input type="text" class="login-input" name="username" id="username" placeholder="Username"/>
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
                                            <span class="register-placeholder">Konfirmasi Kata Sandi</span>
                                            <div class="login-input-container">
                                                <input type="password" class="login-input" name="password_confirmation" placeholder="Konfirmasi Kata Sandi"/>
                                                <span class="shadow-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="button" class="clean-register-button to-page-3">Kembali</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="button" id="save_button" class="clean-register-button">Daftar</button>
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

</body>

<script>
    $(document).ready(function(){
        $('#to_login_page').on('click', () => {
            let baseUrl = window.location.origin
            window.location.href = `${baseUrl}/login`;
        })

        $('.to-page-1').on('click', () => {
            $('#page_2').hide()
            $('#page_3').hide()
            $('#page_4').hide()
            $('#page_1').show()
        })

        $('.to-page-2').on('click', () => {
            $('#page_1').hide()
            $('#page_3').hide()
            $('#page_4').hide()
            $('#page_2').show()
        })

        $('.to-page-3').on('click', () => {
            $('#page_1').hide()
            $('#page_2').hide()
            $('#page_4').hide()
            $('#page_3').show()
        })

        $('.to-page-4').on('click', () => {
            $('#page_1').hide()
            $('#page_2').hide()
            $('#page_3').hide()
            $('#page_4').show()
        })

        $('#alergi_status').on('change', (e) => {
            console.log( e.target.value );
            if (e.target.value === "1") {
                $('#alergi').prop("disabled", false);
            } else {
                $('#alergi').prop("disabled", true);
            }
        })
        
        $('#save_button').on('click', () => {
            let baseUrl = window.location.origin
            const createURL = `${baseUrl}/register`

            // let 
            // let data = {
            //     data: 'oke'
            // }
            // const res = axios.post(createURL, data).then(function (response) {
            //     if (response.data.status == 'success') {
            //         Swal.fire({
            //             icon: 'success',
            //             title: 'Action updated.',
            //             showConfirmButton: false,
            //             timer: 1500
            //         });
            //         const redirectURL = `${baseUrl}/admin/branch/price/${branchId}`
            //         window.location.href = redirectURL
            //     } else {
            //         Swal.fire({
            //             icon: 'warning',
            //             title: 'Failed to update action.',
            //             showConfirmButton: false,
            //             timer: 1500
            //         });
            //     }
            // })
        })
    })
</script>

</html>