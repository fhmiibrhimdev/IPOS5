<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css" />
    <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="/assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="/assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">

    <!-- Template CSS -->
    <style>
        .dropdown-menu.show {
            display: block !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="font-family: 'Inter', sans-serif;">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"> 
                                <i class="fas fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle">
                        <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep">
                            <i class="far fa-envelope"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b>
                                        <p>Hello, Bro!</p>
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-2.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Dedik Sugiharto</b>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-3.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Agung Ardiansyah</b>
                                        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-4.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Ardian Rahardiansyah</b>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                        <div class="time">16 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-5.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Alfa Zulkarnain</b>
                                        <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle">
                        <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
                            <i class="far fa-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc"> Template update is available now! <div
                                            class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends <div class="time">10 Hours
                                            Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-danger text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="dropdown-item-desc"> Low disk space. Let's clean it! <div class="time">
                                            17 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc"> Welcome to Stisla template! <div class="time">
                                            Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user flex">
                            <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="{{ url('profile') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile </a>
                            <a href="{{ url('') }}" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities </a>
                            <a href="{{ url('') }}" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item text-danger has-icon"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    <i class="far fa-sign-out-alt"></i> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ url('/dashboard') }}">IPOS5</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ url('/dashboard') }}">IPOS5</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="dropdown {{ request()->is('dashboard') || request()->is('general-dashboard') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown">
                                <i class="fas fa-fire"></i>
                                <span>Dashboard</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="{{ request()->is('general-dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/dashboard') }}">General Dashboard</a></li>
                            </ul>
                        </li>

                        <li class="menu-header">MASTER DATA</li>
                        <li class="dropdown 
                            {{ request()->is('master-data/item') || request()->is('master-data/kartu-stok') || request()->is('master-data/barcode') || request()->is('master-data/datasheet') ? 'active' : '' }}
                            ">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="far fa-box"></i>
                                <span>Data Item</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('master-data/item') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/item') }}">Daftar Item</a></li>
                                <li class="{{ request()->is('master-data/kartu-stok') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/kartu-stok') }}">Kartu Stok</a></li>
                                <li class="{{ request()->is('master-data/barcode') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/barcode') }}">Barcode</a></li>
                                <li class="{{ request()->is('master-data/datasheet') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/datasheet') }}">Datasheet</a></li>
                            </ul>
                        </li>
                        <li class="dropdown
                            {{ request()->is('master-data/supplier') || request()->is('master-data/pelanggan') || request()->is('master-data/pelanggan/grup') || request()->is('master-data/pelanggan/point') ? 'active' : '' }}
                            ">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="far fa-users"></i>
                                <span>Data data</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('master-data/supplier') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/supplier') }}">Daftar Supplier</a></li>
                                <li class="{{ request()->is('master-data/pelanggan') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/pelanggan') }}">Daftar Pelanggan</a></li>
                                <li class="{{ request()->is('master-data/pelanggan/grup') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/pelanggan/grup') }}">Daftar Grup Pelanggan</a></li>
                                <li class="{{ request()->is('master-data/pelanggan/point') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/pelanggan/point') }}">Daftar Point Pelanggan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown
                            {{ request()->is('master-data/satuan') || request()->is('master-data/jenis') || request()->is('master-data/bank') || request()->is('master-data/emoney') ? 'active' : '' }}
                            ">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="far fa-chalkboard"></i>
                                <span>Data Pendukung</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('master-data/satuan') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/satuan') }}">Satuan</a></li>
                                <li class="{{ request()->is('master-data/jenis') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/jenis') }}">Jenis</a></li>
                                <li class="{{ request()->is('master-data/bank') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/bank') }}">Bank</a></li>
                                <li class="{{ request()->is('master-data/emoney') ? 'active' : '' }}"><a class="nav-link" href="{{ url('master-data/emoney') }}">E-Money</a></li>
                            </ul>
                        </li>

                        <li class="menu-header">PEMBELIAN</li>
                        <li class="{{ request()->is('pembelian/pesanan-pembelian') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pembelian/pesanan-pembelian') }}"><i class="far fa-money-check"></i> <span>Pesanan Pembelian</span></a></li>
                        <li class="dropdown
                            {{ request()->is('pembelian/pembelian') || request()->is('pembelian/history-harga-beli') ? 'active' : '' }}
                            ">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="far fa-store-alt"></i>
                                <span>Pembelian</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('pembelian/pembelian') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pembelian/pembelian') }}">Daftar Pembelian</a></li>
                                <li class="{{ request()->is('pembelian/history-harga-beli') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pembelian/history-harga-beli') }}">History Harga Beli</a></li>
                            </ul>
                        </li>
                        <li class="dropdown
                            {{ request()->is('pembelian/pembayaran') || request()->is('pembelian/status-lunas-hutang') ? 'active' : '' }}
                            ">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="far fa-money-bill"></i>
                                <span>Bayar Hutang</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('pembelian/pembayaran') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pembelian/pembayaran') }}">Daftar Pembayaran</a></li>
                                <li class="{{ request()->is('pembelian/status-lunas-hutang') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pembelian/status-lunas-hutang') }}">Status Lunas BG/Cek</a></li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('pembelian/retur-pembelian') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pembelian/retur-pembelian') }}"><i class="far fa-inbox-out"></i> <span>Retur Pembelian</span></a></li>

                        <li class="menu-header">PENJUALAN</li>
                        <li class="{{ request()->is('penjualan/pesanan-penjualan') ? 'active' : '' }}"><a class="nav-link" href="{{ url('penjualan/pesanan-penjualan') }}"><i class="far fa-money-check-alt"></i> <span>Pesanan Penjualan</span></a></li>
                        <li class="dropdown
                            {{ request()->is('penjualan/penjualan') || request()->is('penjualan/penjualan/kasir') || request()->is('penjualan/history-harga-jual') ? 'active' : '' }}
                            ">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="far fa-cart-plus"></i>
                                <span>Penjualan</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('penjualan/penjualan') ? 'active' : '' }}"><a class="nav-link" href="{{ url('penjualan/penjualan') }}">Daftar Penjualan</a></li>
                                <li class="{{ request()->is('penjualan/penjualan/kasir') ? 'active' : '' }}"><a class="nav-link" href="{{ url('penjualan/penjualan/kasir') }}">Daftar Penjualan Kasir</a></li>
                                <li class="{{ request()->is('penjualan/history-harga-jual') ? 'active' : '' }}"><a class="nav-link" href="{{ url('penjualan/history-harga-jual') }}">History Harga Jual</a></li>
                            </ul>
                        </li>
                        <li class="dropdown
                            {{ request()->is('penjualan/pembayaran') || request()->is('penjualan/status-lunas-piutang') ? 'active' : '' }}
                            ">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="far fa-wallet"></i>
                                <span>Bayar Piutang</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('penjualan/pembayaran') ? 'active' : '' }}"><a class="nav-link" href="{{ url('penjualan/pembayaran') }}">Daftar Pembayaran</a></li>
                                <li class="{{ request()->is('penjualan/status-lunas-piutang') ? 'active' : '' }}"><a class="nav-link" href="{{ url('penjualan/status-lunas-piutang') }}">Status Lunas BG/Cek</a></li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('penjualan/retur-penjualan') ? 'active' : '' }}"><a class="nav-link" href="{{ url('penjualan/retur-penjualan') }}"><i class="far fa-inbox-out"></i> <span>Retur Penjualan</span></a></li>

                        <li class="menu-header">PERSEDIAAN</li>
                        <li class="{{ request()->is('persediaan/stok-masuk') ? 'active' : '' }}"><a class="nav-link" href="{{ url('persediaan/stok-masuk') }}"><i class="far fa-inbox-in"></i> <span>Daftar Item Masuk</span></a></li>
                        <li class="{{ request()->is('persediaan/stok-keluar') ? 'active' : '' }}"><a class="nav-link" href="{{ url('persediaan/stok-keluar') }}"><i class="far fa-inbox-out"></i> <span>Daftar Item Keluar</span></a></li>
                        <li class="{{ request()->is('persediaan/saldo-awal-item') ? 'active' : '' }}"><a class="nav-link" href="{{ url('persediaan/saldo-awal-item') }}"><i class="far fa-pallet-alt"></i> <span>Saldo Awal Item</span></a></li>
                        <li class="{{ request()->is('persediaan/stok-opname') ? 'active' : '' }}"><a class="nav-link" href="{{ url('persediaan/stok-opname') }}"><i class="far fa-inventory"></i> <span>Stok Opname</span></a></li>

                        <li class="menu-header">KAS</li>
                        <li class="{{ request()->is('kas/akun') ? 'active' : '' }}"><a class="nav-link" href="{{ url('kas/akun') }}"><i class="far fa-book-open"></i> <span>Daftar Akun</span></a></li>
                        <li class="dropdown
                            {{ request()->is('kas/masuk') || request()->is('kas/keluar') || request()->is('kas/transfer') ? 'active' : '' }}
                            ">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="far fa-money-bill"></i>
                                <span>Kas</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('kas/masuk') ? 'active' : '' }}"><a class="nav-link" href="{{ url('kas/masuk') }}">Kas Masuk</a></li>
                                <li class="{{ request()->is('kas/keluar') ? 'active' : '' }}"><a class="nav-link" href="{{ url('kas/keluar') }}">Kas Keluar</a></li>
                                <li class="{{ request()->is('kas/transfer') ? 'active' : '' }}"><a class="nav-link" href="{{ url('kas/transfer') }}">Kas Transfer</a></li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('kas/buku-besar') ? 'active' : '' }}"><a class="nav-link" href="{{ url('kas/buku-besar') }}"><i class="far fa-hands-usd"></i> <span>Buku Besar</span></a></li>
                        <li class="dropdown
                            {{ request()->is('kas/saldo-awal-akun') || request()->is('kas/saldo-awal-hutang') || request()->is('kas/saldo-awal-piutang') ? 'active' : '' }}
                            ">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="far fa-cogs"></i>
                                <span>Pengaturan</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('kas/saldo-awal-akun') ? 'active' : '' }}"><a class="nav-link" href="{{ url('kas/saldo-awal-akun') }}">Saldo Awal Akun</a></li>
                                <li class="{{ request()->is('kas/saldo-awal-hutang') ? 'active' : '' }}"><a class="nav-link" href="{{ url('kas/saldo-awal-hutang') }}">Saldo Awal Hutang</a></li>
                                <li class="{{ request()->is('kas/saldo-awal-piutang') ? 'active' : '' }}"><a class="nav-link" href="{{ url('kas/saldo-awal-piutang') }}">Saldo Awal Piutang</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    </div>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                {{ $slot }}
            </div>
            <footer class="main-footer">
                <div class="footer-left"> Copyright &copy; 2024 <div class="bullet"></div> Created By <a
                        href="https://www.fahmiibrahimdev.tech/">Fahmi Ibrahim</a>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>
    </div>

    @livewireScripts
    <!-- General JS Scripts -->
    <script src="/assets/modules/jquery.min.js"></script>
    <script src="/assets/modules/popper.js"></script>
    <script src="/assets/modules/tooltip.js"></script>
    <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/modules/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>
    <!-- JS Libraies -->
    {{-- <script src="/assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="/assets/modules/chart.min.js"></script>
    <script src="/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> --}}
    <!-- Page Specific JS File -->
    {{-- <script src="/assets/js/page/index-0.js"></script> --}}
    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>

</html>