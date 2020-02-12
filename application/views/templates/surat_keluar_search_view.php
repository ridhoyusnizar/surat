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
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeluar/rekap') ?>">Surat Keluar</a></li>
		            <?php else:?>
		              <li class="breadcrumb-item"><a href="<?php echo site_url('suratkeluar/rekapSaya') ?>">Surat Keluar</a></li>
		            <?php endif;?>
		              <li class="breadcrumb-item active" aria-current="page">Rekap Surat Keluar</li>
		          </ol>
		        </nav>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					<a class="btn btn-success" href="<?php echo base_url() ?>suratkeluar/export" style="float: right;"><i class="fas fa-file-excel"></i> Export Excel</a><br><br>
                        <?php if($this->session->userdata('akses')=='3'):?>
                            <a href="<?php echo site_url('suratkeluar/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php else:?>
                            <a href="<?php echo site_url('suratkeluar/rekapSaya') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        <?php endif;?>
					</div>
					<div class="card-body">
						<?php echo form_open('suratkeluar/search') ?>
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
                                                    <th>Tanggal Surat</th>
                                                    <th>Kepada</th>
                                                    <th>Isi Surat</th>
                                                    <th>Sifat</th>
                                                    <th>Action</th>
                                     </tr>
								</thead>
								<tbody>
									<?php foreach ($surat_keluar as $surat_keluar):?>
									<tr>
										<td width="150"><a href="<?php echo site_url('suratkeluar/tampil/'.$surat_keluar->id_surat_keluar) ?>">
											<?php echo $surat_keluar->no_surat_no ?><?php echo $surat_keluar->no_surat_noplus ?>/<?php echo $surat_keluar->no_surat_kode?>/<?php echo $surat_keluar->no_surat_kelompok?>/<?php echo $surat_keluar->no_surat_romawi?>/<?php echo $surat_keluar->no_surat_tahun?></a>
										</td>
										<td>
											<?php echo $surat_keluar->tanggal ?>
										</td>
										<td>
											<?php echo $surat_keluar->kepada ?>
										</td>
										<td class="small">
											<?php echo $surat_keluar->perihal ?>
										</td>
										<td class="small">
											<?php echo $surat_keluar->sifat ?>
										</td>
										<td width="300">
											<a href="<?php echo site_url('suratkeluar/tampilPDF/'.$surat_keluar->id_surat_keluar) ?>"class="btn btn-small"><i class="fas fa-copy"></i> File</a>
										<?php if($this->session->userdata('akses')=='3'):?>
				                            <a href="<?php echo site_url('suratkeluar/edit/'.$surat_keluar->id_surat_keluar) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('suratkeluar/delete/'.$surat_keluar->id_surat_keluar) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
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
</body>

</html>