<?php
class M_feature extends CI_Model{
	function get_data_angkatan_jurusan() {
		$this->db->select('angkatan_jurusan')->from('data_diri_alumni');
		$this->db->order_by('angkatan_jurusan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	function search($sn){
		$this->db->select('*')->from('data_diri_alumni');
		if(empty($sn[2])){
			$this->db->like('nama',$sn[0]);
			$this->db->or_like('angkatan_jurusan',$sn[1]);
		}else{
			$this->db->like(array('nama' => $sn[0], 'angkatan_jurusan' => $sn[2]));
		}
		$query = $this->db->get();
		return $query->result(); 
	}

    function get_temp_angkatan_jurusan() {
        $this->db->select('angkatan_jurusan')->from('temp');
        $this->db->order_by('angkatan_jurusan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function search_temp($sn){
        $this->db->select('*')->from('temp');
        if(empty($sn[2])){
            $this->db->like('nama',$sn[0]);
            $this->db->or_like('angkatan_jurusan',$sn[1]);
        }else{
            $this->db->like(array('nama' => $sn[0], 'angkatan_jurusan' => $sn[2]));
        }
        $query = $this->db->get();
        return $query->result();
    }
}
