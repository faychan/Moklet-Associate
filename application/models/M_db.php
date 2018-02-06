<?php
class M_db extends CI_Model{
	function check_user() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$query = $this->db->where('username', $username)
						  ->where('password', $password)
						  ->get ('account');
		if($query->num_rows()>0) {
			$data = array(
				'username'	=>$username,
				'logged_admin'	=>TRUE
			);
			$this->session->set_userdata($data);
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function insert_data($foto) {
		$id_diri		=	$this->input->post('id');
		$id_lulus		=	$this->input->post('id');
		$nama			=	$this->input->post('nama');
		$angkatan_jurusan =	implode("/ ", $this->input->post('angkatan_jurusan'));
		$ttl			=	implode(" ", $this->input->post('ttl'));
		$jk				=	$this->input->post('jk');
		$domisili		=	$this->input->post('domisili');
		$telp			=	$this->input->post('telp');
		$email			=	$this->input->post('email');
		$smp_asal		=	$this->input->post('smp_asal');
		$perusahaan		=	$this->input->post('perusahaan');
		$posisi			=	$this->input->post('posisi');
		$almtperusahaan	=	$this->input->post('almtperusahaan');
		$universitas	=	$this->input->post('universitas');
		$facebook		=	$this->input->post('facebook');
		$instagram		=	$this->input->post('instagram');
		$foto			=	$foto['file_name'];

		$data_diri = array(
			'id_diri'			=>	$id_diri,
			'nama'				=>	$nama,
			'angkatan_jurusan'	=>	$angkatan_jurusan,
			'ttl'				=>	$ttl,
			'jk'				=>	$jk,
			'domisili'			=>	$domisili,
			'telp'				=>	$telp,
			'email'				=>	$email,
			'smp_asal'			=>	$smp_asal,
			'facebook'			=>	$facebook,
			'instagram'			=>	$instagram,
			'foto'				=>	$foto
		);

		$data_lulus = array(
			'id_diri'			=>	$id_lulus,
			'nama'				=>	$nama,
			'tempat_bekerja'	=>	$perusahaan,
			'posisi_kerja'		=>	$posisi,
			'alamat_kerja'		=>	$almtperusahaan,
			'universitas'		=>	$universitas
		);

        $data_temp = array(
            'id'			=>	null,
            'nama'				=>	$nama,
            'angkatan_jurusan'	=>	$angkatan_jurusan,
            'ttl'				=>	$ttl,
            'jk'				=>	$jk,
            'domisili'			=>	$domisili,
            'telp'				=>	$telp,
            'email'				=>	$email,
            'smp_asal'			=>	$smp_asal,
            'facebook'			=>	$facebook,
            'instagram'			=>	$instagram,
            'foto'				=>	$foto,
            'tempat_bekerja'	=>	$perusahaan,
            'posisi_kerja'		=>	$posisi,
            'alamat_kerja'		=>	$almtperusahaan,
            'universitas'		=>	$universitas
        );
        if($this->session->userdata('loggedIn') == TRUE) {
            $this->db->insert('data_diri_alumni', $data_diri);
            $this->db->insert('data_lulus_alumni', $data_lulus);
            return true;
        } else {
            $this->db->insert('temp', $data_temp);
            return true;
        }
	}

    function temp_insert($id) {
        $result = $this->db->select('*')->where('id',$id)->get('temp')->row();

        $data_diri = array(
            'id_diri'			=>	null,
            'nama'				=>	$result->nama,
            'angkatan_jurusan'	=>	$result->angkatan_jurusan,
            'ttl'				=>	$result->ttl,
            'jk'				=>	$result->jk,
            'domisili'			=>	$result->domisili,
            'telp'				=>	$result->telp,
            'email'				=>	$result->email,
            'smp_asal'			=>	$result->smp_asal,
            'facebook'			=>	$result->facebook,
            'instagram'			=>	$result->instagram,
            'foto'				=>	$result->foto
        );

        $data_lulus = array(
            'id_diri'			=>	null,
            'nama'				=>	$result->nama,
            'tempat_bekerja'	=>	$result->tempat_bekerja,
            'posisi_kerja'		=>	$result->posisi_kerja,
            'alamat_kerja'		=>	$result->alamat_kerja,
            'universitas'		=>	$result->universitas
        );

        $this->db->insert('data_diri_alumni', $data_diri);
        $this->db->insert('data_lulus_alumni', $data_lulus);
        if($this->db->affected_rows() > 0) {
            $this->db->where('temp.id', $id);
            $this->db->where('temp.nama', $result->nama);
            $this->db->delete('temp');
            return true;
        } else {
            return false;
        }
    }
		
	function get_data() {
		$this->db->select('*')->from('data_diri_alumni');
		$this->db->join('data_lulus_alumni', 'data_lulus_alumni.id_diri = data_diri_alumni.id_diri');
		$query = $this->db->get();
		return $query->result();
	}

    function get_data_temp() {
        $this->db->select('*')->from('temp');
        $query = $this->db->get();
        return $query->result();
    }
	
	function manual_id_diri() {
		$this->db->select('*')->from('data_diri_alumni');
		$this->db->order_by('id_diri', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	
	function manual_id_lulus() {
		$this->db->select('*')->from('data_lulus_alumni');
		$this->db->order_by('id_lulus', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	
	function data($number,$offset) {
		return $query = $this->db->get('data_diri_alumni',$number,$offset)->result();		
	}
 
	function jumlah_data() {
		return $this->db->get('data_diri_alumni')->num_rows();
	}
}
