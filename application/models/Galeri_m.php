<?php 

class Galeri_m extends CI_Model
{
	public function tampil_data()
	{
		return $this->db->get('galeri');
	}

	public function tambah_data($data)
	{
		$this->db->insert('galeri', $data);
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

	public function hapus_data($id_galeri)
	{
		$galeri= $this->db->where('id_galeri', $id_galeri)->get('galeri')->row();
		unlink('assets/img/galeri/'.$galeri->galeri);

		$this->db->where('id_galeri', $id_galeri);
		$this->db->delete('galeri');
	}
}