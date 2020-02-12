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
				    <li class="breadcrumb-item active" aria-current="page">Tambah Surat Keluar</li>
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
						<form action="<?php base_url('suratkeluar/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group row">
								<label for="name" class="col-md-3 control-label">Tanggal Surat</label>
									<div class="col-md-8">
										<input id="datepicker" width="270" class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>" name="tanggal" />
										<div class="small text-danger">- Wajib Diisi -</div>
									    <script>
									        $('#datepicker').datepicker({
									            uiLibrary: 'bootstrap'
									        });
									    </script>
									    <div class="invalid-feedback">
											<?php echo form_error('tanggal') ?>
										</div>
									</div>
							</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">No Surat</label>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_no" value="<?php echo $kode;?>"/>
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_noplus" readonly>
								</div>
								<div class="col-md-2">
									<select class="form-control" data-plugin-multiselect name="no_surat_kode">
									<option value="EKS-PYBW">EKS-PYBW</option>
									<option value="INT-PYBW" selected>INT-PYBW</option>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control" data-plugin-multiselect name="no_surat_kelompok">
									<option value="Umum">Umum</option>
									<option value="Keu" selected>Keu</option>
									<option value="HOSDM" selected>HOSDM</option>
									</select>
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_romawi" value="<?php $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
									$bln = $array_bln[date('n')]; echo $bln; ?>">
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_tahun" value="<?php $tanggal=getdate();
									echo $tanggal['year'];?>"/>
								</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label">Sifat Surat</label>
								<div class="col-md-4">
									<select class="form-control" data-plugin-multiselect name="sifat">
									<option value="Mendesak">Mendesak</option>
									<option value="Rahasia" selected>Rahasia</option>
									<option value="Biasa" selected>Biasa</option>
								</select>
							</div>
								<div class="col-md-4">
									<input class="form-control <?php echo form_error('sifat_surat_detail') ? 'is-invalid':'' ?>"
								 type="text" name="sifat_surat_detail" />
								 <div class="small text-danger">- Wajib Diisi -</div>
								<div class="invalid-feedback">
									<?php echo form_error('sifat_surat_detail') ?>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-md-3 control-label">Kepada</label>
								<div class="col-md-8">
									<input class="form-control <?php echo form_error('kepada') ? 'is-invalid':'' ?>"
								 type="text" name="kepada" />
								 <div class="small text-danger">- Wajib Diisi -</div>
								<div class="invalid-feedback">
									<?php echo form_error('kepada') ?>
								</div>
										</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-md-3 control-label">Isi Surat</label>
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
								<label class="col-md-3 control-label">File</label>
									<div class="col-md-8">
										<input type="file" class="form-control-file"  name="gambar">
										<div class="small text-danger">- Hanya file .pdf -</div>
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






