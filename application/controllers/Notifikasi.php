<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

        public function tes(){
            $this->load->view('templates/contoh_notifikasi');
        }
		
        public function process(){
              $this->load->view('vendor/autoload.php');

              $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
              );
              $pusher = new Pusher\Pusher(
                '9fb1336e9681f5205b55',
                '21babf663dabee4f2d4a',
                '691908',
                $options
              );

              $data['message'] = $_POST['message'];
              $pusher->trigger('suratan1', 'my-event', $data);
        }
}