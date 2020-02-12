<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("admin/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('keputusan/rekap') ?>">Keputusan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Rekap Keputusan</li>
                    </ol>
                </nav>

                <!-- DataTables -->
                <div class="card mb-3">
                    <div class="card-header">
                        <?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
                        <a href="<?php echo site_url('keputusan/add') ?>"><i class="fas fa-plus"></i> Tambah
                            Keputusan</a>
                        <?php else:?>
                        <?php endif;?>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-success" href="<?php echo base_url() ?>keputusan/export"
                            style="float: right;"><i class="fas fa-file-excel"></i> Export Excel</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Isi Surat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach ($surat as $surat):?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td width="200"><a
                                                href="<?php echo site_url('keputusan/tampil/'.$surat->id_k) ?>">
                                                <?php echo $surat->no_surat_no ?><?php echo $surat->no_surat_noplus ?>/<?php echo $surat->no_surat_kode?>/<?php echo $surat->no_surat_romawi?>/<?php echo $surat->no_surat_tahun?></a>
                                        </td>
                                        <td>
                                            <?php echo date_indo($surat->tanggal)?>
                                        </td>
                                        <td class="small">
                                            <?php echo $surat->isi_surat?>
                                        </td>
                                        <td width="300">
                                            <?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
                                            <a href="<?php echo site_url('keputusan/tampilPDF/'.$surat->id_k) ?>"
                                                class="btn btn-small"><i class="fas fa-copy"></i> File</a>
                                            <a href="<?php echo site_url('keputusan/edit/'.$surat->id_k) ?>"
                                                class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                            <a onclick="deleteConfirm('<?php echo site_url('keputusan/delete/'.$surat->id_k) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i
                                                    class="fas fa-trash"></i>Hapus</a>
                                            <?php else:?>
                                            <a href="<?php echo site_url('keputusan/tampilPDF/'.$surat->id_k) ?>"
                                                class="btn btn-small"><i class="fas fa-copy"></i> File</a>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php $this->load->view("admin/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("admin/scrolltop.php") ?>
    <?php $this->load->view("admin/modal.php") ?>

    <?php $this->load->view("admin/js.php") ?>

    <script>
    fun
    ction deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
    </script>
</body>

</html>
