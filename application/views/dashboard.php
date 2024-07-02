<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <?php $this->load->view('partials/head'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php $this->load->view('includes/nav'); ?>

        <?php $this->load->view('includes/aside'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>


            <!-- /.content-header -->

            <!-- Main content -->
          <section class="content">
                <div class="container-fluid">

                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Stok Produk</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart" style="height: 250px;max-height: 250px; overflow-y: scroll;">
                                    <ul class="list-group" id="stok_produk">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('includes/footer'); ?>

    <?php $this->load->view('partials/footer'); ?>
    <script src="<?php echo base_url('assets/vendor/adminlte/plugins/chart.js/Chart.min.js') ?>"></script>
    <script>
    var transaksi_hariUrl = '<?php echo site_url('transaksi/transaksi_hari') ?>';
    var transaksi_terakhirUrl = '<?php echo site_url('transaksi/transaksi_terakhir') ?>';
    var stok_hariUrl = '<?php echo site_url('stok_masuk/stok_hari') ?>';
    var produk_terlarisUrl = '<?php echo site_url('produk/produk_terlaris') ?>';
    var data_stokUrl = '<?php echo site_url('produk/data_stok') ?>';
    var penjualan_bulanUrl = '<?php echo site_url('transaksi/penjualan_bulan') ?>';
    </script>
    <script src="<?php echo base_url('assets/js/unminify/dashboard.js') ?>"></script>
</body>

</html>