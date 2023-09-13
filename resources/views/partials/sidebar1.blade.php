<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Main-->
    <div class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 d-flex flex-column" id="kt_app_sidebar_main" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px">
        <!--begin::Sidebar menu-->
        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="flex-column-fluid menu menu-sub-indention menu-column menu-rounded menu-active-bg mb-7">
            <!--begin:Menu item-->
            <div class="menu-item  menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-element-11 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <!--end:Menu link-->
            </div>

            <!--begin:Menu item-->
            <div class="menu-item  menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link {{ Request::is('pages/pembelian-bahan') ? 'active' : '' }}" href="pages/pembelian-bahan">   
                    <span class="menu-icon">
                        <i class="ki-duotone ki-shop fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                        </i>
                    </span>
                    <span class="menu-title">Pembelian Bahan</span>
                </a>
                <!--end:Menu link-->
            </div>

            <!--begin:Menu item-->
            <div class="menu-item  menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link {{ Request::is('pages/penjualan') ? 'active' : '' }}" href="pages/penjualan">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-dollar fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        </i>
                    </span>
                    <span class="menu-title">Penjualan</span>
                </a>
                <!--end:Menu link-->
            </div>

            <!--begin:Menu item-->
            <div class="menu-item  menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link {{ Request::is('pages/laba_rugi') ? 'active' : '' }}" href="pages/laba_rugi">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-chart-simple fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title">Laba Rugi</span>
                </a>
                <!--end:Menu link-->
            </div>

            <!--begin:Menu item-->
            <div class="menu-item  menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link {{ Request::is('pages/stock-barang') ? 'active' : '' }}" href="pages/stock-barang">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-lots-shopping fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                            <span class="path6"></span>
                            <span class="path7"></span>
                            <span class="path8"></span>
                        </i>
                    </span>
                    <span class="menu-title">Stock Barang</span>
                </a>
                <!--end:Menu link-->
            </div>

            <div class="separator separator-dashed my-5"></div>

            <!--begin:Menu item-->
            <div class="menu-item  menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link {{ Request::is('pages/users') ? 'active' : '' }}" href="pages/users">

                    <span class="menu-icon">
                        <i class="ki-duotone ki-user fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                    <span class="menu-title">Users</span>
                </a>
                <!--end:Menu link-->
            </div>

            <div class="menu-item  menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link {{ Request::is('pages/manage') ? 'active' : '' }}" href="pages/manage">

                    <span class="menu-icon">
                        <i class="ki-solid ki-gear fs-1"></i>
                    </span>
                    <span class="menu-title">Manage</span>
                </a>
                <!--end:Menu link-->
            </div>



            <!--end:Menu item-->
            <!--begin:Menu item-->

            {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('pages/manage/users','pages/manage/settings','pages/stock-barang','pages/penjualan','pages/transaksi/penjualan','pages/transaksi/pengeluaran', 'pages/transaksi/pendapatan', 'pages/*/edit-data-menu','pages/transaksi/laporan/*' ) ? 'hover show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-some-files fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                    <span class="menu-title">Pages</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('pages/manage/users','pages/manage/settings') ? 'hover show' : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Manage</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is('pages/manage/users') ? 'active' : '' }}" href="/pages/manage/users">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Users</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is('pages/manage/settings') ? 'active' : '' }}" href="/pages/manage/settings">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Settings</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('pages/penjualan','pages/stock-barang','pages/*/edit-data-menu') ? 'hover show' : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Menu</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is('pages/stock-barang') ? 'active' : '' }}" href="/pages/stock-barang">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Stok Barang</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is('pages/penjualan') ? 'active' : '' }}" href="/pages/penjualan">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Penjualan</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('pages/transaksi/penjualan','pages/transaksi/pengeluaran','pages/transaksi/pendapatan','pages/transaksi/laporan/*') ? 'hover show' : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Transaksi</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is('pages/transaksi/penjualan') ? 'active' : '' }}" href="/pages/transaksi/penjualan">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Detail Penjualan</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is('pages/transaksi/pengeluaran') ? 'active' : '' }}" href="/pages/transaksi/pengeluaran">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Detail Pengeluaran</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is('pages/transaksi/pendapatan') ? 'active' : '' }}" href="/pages/transaksi/pendapatan">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Detail Laporan</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div> --}}

            <!--end:Menu item-->
        </div>
        <!--end::Sidebar menu-->
    </div>
    <!--end::Main-->
</div>