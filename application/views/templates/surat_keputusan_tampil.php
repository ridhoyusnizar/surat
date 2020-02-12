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
				    <li class="breadcrumb-item active" aria-current="page">Tampil Surat Keputusan Pjb</li>
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
						<form enctype="multipart/form-data" >
							<div class="form-group row">
								<input type="hidden" name="id_sk" value="<?php echo $surat->id_sk?>" />
								<label class="col-md-3 control-label">Tanggal Surat</label>
										<div class="col-md-8">
											<input class="form-control" id="datepicker" width="270" name="tanggal"  value="<?php echo $surat->tanggal?>" readonly/>
									</div>
								</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">No Surat</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="no_agenda" value="<?php echo $surat->no_surat_no ?><?php echo $surat->no_surat_noplus ?>/<?php echo $surat->no_surat_kode?>/<?php echo $surat->no_surat_kelompok?>/<?php echo $surat->no_surat_romawi?>/<?php echo $surat->no_surat_tahun?>" readonly>
								</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">Isi Surat</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="isi_surat" value="<?php echo $surat->isi_surat?>" readonly/>
										</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Gambar</label>
									<div class="col-md-8">
											 <iframe src="<?php echo base_url('upload/suratKeputusan/'.$surat->gambar) ?>" style=”width: 100%;height: 100%;border: none;”></iframe>
											<input type="hidden" name="old_image" value="<?php echo $surat->gambar ?>" />
											<div class="invalid-feedback">
												<?php echo form_error('gambar') ?>
											</div>
										</div>
									</div>
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






