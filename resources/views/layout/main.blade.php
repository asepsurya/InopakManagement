<!DOCTYPE html>
<html lang="eng" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="/images/Fav.png">
    <title>INOPAK | {{ $title }}</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.1/feather.min.js"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashlitee5ca.css?ver=3.2.3') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/themee5ca.css?ver=3.2.3') }}">
    <script src="https://unpkg.com/feather-icons"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'UA-91615293-4');
    </script>
</head>

<body class="nk-body npc-apps apps-only has-apps-sidebar npc-apps-files">
    <div class="nk-app-root">
        <div class="nk-apps-sidebar is-theme">
            <div class="nk-apps-brand"><a href="/dashboard" class="logo-link"><img class="logo-light logo-img"
                        src="{{ asset('images/logo-small.png') }}" srcset="/demo3/images/logo-small2x.png 2x" alt="logo"><img
                        class="logo-dark logo-img" src="../images/logo-dark-small.png"
                        srcset="/demo3/images/logo-dark-small2x.png 2x" alt="logo-dark"></a></div>
            <div class="nk-sidebar-element">
                <div class="nk-sidebar-body">
                    <div class="nk-sidebar-content" data-simplebar>
                        <div class="nk-sidebar-menu">
                            <ul class="nk-menu apps-menu">
                                <li class="nk-menu-item {{ Request::is('/*') ? 'active current-page' : ''}}"><a href="/dashboard" class="nk-menu-link" aria-label="File Manager"
                                        data-bs-original-title="File Manager"><span class="nk-menu-icon"><em class="icon ni ni-folder"></em></span></a>
                                </li>
                                {{-- <li class="nk-menu-item"><a href="apps/calendar.html" class="nk-menu-link" aria-label="Calendar"
                                        data-bs-original-title="Calendar"><span class="nk-menu-icon"><em class="icon ni ni-calendar"></em></span></a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="nk-sidebar-footer">
                           {{-- --}}
                        </div>
                    </div>
                    <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown"><a href="#" class="toggle"
                            data-target="profileDD">
                            <div class="user-avatar"><span>{{ substr(auth()->user()->name,-9,2) }}</span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md m-1 nk-sidebar-profile-dropdown"
                            data-content="profileDD">
                            <div class="dropdown-inner user-card-wrap d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar"><span>{{ substr(auth()->user()->name,-9,2) }}</span></div>
                                    <div class="user-info"><span class="lead-text">{{ auth()->user()->name }}</span><span
                                            class="sub-text text-soft">{{ auth()->user()->email }}</span></div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="https://dashlite.net/demo3/user-profile-regular.html"><em
                                                class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="https://dashlite.net/demo3/user-profile-setting.html"><em
                                                class="icon ni ni-setting-alt"></em><span>Account Setting</span></a>
                                    </li>
                                    <li><a href="https://dashlite.net/demo3/user-profile-activity.html"><em
                                                class="icon ni ni-activity-alt"></em><span>Login Activity</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-main ">
            <div class="nk-wrap ">
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1"><a href="#"
                                    class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                        class="icon ni ni-menu"></em></a></div>
                            <div class="nk-header-app-name">
                                <div class="nk-header-app-logo"><em class="icon ni ni-folder bg-purple-dim"></em></div>
                                <div class="nk-header-app-info"><span class="sub-text">Apps</span><span
                                        class="lead-text">INOPAK Management</span></div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                   
                                    <li class="dropdown "><a href="#"
                                            class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-user"></em>
                                            </div>
                                        </a>
                                       
                                    </li>
                                
                                    <li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle me-n1"
                                            data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">{{ substr(auth()->user()->name,-9,2) }}</div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar"><span>{{ substr(auth()->user()->name,-9,2) }}</span></div>
                                                    <div class="user-info"><span class="lead-text">{{ auth()->user()->name }}</span><span
                                                            class="sub-text">{{ auth()->user()->email }}</span></div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="https://dashlite.net/demo3/user-profile-regular.html"><em
                                                                class="icon ni ni-user-alt"></em><span>View
                                                                Profile</span></a></li>
                                                    <li><a href="https://dashlite.net/demo3/user-profile-setting.html"><em
                                                                class="icon ni ni-setting-alt"></em><span>Account
                                                                Setting</span></a></li>
                                                    <li><a href="https://dashlite.net/demo3/user-profile-activity.html"><em
                                                                class="icon ni ni-activity-alt"></em><span>Login
                                                                Activity</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="/logout"><em class="icon ni ni-signout"></em><span>Sign
                                                                out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="nk-content p-0">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-fmg">
                                <div class="nk-fmg-aside" data-content="files-aside" data-toggle-overlay="true"
                                    data-toggle-body="true" data-toggle-screen="lg" data-simplebar>
                                {{-- sideBar content --}}
                                    @include('partial._sidebar')
                                </div>
                                <div class="nk-fmg-body">
                                    <div class="nk-fmg-body-head d-none d-lg-flex">
                                        <div class="nk-fmg-search">
                                            <em class="icon"><i data-feather="search"></i></em>
                                            @if (request::is('dashboard'))
                                                <form action="/home/{{ $title }}/data" method="get">
                                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search files, folders" value="{{ request('search') }}" aria-label="Search" name="search">
                                                </form>
                                            @else
                                                 <form action="/home/{{ $title }}/data" method="get">
                                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search files, folders" value="{{ request('search') }}" aria-label="Search" name="search">
                                                </form>
                                            @endif
                                            
                                        </div>
                                        <div class="nk-fmg-actions">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modalPublic" class="btn btn-light"><em
                                                        class="icon ni ni-folder-plus"></em>
                                                            <span>Create</span></a> 
                                                </li>
                                                <li>
                                                    <div class="dropdown"><a href="#" class="btn btn-primary " data-bs-toggle="dropdown" aria-expanded="false"><em class="icon"><i
                                                        data-feather="upload-cloud"></i></em> <span>Upload</span></a>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 38px);"
                                                            data-popper-placement="bottom-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a data-bs-toggle="modal" data-bs-target="#addFile1"><em class="icon ni ni-upload-cloud"></em><span>Upload
                                                                            File</span></a></li>
                                                                <li><a data-bs-toggle="modal" data-bs-target="#modalEmbedVideo" ><em class="icon ni ni-file-plus"></em><span>Upload Video</span></a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-fmg-body-content">
                                        <div class="nk-block-head nk-block-head-sm">
                                            <div class="nk-block-between position-relative">
                                                <div class="nk-file-actions">   
                                                    <div class="dropdown">
                                                      
                                                        <div class="nk-block-head-content">
                                                            <h3 class="nk-block-title page-title">{{ $title }}</h3> 
                                                        </div>
                                                       
                                                        @if (Request::is('home*'))
                                                        @foreach ($ambilID as $a )
                                                                <a class=" btn btn-sm btn-icon btn-trigger" data-bs-toggle="modal" data-bs-target="#ModalEditDrive-{{ $a->id }}"><em class="icon ni ni-pen"></em></a>    
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- Mobile --}}
                                                <div class="nk-block-head-content">
                                                    <ul class="nk-block-tools g-1">
                                                        <li class="d-lg-none"><a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search"
                                                                data-target="search"><em class="icon ni ni-search"></em></a></li>
                                                        
                                                        <li class="d-lg-none">
                                                            <div class="dropdown"><a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-plus"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a data-bs-toggle="modal" data-bs-target="#addFile1"><em
                                                                                    class="icon ni ni-upload-cloud"></em><span>Upload File</span></a></li>
                                                                        
                                                                        <li><a data-bs-toggle="modal"
                                                                            data-bs-target="#modalPublic"><em class="icon ni ni-folder-plus"></em><span>Create Folder</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="d-lg-none me-n1"><a href="#" class="btn btn-trigger btn-icon toggle"
                                                                data-target="files-aside"><em class="icon ni ni-menu-alt-r"></em></a></li>
                                                    </ul>
                                                </div>
                                                <div class="search-wrap px-2 d-lg-none" data-search="search">
                                                    <div class="search-content"><a href="#" class="search-back btn btn-icon toggle-search"
                                                            data-target="search"><em class="icon ni ni-arrow-left"></em></a><input type="text"
                                                            class="form-control border-transparent form-focus-none"
                                                            placeholder="Search by user or message"><button class="search-submit btn btn-icon"><em
                                                                class="icon ni ni-search"></em></button></div>
                                                </div>
                                                {{-- End Mobile --}}
                                                {{-- Tampilan DESKTOP --}}
                                                <div class="nk-block-head-content d-none d-lg-block">
                                                    <button type="submit" class="btn btn-light" onclick="history.back()"><em class="icon ni ni-back-ios"></em>Back </button>
                                                    {{-- <ul class="nk-block-tools g-3">
                                                        <li><a href="files.html" class="nk-switch-icon active"><em class="icon ni ni-view-grid3-wd"></em></a>
                                                        </li>
                                                        <li><a href="files-group-view.html" class="nk-switch-icon"><em
                                                                    class="icon ni ni-view-group-wd"></em></a></li>
                                                        <li><a href="files-list-view.html" class="nk-switch-icon"><em class="icon ni ni-view-row-wd"></em></a>
                                                        </li>
                                                    </ul> --}}
                                                </div>
                                                {{-- End Dekstop --}}
                                            </div>
                                        </div>
                                        
                                    {{-- Container --}}
                                    
                                        @yield('container')
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
        $(document).ready(function(){
          $("#simpan").hide();
          $("#myBtn").click(function(){
            $("#simpan").show();
            $("#myBtn").hide();
          });
        });
    </script>
    {{-- get youtube ID --}}
   <script>
        function getId(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = url.match(regExp);
    
        if (match && match[2].length == 11) {
            return match[2];
        } else {
            return 'error';
        }
    } 
    var myId;
    $('#myBtn').click(function () {
        var myUrl = $('#myUrl').val();
        myId = getId(myUrl);
        $('#youtubeid').val(myId);
        $('#myCode').html('<iframe width="560" height="315" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');
    }); 
    </script>
    @include('partial._modalDialog')
    <script src="{{ asset('/assets/js/bundlee5ca.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('/assets/js/scriptse5ca.js?ver=3.2.3') }}"></script>
    {{-- <script src="{{ asset('/assets/js/demo-settingse5ca.js?ver=3.2.3') }}"></script> --}}
    <script src="{{ asset('/assets/js/apps/file-managere5ca.js?ver=3.2.3') }}"></script>
    <!-- choose one -->
    <script>
        feather.replace({ class: 'foo bar', 'stroke-width': 2 });
    </script>
</body>

</html>