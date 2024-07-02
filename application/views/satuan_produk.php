<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Satuan Produk</title>
    <link rel="stylesheet"
        href="<?php echo base_url('assets/vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2/sweetalert2.min.css') ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
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
                            <h1 class="m-0 text-dark">Satuan Produk</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal"
                                onclick="add()">Add</button>
                        </div>
                        <div class="card-body">
                            <table class="table w-100 table-bordered table-hover" id="satuan_produk">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Satuan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Data</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" placeholder="Satuan" name="satuan" required>
                        </div>
                        <button class="btn btn-success" type="submit">Add</button>
                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('includes/footer'); ?>
    <?php $this->load->view('partials/footer'); ?>
    <script src="<?php echo base_url('assets/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script
        src="<?php echo base_url('assets/vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>">
    </script>
    <script src="<?php echo base_url('assets/vendor/adminlte/plugins/jquery-validation/jquery.validate.min.js') ?>">
    </script>
    <script src="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script>
    var readUrl = '<?php echo site_url('satuan_produk/read') ?>';
    var addUrl = '<?php echo site_url('satuan_produk/add') ?>';
    var removeUrl = '<?php echo site_url('satuan_produk/delete') ?>';
    var editUrl = '<?php echo site_url('satuan_produk/edit') ?>';
    var get_satuanUrl = '<?php echo site_url('satuan_produk/get_satuan') ?>';
    </script>

    <script>
    let url,
        satuan_produk = $("#satuan_produk").DataTable({
            responsive: !0,
            scrollX: !0,
            ajax: readUrl,
            columnDefs: [{
                searcable: !1,
                orderable: !1,
                targets: 0
            }],
            order: [
                [1, "asc"]
            ],
            columns: [{
                data: null
            }, {
                data: "satuan"
            }, {
                data: "action"
            }],
        });

    function reloadTable() {
        satuan_produk.ajax.reload();
    }

    function addData() {
        $.ajax({
            url: addUrl,
            type: "post",
            dataType: "json",
            data: $("#form").serialize(),
            success: () => {
                $(".modal").modal("hide"),
                    Swal.fire("Sukses", "Sukses Menambahkan Data", "success"),
                    reloadTable();
            },
            error: (a) => {
                console.log(a);
            },
        });
    }

    function remove(a) {
        Swal.fire({
            title: "Hapus",
            text: "Hapus data ini?",
            type: "warning",
            showCancelButton: true,
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire("Batal", "Penghapusan dibatalkan", "info");
            } else {
                // Lanjutkan dengan proses penghapusan karena pengguna menekan tombol OK atau menutup dialog
                $.ajax({
                    url: removeUrl,
                    type: "post",
                    dataType: "json",
                    data: {
                        id: a
                    },
                    success: () => {
                        Swal.fire("Sukses", "Sukses Menghapus Data", "success");
                        reloadTable();
                    },
                    error: (a) => {
                        console.log(a);
                    },
                });
            }
        });
    }


    function editData() {
        $.ajax({
            url: editUrl,
            type: "post",
            dataType: "json",
            data: $("#form").serialize(),
            success: () => {
                $(".modal").modal("hide"),
                    Swal.fire("Sukses", "Sukses Mengedit Data", "success"),
                    reloadTable();
            },
            error: (a) => {
                console.log(a);
            },
        });
    }

    function add() {
        (url = "add"),
        $(".modal-title").html("Add Data"),
            $('.modal button[type="submit"]').html("Add");
    }

    function edit(a) {
        $.ajax({
            url: get_satuanUrl,
            type: "post",
            dataType: "json",
            data: {
                id: a
            },
            success: (a) => {
                $('[name="id"]').val(a.id),
                    $('[name="satuan"]').val(a.satuan),
                    $(".modal").modal("show"),
                    $(".modal-title").html("Edit Data"),
                    $('.modal button[type="submit"]').html("Edit"),
                    (url = "edit");
            },
            error: (a) => {
                console.log(a);
            },
        });
    }
    satuan_produk.on("order.dt search.dt", () => {
            satuan_produk
                .column(0, {
                    search: "applied",
                    order: "applied"
                })
                .nodes()
                .each((a, e) => {
                    a.innerHTML = e + 1;
                });
        }),
        $("#form").validate({
            errorElement: "span",
            errorPlacement: (a, e) => {
                a.addClass("invalid-feedback"), e.closest(".form-group").append(a);
            },
            submitHandler: () => {
                "edit" == url ? editData() : addData();
            },
        }),
        $(".modal").on("hidden.bs.modal", () => {
            $("#form")[0].reset(), $("#form").validate().resetForm();
        });
    </script>

</body>

</html>