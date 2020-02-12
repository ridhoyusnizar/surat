<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/head.php") ?>
	<style>
		.dataTables_filter {
		display: none; 
		}
	</style>
</head>

<body id="page-top">

	<?php $this->load->view("admin/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <?php if($this->session->userdata('akses')=='3'):?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Disposisi</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Rekap Disposisi</a></li>
                    <?php else:?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Disposisi</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Rekap Disposisi</a></li>
                    <?php endif;?>
                    <li class="breadcrumb-item active" aria-current="page">Detail Rekap Disposisi</li>
                  </ol>
                </nav>

				<!-- DataTables -->
				<div class="card mb-3">
					 <div class="card-header">
                        <?php if($this->session->userdata('akses')=='3'):?>
                            <a href="<?php echo site_url('disposisi/rekapDetail') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php else:?>
                            <a href="<?php echo site_url('disposisi/rekapDetailSaya') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php endif;?>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									 <tr>
                                                    <th>No Agenda</th>
                                                    <th>Tanggal</th>
                                                    <th>Dari</th>
                                                    <th>Kepada</th>
                                                    <th>Catatan Ketua Umum</th>
                                                    <th>Catatan</th>
                                     </tr>
								</thead>
								<tbody>
									<?php foreach ($disposisi as $surat):?>
									<tr>
										<td>
											<?php echo $surat->no_agenda?>
										</td>
										<th>
										<?php echo $surat->tanggal?>
										</th>
										<td>
											<?php echo $surat->dari ?>
										</td>
										<td>
											<?php echo $surat->kepada?>
										</td>
										<td class="small">
											<?php echo $surat->catatan ?>
										<td width="250">
											<?php if($this->session->userdata('akses')=='1'):?>
											<a href="<?php echo site_url('disposisi/editKetua/'.$surat->id_disposisi) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											 <?php else:?>
											 	<a href="<?php echo site_url('disposisi/editUser/'.$surat->id_disposisi) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											 <?php endif;?>
											<a onclick="deleteConfirm('<?php echo site_url('disposisi/deleteAdmin/'.$surat->id_disposisi) ?>')"
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