<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Denda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Denda_m');
    }
    public function index()
    {
        $data = array(
            'title'    => 'Denda',
            'user'     => infoLogin(),
            'toko'     => $this->db->get('profil_perusahaan')->row(),
            'content'  => 'denda/index',
            'denda' => $this->Denda_m->getAllData()

        );

        $this->load->view('templates/main', $data);
    }

    public function update()
    {
        $this->Denda_m->Edit();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Denda berhasil diubah.</div>');
        redirect('denda');
    }
}
