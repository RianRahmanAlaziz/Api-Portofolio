<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-6" src="/assets/images/logo.svg">
        <span class="hidden xl:block text-white text-lg ml-3"> Indorack </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="/dashboard" class="side-menu {{ Request::is('dashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:;"
                class="side-menu {{ Request::is('dashboard/home*', 'dashboard/about*', 'dashboard/contact*', 'dashboard/my-project*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title">
                    Menu
                    <div
                        class="side-menu__sub-icon {{ Request::is('dashboard/home*', 'dashboard/about*', 'dashboard/contact*', 'dashboard/my-project*') ? 'transform rotate-180' : '' }}">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul
                class="{{ Request::is('dashboard/home*', 'dashboard/about*', 'dashboard/contact*', 'dashboard/my-project*') ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a href="/dashboard/home" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Home</div>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/about" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">About</div>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/my-project" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">My Project</div>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/contact" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Contact</div>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="/dashboard/project"
                class="side-menu {{ Request::is('dashboard/project*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="folder"></i> </div>
                <div class="side-menu__title"> Projects </div>
            </a>
        </li>
        <li>
            <a href="/dashboard/category"
                class="side-menu {{ Request::is('dashboard/category') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title"> Category </div>
            </a>
        </li>
        {{-- <li>
            <a href="/dashboard/category"
                class="side-menu {{ Request::is('dashboard/category') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title"> Category </div>
            </a>
        </li>
        <li>
            <a href="/dashboard/file-manager"
                class="side-menu {{ Request::is('dashboard/file-manager') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="folder"></i> </div>
                <div class="side-menu__title"> File Manager </div>
            </a>
        </li> --}}
        <li class="side-nav__devider my-6"></li>
    </ul>
</nav>
