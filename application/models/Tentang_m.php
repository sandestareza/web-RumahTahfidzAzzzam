<?php 

class Tentang_m extends CI_Model
{
	public function tampil_data()
	{
		return $this->db->get('tb_tentang');
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
}