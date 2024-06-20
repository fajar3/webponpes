<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pcontrol extends CI_Controller {
	public function index()
	{
        $data = array(
            'nama' => "Miftahul Huda 3"
        );
		$this->load->view('template/head',$data);
        $this->load->view('pondok',$data);
        $this->load->view('template/foot',$data);
	}
}
