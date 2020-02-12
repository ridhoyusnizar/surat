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
                    <?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Disposisi</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Rekap Disposisi</a></li>
                    <?php else:?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Disposisi</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Rekap Disposisi</a></li>
                    <?php endif;?>
                    <li class="breadcrumb-item active" aria-current="page">Edit Disposisi</li>
                  </ol>
                </nav>

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
                            <a href="<?php echo site_url('disposisi/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php else:?>
                            <a href="<?php echo site_url('disposisi/rekapSaya') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php endif;?>
                    </div>
                    <div class="card-body">
                        <form action="<?php base_url('disposisi/editUser') ?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group row">
                            <input type="hidden" name="id" value="<?php echo $disposisi->id_disposisi?>" />
                            <label class="col-md-3 control-label">No Agenda</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="no_agenda" value="<?php echo $disposisi->no_agenda ?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-md-3 control-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tanggal" value="<?php echo $disposisi->tanggal?>" readonly/>
                        </div>
                    </div>
                                    


                        <div class="form-group row">
                            <label class="col-md-3 control-label">Catatan Ketua Umum</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="catatan_ketua" value="<?php echo $disposisi->catatan_ketua?>"/>
                                        </div>
                        </div>

                        <input type="hidden" class="form-control" name="catatan" value="<?php echo $disposisi->catatan?>"/>

                        <input type="hidden" name="dari" value="<?php echo $this->session->userdata('ses_nama');?>" />

                         <div class="form-group row">
                            <label class="col-md-3 control-label">Kepada</label>
                                <div class="col-md-8">
                                <?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
                                    <select class="form-control" data-plugin-multiselect name="kepada[]">
									<?php foreach($user as $row){ ?>
									<option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?>   </option>
									<?php } ?>
									</select>
								<?php elseif($this->session->userdata('ses_nama')=='Ketua Umum'):?>
									<select class="form-control" data-plugin-multiselect name="kepada[]">
                                        <option value="Ketua Umum" selected>Ketua Umum</option>
										<option value="Ketua Pengembangan Pendidikan" selected>Ketua Pengembangan Pendidikan</option>
                                        <option value="Ketua Pengembangan Usaha" selected>Ketua Pengembangan Usaha</option>
                                        <option value="Ketua Pemberdayaan Masyarakat" selected>Ketua Pemberdayaan Masyarakat</option>
                                        <option value="Sekretaris" selected>Sekretaris</option>
                                        <option value="Bendahara" selected>Bendahara</option>
										<option value="Kadiv Administrasi Kantor" selected>Kadiv Administrasi Kantor</option>
                                    </select>
                                <?php elseif($this->session->userdata('akses')=='1'):?>
									<select class="form-control" data-plugin-multiselect name="kepada[]">
										<?php foreach($user as $row){ ?>
										<option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?>   </option>
										<?php } ?>
                                    </select>
                                <?php elseif($this->session->userdata('akses')=='2'):?>
									<select class="form-control" data-plugin-multiselect name="kepada[]">
										<?php foreach($user2 as $row){ ?>
										<option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?>   </option>
										<?php } ?>
                                    </select>
                                <?php else:?>
                                     <select class="form-control" data-plugin-multiselect name="kepada[]">
									 <?php foreach($user2 as $row){ ?>
										<option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?>   </option>
										<?php } ?>
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






