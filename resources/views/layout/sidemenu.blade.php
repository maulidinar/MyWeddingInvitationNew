<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-40" src="{{ asset('imgs/logo-app.png') }}">
        {{-- <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span> --}}
    </a>
    <div class="side-nav__devider my-6"></div>
    
    <ul>
       
        @if (session()->get('auth_user')['role'] == 'admin')
        <li>
            <a href="{{ route('dash') }}" class="side-menu  {{ $menu_dashboard ?? '' }} ">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ $menu_undangan ?? '' }}">
                <div class="side-menu__icon"> <i data-feather="feather"></i> </div>
                <div class="side-menu__title"> Undangan  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ $sub_menu ?? '' }}">
                <li>
                    <a href="{{ route('template') }}" class="side-menu {{ $menu_undangan ?? '' }}">
                        <div class="menu__icon">  </div>
                        <div class="menu__title"> Template Undangan </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('undangan-list') }}" class="side-menu {{ $menu_undangan ?? '' }}">
                        <div class="menu__icon">  </div>
                        <div class="menu__title"> Kelola Undangan </div>
                    </a>
                </li>
            </ul>
        </li> 

        <li>
            <a href="{{ route('tamu') }}" class="side-menu {{ $menu_model ?? '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Data Tamu </div>
            </a>
        </li>
        
        <li>
            <a href="{{ route('laporan-tamu') }}" class="side-menu {{ $menu_laporan ?? '' }}">
                <div class="side-menu__icon"> <i data-feather="file"></i> </div>
                <div class="side-menu__title"> Laporan data Tamu </div>
            </a>
        </li>
        {{-- MENU FOTOGRAPER --}}
        @else
        <li>
            <a href="{{ route('fotograper') }}" class="side-menu {{ $menu_foto ?? '' }}">
                <div class="side-menu__icon"> <i data-feather="image"></i> </div>
                <div class="side-menu__title"> Album Foto </div>
            </a>
        </li>
        {{-- <li>
            <a href="{{ URL::to('/') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="upload"></i> </div>
                <div class="side-menu__title"> Kirim Foto</div>
            </a>
        </li> --}}
        @endif
        
        
        
        <li>
            <a href="{{ route('logout') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="power"></i> </div>
                <div class="side-menu__title"> Logout </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        
    </ul>
</nav>
<!-- END: Side Menu -->