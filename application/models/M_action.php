<?php
class M_action extends CI_Model{
	function delete($id, $name) {
		$this->db->where('data_diri_alumni.id_diri', $id);
		$this->db->where('data_diri_alumni.nama', $name);
        $this->db->delete('data_diri_alumni');
		$this->db->where('data_lulus_alumni.id_lulus', $id);
		$this->db->where('data_lulus_alumni.nama', $name);
        $this->db->delete('data_lulus_alumni');
	}
	
	function detail_data($id, $dec_name) {
		$this->db->select('*')->from('data_diri_alumni');
		$this->db->join('data_lulus_alumni', 'data_lulus_alumni.id_lulus = data_diri_alumni.id_diri');
		$this->db->where('data_diri_alumni.id_diri', $id);
		$this->db->where('data_diri_alumni.nama', $dec_name);
		$query = $this->db->get();
		return $query->row();
	}
}
