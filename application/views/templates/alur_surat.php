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
                    <li class="breadcrumb-item active" aria-current="page">Alur Sistem PYBW UII</li>
                  </ol>
                </nav>

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <div class="card mb-3">
                    <div class="card-body">
                        <?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
                             <p><center><b><font size="4">ALUR PENGELOLAAN SURAT</font></b><hr><br>
                             <img src="<?php echo base_url('assets/images/admin.png')?>" width="1000px">
                             <br></center></p>
                             <p><center><hr><b><font size="4">ALUR DISPOSISI SURAT</font></b><hr><br>
                             <img src="<?php echo base_url('assets/images/dAdmin.png')?>" width="1000px"></center></p>
                        <?php else:?>
                             <p><center><b><font size="4">ALUR DISPOSISI SURAT</font></b><hr><br>
                             <img src="<?php echo base_url('assets/images/dUser.png')?>" width="1200px"></center></p>
                        <?php endif;?>
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






