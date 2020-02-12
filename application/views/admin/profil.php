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
                    <li class="breadcrumb-item active" aria-current="page">Profil</li>
                  </ol>
                </nav>

				<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
							<?= $this->session->flashdata('error') ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-body">
							<form action="" method="post" enctype="multipart/form-data" >
							<div class="form-group row">
							<label class="col-md-3 control-label">Username</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nama" value="<?php echo $this->session->userdata('ses_id');?>" readonly>
								</div>
							</div>
							<div class="form-group row">
							<label class="col-md-3 control-label">Jabatan</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nama" value="<?php echo $this->session->userdata('ses_nama');?>" readonly>
								</div>
							</div>
							<div class="form-group row">
							<label class="col-md-3 control-label">Nama</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nama" value="<?php echo $this->session->userdata('ses_nama_dpn');?><?php echo $this->session->userdata('ses_nama_lengkap');?><?php echo $this->session->userdata('ses_nama_blkng');?>" readonly>
								</div>
							</div><br>
							<center><label class="control-label">Ubah Password</label></center>
							<br>
							<form method="post" action="<?=site_url();?>login/save_password" >
							<div class="form-group row">
						        <label class="col-md-3 control-label">Password Lama:</label>
						        <div class="col-sm-8">
						        <input class="form-control" type="password" name="old" value="<?php echo set_value('old');?>" required>
						    	</div>
						      </div>
						      <div class="form-group row">
						        <label class="col-md-3 control-label">Password Baru</label>
						        <div class="col-sm-8">
						        <input class="form-control" type="password" name="new" value="<?php echo set_value('new');?>"  required>
						      </div>
						  </div>
						      <div class="form-group row">
						        <label class="col-md-3 control-label">Ulangi Password Baru</label>
						        <div class="col-sm-8">
						        <input class="form-control" type="password" name="re_new" value="<?php echo set_value('re_new'); ?>" required>
						      </div>
						  </div>
							<center><button class="btn btn-primary" type='submit' class='btn1' value='' >Submit</button>
                            <input class="btn btn-danger" type="reset" value="Reset"></center>
						</form>
						
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/footer.php") ?>
			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
		  $(document).ready(function(){
		    // cek event change id old_password 
		      $('#old_password').change(function(){    
		      var fopassword = $('#old_password').val();  
		        //mengirimkan old_password dan mengecek ke database ketersediaanya.
		            $.ajax({       
		              method: "POST",      
		              dataType: 'json',
		              url: "<?php echo base_url(); ?>login/check_account", 
		              data: { opassword: fopassword} ,  
		              success:function(data){
		                  //jika tersedia maka ambil data. data yang dikirimkan controller berupa nilai TRUE or FALSE
		                   document.getElementById("new").disabled = data;
		                   document.getElementById("confirm").disabled = data;
		                   //fungsinya untuk memanipulasi input text id new dan confirm
		              }
		            });
		   
		      });
		      //fungsi ini digunakan untuk cek kesamaan nilai antara inputan new dan confirm
		      $('#confirm').change(function(){    
		      var fnew = $('#new').val();  
		      var fconfirm = $('#confirm').val();  
		          if(fnew==fconfirm){
		             document.getElementById("submit").disabled = false;
		          }else{
		            document.getElementById("submit").disabled = true;
		          }
		    
		   });

		});
		</script>


		<?php $this->load->view("admin/scrolltop.php") ?>

		<?php $this->load->view("admin/js.php") ?>

</body>






