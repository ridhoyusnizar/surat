<!DOCTYPE html>
<html>
<head>
	<title>Grafik Stok Barang</title>

</head>
<body>

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

    <?php foreach ($keputusan as $row) {
        $keputusan[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
    ?>

    <?php foreach ($keputusanpjb as $row) {
        $keputusanpjb[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
    ?>

    <?php foreach ($keputusansatker as $row) {
        $keputusansatker[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
    ?>

    <?php foreach ($peraturan as $row) {
        $suratperaturan[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
    ?>

    <?php foreach ($surattugas as $row) {
        $surattugas[] = $row->jumlah;
        $tanggal[] = $row->tanggal;
    }
    ?>


	<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


            
   	<script>
        Highcharts.chart('cart', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Rekapitulasi Surat'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
    name: 'Surat Keputusan Satker',
    data: [<?php echo join($keputusanpjb, ',')?>]
    }, {
    name: 'Surat Keputusan Satker',
    data: [<?php echo join($surattugas, ',')?>]
    }, {
    name: 'Surat Keputusan Satker',
    data: [<?php echo join($keputusan, ',')?>]
    }, {
    name: 'Surat Keputusan Satker',
    data: [<?php echo join($peraturan, ',')?>]
  }]
});
    </script>
</body>
</html>