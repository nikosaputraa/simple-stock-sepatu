<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengguna</title>
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
                            <h1 class="m-0 text-dark">Pengguna</h1>
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
                            <table class="table w-100 table-bordered table-hover" id="pengguna">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
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
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama" name="nama" required>
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
    var readUrl = '<?php echo site_url('pengguna/read') ?>';
    var addUrl = '<?php echo site_url('pengguna/add') ?>';
    var deleteUrl = '<?php echo site_url('pengguna/delete') ?>';
    var editUrl = '<?php echo site_url('pengguna/edit') ?>';
    var getPenggunaUrl = '<?php echo site_url('pengguna/get_pengguna') ?>';
    </script>


    <script>
    let url, pengguna = $("#pengguna").DataTable({
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
            data: "username"
        }, {
            data: "nama"
        }, {
            data: "action"
        }]
    });

    function reloadTable() {
        pengguna.ajax.reload()
    }

    function addData() {
        $.ajax({
            url: addUrl,
            type: "post",
            dataType: "json",
            data: $("#form").serialize(),
            success: () => {
                $(".modal").modal("hide"), Swal.fire("Sukses", "Sukses Menambahkan Data", "success"),
                    reloadTable()
            },
            error: a => {
                console.log(a)
            }
        })
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
                    url: deleteUrl,
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
                $(".modal").modal("hide"), Swal.fire("Sukses", "Sukses Mengedit Data", "success"),
                    reloadTable()
            },
            error: a => {
                console.log(a)
            }
        })
    }

    function add() {
        url = "add", $(".modal-title").html("Add Data"), $('.modal button[type="submit"]').html("Add")
    }

    function edit(a) {
        $.ajax({
            url: getPenggunaUrl,
            type: "post",
            dataType: "json",
            data: {
                id: a
            },
            success: a => {
                $('[name="id"]').val(a.id), $('[name="username"]').val(a.username), $('[name="nama"]').val(a
                    .nama), $(".modal").modal("show"), $(".modal-title").html("Edit Data"), $(
                    '.modal button[type="submit"]').html("Edit"), url = "edit"
            },
            error: a => {
                console.log(a)
            }
        })
    }
    pengguna.on("order.dt search.dt", () => {
        pengguna.column(0, {
            search: "applied",
            order: "applied"
        }).nodes().each((a, e) => {
            a.innerHTML = e + 1
        })
    }), $("#form").validate({
        errorElement: "span",
        errorPlacement: (a, e) => {
            a.addClass("invalid-feedback"), e.closest(".form-group").append(a)
        },
        submitHandler: () => {
            "edit" == url ? editData() : addData()
        }
    }), $(".modal").on("hidden.bs.modal", () => {
        $("#form")[0].reset(), $("#form").validate().resetForm()
    });
    </script>
</body>

</html>