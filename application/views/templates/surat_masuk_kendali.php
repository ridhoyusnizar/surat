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
                    <?php if($this->session->userdata('akses')=='3'):?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Disposisi</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Rekap Disposisi</a></li>
                    <?php else:?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Disposisi</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Rekap Disposisi</a></li>
                    <?php endif;?>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Disposisi</li>
                  </ol>
                </nav>

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <?php if($this->session->userdata('akses')=='3'):?>
                            <a href="<?php echo site_url('disposisi/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php else:?>
                            <a href="<?php echo site_url('disposisi/rekapSaya') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php endif;?>
                    </div>
                    <div class="card-body">
                        <?php if($this->session->userdata('akses')=='3'):?>
                             <form method="POST" action="<?= base_url('disposisi/savedAdmin')?>" enctype="multipart/form-data" >
                        <?php else:?>
                             <form method="POST" action="<?= base_url('disposisi/savedUser')?>" enctype="multipart/form-data" >
                        <?php endif;?>
                        <div class="form-group row">
                            <input type="hidden" name="dari" value="<?php echo $this->session->userdata('ses_nama');?>" />
                            <input type="text" class="form-control" name="status_terbaca" value=0 readonly/>
                            <label class="col-md-3 control-label">No Agenda</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="no_agenda" value="<?php echo $surat->no_agenda ?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-md-3 control-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tanggal" value="<?php
                                    date_default_timezone_set('Asia/Jakarta'); echo date("d/m/Y h:i:s");?>" readonly/>
                        </div>
                    </div>
                     <?php if($this->session->userdata('ses_nama')=='Ketua Umum'):?>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Catatan Ketua Umum</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="catatan_ketua"></textarea>
                                        </div>
                        </div>
                    <?php else:?>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Catatan</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="catatan"></textarea>
                                        </div>
                        </div>
                     <?php endif;?>

                         <div class="form-group row">
                            <label class="col-md-3 control-label">Kepada</label>
                                <div class="col-md-6">
                                <?php if($this->session->userdata('akses')=='3'):?>
                                    <select class="form-control" data-plugin-multiselect name="kepada">
                                        <option value="Ketua Umum" selected>Ketua Umum</option>
                                        <option value="Sekretaris" selected>Sekretaris</option>
                                        <option value="Bendahara" selected>Bendahara</option>
                                    </select>
                                <?php else:?>
                                     <select class="form-control" data-plugin-multiselect name="kepada">
                                        <option value="Ketua Pengembangan Pendidikan" selected>Ketua Pengembangan Pendidikan</option>
                                        <option value="Ketua Pengembangan Usaha" selected>Ketua Pengembangan Usaha</option>
                                        <option value="Ketua Pemberdayaan Masyarakat" selected>Ketua Pemberdayaan Masyarakat</option>
                                        <option value="Sekretaris" selected>Sekretaris</option>
                                        <option value="Bendahara" selected>Bendahara</option>
                                        <option value="Kadiv Administrasi Kantor" selected>Kadiv Administrasi Kantor</option>
                                        <option value="Deputy Keuangan dan Aset" selected>Deputy Keuangan dan Aset</option>
                                        <option value="Kadiv HOSOM" selected>Kadiv HOSOM</option>
                                        <option value="Staf Rumah Tangga" selected>Staf Rumah Tangga</option>
                                        <option value="Sekretaris Pimpinan" selected>Sekretaris Pimpinan</option>
                                        <option value="Dana Pensiun" selected>Dana Pensiun</option>
                                        <option value="Kepala Departemen Infrastruktur/PFK" selected>Kepala Departemen Infrastruktur/PFK</option>
                                        <option value="Kepala Departemen IT" selected>Kepala Departemen IT</option>
                                        <option value="Lembaga Audit" selected>Lembaga Audit</option>
                                        <option value="LAZIS" selected>LAZIS</option>
                                    </select>
                                <?php endif;?>
                                </div>
                            </div>
                            <center><input class="btn btn-primary" type="submit" value="Submit">
                            <input class="btn btn-danger" type="reset" value="Reset"></center>
                            <!-- <input class="btn btn-success" type="submit" name="btn" value="Save"/> -->
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






