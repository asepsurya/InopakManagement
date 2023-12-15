<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta http-equiv="refresh" content="3;url=/" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ asset('images/Fav.png') }}">
    <title>Login | INOPAK MANAGEMENT</title>
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
                <div class="nk-block nk-block-middle nk-auth-body">
                   
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Thank you for submitting form</h4>
                            <div class="nk-block-des text-success">
                               <p>Redirecting in <em id="seconds">3</em> seconds...</p>
                            </div>
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
    <script>
        var el = document.getElementById('seconds'),
    total = el.innerHTML,
    timeinterval = setInterval(function () {
        total = --total;
        el.textContent = total;
        if (total <= 0) {
            clearInterval(timeinterval);
            // do redirect or something ~ window.location = '//google.de';
        }
    }, 1000);
    </script>
    <script src="{{ asset('/assets/js/bundlee5ca.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('/assets/js/scriptse5ca.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('/assets/js/demo-settingse5ca.js?ver=3.2.3') }}"></script>

</html>