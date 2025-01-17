<!-- Main Sidebar Container -->
<style>
    /* Custom CSS for logo animation */
    .logo-img {
        display: block;
        width: 80px;
        margin: 20px auto;
        transition: width 0.3s ease;
    }

    /* CSS for collapsed sidebar */
    .sidebar-collapse .logo-img {
        width: 40px; /* Adjust the width as needed */
    }
</style>

<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <center>
        <img class="brand-image logo-img mt-4"
            src="<?php echo site_url('assets/image/shop-logo.png') ?>">
    </center>
    <a href="<?php echo site_url('') ?>" class="brand-link text-center">
        <span class="brand-text font-weight-bold"><?php echo $this->session->userdata('toko')->nama ?></span>
    </a>
    <?php $uri = $this->uri->segment(1) ?>
    <?php $role = $this->session->userdata('role'); ?>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo site_url('dashboard') ?>"
                        class="nav-link <?php echo $uri == 'dashboard' || $uri == '' ? 'active' : 'no' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li
                    class="nav-item has-treeview <?php echo $uri == 'produk' || $uri == 'kategori_produk' || $uri == 'satuan_produk' ? 'menu-open' : 'no' ?>">
                    <a href="#"
                        class="nav-link <?php echo $uri == 'produk' || $uri == 'kategori_produk' || $uri == 'satuan_produk' ? 'active' : 'no' ?>">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Produk
                        </p>
                        <i class="right fas fa-angle-right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('kategori_produk') ?>"
                                class="nav-link <?php echo $uri == 'kategori_produk' ? 'active' : 'no' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Kategori Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('satuan_produk') ?>"
                                class="nav-link <?php echo $uri == 'satuan_produk' ? 'active' : 'no' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Satuan Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('produk') ?>"
                                class="nav-link <?php echo $uri == 'produk' ? 'active' : 'no' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Produk
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview <?php echo $uri == 'stok_masuk' || $uri == 'stok_keluar' ? 'menu-open' : 'no' ?>">
                    <a href="#"
                        class="nav-link <?php echo $uri == 'stok_masuk' || $uri == 'stok_keluar' ? 'active' : 'no' ?>">
                        <i class="fas fa-archive nav-icon"></i>
                        <p>Stok</p>
                        <i class="right fas fa-angle-right"></i>
                    </a>
                    <ul class="nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('stok_masuk') ?>"
                                class="nav-link <?php echo $uri == 'stok_masuk' ? 'active' : 'no' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stok Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('stok_keluar') ?>"
                                class="nav-link <?php echo $uri == 'stok_keluar' ? 'active' : 'no' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stok Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview <?php echo $uri == 'laporan_penjualan' || $uri == 'laporan_stok_masuk' || $uri == 'laporan_stok_keluar' ? 'menu-open' : 'no' ?>">
                    <a href="<?php echo site_url('laporan') ?>"
                        class="nav-link <?php echo $uri == 'laporan_penjualan' || $uri == 'laporan_stok_masuk' || $uri == 'laporan_stok_keluar' ? 'active' : 'no' ?>">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Laporan</p>
                        <i class="right fas fa-angle-right"></i>
                    </a>
                    <ul class="nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo site_url('laporan_stok_masuk') ?>"
                                class="nav-link <?php echo $uri == 'laporan_stok_masuk' ? 'active' : 'no' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Stok Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('laporan_stok_keluar') ?>"
                                class="nav-link <?php echo $uri == 'laporan_stok_keluar' ? 'active' : 'no' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Stok Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if ($role === 'admin'): ?>
                <li class="nav-item">
                    <a href="<?php echo site_url('pengaturan') ?>"
                        class="nav-link <?php echo $uri == 'pengaturan' ? 'active' : 'no' ?>">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('pengguna') ?>"
                        class="nav-link <?php echo $uri == 'pengguna' ? 'active' : 'no' ?>">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <?php endif ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>