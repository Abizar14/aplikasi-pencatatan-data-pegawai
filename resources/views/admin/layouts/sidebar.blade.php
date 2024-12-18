{{--
<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item active ">


                    <a href="{{ route('admin_dashboard') }}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>


                </li>

                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="triangle" width="20"></i>
                        <span>Pegawai</span>
                    </a>


                    <ul class="submenu">

                        <li>
                            <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
                        </li>

                    </ul>

                </li>




        </div>
    </div> --}}

    <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
<div class="sidebar-header">
    <img src="{{ asset("assets/images/logo.svg") }}" alt="" srcset="">
</div>
<div class="sidebar-menu">
    <ul class="menu">


            <li class='sidebar-title'>Main Menu</li>



            <li class="sidebar-item active ">


                <a href="{{ route('admin_dashboard') }}" class='sidebar-link'>
                    <i data-feather="home" width="20"></i>
                    <span>Dashboard</span>
                </a>


            </li>

            <li class="sidebar-item  has-sub">

                <a href="#" class='sidebar-link'>
                    <i data-feather="triangle" width="20"></i>
                    <span>Pegawai</span>
                </a>


                <ul class="submenu">

                    <li>
                        <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
                    </li>

                </ul>

            </li>

    </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
    </div>
