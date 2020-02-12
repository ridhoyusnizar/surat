<html>

<head>
	<!-- Load File Jquery -->
	<script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
</head>

<body>
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
							<?php if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '4') : ?>
								<li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Disposisi</a></li>
								<li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekap') ?>">Rekap Disposisi</a></li>
							<?php else : ?>
								<li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Disposisi</a></li>
								<li class="breadcrumb-item"><a href="<?php echo site_url('disposisi/rekapSaya') ?>">Rekap Disposisi</a></li>
							<?php endif; ?>
							<li class="breadcrumb-item active" aria-current="page">Tambah Disposisi</li>
						</ol>
					</nav>

					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<div class="card mb-3">
						<div class="card-header">
							<?php if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '4') : ?>
								<a href="<?php echo site_url('disposisi/rekap') ?>"><i class="fas fa-arrow-left"></i> Back</a>
							<?php else : ?>
								<a href="<?php echo site_url('disposisi/rekapSaya') ?>"><i class="fas fa-arrow-left"></i> Back</a>
							<?php endif; ?>
						</div>
						<div class="card-body">
							<?php if ($this->session->userdata('ses_nama') == 'Ketua Umum') : ?>
								<form method="post" action="<?php echo base_url("disposisi/saveKetua"); ?>">
								<?php else : ?>
									<form method="post" action="<?php echo base_url("disposisi/saveUser"); ?>">
									<?php endif; ?>

									<div class="form-group row">
										<input type="hidden" name="dari[]" value="<?php echo $this->session->userdata('ses_nama'); ?>" />
										<input type="hidden" class="form-control" name="status_terbaca[]" value=0 readonly />
										<label class="col-md-3 control-label">No Agenda</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="no_agenda[]" value="<?php echo $surat->no_agenda ?>" readonly />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 control-label">Tanggal</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="tanggal[]" value="<?php
																											date_default_timezone_set('Asia/Jakarta');
																											echo date("d/m/Y h:i:s"); ?>" readonly />
										</div>
									</div>
									<?php if ($this->session->userdata('ses_nama') == 'Ketua Umum') : ?>
										<div class="form-group row">
											<label class="col-md-3 control-label">Catatan Ketua Umum</label>
											<div class="col-md-8">
												<textarea type="text" class="form-control" name="catatan_ketua[]"></textarea>
											</div>
										</div>
									<?php else : ?>
										<div class="form-group row">
											<label class="col-md-3 control-label">Catatan</label>
											<div class="col-md-8">
												<textarea type="text" class="form-control" name="catatan[]" id="catatan"></textarea>
											</div>
										</div>
									<?php endif; ?>

									<div class="form-group row">
										<label class="col-md-3 control-label">Kepada</label>
										<div class="col-md-7">
											<?php if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '4') : ?>
												<select class="form-control" data-plugin-multiselect name="kepada[]">
													<?php foreach ($user as $row) { ?>
														<option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?> </option>
													<?php } ?>
												</select>
											<?php elseif ($this->session->userdata('ses_nama') == 'Ketua Umum') : ?>
												<select class="form-control" data-plugin-multiselect name="kepada[]">
													<option value="Ketua Umum" selected>Ketua Umum</option>
													<option value="Ketua Pengembangan Pendidikan" selected>Ketua Pengembangan Pendidikan</option>
													<option value="Ketua Pengembangan Usaha" selected>Ketua Pengembangan Usaha</option>
													<option value="Ketua Pemberdayaan Masyarakat" selected>Ketua Pemberdayaan Masyarakat</option>
													<option value="Sekretaris" selected>Sekretaris</option>
													<option value="Bendahara" selected>Bendahara</option>
													<option value="Kadiv Administrasi Kantor" selected>Kadiv Administrasi Kantor</option>
												</select>
											<?php elseif ($this->session->userdata('akses') == '1') : ?>
												<select class="form-control" data-plugin-multiselect name="kepada[]">
													<?php foreach ($user as $row) { ?>
														<option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?> </option>
													<?php } ?>
												</select>
											<?php elseif ($this->session->userdata('akses') == '2') : ?>
												<select class="form-control" data-plugin-multiselect name="kepada[]">
													<?php foreach ($user2 as $row) { ?>
														<option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?> </option>
													<?php } ?>
												</select>
											<?php else : ?>
												<select class="form-control" data-plugin-multiselect name="kepada[]">
													<?php foreach ($user2 as $row) { ?>
														<option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?> </option>
													<?php } ?>
												</select>
											<?php endif; ?>
										</div>
										<table>
											<td><button type="button" class="btn btn-secondary" id="btn-tambah-form"><i class="fas fa-plus"></i></button></td>
											<td><button type="button" class="btn btn-danger" id="btn-reset-form"><i class="fas fa-redo-alt"></i></button></td>
										</table>
									</div>


									<div id="insert-form"></div>
									<br><br>
									<center><input class="btn btn-primary" type="submit" value="Submit">
										<input class="btn btn-danger" type="reset" value="Reset"></center>
									</form>

									<input type="hidden" id="jumlah-form" value="1">

									<script>
										$(document).ready(function() { // Ketika halaman sudah diload dan siap
											$("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
												var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
												var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
												var isitext = document.getElementById('catatan');
												// Kita akan menambahkan form dengan menggunakan append
												// pada sebuah tag div yg kita beri id insert-form
												$("#insert-form").append("<hr><label><b>Disposisi ke " + nextform + " :</b></label>" +
													"<hr><div class='form-group row'>" +
													"<input type='hidden' name='dari[]'' value='<?php echo $this->session->userdata('ses_nama'); ?>' />" +
													"<input type='hidden' class='form-control' name='status_terbaca[]' value=0 readonly/>" +
													"<input type='hidden' class='form-control' name='no_agenda[]' value='<?php echo $surat->no_agenda ?>' readonly/>" +
													"<input type='hidden' class='form-control' name='tanggal[]' value='<?php date_default_timezone_set('Asia/Jakarta');
																														echo date("d/m/Y h:i:s"); ?>' readonly/>" +
													"</div>" +
													"<?php if ($this->session->userdata('ses_nama') == 'Ketua Umum') : ?>" +
													"<div class='form-group row'>" +
													"<label class='col-md-3 control-label'>Catatan Ketua</label>" +
													"<div class='col-md-8'>" +
													"<textarea type='text' class='form-control' name='catatan_ketua[]''></textarea>" +
													"</div>" +
													"</div>" +
													"<?php else : ?>" +
													"<div class='form-group row'>" +
													"<label class='col-md-3 control-label'>Catatan</label>" +
													"<div class='col-md-8'>" +
													"<textarea type='text' class='form-control' name='catatan[]'>" + isitext.value + "</textarea>" +
													"</div>" +
													"</div>" +
													"<?php endif; ?>" +
													"<div class='form-group row'>" +
													"<label class='col-md-3 control-label'>Kepada</label>" +
													"<div class='col-md-8'>" +
													"<?php if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '4') : ?>" +
													"<select class='form-control' data-plugin-multiselect name='kepada[]'>" +
													"<?php foreach ($user as $row) { ?>" +
													"<option value='<?php echo $row['nama']; ?>'><?php echo $row['nama']; ?>   </option>" +
													"<?php } ?>" +
													"</select>" +
													"<?php elseif ($this->session->userdata('ses_nama') == 'Ketua Umum') : ?>" +
													"<select class='form-control' data-plugin-multiselect name='kepada[]'>" +
													"<option value='Ketua Umum' selected>Ketua Umum</option>" +
													"<option value='Ketua Pengembangan Pendidikan' selected>Ketua Pengembangan Pendidikan</option>" +
													"<option value='Ketua Pengembangan Usaha' selected>Ketua Pengembangan Usaha</option>" +
													"<option value='Ketua Pemberdayaan Masyarakat' selected>Ketua Pemberdayaan Masyarakat</option>" +
													"<option value='Sekretaris' selected>Sekretaris</option>" +
													"<option value='Bendahara' selected>Bendahara</option>" +
													"<option value='Kadiv Administrasi Kantor' selected>Kadiv Administrasi Kantor</option>" +
													"</select>" +
													"<?php elseif ($this->session->userdata('akses') == '1') : ?>" +
													"<select class='form-control' data-plugin-multiselect name='kepada[]'>" +
													"<?php foreach ($user as $row) { ?>" +
													"<option value='<?php echo $row['nama']; ?>'><?php echo $row['nama']; ?>   </option>" +
													"<?php } ?>" +
													"</select>" +
													"<?php elseif ($this->session->userdata('akses') == '2') : ?>" +
													"<select class='form-control' data-plugin-multiselect name='kepada[]'>" +
													"<?php foreach ($user2 as $row) { ?>" +
													"<option value='<?php echo $row['nama']; ?>''><?php echo $row['nama']; ?>   </option>" +
													"<?php } ?>" +
													"</select>" +
													"<?php else : ?>" +
													"<select class='form-control' data-plugin-multiselect name='kepada[]'>" +
													"<?php foreach ($user2 as $row) { ?>" +
													"<option value='<?php echo $row['nama']; ?>'><?php echo $row['nama']; ?>   </option>" +
													"<?php } ?>" +
													"</select>" +
													"<?php endif; ?>" +
													"</div>" +
													"</div>");

												$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform

											});

											// Buat fungsi untuk mereset form ke semula
											$("#btn-reset-form").click(function() {
												$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
												$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
											});
										});
									</script>


						</div>


					</div>
					<!-- /.container-fluid -->

					<!-- Sticky Footer -->

				</div>
				<!-- /.content-wrapper -->

			</div>
			<!-- /#wrapper -->


			<?php $this->load->view("admin/scrolltop.php") ?>

			<?php $this->load->view("admin/js.php") ?>

	</body>







</body>

</html>