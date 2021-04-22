<?php 

class Santri_m extends CI_Model
{
	public function tampil_data()
	{
		$this->db->select('tb_santri.*,tb_kelas.kelas as kelas, tb_thajrn.thn_ajrn as thn');
		$this->db->from('tb_santri');
		$this->db->join('tb_kelas','tb_kelas.id_kelas=tb_santri.id_kelas');
		$this->db->join('tb_thajrn','tb_thajrn.id_thn_ajrn=tb_santri.id_thn_ajrn');
		$query = $this->db->get();
		return $query;
	}

	public function banyak_data()
	{
		$query = $this->db->get('tb_santri');
		if($query->num_rows()>0){
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function banyak_alumni()
	{
		$this->db->where('tb_santri.alumni="Iya"');
		$query = $this->db->get('tb_santri');
		if($query->num_rows()>0){
			return $query->num_rows();
		} else{
			return 0;
		}
	}

	public function santri_aktif()
	{
		$this->db->where('tb_santri.alumni="tidak"');
		$query = $this->db->get('tb_santri');
		if($query->num_rows()>0){
			return $query->num_rows();
		} else{
			return 0;
		}
	}

	public function santri_chart()
	{
		$this->db->select('tb_santri.*, count(tb_santri.id_thn_ajrn) as total, tb_thajrn.thn_ajrn as thn');
		$this->db->from('tb_santri');
		$this->db->join('tb_thajrn','tb_thajrn.id_thn_ajrn = tb_santri.id_thn_ajrn');
		$this->db->group_by('thn');
		$query = $this->db->get()->result();
		return $query;
	}

	public function santri_donat()
	{
		$this->db->select('tb_santri.*, count(tb_santri.id_kelas) as total, tb_kelas.kelas as kelas');
		$this->db->from('tb_santri');
		$this->db->join('tb_kelas','tb_kelas.id_kelas = tb_santri.id_kelas');
		$this->db->where('tb_santri.alumni="tidak"');
		$this->db->group_by('kelas');
		$query = $this->db->get()->result();
		return $query;
	}

	public function tambah_data($data)
	{
		$this->db->insert('tb_santri', $data);
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

	public function hapus_data($nis)
	{

		$this->db->where('nis', $nis);
		$this->db->delete('tb_santri');
	}

}