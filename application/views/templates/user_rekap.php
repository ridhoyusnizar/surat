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
				    <li class="breadcrumb-item active" aria-current="page">Rekap User</li>
				  </ol>
				</nav>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
                            <a href="<?php echo site_url('user/add') ?>"><i class="fas fa-plus"></i> Tambah User</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									 <tr>
                                                    <th>Username</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Jabatan</th>
                                                    <th>Action</th>
                                     </tr>
								</thead>
								<tbody>
									<?php foreach ($user as $user):?>
									<tr>
										<td width="200">
                                            <?php echo $user->nip?>
										</td>
										<td>
											<?php echo $user->gel_dpn?><?php echo $user->nama_lengkap?><?php echo $user->gel_blkng?>
										</td>
										<td>
											<?php echo $user->nama?>
										</td>
										<td width="300">
												<a href="<?php echo site_url('user/edit/'.$user->id) ?>"
												 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
												<a onclick="deleteConfirm('<?php echo site_url('user/delete/'.$user->id) ?>')"
												 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
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
	<?php $this->load->view("admin/modal.php") ?>

	<?php $this->load->view("admin/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>