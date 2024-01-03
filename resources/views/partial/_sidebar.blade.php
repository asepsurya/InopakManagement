<div class="nk-fmg-aside-wrap">
    <div class="nk-fmg-aside-top">
        <ul class="nk-fmg-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nk-fmg-menu-item" href="/dashboard"><em
                        class="icon ni ni-home-alt"></em><span class="nk-fmg-menu-text">Beranda</span></a></li>

            <li class="{{ Request::is('personal*') ? 'active' : '' }}">

                <a class="nk-fmg-menu-item" href="/personal/private"><em class="icon ni ni-star"></em><span
                        class="nk-fmg-menu-text">Personal Data</span></a>
            </li>
            {{-- <li class="{{ Request::is('trash') ? 'active' : ''}}"><a class="nk-fmg-menu-item" href="/trash"><em
                        class="icon ni ni-trash-alt"></em><span class="nk-fmg-menu-text">Recovery</span></a></li> --}}
            <li class="nk-ibx-nav-head">
                <h6 class="title">Public Data</h6><a class="link" data-bs-toggle="modal"
                    data-bs-target="#modalSmall"><em class="icon ni ni-plus-c"></em></a>
            </li>
        </ul>
        <ul class="nk-ibx-label mb-2">
            @foreach ($dataFolder as $data)
                <li class="{{ Request::is('home/' . $title . '/' . $data->id) ? 'active' : '' }} ">
                    <a href="{{ '/home/' . $data->name . '/' . $data->id }}" class="nk-fmg-menu-item"><span
                            class="icon ni ni-folder  "></span>
                        <span class="nk-fmg-menu-text">{{ Str::limit($data->name, 11) }}</span></a>
                    @if (request::is('dashboard'))
                    @elseif(request::is('personal*'))
                    @else
                        <div class="dropdown">
                            @foreach ($ambilID as $a)
                                <a data-bs-toggle="modal" data-bs-target="#ModalEditDrive-{{ $a->id }}"
                                    class="dropdown-toggle">
                                    <em class="icon ni ni-pen"></em>
                                </a>
                            @endforeach
                        </div>
                    @endif
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
