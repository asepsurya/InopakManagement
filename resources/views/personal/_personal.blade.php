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
{{-- modal video media --}}
@foreach ($dataFile as  $data )
<div class="modal fade" tabindex="-1" id="showFile-{{ $data->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0 m-0">
                @if ($data->extention == "mp4")
                    <iframe width="100%" height="450" src="{{'https://www.youtube.com/embed/'.$data->file }}"  loading="lazy" allowfullscreen style="display: block;
                        width: 100%;
                        border: none;
                        overflow-y: auto;
                        overflow-x: hidden;">
                    </iframe> 
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- upload File --}}
<div class="modal fade" tabindex="-1" id="addFile1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload File</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/aksi/uploadFile" method="post" enctype="multipart/form-data">
                    @csrf   
                            <input type="text" value="{{ request()->route('id') }}" name="id_folder" hidden >
                            <input type="text" value="{{ $title }}/" name="link" hidden >
                    <div class="form-control-wrap">
                        <div class="form-group"><label class="form-label">Management Upload File</label><span class="form-note">Specify the URL if your main website is external.</span></div>
                        <div class="form-file">  
                            <input type="file" class="form-file-input" id="customFile" multiple name="file[]">
                            <label class="form-file-label" for="customFile">Choose file</label>
                         </div>
                    </div>
                  
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Upload</span></button></form></div>
        </div>
    </div>
</div>


{{-- Modal Edit Nama Folder --}}
@foreach ($folder as  $data )
<div class="modal fade" tabindex="-1" id="modalEdit-{{ $data->id }}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rename</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/aksi/RenameFolder" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ $data->name }}/" name="link" hidden >
                        <input type="text" value="{{ $data->id }}" name="id_folder" hidden >
                        
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-folder"></em></div><input
                                type="text" value="{{ $data->name }}" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="namaFolder"><label class="form-label-outlined"
                                for="outlined-right-icon" >Nama Folder</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Simpan</span></button></form></div>
        </div>
    </div>
</div>                        
@endforeach
{{-- modal Personal Folder --}}
<div class="modal fade" tabindex="-1" id="modalPersonal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Folder Baru </h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/createFolder" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ $title }}/" name="link" hidden>
                        <input type="text" value="{{ auth()->user()->id }}" name="owner" hidden>
                        <input type="text" value="folder" name="type" hidden>
                        <input type="text" value="{{ request()->route('id') }}" name="id_folder" hidden>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-folder"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined @error('name') is-invalid @enderror"
                                id="outlined-right-icon" name="name" required><label class="form-label-outlined"
                                for="outlined-right-icon">Nama Folder</label>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Create</span></button></form></div>
        </div>
    </div>
</div>
{{-- embedd Video --}}
<div class="modal fade" tabindex="-1" id="modalEmbedVideo">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Link Video</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                
                <form action="/aksi/embedVideo" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ $title }}/" name="link" hidden>
                        <input type="text" value="{{ auth()->user()->id }}" name="owner" hidden>
                        <input type="text" value="file" name="type" hidden>
                        <input type="text" value="{{  request()->route('id') }}" name="id_folder" hidden>
                       
                        
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="name" required><label class="form-label-outlined"
                                for="outlined-right-icon">Video Name</label>
                        </div>
                        <hr>
                        <div class="form-group"><label class="form-label">Enter a YouTube URL</label><span class="form-note">Specify the URL if your main website is external.</span></div>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                name="base" required id="myUrl"><label class="form-label-outlined"
                                for="outlined-right-icon">https://</label>
                        </div>
                        <br>
                        <div class="form-group"><label class="form-label">ID Video</label><span class="form-note">ID Otomatis dikonversi dari Link Video</span></div>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                name="file" required id="youtubeid" readonly><label class="form-label-outlined"
                                for="outlined-right-icon"></label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" id="simpan" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Simpan</span></button></form>   
                <button class="btn btn-primary btn-block" id="myBtn">Upload</button></div>
        </div>
    </div>
