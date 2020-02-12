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
				    <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeluar/rekap') ?>">Surat Keluar</a></li>
				    <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeluar/rekap') ?>">Rekap Surat Keluar</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Edit Surat Keluar</li>
				  </ol>
				</nav>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('suratkeluar/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('suratkeluar/edit') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group row">
								<input type="hidden" name="id_surat_keluar" value="<?php echo $surat_keluar->id_surat_keluar?>" />
								<label class="col-md-3 control-label">Tanggal Surat</label>
										<div class="col-md-6">
											<input id="datepicker" width="270" name="tanggal"  value="<?php echo $surat_keluar->tanggal?>"/>
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
									<input type="text" class="form-control" name="no_surat_no" value="<?php echo $surat_keluar->no_surat_no ?>">
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_noplus" value="<?php echo $surat_keluar->no_surat_noplus?>">
								</div>
									<div class="col-md-2">
									<select class="form-control" data-plugin-multiselect name="no_surat_kode">
									<option value="" disabled diselected>Data saat ini : <?php echo $surat_keluar->no_surat_kode?></option>
									<option value="EKS-PYBW">EKS-PYBW</option>
									<option value="INT-PYBW" selected>EKS-PYBW</option>
									</select>
									</div>
									<div class="col-md-2">
									<select class="form-control" data-plugin-multiselect name="no_surat_kelompok">
									<option value="" disabled diselected>Data saat ini : <?php echo $surat_keluar->no_surat_kelompok?></option>
									<option value="Umum">Umum</option>
									<option value="Keu" selected>Keu</option>
									<option value="HOSDM" selected>HOSDM</option>
									</select>
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_romawi" value="<?php echo $surat_keluar->no_surat_romawi ?>">
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_tahun" value="<?php echo $surat_keluar->no_surat_tahun ?>">
								</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">Sifat Surat</label>
								<div class="col-md-4">
									<select class="form-control" data-plugin-multiselect name="sifat">
									<option value="" disabled diselected>Data saat ini : <?php echo $surat_keluar->sifat?></option>
									<option value="Mendesak">Mendesak</option>
									<option value="Rahasia" selected>Rahasia</option>
									<option value="Biasa" selected>Biasa</option>
								</select>
							</div>
						<div class="col-md-4">
									<input type="text" class="form-control" name="sifat_surat_detail" value="<?php echo $surat_keluar->sifat_surat_detail ?>">
								</div>
							</div>
							<div class="form-group row">
							<label class="col-md-3 control-label">Kepada</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="kepada" value="<?php echo $surat_keluar->kepada?>">
										</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">Isi Surat</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="perihal" value="<?php echo $surat_keluar->perihal?>">
										</div>
						</div>
						<div class="form-group row">
											<label class="col-md-3 control-label" for="name">Gambar</label>
									<div class="col-md-8">
											<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
											 type="file" name="gambar" / ><br>
											 <!-- <iframe src="<?php echo base_url('upload/suratkeluar/files/'.$surat_keluar->gambar) ?>" style=”width: 100%;height: 100%;border: none;”></iframe> -->
											<input type="hidden" name="old_image" value="<?php echo $surat_keluar->gambar ?>" />
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






