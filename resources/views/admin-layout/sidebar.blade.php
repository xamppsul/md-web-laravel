<!-- Menu Navigation starts -->
<nav>
    <div class="app-logo">
        <a class="logo d-inline-block" href="{{ __('index') }}">
            <img src="{{ asset('/assets/images/logo/umk.png') }}" alt="#">
        </a>

        <span class="bg-light-primary toggle-semi-nav">
            <i class="ti ti-chevrons-right f-s-20"></i>
        </span>
    </div>
    <div class="app-nav" id="app-simple-bar">
        <ul class="main-nav p-0 mt-2">
            <li class="menu-title">
                <span>Dashboard</span>
            </li>

            <!-- menu home for admin session -->
            @if (Auth::guard('admin')->check())
                <li class="no-sub">
                    <a class="{{ request()->routeis('admin.view.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.view.dashboard') }}">
                        <i class="iconoir-home-alt"></i>Home
                    </a>
                </li>
            @endif

            <!-- menus for admin session-->
            @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->roles_id == 1)
                <li class="menu-title"><span>Master</span></li>
                <li>
                    <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#ui-kits">

                        <i class="iconoir-hard-drive"></i>
                        Master Data
                    </a>
                    <ul class="collapse" id="ui-kits">
                        <li><a href="{{ route('admin.master.Asset.index') }}">Aset</a></li>
                        <li><a href="{{ route('admin.master.MouMoa.index') }}">Mou/Moa</a></li>
                        <li><a href="{{ route('admin.master.Kegiatan.index') }}">Kegiatan</a></li>
                        <li><a href="{{ route('admin.master.UserMaster.index') }}">User</a></li>
                    </ul>
                </li>
                <li class="menu-title"><span>File Manager</span></li>
                <li>
                    <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#file-manager">

                        <i class="iconoir-drawer"></i>
                        El Finder
                    </a>
                    <ul class="collapse" id="file-manager">
                        <li><a href="{{ route('admin.elfinder.index') }}">User Directory</a></li>
                    </ul>
                </li>
                <li class="menu-title"><span>Logs</span></li>
                <li class="no-sub">
                    <a class="{{ request()->routeis('admin.log-user.index') ? 'active' : '' }}"
                        href="{{ route('admin.log-user.index') }}">
                        <i class="iconoir-database-warning"></i> Log
                    </a>
                </li>
            @endif
        </ul>
    </div>

    <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
    </div>

</nav>
<!-- Menu Navigation ends -->
