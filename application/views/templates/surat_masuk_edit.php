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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('suratmasuk/rekap') ?>">Surat Masuk</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('suratmasuk/rekap') ?>">Rekap Surat
                                Masuk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Surat Masuk</li>
                    </ol>
                </nav>

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('suratmasuk/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php base_url('suratmasuk/edit') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <input type="hidden" name="id" value="<?php echo $surat->id_surat_masuk?>" />
                                <label class="col-md-3 control-label">Tanggal Surat Masuk</label>
                                <div class="col-md-4">
                                    <input id="datepicker" width="270" name="tanggal_agenda"
                                        value="<?php echo $surat->tanggal_agenda ?>" />
                                    <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap'
                                    });
                                    </script>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input id="timepicker" width="270" name="waktu_agenda"
                                            value="<?php echo $surat->waktu_agenda ?>" />
                                        <script>
                                        $('#timepicker').timepicker({
                                            uiLibrary: 'bootstrap'
                                        });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">No Agenda</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="no_agenda"
                                        value="<?php echo $surat->no_agenda ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Tanggal Surat</label>
                                <div class="col-md-8">
                                    <input id="datepicker2" width="270" name="tanggal_surat"
                                        value="<?php echo $surat->tanggal_surat ?>" />
                                    <script>
                                    $('#datepicker2').datepicker({
                                        uiLibrary: 'bootstrap'
                                    });
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">No Surat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="no_surat"
                                        value="<?php echo $surat->no_surat?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Asal Surat</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="asal_surat"
                                        value="<?php echo $surat->asal_surat ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Sifat Surat</label>
                                <div class="col-md-2">
                                    <select class="form-control" data-plugin-multiselect name="sifat_surat">
                                        <option value="" disabled diselected>Data saat ini :
                                            <?php echo $surat->sifat_surat?></option>
                                        <option value="Eksternal">Eksternal</option>
                                        <option value="Internal" selected>Internal</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="sifat_surat_detail"
                                        value="<?php echo $surat->sifat_surat_detail ?>">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" data-plugin-multiselect name="kelompok">
                                        <option value="" disabled diselected>Data saat ini :
                                            <?php echo $surat->kelompok?></option>
                                        <option value="Mendesak">Mendesak</option>
                                        <option value="Rahasia" selected>Rahasia</option>
                                        <option value="Biasa" selected>Biasa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Alamat</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="alamat" value="<?php echo $surat->alamat ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Isi Surat</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="perihal" value="<?php echo $surat->perihal ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input type="hidden" class="form-control" placeholder="" name="catatan_masuk"
                                        value="Belum ada catatan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label" for="name">File</label>
                                <div class="col-md-8">
                                    <input
                                        class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
                                        type="file" name="gambar" /><br>
                                    <!-- <iframe src="<?php echo base_url('upload/suratmasuk/gambar/'.$surat->gambar) ?>"
                                        style=”width: 100%;height: 100%;border: none;”></iframe> -->
                                    <input type="hidden" name="old_image" value="<?php echo $surat->gambar ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('gambar') ?>
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="Belum" />
                            </div>

                            <center><input class="btn btn-primary" type="submit" value="Submit">
                                <input class="btn btn-danger" type="reset" value="Reset"></center>
                        </form>

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

        <?php $this->load->view("admin/js.php") ?>

</body>