<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ asset('images/Fav.png') }}">
    <title>Register | INOPAK MANAGEMENT</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dashlitee5ca.css?ver=3.2.3') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/themee5ca.css?ver=3.2.3') }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-91615293-4');
    </script>
</head>

<body class="nk-body npc-default pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Register</h4>
                                        <div class="nk-block-des">
                                            <p>Create New App Account</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="/Cregister" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group"><label class="form-label" for="default-01">Nama Lengkap</label></div>
                                        <div class="form-control-wrap"><input type="text"
                                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                id="default-01" placeholder="Enter your Name"
                                                name="name">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group"><label class="form-label" for="default-01">Email
                                                or Username</label></div>
                                        <div class="form-control-wrap"><input type="text"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                id="default-01" placeholder="Enter your email address or username"
                                                name="email">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group"><label class="form-label"
                                                for="password">Password</label><a class="link link-primary link-sm"
                                                href="#">Forgot Code?</a></div>
                                        <div class="form-control-wrap"><a href="#"
                                                class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password"><em
                                                    class="passcode-icon icon-show icon ni ni-eye"></em><em
                                                    class="passcode-icon icon-hide icon ni ni-eye-off"></em></a><input
                                                type="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                id="password" placeholder="Enter your passcode" name="password">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Pesan Jika Gagal Login --}}
                                    @if(session()->has('loginGagal'))
                                    <div class="alert alert-pro alert-danger">
                                        <div class="alert-text">
                                            <h6>Perhatian..!!</h6>
                                            <p>Silahkan periksa kembali Email dan Password Anda.</p>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group"><button
                                            class="btn btn-lg btn-primary btn-block">Register</button></div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="/"><strong>Sign in instead</strong></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item"><a class="link link-primary fw-normal py-2 px-3"
                                                href="#">Terms & Condition</a></li>
                                        <li class="nav-item"><a class="link link-primary fw-normal py-2 px-3"
                                                href="#">Privacy Policy</a></li>
                                        <li class="nav-item"><a class="link link-primary fw-normal py-2 px-3"
                                                href="#">Help</a></li>
                                       
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2024 <a href="https://inopakinstitute.or.id/" target="_blank" rel="noopener noreferrer">INOPAK Institute.</a> All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/assets/js/bundlee5ca.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('/assets/js/scriptse5ca.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('/assets/js/demo-settingse5ca.js?ver=3.2.3') }}"></script>

</html>