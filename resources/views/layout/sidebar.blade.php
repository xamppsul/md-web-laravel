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
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#dashboard">
                    <i class="iconoir-home-alt"></i>
                    dashboard
                    {{-- <span class="badge text-primary-dark bg-primary-300  badge-notification ms-2">4</span> --}}
                </a>
                <ul class="collapse" id="dashboard">
                    @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->roles_id == 1)
                        <li><a href="{{ route('admin.view.dashboard') }}">Administrator</a></li>
                    @endif
                    @if (Auth::guard('user')->check())
                        @if (Auth::guard('user')->user()->roles_id != 2)
                            <li><a href="{{ route('user.view.dashboard') }}">Uppsorfakultas</a></li>
                        @else
                            <li><a href="{{ route('user.view.dashboard') }}">Staffordosen</a></li>
                        @endif
                    @endif
                </ul>
            </li>
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
                    <a class="" href="{{ route('admin.log-user.index') }}">
                        <i class="iconoir-database-warning"></i> Log
                    </a>
                </li>
            @endif

            <!-- menus for user session-->
            @if (Auth::guard('user')->check())
                <!-- faculty role -->
                @if (Auth::guard('user')->user()->roles_id != 2)
                    <li class="menu-title"><span>Module</span></li>
                    <li class="no-sub">
                        <a class="{{ request()->routeis('uppsfaculty.Asset.index') ? 'active' : '' }}"
                            href="{{ route('uppsfaculty.Asset.index') }}">
                            <i class="iconoir-database-monitor"></i> Aset
                        </a>
                    </li>
                    <li class="no-sub">
                        <a class="{{ request()->routeis('uppsfaculty.MouMoa.index') ? 'active' : '' }}"
                            href="{{ route('uppsfaculty.MouMoa.index') }}">
                            <i class="iconoir-notes"></i>Kerjasama
                        </a>
                    </li>
                    <li class="no-sub">
                        <a class="{{ request()->routeis('uppsfaculty.Kegiatan.index') ? 'active' : '' }}"
                            href="{{ route('uppsfaculty.Kegiatan.index') }}">
                            <i class="iconoir-activity"></i>Kegiatan
                        </a>
                    </li>
                @else
                    <!-- dosen/staff -->
                @endif
            @endif
        </ul>
    </div>

    <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
    </div>

</nav>
<!-- Menu Navigation ends -->
