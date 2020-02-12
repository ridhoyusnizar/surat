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
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeluar/rekap') ?>">Surat Keluar</a></li>
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeluar/rekap') ?>">Rekap Surat Keluar</a></li>
		            <?php else:?>
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeluar/rekapSaya') ?>">Surat Kelua</a></li>
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeluar/rekapSaya') ?>">Rekap Surat Keluar</a></li>
		            <?php endif;?>
				    <li class="breadcrumb-item active" aria-current="page">Tampil Surat Keluar</li>
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
                            <a href="<?php echo site_url('suratkeluar/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php else:?>
                            <a href="<?php echo site_url('suratkeluar/rekapSaya') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php endif;?>
					</div>
					<div class="card-body">
						<form enctype="multipart/form-data" >
							<div class="form-group row">
								<input type="hidden" name="id_surat_keluar" value="<?php echo $surat_keluar->id_surat_keluar?>" />
								<label class="col-md-3 control-label">Tanggal Surat</label>
										<div class="col-md-8">
											<input id="datepicker" width="270" name="tanggal"  value="<?php echo $surat_keluar->tanggal?>" readonly/>
											<script>
											$('#datepicker').datepicker({
											uiLibrary: 'bootstrap'
											});
										</script>
									</div>
							</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">No Surat</label>
								<div class="col-sm-8"><input type="" name="" class="form-control" value="<?php echo $surat_keluar->no_surat_no ?><?php echo $surat_keluar->no_surat_noplus ?>/<?php echo $surat_keluar->no_surat_kode?>/<?php echo $surat_keluar->no_surat_kelompok?>/<?php echo $surat_keluar->no_surat_romawi?>/<?php echo $surat_keluar->no_surat_tahun?>" readonly>
									
								</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">Sifat Surat</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="no_surat_no" value="<?php echo $surat_keluar->sifat ?>" readonly>
								</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">Isi Surat</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="perihal" value="<?php echo $surat_keluar->perihal?>" readonly>
										</div>
						</div>
						<div class="form-group row">
											<label class="col-md-3 control-label">Gambar</label>
											<div class="col-md-8">
											  <iframe src="<?php echo base_url('upload/suratkeluar/files/'.$surat_keluar->gambar) ?>" style=”width: 100%;height: 100%;border: none;”></iframe>
											<input type="hidden" name="old_image" value="<?php echo $surat_keluar->gambar ?>" />
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






