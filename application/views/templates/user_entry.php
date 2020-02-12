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
				    <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
				  </ol>
				</nav>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('user/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('user/add') ?>" method="post" enctype="multipart/form-data" >
						<div class="form-group row">
							<label for="name" class="col-md-3 control-label">Username</label>
								<div class="col-md-8">
									<input class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?>"
								 type="text" name="nip" />
								 <div class="small text-danger">- Wajib Diisi -</div>
								<div class="invalid-feedback">
									<?php echo form_error('nip') ?>
								</div>
							</div>
                        </div>
                        <div class="form-group row">
                                <label for="name" class="col-md-3 control-label">Nama</label>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="gel_dpn" placeholder="Gelar Depan"/>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
									type="text" name="nama_lengkap" placeholder="Nama Lengkap"/>
									<div class="small text-danger">- Wajib Diisi -</div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_lengkap') ?>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="gel_blkng" placeholder="Gelar Belakang"/>
                                    </div>
                        </div>
                        <div class="form-group row">
							<label for="name" class="col-md-3 control-label">Jabatan</label>
								<div class="col-md-8">
									<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" />
								 <div class="small text-danger">- Wajib Diisi -</div>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
                        </div>
                        <div class="form-group row">
							<label for="name" class="col-md-3 control-label">Password</label>
								<div class="col-md-8">
									<input class="form-control <?php echo form_error('pass') ? 'is-invalid':'' ?>"
								 type="text" name="pass" />
								 <div class="small text-danger">- Wajib Diisi -</div>
								<div class="invalid-feedback">
									<?php echo form_error('pass') ?>
								</div>
							</div>
                        </div>
                        <div class="form-group row">
							<label for="name" class="col-md-3 control-label">Level</label>
								<div class="col-md-8">
									<input class="form-control <?php echo form_error('level') ? 'is-invalid':'' ?>"
								 type="text" name="level" />
								 <div class="small text-danger">- Wajib Diisi -</div>
								<div class="invalid-feedback">
									<?php echo form_error('level') ?>
								</div>
							</div>
                        </div>
                        <div class="form-group row">
							<label for="name" class="col-md-3 control-label">Password 2</label>
								<div class="col-md-8">
									<input class="form-control <?php echo form_error('kode') ? 'is-invalid':'' ?>"
								 type="text" name="kode" />
								 <div class="small text-danger">- Wajib Diisi -</div>
								<div class="invalid-feedback">
									<?php echo form_error('kode') ?>
								</div>
							</div>
                        </div>
							<center><input class="btn btn-primary" type="submit" value="Submit">
                            <input class="btn btn-danger" type="reset" value="Reset"></center>
						</form>
                        </div>
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






