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
				    <li class="breadcrumb-item"><a href="<?php echo site_url('user/rekap') ?>">User</a></li>
				    <li class="breadcrumb-item"><a href="<?php echo site_url('user/rekap') ?>">Rekap User</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
						<form action="<?php base_url('user/update') ?>" method="post" enctype="multipart/form-data" >
						<div class="form-group row">
                        <input type="hidden" name="id" value="<?php echo $user->id?>" />
							<label for="name" class="col-md-3 control-label">Username</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="nip" value="<?php echo $user->nip?>"/>
							</div>
                        </div>
                        <div class="form-group row">
                                <label for="name" class="col-md-3 control-label">Nama</label>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="gel_dpn" value="<?php echo $user->gel_dpn?>"/>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="nama_lengkap" value="<?php echo $user->nama_lengkap?>"/>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="gel_blkng" value="<?php echo $user->gel_blkng?>"/>
                                    </div>
                        </div>
                        <div class="form-group row">
							<label for="name" class="col-md-3 control-label">Jabatan</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="nama" value="<?php echo $user->nama?>"/>
							</div>
                        </div>
                        <div class="form-group row">
							<label for="name" class="col-md-3 control-label">Password</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="pass" value="<?php echo $user->pass?>"/>
							</div>
                        </div>
                        <div class="form-group row">
							<label for="name" class="col-md-3 control-label">Level</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="level" value="<?php echo $user->level?>"/>
							</div>
                        </div>
                        <div class="form-group row">
							<label for="name" class="col-md-3 control-label">Password 2</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="kode" value="<?php echo $user->kode?>"/>
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






