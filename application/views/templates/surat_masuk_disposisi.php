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
                    <?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Disposisi</a></li>
                    <?php else:?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Disposisi</a></li>
                    <?php endif;?>
                    <li class="breadcrumb-item active" aria-current="page">Rekap Disposisi</li>
                  </ol>
                </nav>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">
							<?php echo form_open('disposisi/search') ?>
					                  <div class="form-group row" style="float: right;">
					                    <div class="col-sm-8"><input class="form-control" type="text" name="keyword" placeholder="search"></div>
					                    <div class="col-sm-2"><input class="btn btn-primary" type="submit" name="search_submit" value="Cari"></div>
					                  </div>
					                  <?php echo form_close() ?>

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									 <tr>
                                                    <th>No Surat</th>
                                                    <th>No Agenda</th>
                                                    <th>Tanggal Surat</th>
                                                    <th>Asal Surat</th>
                                                    <th>Isi Surat</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                     </tr>
								</thead>
								<tbody>
									<?php foreach ($surat as $surat):?>
									<tr>
										<td width="150">
											<a href="<?php echo site_url('disposisi/tampil/'.$surat->id_surat_masuk) ?>"><?php echo $surat->no_surat?></a>
										</td>
										<td>
											 <?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
					                            <a href="<?php echo site_url('disposisi/rekapDetail/'.$surat->id_surat_masuk) ?>"><?php echo $surat->no_agenda?></a>
					                        <?php elseif($this->session->userdata('akses')=='4'):?>
					                            <?php echo $surat->no_agenda?>
					                        <?php endif;?>
											
										</td>
										<td>
										<?php echo date_indo($surat->tanggal_surat)?>
										</td>
										<td>
											<?php echo $surat->asal_surat?>
										</td>
										<td class="small">
											<?php echo $surat->perihal?>
										</td>
										<td>
											<?php if($surat->status=='Belum'):?>
					                            <div style="color: red;"><b><?php echo $surat->status?></b></div>
					                        <?php else:?>
					                            <div style="color: green;"><b><?php echo $surat->status?></b></div>
					                        <?php endif;?>
											
										</td>
										<td width="250">
											<a href="<?php echo site_url('suratmasuk/tampilPDF/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-copy"></i> File</a>
											<a href="<?php echo site_url('disposisi/multi/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i>Disposisi</a>
											 <a href="<?php echo site_url('printsuratkendali/print/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-print"></i> Print</a>
											 <?php if($this->session->userdata('akses')=='3'):?>
					                            <a href="<?php echo site_url('suratmasuk/editStatus/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-check-circle"></i> Status</a>
					                        <?php else:?>
					                        <?php endif;?>
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