</div>
{{-- Rename semua Name File --}}
@foreach ($dataFile as $data )
<div class="modal fade" tabindex="-1" id="modalEditEmbedVideo-{{ $data->id }}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rename File</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/aksi/renameFile" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ $data->id }}" name="id" hidden>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="name" value="{{ $data->name }}"><label class="form-label-outlined"
                                for="outlined-right-icon">Name</label>
                        </div>
                        <hr>
                        <div class="form-group"><label class="form-label">Link</label><span class="form-note">Specify the URL if your main website is external.</span></div>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="id_folder" value="{{ $data->file }}" required><label class="form-label-outlined"
                                for="outlined-right-icon">https://</label>
                        </div>
                            
                     
                        
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Upload</span></button></form></div>
        </div>
    </div>
</div>
@endforeach
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
                                <li class="nk-menu-item {{ Request::is('personal*') ? 'active current-page' : ''}}"><a href="/dashboard" class="nk-menu-link" aria-label="File Manager"
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
                                   
                                    <li class="dropdown notification-dropdown"><a href="#"
                                            class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head"><span
                                                    class="sub-title nk-dropdown-title">Notifications</span><a
                                                    href="#">Mark All as Read</a></div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-primary-dim ni ni-share"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Iliash shared
                                                                <span>Dashlite-v2</span> with you.
                                                            </div>
                                                            <div class="nk-notification-time">Just now</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-info-dim ni ni-edit"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Iliash
                                                                <span>invited</span> you to edit <span>DashLite</span>
                                                                folder
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-primary-dim ni ni-share"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have shared
                                                                <span>project v2</span> with Parvez.
                                                            </div>
                                                            <div class="nk-notification-time">7 days ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-success-dim ni ni-spark"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your
                                                                <span>Subscription</span> renew successfully.
                                                            </div>
                                                            <div class="nk-notification-time">2 month ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-foot center"><a href="#">View All</a></div>
                                        </div>
                                    </li>
                                    <li class="dropdown list-apps-dropdown d-lg-none"><a href="#"
                                            class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em
                                                    class="icon ni ni-menu-circled"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                            <div class="dropdown-body">
                                                <ul class="list-apps">
                                                    <li><a href="https://dashlite.net/demo3/index.html"><span
                                                                class="list-apps-media"><em
                                                                    class="icon ni ni-dashlite bg-primary text-white"></em></span><span
                                                                class="list-apps-title">Dashboard</span></a></li>
                                                    <li><a href="chats.html"><span class="list-apps-media"><em
                                                                    class="icon ni ni-chat-circle bg-info-dim"></em></span><span
                                                                class="list-apps-title">Chats</span></a></li>
                                                    <li><a href="mailbox.html"><span class="list-apps-media"><em
                                                                    class="icon ni ni-inbox bg-purple-dim"></em></span><span
                                                                class="list-apps-title">Mailbox</span></a></li>
                                                    <li><a href="messages.html"><span class="list-apps-media"><em
                                                                    class="icon ni ni-chat bg-success-dim"></em></span><span
                                                                class="list-apps-title">Messages</span></a></li>
                                                    <li><a href="file-manager.html"><span class="list-apps-media"><em
                                                                    class="icon ni ni-folder bg-purple-dim"></em></span><span
                                                                class="list-apps-title">File Manager</span></a></li>
                                                    <li><a href="https://dashlite.net/demo3/components.html"><span
                                                                class="list-apps-media"><em
                                                                    class="icon ni ni-layers bg-secondary-dim"></em></span><span
                                                                class="list-apps-title">Components</span></a></li>
                                                </ul>
                                                <ul class="list-apps">
                                                    <li><a href="https://dashlite.net/demo2/ecommerce/index.html"><span
                                                                class="list-apps-media"><em
                                                                    class="icon ni ni-cart bg-danger-dim"></em></span><span
                                                                class="list-apps-title">Ecommerce Panel</span></a></li>
                                                    <li><a href="https://dashlite.net/demo4/subscription/index.html"><span
                                                                class="list-apps-media"><em
                                                                    class="icon ni ni-calendar-booking bg-primary-dim"></em></span><span
                                                                class="list-apps-title">Subscription Panel</span></a>
                                                    </li>
                                                    <li><a href="https://dashlite.net/demo5/crypto/index.html"><span
                                                                class="list-apps-media"><em
                                                                    class="icon ni ni-bitcoin-cash bg-warning-dim"></em></span><span
                                                                class="list-apps-title">Crypto Wallet Panel</span></a>
                                                    </li>
                                                    <li><a href="https://dashlite.net/demo6/invest/index.html"><span
                                                                class="list-apps-media"><em
                                                                    class="icon ni ni-invest bg-blue-dim"></em></span><span
                                                                class="list-apps-title">HYIP Invest Panel</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
                                                        data-bs-target="#modalPersonal" class="btn btn-light"><em
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
                                                <div class="nk-block-head-content">
                                                    <h3 class="nk-block-title page-title">{{ $title }}</h3>
                                                    
                                                </div>
                                                
                                                {{-- Mobile --}}
                                                <div class="nk-block-head-content">
                                                    <ul class="nk-block-tools g-1">
                                                        <li class="d-lg-none"><a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search"
                                                                data-target="search"><em class="icon ni ni-search"></em></a></li>
                                                        <li class="d-lg-none">
                                                            <div class="dropdown"><a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-view-grid3-wd"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="files.html"><em class="icon ni ni-view-grid3-wd"></em><span>Grid
                                                                                    View</span></a></li>
                                                                        <li><a href="files-group-view.html"><em
                                                                                    class="icon ni ni-view-group-wd"></em><span>Group View</span></a></li>
                                                                        <li><a href="files-list-view.html"><em class="icon ni ni-view-row-wd"></em><span>List
                                                                                    View</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="d-lg-none">
                                                            <div class="dropdown"><a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-plus"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#file-upload" data-bs-toggle="modal"><em
                                                                                    class="icon ni ni-upload-cloud"></em><span>Upload File</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-file-plus"></em><span>Create File</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-folder-plus"></em><span>Create Folder</span></a>
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
                                                </div>
                                                {{-- End Dekstop --}}
                                            </div>
                                        </div>
                                        @if ($errors->any())
                                        <div class="alert alert-pro alert-danger alert-dismissible">
                                            <div class="alert-text">
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </div>
                                            <button class="close" data-bs-dismiss="alert"></button>
                                        </div>
                                        @endif
                                    <div class="nk-fmg-listing nk-block">
                                        <div class="nk-fmg-listing nk-block">
                                            <div class="nk-files nk-files-view-grid">
                                                <div class="nk-files-head">
                                                    <div class="nk-file-item">
                                                        <div class="nk-file-info">
                                                            <div class="dropdown">
                                                                <div class="tb-head dropdown-toggle dropdown-indicator-caret" data-bs-toggle="dropdown">Last
                                                                    Opened</div>
                                                                <div class="dropdown-menu dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a class="active" href="#"><span>Last Opened</span></a></li>
                                                                        <li><a href="#"><span>Name</span></a></li>
                                                                        <li><a href="#"><span>Size</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Folder List --}}
                                                <div class="nk-files-list">
                                                
                                                    @foreach ($folder as $folder )
                                                        <div class="nk-file-item nk-file">
                                                        <div class="nk-file-info">
                                                            <div class="nk-file-title">
                                                                <div class="nk-file-icon">
                                                                    <a class="nk-file-icon-link" href="#">
                                                                    <span
                                                                            class="nk-file-icon-type"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                                viewBox="0 0 72 72">
                                                                                <path fill="#6C87FE"
                                                                                    d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                                                                </path>
                                                                                <path fill="#8AA3FF"
                                                                                    d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                                                                </path>
                                                                                <path display="none" fill="#8AA3FF"
                                                                                    d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                                                                </path>
                                                                                <path fill="#798BFF"
                                                                                    d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                     </div>
                                                                <div class="nk-file-name">
                                                                    <div class="nk-file-name-text"><a href="/personal/{{''.$folder->name.'/'.$folder->id_folder }}" class="title">{{ $folder->name }}</a>
                                                                        <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em
                                                                                    class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <ul class="nk-file-desc">
                                                                <li class="date">Created at : {{ $folder->created_at->diffForHumans() }}</li>
                                                                
                                                            </ul>
                                                        </div>
                                                        <div class="nk-file-actions">
                                                            <div class="dropdown"><a href="#"
                                                                    class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-plain no-bdr">
                                                                        <li><a data-bs-toggle="modal" data-bs-target="#modalEdit-{{ $folder->id }}"><em
                                                                                    class="icon ni ni-pen"></em><span>Rename</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="/aksi/DeleteFolder/{{ $folder->id }}"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    @endforeach 
                                                     {{-- File List --}}
                                                    @foreach ($dataFile as $a )
                                                    <div class="nk-file-item nk-file">
                                                        <div class="nk-file-info">
                                                            <div class="nk-file-title">
                                                                {{-- Icon  --}}
                                                                @include('partial._icon')
                                                                <div class="nk-file-name">
                                                                    <div class="nk-file-name-text">
                                                                       
                                                                       @if ($a->extention == 'pdf')
                                                                            <a href="#" onclick="window.open('/aksi/pdfview/{{ $a->link }}','_blank', 'fullscreen=yes')" class="title">{{Str::limit($a->name , 30) }}</a>
                                                                        @elseif ($a->extention == 'jpg' )
                                                                            <a class="title gallery-image popup-image" href="{{ asset('storage/'.$a->file) }}">{{ Str::limit($a->name , 30) }}</a>
                                                                        @elseif ($a->extention == 'png' )
                                                                            <a class="title gallery-image popup-image" href="{{ asset('storage/'.$a->file) }}">{{ Str::limit($a->name , 30) }}</a>
                                                                        @elseif ($a->extention == 'jpeg' )
                                                                            <a class="title gallery-image popup-image" href="{{ asset('storage/'.$a->file) }}">{{ Str::limit($a->name , 30) }}</a>
                                                                        @elseif($a->extention == 'mp4')
                                                                            <a data-bs-toggle="modal" data-bs-target="#showFile-{{ $a->id }}" class="title">{{ Str::limit($a->name , 30) }}</a>
                                                                        @else
                                                                            <a href="#" class="title">{{ Str::limit($a->name , 30) }}</a>
                                                                        @endif
                                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <ul class="nk-file-desc">
                                                                <li class="date">{{ $a->created_at->diffForHumans() }}</li>
                                                                <li class="size">
                                                                    @if ($a->size >= 1073741824)
                                                                        {{ $a->size = number_format($a->size / 1073741824, 2) . ' GB'; }}
                                                                    @elseif($a->size >= 1048576)
                                                                        {{ $a->size = number_format($a->size / 1048576, 2) . ' MB'; }}
                                                                    @elseif($a->size  >= 1024)
                                                                        {{ $a->size = number_format($a->size / 1024, 2) . ' KB'; }}
                                                                    @elseif($a->size  > 1)
                                                                        {{ $a->size = $a->size . ' KB'; }}
                                                                    @elseif($a->size  = 1)
                                                                        {{ $a->size = $a->size . ' KB'; }}
                                                                    @else
                                                                        {{ $a->size = '0 bytes';  }}
                                                                    @endif
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                        <div class="nk-file-actions">
                                                            <div class="dropdown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-plain no-bdr">
                                                                        
                                                                        <li><a href="{{ asset('storage/'.$a->file) }}" target="blank_" download="{{ $a->name }}"><em
                                                                                    class="icon ni ni-download"></em><span>Download</span></a></li>
                                                                        <li><a  data-bs-toggle="modal" data-bs-target="#modalEditEmbedVideo-{{ $a->id }}"><em class="icon ni ni-pen"></em><span>Rename</span></a></li>
                                                                        <li>
                                                                            <form action="/aksi/Deletefile/" method="post">
                                                                            @csrf
                                                                            <input type="text" name="id" value="{{ $a->id }}" hidden> 
                                                                            <input type="text" name="old_file" value="{{ $a->file }}" hidden> 
                                                                            
                                                                            <button type="submit" class="btn text-danger"><em class="icon ni ni-trash"></em><span>Delete</span></button>
                                                                            </form>
                                                                            
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
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
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    @if(Session::has('openModal'))
    <script type="text/javascript">
    $(function() {
        $('#myModal').modal('show');
    });
    </script>
    @endif

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