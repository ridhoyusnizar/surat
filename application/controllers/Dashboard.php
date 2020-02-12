<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
        public function __construct(){
        parent::__construct();
        $this->load->model('m_dashboard');
        $this->load->model('login_model');
        $this->load->model('m_disposisi', '', TRUE);
        $this->load->library('form_validation');
        $this->load->helper('url');
            if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
    }
    
    public function dashboard($month=null){
        if($this->session->userdata('akses')=='4' || $this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
            $data["notif"] = $this->m_disposisi->getNotifikasi();
            $data["hitung"] = $this->m_disposisi->jumlahNotifikasi();
            $data["terbaca"] = $this->m_disposisi->jumlahTerbaca();
            $data["semua"] = $this->m_disposisi->semuaNotifikasi();
            $data["belum"] = $this->m_disposisi->jumlahBelum();
            $data["selesai"] = $this->m_disposisi->jumlahSelesai();
            $data["ketum"] = $this->m_dashboard->jumlahKetuaUmum();
            $data["sekretaris"] = $this->m_dashboard->jumlahSekretaris();
            $data["bendahara"] = $this->m_dashboard->jumlahBendahara();
            $data["kpp"] = $this->m_dashboard->jumlahkpp();
            $data["kpu"] = $this->m_dashboard->jumlahkpu();
            $data["kpm"] = $this->m_dashboard->jumlahkpm();
            $data["kak"] = $this->m_dashboard->jumlahkak();
            $data["dka"] = $this->m_dashboard->jumlahdka();
            $data["hosdm"] = $this->m_dashboard->jumlahhosdm();
            $data["kpa"] = $this->m_dashboard->jumlahkpa();
            $data["kpb"] = $this->m_dashboard->jumlahkpb();
            $data["dp"] = $this->m_dashboard->jumlahdp();
            $data["kdi"] = $this->m_dashboard->jumlahkdi();
            $data["it"] = $this->m_dashboard->jumlahit();
            $data["audit"] = $this->m_dashboard->jumlahaudit();
            $data["lazis"] = $this->m_dashboard->jumlahlazis();
            $data["belumdibaca"] = $this->m_dashboard->jumlahBelumDibaca();
            $data["sudahdibaca"] = $this->m_dashboard->jumlahSudahDibaca();
            $data['disposisi']=$this->m_dashboard->getChart();
            if ($month==null) {
            $month=date('Y');
            }
            $data['suratMasuk']=$this->m_dashboard->suratMasuk($month);
            $data['suratKeluar']=$this->m_dashboard->suratKeluar($month);
            $data['keputusanSatker']=$this->m_dashboard->suratKeputusanSatker($month);
            $data['keputusanPjb']=$this->m_dashboard->suratKeputusanPjb($month);
            $data['keputusaN']=$this->m_dashboard->keputusan($month);
            $data['peraturaN']=$this->m_dashboard->peraturan($month);
            $data['suratTugas']=$this->m_dashboard->suratTugas($month);
            $data['Disposisi']=$this->m_dashboard->belumSelesai($month);

            $array_kategori = array('Data Disposisi');
            $array_series = array(array('name'=>'Jumlah Data Disposisi', 'data'=>array()));
            $array_datas = array();
            $data_siswa = $this->m_dashboard->getjumlahsiswa();
            $i=0;
            while($i < count($data_siswa)){
            $array_datas[$data_siswa[$i]['status']] = intval($data_siswa[$i]['total']);
            $i++;
            }
            // set value per data grafik
            foreach($array_datas as $key=>$val){
            array_push($array_series[0]['data'], array((string)$key, $val));
            }
            $data['array_kategori'] = json_encode($array_kategori);
            $data['array_series'] = json_encode($array_series);
            $this->load->view('templates/dashboard', $data);
            }

                
        else{
          echo "Anda tidak berhak mengakses halaman ini";
        }
    }
    

    public function chartLine($month){
            $data['suratMasuk']=$this->m_dashboard->suratMasuk($month);
            $data['suratKeluar']=$this->m_dashboard->suratKeluar($month);
            $data['keputusanSatker']=$this->m_dashboard->suratKeputusanSatker($month);
            $data['keputusanPjb']=$this->m_dashboard->suratKeputusanPjb($month);
            $data['keputusaN']=$this->m_dashboard->keputusan($month);
            $data['peraturaN']=$this->m_dashboard->peraturan($month);
            $data['suratTugas']=$this->m_dashboard->suratTugas($month);
            $data['Disposisi']=$this->m_dashboard->belumSelesai($month);
        
        $this->load->view('templates/chart_line',$data);
    }

    public function chart($month=null)
    {
        if ($month==null) {
            $month=date('Y');
        }
        $data['suratMasuk']=$this->m_dashboard->suratMasuk($month);
        $data['suratKeluar']=$this->m_dashboard->suratKeluar($month);
        $data['keputusansatker']=$this->m_dashboard->suratKeputusanSatker($month);
        $data['keputusanpjb']=$this->m_dashboard->suratKeputusanPjb($month);
        $data['keputusan']=$this->m_dashboard->keputusan($month);
        $data['peraturan']=$this->m_dashboard->peraturan($month);
        $data['surattugas']=$this->m_dashboard->suratTugas($month);
        $this->load->view('templates/v_chart',$data);
    }

    public function getData()
    {
        $respon->cols[] = array(
            "label" => "Nama",
            "type" => "string"
        );
        $respon->cols[] = array(
            "label" => "Jumlah",
            "type" => "number"
        );
        $data = $this->m_dashboard->donutChart();

        foreach ($data as $row){
            $respon->row[]['c']=array(
                array(
                    "v"=>$row->kepada
                ),
                array(
                    "v"=>(int)$row->jumlah
                )
            );
        }
        echo json_encode($respon);
    }
}