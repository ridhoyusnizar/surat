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
                    <?php if($this->session->userdata('akses')=='3'):?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Disposisi</a></li>
                    <?php else:?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Disposisi</a></li>
                    <?php endif;?>
                    <li class="breadcrumb-item active" aria-current="page">Disposisi dari Saya</li>
                  </ol>
                </nav>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									 <tr>
									 				<th>No Surat</th>
                                                    <th>No Agenda</th>
                                                    <th>Tanggal</th>
                                                    <th>Dari</th>
                                                    <th>Kepada</th>
                                                    <?php if($this->session->userdata('akses')=='1'):?>
														<th>Catatan Ketua Umum</th>
													 <?php else:?>
													 	<th>Catatan</th>
													 <?php endif;?>
                                                    <th>Action</th>
                                     </tr>
								</thead>
								<tbody>
									<?php foreach ($disposisi as $surat):?>
									<tr>
										<td><a href="<?php echo site_url('suratmasuk/tampil/'.$surat->id_surat_masuk) ?>">
											<?php echo $surat->no_surat?></a>
										</td>
										<td width="150"><a href="<?php echo site_url('Disposisi/tampil/'.$surat->id_surat_masuk) ?>">
											<?php echo $surat->no_agenda?></a>
										</td>
										<td>
											<?php echo $surat->tanggal ?>
										</td>
										<td>
											<?php echo $surat->dari ?>
										</td>
										<td>
											<?php echo $surat->kepada?>
										</td>
									<?php if($this->session->userdata('akses')=='1'):?>
										<td class="small">
									<?php echo $surat->catatan_ketua ?>
										</td>
									<?php else:?>
										<td class="small">
											<?php echo $surat->catatan?>
										</td>
									<?php endif;?>
										<td width="300">
											<?php if($this->session->userdata('ses_nama')=='Ketua Umum'):?>
											<a href="<?php echo site_url('disposisi/editKetua/'.$surat->id_disposisi) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											 <?php else:?>
											 	<a href="<?php echo site_url('disposisi/editUser/'.$surat->id_disposisi) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											 <?php endif;?>
											 <?php if($this->session->userdata('akses')=='3'):?>
					                            <a onclick="deleteConfirm('<?php echo site_url('disposisi/deleteAdmin/'.$surat->id_disposisi) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
					                        <?php else:?>
					                        	<a onclick="deleteConfirm('<?php echo site_url('disposisi/deleteUser/'.$surat->id_disposisi) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
					                        <?php endif;?>
											
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>

								<!-- Button trigger modal -->
							</table>
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