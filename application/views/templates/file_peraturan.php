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
						<li class="breadcrumb-item"><a href="<?php echo site_url('suratperaturan/rekap') ?>">Peraturan</a></li>
						<li class="breadcrumb-item"><a href="<?php echo site_url('suratperaturan/rekap') ?>">Rekap Peraturan</a></li>
						<li class="breadcrumb-item active" aria-current="page">File Peraturan</li>
					</ol>
				</nav>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<?php if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '4') : ?>
							<a href="<?php echo site_url('suratperaturan/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
						<?php else : ?>
							<a href="<?php echo site_url('suratperaturan/rekapSaya') ?>"><i class="fas fa-arrow-left"></i> Back</a>
						<?php endif; ?>
					</div>
					<div class="card-body">
						<div class="form-group row">
							<label class="col-md-3 control-label">No Surat</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="no_agenda" value="<?php echo $surat->no_surat_no ?><?php echo $surat->no_surat_noplus ?> Tahun <?php echo $surat->no_surat_tahun ?>" readonly>
							</div>
						</div>
						<br>
						<embed src="<?php echo base_url('upload/suratperaturan/' . $surat->gambar) ?>" type="application/pdf" width="100%" height="700px" />


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