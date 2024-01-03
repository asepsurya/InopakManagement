<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js" >
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-91615293-4');
    </script>
</head>

<body class="nk-body npc-apps apps-only has-apps-sidebar npc-apps-files">
    <div class="nk-app-root">
        <div class="nk-apps-sidebar is-theme">
            <div class="nk-apps-brand"><a href="/dashboard" class="logo-link"><img class="logo-light logo-img"
                        src="{{ asset('images/logo-small.png') }}" srcset="/demo3/images/logo-small2x.png 2x"
                        alt="logo"><img class="logo-dark logo-img" src="../images/logo-dark-small.png"
                        srcset="/demo3/images/logo-dark-small2x.png 2x" alt="logo-dark"></a></div>
            <div class="nk-sidebar-element">
                <div class="nk-sidebar-body">
                    <div class="nk-sidebar-content" data-simplebar>
                        <div class="nk-sidebar-menu">
                            <ul class="nk-menu apps-menu">
                                <li class="nk-menu-item {{ Request::is('/*') ? 'active current-page' : '' }}"><a
                                        href="/dashboard" class="nk-menu-link" aria-label="File Manager"
                                        data-bs-original-title="File Manager"><span class="nk-menu-icon"><em
                                                class="icon ni ni-folder"></em></span></a>
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
                            <div class="user-avatar"><span>{{ substr(auth()->user()->name, -9, 2) }}</span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md m-1 nk-sidebar-profile-dropdown"
                            data-content="profileDD">
                            <div class="dropdown-inner user-card-wrap d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar"><span>{{ substr(auth()->user()->name, -9, 2) }}</span>
                                    </div>
                                    <div class="user-info"><span
                                            class="lead-text">{{ auth()->user()->name }}</span><span
                                            class="sub-text text-soft">{{ auth()->user()->email }}</span></div>
                                </div>
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
                                    class="nk-quick-nav-icon btn-icon toggle" data-target="files-aside"><em
                                        class="icon ni ni-menu"></em></a></div>
                            <div class="nk-header-app-name">
                                <div class="nk-header-app-logo"><em class="icon ni ni-folder bg-purple-dim"></em></div>
                                <div class="nk-header-app-info"><span class="sub-text">Apps</span><span
                                        class="lead-text">INOPAK Management</span></div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">

                                    <li class="dropdown "><a href="#" class="dropdown-toggle nk-quick-nav-icon"
                                            data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-user"></em>
                                            </div>
                                        </a>

                                    </li>

                                    <li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle me-n1"
                                            data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">{{ substr(auth()->user()->name, -9, 2) }}
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>{{ substr(auth()->user()->name, -9, 2) }}</span>
                                                    </div>
                                                    <div class="user-info"><span
                                                            class="lead-text">{{ auth()->user()->name }}</span><span
                                                            class="sub-text">{{ auth()->user()->email }}</span></div>
                                                </div>
                                            </div>
                                           
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="/logout"><em
                                                                class="icon ni ni-signout"></em><span>Sign
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
                                                    <input type="text"
                                                        class="form-control border-transparent form-focus-none"
                                                        placeholder="Search files, folders"
                                                        value="{{ request('search') }}" aria-label="Search"
                                                        name="search">
                                                </form>
                                            @else
                                                <form action="/home/{{ $title }}/data" method="get">
                                                    <input type="text"
                                                        class="form-control border-transparent form-focus-none"
                                                        placeholder="Search files, folders"
                                                        value="{{ request('search') }}" aria-label="Search"
                                                        name="search">
                                                </form>
                                            @endif

                                        </div>
                                        <div class="nk-fmg-actions">
                                            @if (request::is('dashboard'))
                                            @else
                                                <ul class="nk-block-tools g-3">
                                                    <li>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalPublic"
                                                            class="btn btn-light"><em
                                                                class="icon ni ni-folder-plus"></em>
                                                            <span>Create</span></a>
                                                    </li>
                                                    <li>
                                                        <div class="dropdown"><a href="#"
                                                                class="btn btn-primary " data-bs-toggle="dropdown"
                                                                aria-expanded="false"><em class="icon"><i
                                                                        data-feather="upload-cloud"></i></em>
                                                                <span>Upload</span></a>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 38px);"
                                                                data-popper-placement="bottom-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a data-bs-toggle="modal"
                                                                            data-bs-target="#addFile1"><em
                                                                                class="icon ni ni-upload-cloud"></em><span>Upload
                                                                                File</span></a></li>
                                                                    <li><a data-bs-toggle="modal"
                                                                            data-bs-target="#modalEmbedVideo"><em
                                                                                class="icon ni ni-file-plus"></em><span>Upload
                                                                                Video</span></a></li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="nk-fmg-body-content">
                                        <div class="nk-block-head nk-block-head-sm">
                                            <div class="nk-block-between position-relative">
                                                <div class="nk-file-actions">
                                                    <div class="dropdown">

                                                        <div class="nk-block-head-content">
                                                            <h3 class="nk-block-title page-title">{{ $title }}
                                                            </h3>
                                                        </div>

                                                       
                                                    </div>
                                                </div>
                                                {{-- Mobile --}}
                                                <div class="nk-block-head-content">
                                                    <ul class="nk-block-tools g-1">
                                                        <li class="d-lg-none"><a href="#"
                                                                class="btn btn-trigger btn-icon search-toggle toggle-search"
                                                                data-target="search"><em
                                                                    class="icon ni ni-search"></em></a></li>

                                                        <li class="d-lg-none">
                                                            <div class="dropdown">
                                                                @if (request::is('dashboard'))
                                                                @else
                                                                    <a href="#" class="btn btn-trigger btn-icon"
                                                                        data-bs-toggle="dropdown"><em
                                                                            class="icon ni ni-plus"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">.

                                                                            <li><a data-bs-toggle="modal"
                                                                                    data-bs-target="#addFile1"><em
                                                                                        class="icon ni ni-upload-cloud"></em><span>Upload
                                                                                        File</span></a></li>

                                                                            <li><a data-bs-toggle="modal"
                                                                                    data-bs-target="#modalPublic"><em
                                                                                        class="icon ni ni-folder-plus"></em><span>Create
                                                                                        Folder</span></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </li>
                                                        <li class="d-lg-none me-n1"><a href="#"
                                                                class="btn btn-trigger btn-icon toggle"
                                                                data-target="files-aside"><em
                                                                    class="icon ni ni-menu-alt-r"></em></a></li>
                                                    </ul>
                                                </div>
                                                <div class="search-wrap px-2 d-lg-none" data-search="search">
                                                    <div class="search-content"><a href="#"
                                                            class="search-back btn btn-icon toggle-search"
                                                            data-target="search"><em
                                                                class="icon ni ni-arrow-left"></em></a>
                                                        @if (request::is('dashboard'))
                                                            <form action="/home/{{ $title }}/data"
                                                                method="get">
                                                                <input type="text"
                                                                    class="form-control border-transparent form-focus-none"
                                                                    placeholder="Search files, folders"
                                                                    value="{{ request('search') }}"
                                                                    aria-label="Search" name="search">
                                                            </form>
                                                        @else
                                                            <form action="/home/{{ $title }}/data"
                                                                method="get">
                                                                <input type="text"
                                                                    class="form-control border-transparent form-focus-none"
                                                                    placeholder="Search files, folders"
                                                                    value="{{ request('search') }}"
                                                                    aria-label="Search" name="search">
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- End Mobile --}}
                                                {{-- Tampilan DESKTOP --}}
                                                <div class="nk-block-head-content d-none d-lg-block">
                                                    <button type="submit" class="btn btn-light"
                                                        onclick="history.back()"><em
                                                            class="icon ni ni-back-ios"></em>Back </button>
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
        $(document).ready(function() {
            $("#simpan").hide();
            $("#myBtn").click(function() {
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
        $('#myBtn').click(function() {
            var myUrl = $('#myUrl').val();
            myId = getId(myUrl);
            $('#youtubeid').val(myId);
            $('#myCode').html('<iframe width="560" height="315" src="//www.youtube.com/embed/' + myId +
                '" frameborder="0" allowfullscreen></iframe>');
        });
    </script>
    @include('partial._modalDialog')
    <script src="{{ asset('/assets/js/bundlee5ca.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('/assets/js/scriptse5ca.js?ver=3.2.3') }}"></script>
    {{-- <script src="{{ asset('/assets/js/demo-settingse5ca.js?ver=3.2.3') }}"></script> --}}
    <script src="{{ asset('/assets/js/apps/file-managere5ca.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('/assets/js/libs/fullcalendare5ca.js?ver=3.2.3') }}"></script>
{{--     
    <script src="{{ asset('/assets/js/apps/calendare5ca.js?ver=3.2.3')}}"></script> --}}
    {{-- <script src="{{ asset('/assets/js/apps/calendarmulti.js')}}"></script> --}}
    <!-- choose one -->
    @if(request::is('dashboard'))
    <script>
         "use strict";
        ! function(g, f) {
            f(window), f("body"), g.Break;
            g.Calendar = function() {
                var e = new Date,
                    t = String(e.getDate()).padStart(2, "0"),
                    a = String(e.getMonth() + 1).padStart(2, "0"),
                    n = e.getFullYear(),
                    i = new Date(e),
                    i = (i.setDate(e.getDate() + 1), String(i.getDate()).padStart(2, "0"), String(i.getMonth() + 1)
                        .padStart(2, "0"), i.getFullYear(), new Date(e)),
                    e = (i.setDate(e.getDate() - 1), String(i.getDate()).padStart(2, "0")),
                    r = String(i.getMonth() + 1).padStart(2, "0"),
                    d = n + "-" + a,
                    i = i.getFullYear() + "-" + r + "-" + e,
                    r = n + "-" + a + "-" + t,
                    v = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                        "October", "November", "December"
                    ],
                    e = document.getElementById("calendar"),
                    n = (document.getElementById("externalEvents"), document.getElementById("removeEvent"), f(
                        "#addEvent")),
                    s = (f("#addEventForm"), f("#addEventPopup")),
                    a = f("#updateEvent"),
                    m = f("#editEventForm"),
                    o = f("#editEventPopup"),
                    p = f("#previewEventPopup"),
                    t = f("#deleteEvent"),
                    l = g.Win.width < g.Break.md,
                    c = new FullCalendar.Calendar(e, {
                        timeZone: "UTC",
                        // dayGridMonth
                        initialView: l ? "listWeek" : "dayGridMonth",
                        themeSystem: "bootstrap5",
                        headerToolbar: {
                            left: "title prev,next",
                            center: null,
                            right: "today dayGridMonth,timeGridWeek,timeGridDay,listWeek"
                        },
                        height: 800,
                        contentHeight: 780,
                        aspectRatio: 3,
                        editable: !0,
                        droppable: !0,
                        views: {
                            dayGridMonth: {
                                dayMaxEventRows: 2
                            }
                        },
                        direction: g.State.isRTL ? "rtl" : "ltr",
                        nowIndicator: !0,
                        now: r + "T09:25:00",
                        eventMouseEnter: function(e) {
                            var t = e.el,
                                a = e.event._def.title,
                                e = e.event._def.extendedProps.description;
                            e && new bootstrap.Popover(t, {
                                template: '<div class="popover event-popover"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                                title: a,
                                content: e || "",
                                placement: "top"
                            }).show()
                        },
                        eventMouseLeave: function() {
                            u()
                        },
                        eventDragStart: function() {
                            u()
                        },
                        eventClick: function(e) {
                            var t = e.event._def.title,
                               
                                a = e.event._def.extendedProps.description,
                                n = e.event._instance.range.start,
                                i = n.getFullYear() + "-" + String(n.getMonth() + 1).padStart(2, "0") + "-" + 
                                String(n.getDate()).padStart(2, "0"),
                                r = n.toUTCString().split(" "),
                                d = (r = "00:00:00" == (r = r[r.length - 2]) ? "" : r, e.event._instance.range
                                    .end),
                                s = d.getFullYear() + "-" + String(d.getMonth() + 1).padStart(2, "0") + "-" +
                                String(d.getDate()).padStart(2, "0"),
                                o = d.toUTCString().split(" "),
                                l = (o = "00:00:00" == (o = o[o.length - 2]) ? "" : o, e.event._def.ui
                                    .classNames[0].slice(3)),
                                e = e.event._def.publicId,
                                
                                i = (f("#edit-event-title").val(t), f("#myid").val(e),f("#myid2").val(e), f("#edit-event-start-date").val(i)
                                    .datepicker("update"), f("#edit-event-end-date").val(s).datepicker(
                                    "update"), f("#edit-event-start-time").val(r), f("#edit-event-end-time")
                                    .val(o), f("#edit-event-description").val(a), f("#edit-event-theme").val(l),
                                    f("#edit-event-theme").trigger("change.select2"), m.attr("data-id", e),
                                    String(n.getDate()).padStart(2, "0") + " " + v[n.getMonth()] + " " + n
                                    .getFullYear() + (r ? " - " + h(r) : "")),
                                s = String(d.getDate()).padStart(2, "0") + " " + v[d.getMonth()] + " " + d
                                .getFullYear() + (o ? " - " + h(o) : ""),
                         
                                e = (f("#preview-event-title").text(t), f("#preview-event-header").addClass(
                                        "fc-" + l), f("#preview-event-start").text(i), f("#preview-event-end")
                                    .text(s), f("#preview-event-description").text(a), a || f(
                                        "#preview-event-description-check").css("display", "none"), u(),
                                    document.querySelectorAll(".fc-more-popover"));
                            e && e.forEach(function(e) {
                                e.remove()
                            }), p.modal("show")
                        },
                        // rumus tanggal  +1 harus 2 angka 00 01
                       
                        events:  {!! preg_replace('/"/','', stripslashes(json_encode($w,true))) !!},
                    });

                function u() {
                    document.querySelectorAll(".event-popover").forEach(function(e) {
                        e.remove()
                    })
                }

                function h(e) {
                    return 1 < (e = e.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [e]).length && ((
                            e = e.slice(1)).pop(), e[5] = +e[0] < 12 ? " AM" : " PM", e[0] = +e[0] % 12 || 12), e = e
                        .join("")
                }
                c.render(), n.on("click", function(e) {
                    e.preventDefault();
                    var e = f("#event-title").val(),
                        t = f("#event-start-date").val(),
                        a = f("#event-end-date").val(),
                        n = f("#event-start-time").val(),
                        i = f("#event-end-time").val(),
                        r = f("#event-description").val(),
                        d = f("#event-theme").val(),
                        n = n ? "T" + n + "Z" : "",
                        i = i ? "T" + i + "Z" : "";
                    c.addEvent({
                        id: "added-event-id-" + Math.floor(9999999 * Math.random()),
                        title: e,
                        start: t + n,
                        end: a + i,
                        className: "fc-" + d,
                        description: r
                    }), s.modal("hide")
                }), a.on("click", function(e) {
                    e.preventDefault();
                    var e = f("#edit-event-title").val(),
                        t = f("#edit-event-start-date").val(),
                        a = f("#edit-event-end-date").val(),
                        n = f("#edit-event-start-time").val(),
                        i = f("#edit-event-end-time").val(),
                        r = f("#edit-event-description").val(),
                        d = f("#edit-event-theme").val(),
                        n = n ? "T" + n + "Z" : "",
                        i = i ? "T" + i + "Z" : "";
                    c.getEventById(m[0].dataset.id).remove(), c.addEvent({
                        id: m[0].dataset.id,
                        title: e,
                        start: t + n,
                        end: a + i,
                        className: "fc-" + d,
                        description: r
                    }), o.modal("hide")
                }), t.on("click", function(e) {
                    e.preventDefault(), c.getEventById(m[0].dataset.id).remove()
                }), g.Select2(".select-calendar-theme", {
                    templateResult: function(e) {
                        return e.id ? f('<span class="fc-' + e.element.value +
                            '"> <span class="dot"></span>' + e.text + "</span>") : e.text
                    }
                }), s.on("hidden.bs.modal", function(e) {
                    setTimeout(function() {
                        f("#addEventForm input,#addEventForm textarea").val(""), f("#event-theme").val(
                            "event-primary"), f("#event-theme").trigger("change.select2")
                    }, 1e3)
                }), p.on("hidden.bs.modal", function(e) {
                    f("#preview-event-header").removeClass().addClass("modal-header")
                })
            }, g.coms.docReady.push(g.Calendar)
        }(NioApp, jQuery);
    </script>
    @endif
    <script>
        feather.replace({
            class: 'foo bar',
            'stroke-width': 2
        });
    </script>
</body>

</html>
