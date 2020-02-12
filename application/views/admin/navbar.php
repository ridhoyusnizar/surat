<style>
    #navBar {
  box-shadow: 0px 1px 10px;
} 
  img {
    position: relative;
    padding-right: 8px;
  }
</style>

<nav id="navBar" class="navbar navbar-expand navbar-dark bg-primary static-top " >

    <img src="<?php echo base_url('assets/images/logoybw1.png')?>" width="30px" align="left"><a class="navbar-brand mr-1" style="color: #dddddd;"><b><font size="5" face="OpenSans-Bold">PYBW UII</font></b></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            
            <div class="input-group-append">

            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle"  href="<?php echo site_url('suratmasuk/alur') ?>">
                <i class="fas fa-info fa-fw"></i>    
            </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="badge badge-danger">
                    <?php echo $hitung; ?>
                </span>
                <i class="fas fa-bell fa-fw"></i>    
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <?php foreach ($notif as $surat):?>
                    <?php if($this->session->userdata('akses')=='3'):?>
                    <?php if($surat->status_terbaca=='0'):?>
                    <table class="table" width="100%" cellspacing="0">
                        <tr class="table-primary">
                            <td><a class="btn btn-small" style="color: black;" href="<?php echo site_url('Disposisi/tampil/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>">
                            <?php if($surat->kelompok=='Mendesak'):?>
                               <b style="color: red;">(<?php echo $surat->kelompok?>)</b>
                            <?php else:?>
                               <b class="text-warning">(<?php echo $surat->kelompok?>)</b>
                             <?php endif;?>
                                dari <b><?php echo $surat->dari?></b></br>didisposisikan pada <?php echo $surat->tanggal?></a>
                            <center><a href="<?php echo site_url('suratmasuk/tampilPDF/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-copy"></i> File</a>
                            <a href="<?php echo site_url('disposisi/multi/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-edit"></i>Disposisi</a>
                            <a href="<?php echo site_url('printsuratkendali/print/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-print"></i> Print</a>
                            </td>
                        </tr>
                        </table>
                        <?php else:?>
                        <table class="table" width="100%" cellspacing="0">
                        <tr class="table">
                        <td><a class="btn btn-small" style="color: black;" href="<?php echo site_url('Disposisi/tampil/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>">
                            <?php if($surat->kelompok=='Mendesak'):?>
                               <b style="color: red;">(<?php echo $surat->kelompok?>)</b>
                            <?php else:?>
                               <b class="text-warning">(<?php echo $surat->kelompok?>)</b>
                             <?php endif;?>
                                dari <b><?php echo $surat->dari?></b></br>didisposisikan pada <?php echo $surat->tanggal?></a>
                            <center><a href="<?php echo site_url('suratmasuk/tampilPDF/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-copy"></i> File</a>
                            <a href="<?php echo site_url('suratmasuk/kendali/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-edit"></i>Disposisi</a>
                            <a href="<?php echo site_url('printsuratkendali/print/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-print"></i> Print</a>
                            </td>
                        </tr>
                        </table>
                         <?php endif;?>
                    <?php else:?>
                        <?php if($surat->status_terbaca=='0'):?>
                        <table class="table" width="100%" cellspacing="0">
                        <tr class="table-primary">
                        <td><a class="btn btn-small" style="color: black;" href="<?php echo site_url('Disposisi/tampil/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>">
                            <?php if($surat->kelompok=='Mendesak'):?>
                               <b style="color: red;">(<?php echo $surat->kelompok?>)</b>
                            <?php else:?>
                               <b class="text-warning">(<?php echo $surat->kelompok?>)</b>
                             <?php endif;?>
                                dari <b><?php echo $surat->dari?></b></br>didisposisikan pada <?php echo $surat->tanggal?></a>
                            <center><a href="<?php echo site_url('suratmasuk/tampilPDF/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-copy"></i> File</a>
                            <a href="<?php echo site_url('suratmasuk/kendali/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-edit"></i>Disposisi</a>
                            <a href="<?php echo site_url('printsuratkendali/print/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-print"></i> Print</a>
                            </td>
                        </tr>
                        </table>
                        <?php else:?>
                        <table class="table" width="100%" cellspacing="0">
                        <tr class="table">
                        <td><a class="btn btn-small" style="color: black;" href="<?php echo site_url('Disposisi/tampil/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>">
                            <?php if($surat->kelompok=='Mendesak'):?>
                               <b style="color: red;">(<?php echo $surat->kelompok?>)</b>
                            <?php else:?>
                               <b class="text-warning">(<?php echo $surat->kelompok?>)</b>
                             <?php endif;?>
                                dari <b><?php echo $surat->dari?></b></br>didisposisikan pada <?php echo $surat->tanggal?></a>
                            <center><a href="<?php echo site_url('suratmasuk/tampilPDF/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-copy"></i> File</a>
                            <a href="<?php echo site_url('suratmasuk/kendali/'.$surat->id_surat_masuk).'/'.$surat->id_disposisi ?>"
                            class="btn btn-small"><i class="fas fa-edit"></i>Disposisi</a>
                            <a href="<?php echo site_url('printsuratkendali/print/'.$surat->id_surat_masuk) ?>"
											 class="btn btn-small"><i class="fas fa-print"></i> Print</a>
                            </td>
                        </tr>
                        </table>
                         <?php endif;?>
                    <?php endif;?>
                <?php endforeach; ?>
                <?php if($this->session->userdata('akses')=='3'):?>
                      <a class="dropdown-item" href="<?php echo site_url('disposisi/rekap') ?>">Selengkapnya ...</a>
                    <?php else:?>
                      <a class="dropdown-item" href="<?php echo site_url('disposisi/rekapSaya') ?>">Selengkapnya ...</a>
                    <?php endif;?>
            </div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="false"
                aria-expanded="true" style="color: #dddddd;">
                <?php echo $this->session->userdata('ses_nama');?> <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url().'login/save_password'?>">Profil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url().'login/logout'?>">Logout</a>
            </div>
        </li>
    </ul>

</nav>
