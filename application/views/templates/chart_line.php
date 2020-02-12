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

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Rekapitulasi Surat</div>

    <div class="card-body">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
            rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js">
        </script>
        <table>
            <form id="idForm" action="<?=base_url('dashboard/chartLine')?>">
                <td><input name="tahun"  placeholder="Masukkan Tahun" required class="date-own form-control" style="width: 300px;" type="text"></td>
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