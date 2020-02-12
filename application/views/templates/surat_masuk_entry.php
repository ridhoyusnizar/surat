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
				    <li class="breadcrumb-item"><a href="<?php echo site_url('suratmasuk/rekap') ?>">Surat Masuk</a></li>
				    <li class="breadcrumb-item"><a href="<?php echo site_url('suratmasuk/rekap') ?>">Rekap Surat Masuk</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Tambah Surat Masuk</li>
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

						<form action="<?php base_url('suratmasuk/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group row">
								<label class="col-md-3 control-label" for="name">Tanggal Surat Masuk</label>
									<div class="col-md-4">
										<input id="datepicker" width="270" class="form-control <?php echo form_error('tanggal_agenda') ? 'is-invalid':'' ?>" name="tanggal_agenda" />
										<div class="small text-danger">- Wajib Diisi -</div>
									    <script>
									        $('#datepicker').datepicker({
									            uiLibrary: 'bootstrap'
									        });
									    </script>
									    <div class="invalid-feedback">
											<?php echo form_error('tanggal_agenda') ?>
										</div>
									</div>
								<div class="col-md-2">
											<input id="timepicker" width="270" class="form-control <?php echo form_error('waktu_agenda') ? 'is-invalid':'' ?>" name="waktu_agenda" />
											<div class="small text-danger">- Wajib Diisi -</div>
											    <script>
											        $('#timepicker').timepicker({
											            uiLibrary: 'bootstrap'
											        });
											    </script>
											    <div class="invalid-feedback">
											<?php echo form_error('waktu_agenda') ?>
										</div>
												</div>
							</div>
							<div class="form-group row">
							<label class="col-md-3 control-label">No Agenda</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="no_agenda" value="<?php echo $kode;?>"/>
									<div class="small text-danger">- Wajib Diisi -</div>
								</div>
						</div>
				  			<div class="form-group row">
								<label for="name" class="col-md-3 control-label">Tanggal Surat</label>
									<div class="col-md-6">
										<input id="datepicker2" width="270" class="form-control <?php echo form_error('tanggal_surat') ? 'is-invalid':'' ?>" name="tanggal_surat" />
										<div class="small text-danger">- Wajib Diisi -</div>
									    <script>
									        $('#datepicker2').datepicker({
									            uiLibrary: 'bootstrap'
									        });
									    </script>
									    <div class="invalid-feedback">
											<?php echo form_error('tanggal_surat') ?>
										</div>
								</div>
							</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">No Surat</label>
								<div class="col-sm-8">
									<input class="form-control <?php echo form_error('no_surat') ? 'is-invalid':'' ?>"
								 type="text" name="no_surat" />
								 <div class="small text-danger">- Wajib Diisi -</div>
								<div class="invalid-feedback">
									<?php echo form_error('no_surat') ?>
								</div>
							</div>
						</div>
											<div class="form-group row">
												<label for="name" class="col-md-3 control-label">Pengirim</label>
												<div class="col-md-8">
													<input class="form-control <?php echo form_error('asal_surat') ? 'is-invalid':'' ?>"
													 type="text" name="asal_surat" />
													 <div class="small text-danger">- Wajib Diisi -</div>
													<div class="invalid-feedback">
														<?php echo form_error('asal_surat') ?>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 control-label">Sifat Surat</label>
												<div class="col-md-2">
													<select class="form-control" data-plugin-multiselect name="sifat_surat">
														<option value="Eksternal">Eksternal</option>
														<option value="Internal" selected>Internal</option>
													</select>
												</div>
												<div class="col-md-2">
													<input class="form-control <?php echo form_error('sifat_surat_detail') ? 'is-invalid':'' ?>"
													 type="text" name="sifat_surat_detail" />
													 <div class="small text-danger">- Wajib Diisi -</div>
													<div class="invalid-feedback">
														<?php echo form_error('sifat_surat_detail') ?>
													</div>
												</div>
												<div class="col-md-2">
													<select class="form-control" data-plugin-multiselect name="kelompok">
													<option value="Mendesak">Mendesak</option>
													<option value="Rahasia" selected>Rahasia</option>
													<option value="Biasa" selected>Biasa</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 control-label">Alamat</label>
												<div class="col-md-8">
													<input class="form-control" placeholder=""  name="alamat">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 control-label">Isi Surat</label>
												<div class="col-md-8">
													<input class="form-control <?php echo form_error('perihal') ? 'is-invalid':'' ?>"
													 type="text" name="perihal" />
													 <div class="small text-danger">- Wajib Diisi -</div>
													<div class="invalid-feedback">
														<?php echo form_error('perihal') ?>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-8">
													<input type="hidden" class="form-control" placeholder=""  name="catatan_masuk" value="Belum ada catatan">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 control-label">File</label>
												<div class="col-md-8">
													<input type="file" class="form-control-file"  name="gambar">
													<div class="small text-danger">- Hanya file .pdf -</div>
												</div>
											</div>
											<input type="hidden" name="status" value="Belum"/>
											<br>

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








