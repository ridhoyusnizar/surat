<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/head.php") ?>
    <?php foreach ($suratMasuk as $row) {
        $suratmasuk[] = $row->jumlah;
        $tanggal[] = $row->tanggal_surat;
    }
    ?>

    <?php foreach ($suratKeluar as $row) {
        $suratkeluar[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
    ?>

    <?php foreach ($keputusanSatker as $row) {
        $keputusansatker[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
		?>

    <?php foreach ($keputusanPjb as $row) {
        $keputusanpjb[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
    ?>

    <?php foreach ($suratTugas as $row) {
        $surattugas[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
		?>

    <?php foreach ($keputusaN as $row) {
        $keputusan[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
    ?>

    <?php foreach ($peraturaN as $row) {
        $peraturan[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
    ?>

    <?php foreach ($Disposisi as $row) {
        $disposisi[] = $row->jumlah;
        
    }
    ?>



</head>

<body id="page-top">

    <?php $this->load->view("admin/navbar.php") ?>

    <div id="wrapper">

        <?php $this->load->view("admin/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">
                <?php if($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'):?>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-comments"></i>
                                </div>
                                <div class="mr-5"><?php echo $selesai; ?> Surat Masuk Selesai Didisposisikan</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo site_url('disposisi/adminSelesai') ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5"> <?php echo $belum; ?> Surat Masuk Belum Selesai Didisposisikan</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo site_url('disposisi/adminBelum') ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5"> <?php echo $belumdibaca; ?> Surat Disposisi Belum Dibaca</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo site_url('disposisi/disposisiBelum') ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5"> <?php echo $sudahdibaca; ?> Surat Disposisi Sudah Dibaca</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo site_url('disposisi/disposisiTerbaca') ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Rekapitulasi Penerima Disposisi</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <th>Nama</th>
                                            <th>jumlah</th>
                                            <thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ketua Umum</td>
                                                    <td><?php echo $ketum; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sekretaris</td>
                                                    <td><?php echo $sekretaris; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Bendahara</td>
                                                    <td><?php echo $bendahara; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ketua Pengembangan Pendidikan</td>
                                                    <td><?php echo $kpp; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ketua Pengembangan Usaha</td>
                                                    <td><?php echo $kpu; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ketua Pemberdayaan Masyarakat</td>
                                                    <td><?php echo $kpm; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kadiv Administrasi Kantor</td>
                                                    <td><?php echo $kak; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Deputy Keuangan dan Aset</td>
                                                    <td><?php echo $dka; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kadiv HOSDM</td>
                                                    <td><?php echo $hosdm; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kadiv Pengelolaan Aset</td>
                                                    <td><?php echo $kpa; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kadiv Perawatan Bangunan</td>
                                                    <td><?php echo $kpb; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Dana Pensiun</td>
                                                    <td><?php echo $dp; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kepala Departemen Infrastruktur/PFK</td>
                                                    <td><?php echo $kdi; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kepala Departemen IT</td>
                                                    <td><?php echo $it; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Lembaga Audit</td>
                                                    <td><?php echo $audit; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>LAZIS</td>
                                                    <td><?php echo $lazis; ?></td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Rekapitulasi Data</div>
                            <div class="card-body">
                                <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js">
                                </script>
                                <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
                                <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js">
                                </script>
                                <script type="text/javascript" src="http://code.highcharts.com/highcharts-3d.js">
                                </script>
                                <div class="grafik" style="width:100%; height:400px;"></div>

                                <script type="text/javascript">
                                $('.grafik').highcharts({
                                    chart: {
                                        type: 'pie',
                                        options3d: {
                                            enabled: true,
                                            alpha: 45,
                                            beta: 0
                                        },
                                        marginTop: 80
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    title: {
                                        text: 'Jumlah Disposisi'
                                    },
                                    subtitle: {
                                        text: 'Selesai dan Belum Selesai'
                                    },
                                    xAxis: {
                                        categories: <?php echo $array_kategori; ?>,
                                        labels: {
                                            style: {
                                                fontSize: '10px',
                                                fontFamily: 'Verdana, sans-serif'
                                            }
                                        }
                                    },
                                    legend: {
                                        enabled: true
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            depth: 35,
                                            dataLabels: {
                                                enabled: false
                                            },
                                            showInLegend: true
                                        }
                                    },
                                    series: <?php echo $array_series; ?>
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <span id="testcoba">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-chart-area"></i>
                            Rekapitulasi Surat</div>

                        <div class="card-body">
                            <link
                                href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
                                rel="stylesheet">
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                            <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js">
                            </script>
                            <table>
                                <form id="idForm" action="<?=base_url('dashboard/chartLine')?>">
                                    <td><input name="tahun" placeholder="Masukkan Tahun" required class="date-own form-control" style="width: 300px;"
                                            type="text"></td>
                                    <td><input class="btn btn-primary" type="submit" value="Submit"></td>
                                </form>
                            </table>

                            <script type="text/javascript">
                            $("#idForm").submit(function(e) {
                                e.preventDefault(); // avoid to execute the actual submit of the form.
                                // var form = $(this);
                                // var url = form.attr('action');
                                var tahun = $('input[name="tahun"]').val();
                                $("#testcoba").load("<?=base_url('dashboard/chartLine/')?>" + tahun);
                            });
                            $('.date-own').datepicker({

                                minViewMode: 2,

                                format: 'yyyy'

                            });
                            </script>
                            <div id="card"></div>
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>
                            <script src="https://code.highcharts.com/modules/export-data.js"></script>
                            <script>
                            Highcharts.chart('card', {
                                chart: {
                                    type: 'line'
                                },
                                title: {
                                    text: 'Rekapitulasi Surat Perbulan'
                                },
                                subtitle: {
                                    text: ''
                                },
                                xAxis: {
                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                                        'Oct', 'Nov', 'Dec'
                                    ]
                                },
                                yAxis: {
                                    title: {
                                        text: 'Jumlah Surat'
                                    }
                                },
                                plotOptions: {
                                    line: {
                                        dataLabels: {
                                            enabled: true
                                        },
                                        enableMouseTracking: false
                                    }
                                },
                                series: [{
                                    name: 'Surat Masuk',
                                    data: [<?php echo join($suratmasuk, ',')?>]
                                }, {
                                    name: 'Surat Keluar',
                                    data: [<?php echo join($suratkeluar, ',')?>]
                                }, {
                                    name: 'Surat Keputusan Satker',
                                    data: [<?php echo join($keputusansatker, ',')?>]
                                }, {
                                    name: 'Surat Keputusan PJB',
                                    data: [<?php echo join($keputusanpjb, ',')?>]
                                }, {
                                    name: 'Surat Tugas',
                                    data: [<?php echo join($surattugas, ',')?>]
                                }, {
                                    name: 'Keputusan',
                                    data: [<?php echo join($keputusan, ',')?>]
                                }, {
                                    name: 'Peraturan',
                                    data: [<?php echo join($peraturan, ',')?>]
                                }]
                            });
                            </script>
                        </div>

                    </div>
                </span>
                <?php else:?>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-comments"></i>
                                </div>
                                <div class="mr-5"><?php echo $terbaca; ?> Surat Sudah Terbaca</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo site_url('disposisi/disposisiTerbaca') ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5"> <?php echo $hitung; ?> Surat Belum Terbaca</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo site_url('disposisi/disposisiBelum') ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-paper-plane"></i>
                                </div>
                                <div class="mr-5"><?php echo $semua; ?> Surat yang diterima</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo site_url('disposisi/rekapSaya') ?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif;?>

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
    $(function() {
        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'contohGrafikPie',
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: 'Sample Penggunaan PHP Framework'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br>Penggunaan : <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Penggunaan Framework',
                data: [<?= join($disposisi,",") ?>]
            }]
        });
    });
    </script>

</body>

</html>