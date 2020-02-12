<?php
class m_dashboard extends CI_Model{
	private $_table = "disposisi";
	
        public function getAll()
        {
            return $this->db->get($this->_table)->result();
        }

            public function getById($id)
        {
            return $this->db->get_where($this->_table, ["id_disposisi" => $id])->row();
        }



        public function jumlahKetuaUmum() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Ketua Umum');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahSekretaris() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Sekretaris');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahBendahara() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Bendahara');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahkpp() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Ketua Pengembangan Pendidikan');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }
          
          public function jumlahkpu() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Ketua Pengembangan Usaha');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahkpm() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Ketua Pemberdayaan Masyarakat');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahkak() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Kadiv Administrasi Kantor');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahdka() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Deputy Keuangan dan Aset');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahhosdm() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Kadiv HOSDM');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahkpa() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Kadiv Pengelolaan Aset');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahkpb() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Kadiv Perawatan Bangunan');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahdp() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Dana Pensiun');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahkdi() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Kepala Departemen Infrastruktur/PFK');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahit() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Kepala Departemen IT');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahaudit() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','Lembaga Audit');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahlazis() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('kepada','LAZIS');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function jumlahBelumDibaca() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('disposisi.status_terbaca','0');
          $this->db->order_by('id_disposisi','DESC');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }
      
          public function jumlahSudahDibaca() {
            $this->db->select ('*');
          $this->db->from('disposisi');
          $this->db->where('disposisi.status_terbaca','1');
          $this->db->order_by('id_disposisi','DESC');
          $query = $this->db->get();
            if($query->num_rows()>0)
            {
              return $query->num_rows();
            }
            else
            {
              return 0;
            }
          }

          public function getDisposisiBelumAdmin() {
            $this->db->select ('*');
            $this->db->from('disposisi');
            $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
            $this->db->where('disposisi.status_terbaca','0');
            $this->db->order_by('id_disposisi','DESC');
            $query = $this->db->get();
             return $query->result();
            }
      
            public function getDisposisiSudahAdmin() {
              $this->db->select ('*');
              $this->db->from('disposisi');
              $this->db->join("surat_masuk", "disposisi.no_agenda = surat_masuk.no_agenda");
              $this->db->where('disposisi.status_terbaca','1');
              $this->db->order_by('id_disposisi','DESC');
              $query = $this->db->get();
               return $query->result();
              }

        public function donutChart(){
            $this->db->select('kepada, COUNT(id_disposisi) as jumlah');
            $this->db->from('disposisi');
            $this->db->group_by('id_disposisi');
            $query = $this->db->get();
            return $query->result();
        }

        function getChart(){
          $query = $this->db->query("SELECT kepada,SUM(id_disposisi) AS jumlah FROM disposisi GROUP BY kepada");
           
          if($query->num_rows() > 0){
              foreach($query->result() as $data){
                  $hasil[] = $data;
              }
              return $hasil;
          }
      }

      public function suratMasuk($month){
            $this->db->select('COUNT(tanggal_surat) as jumlah,tanggal_surat');
            $this->db->from('surat_masuk');
            $this->db->like('tanggal_surat',$month);
            $this->db->group_by('month(tanggal_surat)');
            $query = $this->db->get();
            return $query->result();
        }

      public function suratKeluar($month){
            $this->db->select('COUNT(tanggal) as jumlah,tanggal');
            $this->db->from('surat_keluar');
            $this->db->like('tanggal',$month);
            $this->db->group_by('month(tanggal)');
            $query = $this->db->get();
            return $query->result();
        }

         public function suratKeputusanSatker($month){
            $this->db->select('COUNT(tanggal) as jumlah,tanggal');
            $this->db->from('surat_keputusan_satker');
            $this->db->like('tanggal',$month);
            $this->db->group_by('month(tanggal)');
            $query = $this->db->get();
            return $query->result();
        }

        public function suratKeputusanPjb($month){
            $this->db->select('COUNT(tanggal) as jumlah,tanggal');
            $this->db->from('surat_keputusan_pjb');
            $this->db->like('tanggal',$month);
            $this->db->group_by('month(tanggal)');
            $query = $this->db->get();
            return $query->result();
        }

        public function suratTugas($month){
            $this->db->select('COUNT(tanggal) as jumlah,tanggal');
            $this->db->from('surat_tugas');
            $this->db->like('tanggal',$month);
            $this->db->group_by('month(tanggal)');
            $query = $this->db->get();
            return $query->result();
        }

        public function keputusan($month){
            $this->db->select('COUNT(tanggal) as jumlah,tanggal');
            $this->db->from('keputusan');
            $this->db->like('tanggal',$month);
            $this->db->group_by('month(tanggal)');
            $query = $this->db->get();
            return $query->result();
        }

        public function peraturan($month){
            $this->db->select('COUNT(tanggal) as jumlah,tanggal');
            $this->db->from('surat_peraturan');
            $this->db->like('tanggal',$month);
            $this->db->group_by('month(tanggal)');
            $query = $this->db->get();
            return $query->result();
        }

        public function belumSelesai(){
          $this->db->select('COUNT(status) as jumlah');
          $this->db->from('surat_masuk');
          $query = $this->db->get();
          return $query->result();
      }

          public function getjumlahsiswa()
        {
        $this->db->select('status,COUNT(status) as total');
        $this->db->from('surat_masuk');
        $this->db->group_by('status');
$this->db->order_by('status');
        $query = $this->db->get();
        return $query->result_array();
        }
}