<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		// cek_user();
		$this->load->model('Jabatan_m');
	}
	public function index()
	{
		$data = array(
			'title'    => 'Jabatan',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'jabatan/index',
			'jabatan' => $this->db->get('jabatan')->result(),

		);
		$this->load->view('templates/main', $data);
	}

	public function store()
	{
		$this->Jabatan_m->Save();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Jabatan berhasil disimpan.</div>');
		redirect('jabatan');
	}

	public function show($id = '')
	{
		$data = $this->Jabatan_m->Detail($id);
		echo json_encode($data);
	}

	public function update()
	{
		$this->Jabatan_m->Edit();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Jabatan berhasil diubah.</div>');
		redirect('jabatan');
	}

	public function destroy($id = '')
	{
		$this->Jabatan_m->Delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Jabatan berhasil dihapus.</div>');
	}
}
