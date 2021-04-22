<?php 

class Pengurus_m extends CI_Model
{
	public function tampil_data()
	{
		$this->db->select('tb_pengurus.*,tb_jabatan.jabatan as jabatan, tb_role.role as role');
		$this->db->from('tb_pengurus');
		$this->db->join('tb_jabatan',
						'tb_jabatan.id_jabatan=tb_pengurus.id_jabatan');

		$this->db->join('tb_role','tb_role.id_role=tb_pengurus.id_role');
		$query = $this->db->get();
		return $query;
	}

	public function banyak_guru()
	{
		$this->db->where('tb_pengurus.id_jabatan="5"');
		$query = $this->db->get('tb_pengurus');
		if($query->num_rows()>0){
			return $query->num_rows();
		} else{
			return 0;
		}
	}

	public function tampil_data_role()//menampilkan tabel role/hak akses
	{
		return $this->db->get('tb_role');
	}

	public function tambah_data($data)
	{
		$this->db->insert('tb_pengurus', $data);
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

	public function hapus_data($nip)
	{

		$this->db->where('nip', $nip);
		$this->db->delete('tb_pengurus');
	}

}