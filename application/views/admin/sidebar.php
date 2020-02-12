</style>
<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('dashboard/dashboard') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <?php if ($this->session->userdata('akses') == '3') : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-envelope-open"></i>
                <span>Surat Masuk</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('suratmasuk/rekap') ?>">Rekap Surat Masuk</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Surat Keluar</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('suratkeluar/rekap') ?>">Rekap Surat Keluar</a>
                <a class="dropdown-item" href="<?= base_url('suratkeputusan/rekap') ?>">Rekap SK</a>
                <a class="dropdown-item" href="<?= base_url('surattugas/rekap') ?>">Rekap ST</a>
                <a class="dropdown-item" href="<?= base_url('suratperaturan/rekap') ?>">Rekap Peraturan</a>
                <a class="dropdown-item" href="<?= base_url('keputusan/rekap') ?>">Rekap Keputusan</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>Disposisi</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('disposisi/rekap') ?>">Disposisi Surat Masuk</a>
                <a class="dropdown-item" href="<?= base_url('disposisi/rekapDariSaya') ?>">Disposisi Dari Saya</a>
            </div>
        </li>
        <hr>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-users"></i>
                <span>User</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('user/rekap') ?>">Rekap User</a>
            </div>
        </li>
    <?php elseif ($this->session->userdata('akses') == '4') : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope-open"></i>
                <span>Surat Masuk</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('suratmasuk/rekap') ?>">Rekap Surat Masuk</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope"></i>
                <span>Surat Keluar</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('suratkeluar/rekap') ?>">Rekap Surat Keluar</a>
                <a class="dropdown-item" href="<?= base_url('suratkeputusan/rekap') ?>">Rekap SK</a>
                <a class="dropdown-item" href="<?= base_url('surattugas/rekap') ?>">Rekap ST</a>
                <a class="dropdown-item" href="<?= base_url('suratperaturan/rekap') ?>">Rekap Peraturan</a>
                <a class="dropdown-item" href="<?= base_url('keputusan/rekap') ?>">Rekap Keputusan</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>Disposisi</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('disposisi/rekap') ?>">Disposisi Surat Masuk</a>
                <a class="dropdown-item" href="<?= base_url('disposisi/rekapDariSaya') ?>">Disposisi Dari Saya</a>
            </div>
        </li>
    <?php elseif ($this->session->userdata('akses') == '1') : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope-open"></i>
                <span>Surat Masuk</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('suratmasuk/rekap') ?>">Rekap Surat Masuk</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope"></i>
                <span>Surat Keluar</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('suratkeluar/rekap') ?>">Rekap Surat Keluar</a>
                <a class="dropdown-item" href="<?= base_url('suratkeputusan/rekap') ?>">Rekap SK</a>
                <a class="dropdown-item" href="<?= base_url('surattugas/rekap') ?>">Rekap ST</a>
                <a class="dropdown-item" href="<?= base_url('suratperaturan/rekap') ?>">Rekap Peraturan</a>
                <a class="dropdown-item" href="<?= base_url('keputusan/rekap') ?>">Rekap Keputusan</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>Disposisi</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('disposisi/rekapSaya') ?>">Disposisi Saya</a>
                <a class="dropdown-item" href="<?= base_url('disposisi/rekapDariSaya') ?>">Disposisi Dari Saya</a>
            </div>
        </li>
    <?php else : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>Disposisi</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= base_url('disposisi/rekapSaya') ?>">Disposisi Saya</a>
                <a class="dropdown-item" href="<?= base_url('disposisi/rekapDariSaya') ?>">Disposisi Dari Saya</a>
            </div>
        </li>
    <?php endif; ?>
</ul>