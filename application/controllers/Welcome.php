<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function send() {
        $config['mailtype'] 	= 'text'; // text atau html
        $config['protocol'] 	= 'smtp';
        $config['smtp_host'] 	= 'smtp.mailtrap.io';
        $config['smtp_user'] 	= '887ae127c1c27c';
        $config['smtp_pass'] 	= '5c0b3c40004993';
        $config['smtp_port'] 	= 587;
        $config['newline'] 		= "\r\n";

        $this->load->library('email', $config);

        $this->email->from('no-reply@paypal.com', 'Sistem Kirim Email');
        $this->email->to('armannurhidayat7@gmail.com');
        $this->email->subject('Kirim Email Dengan Codeigniter');
		$this->email->message('pesan yang dikirim dengan Codeigniter');
		
		// File Lampiran
        $this->email->attach('./assets/lampiran.odt');

        if($this->email->send()) {
            echo 'Email berhasil dikirim';
        } else {
			echo 'Email tidak berhasil dikirim';
			echo '<br /><hr/>';
			echo $this->email->print_debugger();
          }

     }

}