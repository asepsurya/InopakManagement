<div class="nk-fmg-aside-wrap">
    <div class="nk-fmg-aside-top">
        <ul class="nk-fmg-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : ''}}"><a class="nk-fmg-menu-item" href="/dashboard"><em
                        class="icon ni ni-home-alt"></em><span class="nk-fmg-menu-text">Beranda</span></a></li>

            <li class="{{ Request::is('personal*') ? 'active' : ''}}">

                <a class="nk-fmg-menu-item" href="/personal/private"><em class="icon ni ni-star"></em><span
                        class="nk-fmg-menu-text">Personal Data</span></a>
            </li>
            {{-- <li class="{{ Request::is('trash') ? 'active' : ''}}"><a class="nk-fmg-menu-item" href="/trash"><em
                        class="icon ni ni-trash-alt"></em><span class="nk-fmg-menu-text">Recovery</span></a></li> --}}
            <li class="nk-ibx-nav-head">
                <h6 class="title">Public Data</h6><a class="link" data-bs-toggle="modal"
                    data-bs-target="#modalSmall"><em class="icon ni ni-plus-c"></em></a>
            </li>
            @foreach ($dataFolder as $data )

            <li class="{{ Request::is('home/'.$title.'/'.$data->id) ? 'active' : ''}} ">
                <a class="nk-fmg-menu-item" href="{{'/home/'.$data->name.'/'.$data->id}}">
                    <em data-bs-toggle="dropdown" aria-expanded="false" class="icon ni ni-hard-drive"></em><span
                        class="nk-fmg-menu-text">{{ $data->name }} </span>
                  
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="nk-fmg-aside-bottom">
        <div class="nk-fmg-switch">
            <div class="dropdown"><a href="#" data-bs-toggle="dropdown" data-offset="-10, 12"
                    class="dropdown-toggle dropdown-indicator-unfold">
                    <div class="lead-text">{{ auth()->user()->name }}</div>
                    <div class="sub-text">Only you</div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <ul class="link-list-opt no-bdr">
                        <li><a href="#"><span>Team Plan</span></a></li>
                        <li><a class="active" href="#"><span>Personal</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>