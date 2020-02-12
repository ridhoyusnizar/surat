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
                    <li class="breadcrumb-item active" aria-current="page">Disposisi Sudah Terbaca</li>
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
                                                    <th>Asal Surat</th>
                                                    <th>Action</th>
                                     </tr>
								</thead>
								<tbody>
								<?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
									<?php foreach ($adminsurat as $surat):?>
									<tr>
										<td><a href="<?php echo site_url('suratmasuk/tampil/'.$surat->id_surat_masuk) ?>">
											<?php echo $surat->no_surat?></a>
										</td>
										<td width="120"><a href="<?php echo site_url('Disposisi/tampil/'.$surat->id_surat_masuk) ?>">
											<?php echo $surat->no_agenda?></a>
										</td>
										<td>
											<?php echo $surat->tanggal?>
										</td>
										<td>
											<?php echo $surat->dari?>
										</td>
										<td>
											<?php echo $surat->kepada?>
										</td>
										<td>
											<?php echo $surat->asal_surat?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('suratmasuk/tampilPDF/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-copy"></i> File</a>
											 <a href="<?php echo site_url('printsuratkendali') ?>"
											 class="btn btn-small"><i class="fas fa-print"></i> Print</a>
										</td>
									</tr>
									<?php endforeach; ?>
								<?php else:?>
									<?php foreach ($surat as $surat):?>
									<tr>
										<td><a href="<?php echo site_url('suratmasuk/tampil/'.$surat->id_surat_masuk) ?>">
											<?php echo $surat->no_surat?></a>
										</td>
										<td width="120"><a href="<?php echo site_url('Disposisi/tampil/'.$surat->id_surat_masuk) ?>">
											<?php echo $surat->no_agenda?></a>
										</td>
										<td>
											<?php echo $surat->tanggal?>
										</td>
										<td>
											<?php echo $surat->dari?>
										</td>
										<td>
											<?php echo $surat->asal_surat?>
										</td>
										<td width="250">
										<a href="<?php echo site_url('suratmasuk/tampilPDF/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-copy"></i> File</a>
                            <a href="<?php echo site_url('disposisi/multi/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-edit"></i>Disposisi</a>
                            <a href="<?php echo site_url('printsuratkendali/print/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-print"></i> Print</a>
										</td>
									</tr>
									<?php endforeach; ?>
                <?php endif;?>
									
									

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