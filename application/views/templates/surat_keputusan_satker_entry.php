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
				    <li class="breadcrumb-item active" aria-current="page">Tambah Surat Keputusan Satker</li>
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
						<form action="<?php base_url('suratkeputusansatker/add') ?>" method="post" enctype="multipart/form-data" >
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
									<input type="text" class="form-control" name="no_surat_no" value="<?php echo $kode;?>" />
								</div>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="no_surat_noplus" readonly/>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" name="no_surat_kode" value="SK-PYBW"/>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" name="no_surat_kelompok" value="Satker" readonly/>
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
							<label for="name" class="col-md-3 control-label">Isi Surat</label>
								<div class="col-md-8">
									<input class="form-control <?php echo form_error('isi_surat') ? 'is-invalid':'' ?>"
								 type="text" name="isi_surat" />
								 <div class="small text-danger">- Wajib Diisi -</div>
								<div class="invalid-feedback">
									<?php echo form_error('isi_surat') ?>
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






