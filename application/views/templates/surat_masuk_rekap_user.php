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
				    <li class="breadcrumb-item"><a href="<?php echo site_url('suratmasuk/rekapSaya') ?>">Surat Masuk</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Rekap Surat Masuk</li>
				  </ol>
				</nav>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">
					<a class="btn btn-success" href="<?php echo base_url() ?>suratmasuk/export" style="float: right;"><i class="fas fa-file-excel"></i> Export Excel</a><br><br>
							<?php echo form_open('suratmasuk/search') ?>
					                  <div class="form-group row" style="float: right;">
					                    <div class="col-sm-8"><input class="form-control" type="text" name="keyword" placeholder="search"></div>
					                    <div class="col-sm-2"><input class="btn btn-primary" type="submit" name="search_submit" value="Cari"></div>
					                  </div>
					                  <?php echo form_close() ?>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0" >
					                <thead>
					                   <tr>
					                     <th>No Surat</th>
					                      <th>Tanggal Surat</th>
					                       <th>Asal Surat</th>
					                       <th>Isi Surat</th>
					                       <th>Action</th>
					                     </tr>
					                </thead>
								<tbody>
									<?php foreach ($surat as $surat):?>
									<tr>
										<td width="150">
											<a href="<?php echo site_url('suratmasuk/tampil/'.$surat->id_surat_masuk) ?>"><?php echo $surat->no_surat?></a>
										</td>
										<td>
										<?php echo date_indo($surat->tanggal_surat)?>
										</td>
										<td>
											<?php echo $surat->asal_surat ?>
										</td>
										<td class="small">
											<?php echo $surat->perihal ?>
										</td>
										<td>
											<a href="<?php echo site_url('suratmasuk/tampilPDF/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-copy"></i> File</a>
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
