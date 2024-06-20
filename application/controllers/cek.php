<?php
class Cek extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pendaftar_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('menu/read/cek_form');
    }

    public function submit() {
        $this->form_validation->set_rules('kode_unik', 'Kode Unik', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('menu/read/cek_form');
        } else {
            $kode_unik = $this->input->post('kode_unik');
            $data = $this->Pendaftar_model->get_pendaftar_by_kode_unik($kode_unik);

            if ($data) {
                $this->load->view('menu/read/cek_success', $data);
            } else {
                $data['error'] = '<center>NIS tidak ditemukan.</center>';
                $this->load->view('menu/read/cek_form', $data);
            }
        }
    }
}
