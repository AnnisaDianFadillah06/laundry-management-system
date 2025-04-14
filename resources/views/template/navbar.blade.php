<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/dashboard" class="site_title"><i class="fa fa-magic" ></i><span> DICUCIIN</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ session('urlFotoProfil') }}" alt="..." class="img-circle profile_img" width="50px" height="50px">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ session('nama_user') }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                @if(Auth::user()->role == 'Admin')
                    <li><a><i class="fa fa-table"></i> Master <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <!-- <li><a href="tables_dynamic.html">Data Kategori</a></li> -->
                            <li><a href="/dataOutlet">Data Outlet</a></li>
                            <li><a href="/dataPaket">Data Paket</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->role == 'Kasir' || Auth::user()->role == 'Admin')
                    <li><a><i class="fa fa-shopping-cart"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/registrasiPelanggan">Registrasi Pelanggan</a></li>
                            <li><a href="/dataPelanggan">Kelola Layanan</a></li>
                            <li><a href="/transaksi">Transaksi</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->role == 'Owner' || Auth::user()->role == 'Admin')
                    <li><a><i class="fa fa-desktop"></i> Lainnya <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/laporanTransaksi">Laporan</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            @if(Auth::user()->role == 'Admin')
            <div class="menu_section">
                <h3>Pengaturan</h3>
                <ul class="nav side-menu">
               
                    <li><a><i class="fa fa-users"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/dataPengguna">Data Pengguna</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @endif
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>