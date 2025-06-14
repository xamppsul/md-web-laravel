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

            <!-- menu home for user session -->
            @if (Auth::guard('user')->check())
                <li class="no-sub">
                    <a class="{{ request()->routeis('user.view.dashboard') ? 'active' : '' }}"
                        href="{{ route('user.view.dashboard') }}">
                        <i class="iconoir-home-alt"></i>Home
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
                    <li class="menu-title"><span>File Manager</span></li>
                    <li class="no-sub">
                        <a class="{{ request()->routeis('uppsfaculty.FileManager.index') ? 'active' : '' }}"
                            href="{{ route('uppsfaculty.FileManager.index') }}">
                            <i class="iconoir-drawer"></i> El Finder Faculty
                        </a>
                    </li>
                @else
                    <!-- dosen/staff -->
                    <li class="menu-title"><span>Module</span></li>
                    <li>
                        <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#ui-kits">

                            <i class="iconoir-book"></i>
                            Catur Darma
                        </a>
                        <ul class="collapse" id="ui-kits">
                            <li><a href="{{ route('staffdosen.BahanAjar.index') }}">Pendidikan</a></li>
                            <li><a href="{{ route('staffdosen.Penelitian.index') }}">Penelitian</a></li>
                            <li><a href="{{ route('staffdosen.ListPublikasi.index') }}">Publikasi</a></li>
                            <li><a href="{{ route('staffdosen.Pengabdian.index') }}">Pengabdian</a></li>
                            <li><a href="{{ route('staffdosen.RiwayatJabatan.index') }}">Riwayat Jabatan</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"><span>File Manager</span></li>
                    <li class="no-sub">
                        <a class="{{ request()->routeis('staffdosen.FileManager.index') ? 'active' : '' }}"
                            href="{{ route('staffdosen.FileManager.index') }}">
                            <i class="iconoir-drawer"></i> El Finder staff Dosen
                        </a>
                    </li>
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
