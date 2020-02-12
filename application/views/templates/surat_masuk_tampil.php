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
				    <?php if($this->session->userdata('akses')=='3' && $this->session->userdata('akses')=='4'):?>
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratmasuk/rekap') ?>">Surat Masuk</a></li>
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratmasuk/rekap') ?>">Rekap Surat Masuk</a></li>
		            <?php else:?>
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratmasuk/rekapSaya') ?>">Surat Masuk</a></li>
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratmasuk/rekapSaya') ?>">Rekap Surat Masuk</a></li>
		            <?php endif;?>
				    <li class="breadcrumb-item active" aria-current="page">Tampil Surat Masuk</li>
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
                            <a href="<?php echo site_url('suratmasuk/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php else:?>
                            <a href="<?php echo site_url('disposisi/rekapDariSaya') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php endif;?>
					</div>
					<div class="card-body">
						<form enctype="multipart/form-data" >
							<div class="form-group row">
								<input type="hidden" name="id_surat_masuk" value="<?php echo $surat->id_surat_masuk?>"/>
								<label class="col-md-3 control-label">Tanggal Agenda</label>
									<div class="col-md-4">
										<input id="datepicker" width="270" name="tanggal_agenda" value="<?php echo $surat->tanggal_agenda ?>" readonly/>
											<script>
											$('#datepicker').datepicker({
											uiLibrary: 'bootstrap'
											});
										</script>
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-clock-o"></i>
										</span>
											<input type="text" data-plugin-timepicker class="form-control" name="waktu_agenda" value="<?php echo $surat->waktu_agenda ?>" readonly>
											</div>
												</div>
							</div>
							<div class="form-group row">
							<label class="col-md-3 control-label">No Agenda</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="no_agenda" value="<?php echo $surat->no_agenda ?>" readonly>
								</div>
						</div>
				  			<div class="form-group row">
								<label class="col-md-3 control-label">Tanggal Surat</label>
									<div class="col-md-8">
										<input id="datepicker2" width="270" name="tanggal_surat" value="<?php echo $surat->tanggal_surat ?>" readonly/>
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
									<input type="text" class="form-control" name="no_surat_no" value="<?php echo $surat->no_surat?>" readonly>
								</div>
						</div>
											<div class="form-group row">
												<label class="col-md-3 control-label">Asal Surat</label>
												<div class="col-md-8">
													<input class="form-control" placeholder=""  name="asal_surat" value="<?php echo $surat->asal_surat ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 control-label">Sifat Surat</label>
												<div class="col-md-3">
													<input class="form-control" placeholder="" name="sifat_surat" value="<?php echo $surat->sifat_surat ?>" readonly>
												</div>
												<div class="col-md-3">
													<input class="form-control" placeholder="" name="sifat_surat_detail" value="<?php echo $surat->sifat_surat_detail ?>" readonly>
												</div>
												<div class="col-md-2">
													<input class="form-control" placeholder="" name="kelompok" value="<?php echo $surat->kelompok ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 control-label">Alamat</label>
												<div class="col-md-8">
													<input class="form-control" placeholder=""  name="lokasi" value="<?php echo $surat->alamat ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 control-label">Isi Surat</label>
												<div class="col-md-8">
													<input class="form-control" placeholder=""  name="perihal" value="<?php echo $surat->perihal ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 control-label">Status</label>
												<div class="col-md-8">
													<input class="form-control" placeholder=""  name="status" value="<?php echo $surat->status ?>" readonly>
												</div>
											</div>
											<?php if($surat->catatan_masuk==''):?>
					                            <div class="form-group row">
												<label class="col-md-3 control-label">Catatan</label>
												<div class="col-md-8">
													<input class="form-control" placeholder=""  name="catatan_masuk" value="Tidak ada catatan" readonly>
												</div>
												</div>
					                        <?php else:?>
					                            <div class="form-group row">
												<label class="col-md-3 control-label">Catatan</label>
												<div class="col-md-8">
													<input class="form-control" placeholder=""  name="catatan_masuk" value="<?php echo $surat->catatan_masuk ?>" readonly>
												</div>
												</div>
					                        <?php endif;?>
											<div class="form-group row">
											<label for="name" class="col-md-3 control-label">Gambar</label>
											<div class="col-md-8">
											  <iframe src="<?php echo base_url('upload/suratmasuk/gambar/'.$surat->gambar) ?>" style=”width: 100%;height: 100%;border: none;”></iframe>
											<div class="invalid-feedback">
												<?php echo form_error('gambar') ?>
											</div>
											</div>
										</div><br>
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






