<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/head.php") ?>
	<style>
		.dataTables_filter {
		display: none; 
		}
	</style>
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
                    <li class="breadcrumb-item active" aria-current="page">Update Status Disposisi</li>
                  </ol>
                </nav>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('disposisi/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('suratmasuk/editStatus') ?>" method="post" enctype="multipart/form-data" >
							<center><label class="control-label">Silahkan ubah status disposisi menjadi "Selesai" dan menambahkan catatan apabila telah menyelesaikan proses disposisi</label></center><br>
							<div class="form-group row">
												<label class="col-md-3 control-label">Status</label>
												<div class="col-md-6">
													<select class="form-control" data-plugin-multiselect name="status">
														<option value="" disabled diselected>-- <?php echo $surat->status?> --</option>
														<option value="Belum">Belum</option>
														<option value="Selesai" selected>Selesai</option>
													</select>
												</div>
											</div>
							<div class="form-group row">
												<label class="col-md-3 control-label">Catatan</label>
												<div class="col-md-6">
													<textarea class="form-control" type="text" name="catatan_masuk"></textarea>
												</div>
											</div>
							<div class="form-group row">
								<input type="hidden" name="id" value="<?php echo $surat->id_surat_masuk?>" />
									<div class="col-md-4">
										<input type="hidden" id="datepicker" width="270" name="tanggal_agenda" value="<?php echo $surat->tanggal_agenda ?>"/>
											<script>
											$('#datepicker').datepicker({
											uiLibrary: 'bootstrap'
											});
										</script>
								</div>
								<div class="col-md-2">
									<div class="input-group">
											<input type="hidden" id="timepicker" width="270" name="waktu_agenda" value="<?php echo $surat->waktu_agenda ?>"/>
											</div>
									</div>
							</div>
						<div class="form-group row">
								<div class="col-sm-8">
									<input type="hidden" class="form-control" name="no_agenda" value="<?php echo $surat->no_agenda ?>">
								</div>
							</div>
						<div class="form-group row">
									<div class="col-md-8">
										<input type="hidden" id="datepicker2" width="270" name="tanggal_surat" value="<?php echo $surat->tanggal_surat ?>"/>
											<script>
											$('#datepicker2').datepicker({
											uiLibrary: 'bootstrap'
											});
										</script>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-8">
									<input type="hidden" class="form-control" name="no_surat" value="<?php echo $surat->no_surat?>">
								</div>
						</div>
						<div class="form-group row">
												<div class="col-md-6">
													<input type="hidden" class="form-control"  name="asal_surat" value="<?php echo $surat->asal_surat ?>">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-2">
													<input type="hidden" class="form-control" name="sifat_surat" value="<?php echo $surat->sifat_surat ?>">
												</div>
												<div class="col-md-2">
													<input type="hidden" class="form-control" name="sifat_surat_detail" value="<?php echo $surat->sifat_surat_detail ?>">
												</div>
												<div class="col-md-2">
													<input type="hidden" class="form-control" name="kelompok" value="<?php echo $surat->kelompok ?>">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6">
													<input type="hidden" class="form-control" name="alamat" value="<?php echo $surat->alamat ?>">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6">
													<input type="hidden" class="form-control" name="perihal" value="<?php echo $surat->perihal ?>">
												</div>
											</div>

											<div class="form-group row">
									<div class="col-md-8">
											<input type="hidden" class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
											 type="file" name="gambar" / ><br>
											<input type="hidden" name="old_image" value="<?php echo $surat->gambar ?>" />
											<div class="invalid-feedback">
												<?php echo form_error('gambar') ?>
											</div>
										</div>
									</div>

									
									
							<center><input class="btn btn-primary" type="submit" value="Submit"></center>
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






