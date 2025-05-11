<!-- Menu Navigation starts -->
<nav>
    <div class="app-logo">
        <a class="logo d-inline-block" href="{{ __('index') }}">
            <img src="{{ asset('../assets/images/logo/1.png') }}" alt="#">
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
                    <span class="badge text-primary-dark bg-primary-300  badge-notification ms-2">4</span>
                </a>
                <ul class="collapse" id="dashboard">
                    <li><a href="{{ __('index') }}">Project</a></li>
                    <li><a href="{{ __('ecommerce_dashboard') }}">Ecommerce</a></li>
                </ul>
            </li>
            <li class="menu-title"><span>Master</span></li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#ui-kits">

                    <i class="iconoir-hard-drive"></i>
                    Master Data
                </a>
                <ul class="collapse" id="ui-kits">
                    <li><a href="{{ __('cheatsheet') }}">Aset</a></li>
                    <li><a href="{{ __('alert') }}">Mou/Moa</a></li>
                    <li><a href="{{ __('badges') }}">Kegiatan</a></li>
                </ul>
            </li>
            <li class="menu-title"><span>File Manager</span></li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#file-manager">

                    <i class="iconoir-drawer"></i>
                    El Finder
                </a>
                <ul class="collapse" id="file-manager">
                    <li><a href="{{ __('cheatsheet') }}">User Directory</a></li>
                </ul>
            </li>


        </ul>
    </div>

    <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
    </div>

</nav>
<!-- Menu Navigation ends -->
