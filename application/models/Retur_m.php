<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur_m extends CI_Model
{
	protected $table = 'retur_pembelian';
	protected $primary = 'id_retur_pembelian';

	public function show($id)
	{
		$this->db->select('*');
		$this->db->from('retur_pembelian');
		$this->db->where('id_retur_pembelian', $id);
		$query      = $this->db->get();
		return $query->row();
	}
}
