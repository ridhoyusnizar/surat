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
				    <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeputusan/rekap') ?>">Surat Keputusan</a></li>
				    <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeputusan/rekap') ?>">Rekap Surat Keputusan</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Edit Surat Keputusan Satker</li>
				  </ol>
				</nav>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('suratkeputusan/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('suratkeputusansatker/edit') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group row">
								<input type="hidden" name="id_sk" value="<?php echo $surat->id_sk?>" />
								<label class="col-md-3 control-label">Tanggal Surat</label>
										<div class="col-md-6">
											<input id="datepicker" width="270" name="tanggal"  value="<?php echo $surat->tanggal?>"/>
											<script>
											$('#datepicker').datepicker({
											uiLibrary: 'bootstrap'
											});
										</script>
									</div>
								</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">No Surat</label>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_no" value="<?php echo $surat->no_surat_no ?>" readonly/>
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_noplus" value="<?php echo $surat->no_surat_noplus?>">
								</div>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="no_surat_kode" value="<?php echo $surat->no_surat_kode?>">
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" name="no_surat_kelompok" value="<?php echo $surat->no_surat_kelompok?>" readonly/>
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_romawi" value="<?php echo $surat->no_surat_romawi ?>">
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_tahun" value="<?php echo $surat->no_surat_tahun ?>">
								</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">Isi Surat</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="isi_surat" value="<?php echo $surat->isi_surat?>">
										</div>
						</div>
						<div class="form-group row">
											<label class="col-md-3 control-label" for="name">Gambar</label>
									<div class="col-md-8">
											<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
											 type="file" name="gambar" / ><br>
											 <iframe src="<?php echo base_url('upload/suratKeputusanSatker/'.$surat->gambar) ?>" style=”width: 100%;height: 100%;border: none;”></iframe>
											<input type="hidden" name="old_image" value="<?php echo $surat->gambar ?>" />
											<div class="invalid-feedback">
												<?php echo form_error('gambar') ?>
											</div>
										</div>
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






