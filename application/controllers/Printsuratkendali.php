<?php
Class Printsuratkendali extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('m_masuk');
        $this->load->model('m_disposisi');
        $this->load->helper('url');
        $this->load->helper('tgl_indo');
        $this->load->library('Pdf');
    }
    
    function print($id = null){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','',12);
        // mencetak string 
        $pdf->Cell(190,7,'PENGURUS YAYASAN BADAN WAKAF UII',0,1,'C');
        $pdf->SetFont('Times','B',13);
        $pdf->Cell(190,7,'KARTU KENDALI SURAT',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, 27, 200, 27);
        $surat = $this->m_masuk->getById($id);
        // $surat = $this->db->get('surat_masuk')->row($id);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,7,'Tgl. Terima    : '.date_indo($surat->tanggal_surat),0,1);
        $pdf->Cell(0,7,'No Agenda    : '.$surat->no_agenda,0,1);
        $pdf->Cell(0,7,'Pengirim        : '.$surat->asal_surat,0,1);
        $pdf->Cell(0,7,'Isi Surat         : '.$surat->perihal,0,1);
        $disposisi = $this->m_disposisi->getByAll($id = $surat->id_surat_masuk);
        $no=0;
        foreach ($disposisi as $disposisi){
        $no++;
        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,7,$no.'). Diteruskan/Diproses ke : '.$disposisi->kepada,0,1);
        $pdf->Cell(0,5,'',0,1);
        if($disposisi->catatan_ketua == ''){
        }else{
            $pdf->Cell(0,7,'Catatan Ketua Umum : ',0,1);
            $pdf->Cell(0,7,$disposisi->catatan_ketua,0,1);
        }
        $pdf->Cell(0,7,'Catatan '.$disposisi->dari.' : ',0,1);
        $pdf->Cell(0,7,$disposisi->catatan,0,1);
        $pdf->Cell(0,5,'',0,1);
        }
        $pdf->Output();
    }
}