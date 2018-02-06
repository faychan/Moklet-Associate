<div class="main " name="main" id="">
  	<div class="panel panel-info" >
		<div class="panel-body" >
		
		<div>
			<?php if($this->session->userdata('logged_admin') == true) {
				echo '<a onClick="return delete_alert()" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>';
			} ;?>
		</div>
		
		<div class="detail-left-panel" >
		<h2> Data Diri </h2>
			<div class="detail-group" ><label for="nama" >Nama</label>
			<div class="detail" id="nama" ><?php echo $detail->nama; ?></div></div>
			
			<div class="detail-group" ><label for="ttl" >Tempat Tanggal Lahir</label>
			<div class="detail" id="ttl" ><?php echo $detail->ttl; ?></div></div>
			
			<div class="detail-group" ><label for="ttl" >Jenis Kelamin</label>
			<div class="detail" id="ttl" ><?php echo $detail->jk; ?></div></div>
			
			<div class="detail-group" ><label for="ttl" >Nomor Telepon</label>
			<div class="detail" id="ttl" ><?php echo $detail->telp; ?></div></div>
			
			<div class="detail-group" ><label for="ttl" >Email Aktif</label>
			<div class="detail" id="ttl" ><?php echo $detail->email; ?></div></div>
			
			<div class="detail-group" ><label for="ttl" >SMP Asal</label>
			<div class="detail" id="ttl" ><?php echo $detail->smp_asal; ?></div></div>
			
			<div class="detail-group" ><label for="ttl" >Angkatan</label>
			<div class="detail" id="ttl" ><?php echo substr($detail->angkatan_jurusan, 0, 2); ?></div></div>
			
			<div class="detail-group" ><label for="ttl" >Jurusan Di SMK</label>
			<div class="detail" id="ttl" ><?php echo substr($detail->angkatan_jurusan, -3); ?></div></div>
			
			<div class="detail-group" ><label for="ttl" >Facebook</label>
			<div class="detail" id="ttl" ><?php echo $detail->facebook; ?></div></div>
			
			<div class="detail-group" ><label for="ttl" >Instagram</label>
			<div class="detail" id="ttl" ><?php echo $detail->instagram; ?></div></div>

			<div class="detail-group" ><label for="ttl" >Tempat Tinggal Saat Ini</label>
			<div class="detail" id="ttl" ><?php echo $detail->domisili; ?></div></div>
		</div>
		
		<div class="detail-right-panel" >
		<h2>Foto</h2>
			<div class="detail-group" >
			<div class="detail-foto">
				<img width="100%" src="<?php echo base_url(); ?>uploads/<?php echo $detail->foto; ?>"/>
			</div></div>
		</div>
		
		<div class="detail-bottom-panel" >
		<h2> Kegiatan Setelah Lulus Dari SMK Telkom Malang </h2>
		<div class="detail-group" ><label for="work" >Tempat Bekerja</label>
		<div class="detail" id="work" ><?php echo $detail->tempat_bekerja; ?></div></div>
		
		<div class="detail-group" ><label for="company" >Posisi Kerja</label>
		<div class="detail" id="company" ><?php echo $detail->posisi_kerja; ?></div></div>
		
		<div class="detail-group" ><label for="company_address" >Alamat Perusahaan</label>
		<div class="detail" id="company_address" ><?php echo $detail->alamat_kerja; ?></div></div>
		
		<div class="detail-group" ><label for="nama_uni" >Universitas</label>
		<div class="detail" id="nama_uni" ><?php echo $detail->universitas; ?></div></div>
		</div>
		
		</div>
	</div>
</div>

<script>
	function delete_alert() {
		swal({
			title: "Data Akan Dihapus",
			text: "Data Yang Sudah Dihapus Tidak Bisa Dikembalikan",
			type: "warning",  
			showCancelButton: true,  
			confirmButtonColor: "#DD6B55", 
			confirmButtonText: "Delete",
			closeOnConfirm: false
		},
		function(isConfirm){   
			if (isConfirm) {     
				window.location = "<?php  echo base_url(); ?>index.php/home/delete_data/<?php echo $detail->id_diri .'/'.
																$detail->nama .'/'. $detail->foto; ?>";
				return true;
			}else{     
				return false;
			} 
		});
	}

</script>