<?php 

class Tahun_ajaran_m extends CI_Model
{
	public function tampil_data()
	{
		return $this->db->get('tb_thajrn');
	}

	public function tambah_data($data)
	{
		$this->db->insert('tb_thajrn', $data);
	}

	public function edit($where, $table)
	{
		$query = $this->db->get_where($table, $where);
 		return $query;
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($id_thn_ajrn)
	{
		$this->db->where('id_thn_ajrn', $id_thn_ajrn);
		$this->db->delete('tb_thajrn');
	}
}