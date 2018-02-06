<div class="main" style="width: 55%;">
<h2>Upload Data</h2>
	<form method="post" id="form-upload-data-alumni" name="form_upload" enctype="multipart/form-data"
		action="<?php echo base_url();?>index.php/home/form_input" >
		<div class="lable">

			<input type="hidden"
				value="<?php
							$diri = $id_diri->id_diri;
							$lulus = $id_lulus->id_lulus;
							if ( $diri > $lulus ) {
								echo $diri + 1;
							}else if ( $lulus > $diri ) {
								echo $lulus + 1;
							}else{
								echo $lulus + 1;
							}
					   ?>" id="id" name="id" />
			
			<div class="input-group " >
			<input type="text" value="" id="nama" name="nama" placeholder="Masukkan Nama Lengkap *" autofocus /></div>
			
			<div class="input-group " >
				<select class="dropdown dropdown-list " name="angkatan_jurusan[]" id="angkatan" >
					<option value="" disabled selected> Angkatan * </option>
					<?php
						$angkyear = date("Y");
						for($angkatan = 15 ; $angkatan <= $angkyear-1994 ; $angkatan++) {
							echo "<option value=".$angkatan.">".$angkatan."</option>";
						}
					?>
				</select>
			</div>

			<div class="input-group " >
				<select class="dropdown dropdown-list " name="angkatan_jurusan[]" id="jurusan" >
					<option value="" disabled selected> Jurusan </option>
					<option value="RPL" > RPL </option>
					<option value="TKJ" > TKJ </option>
				</select>
			</div>
			
			<div class="input-group " >
				<input style="margin-right: 3%; width: 30%; float: left;" type="text" value="" name="ttl[]" placeholder="Tempat Tanggal Lahir *" id="tempat_lahir" />
				
				<select style="margin-right: 2%; width: 12%; float: left;" class="dropdown dropdown-list " name="ttl[]" id="tgl_lahir" >
					<option value="" disabled selected>Tgl*</option>
					<?php	for($day=1; $day<=31; $day++){
								echo "<option value=".$day.">".$day." </option>";
							}
					?>
				</select>
				
				<select style="margin-right: 2%; width: 25%; float: left;" class="dropdown dropdown-list " name="ttl[]" id="bulan_lahir" >
					<option value="" disabled selected>Bulan *</option>
					<?php	$months = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
							foreach ($months as $month) {
								echo "<option value=".$month.">".$month."</option>";
							}
					?>
				</select>
				
				<select style="margin-right: 2%; width: 20%; float: left;" class="dropdown dropdown-list " name="ttl[]" id="tahun_lahir" >
					<option value="" disabled selected>Tahun *</option>
					<?php	$years = date("Y");
							for($year=1975; $year<=$years-14; $year++) {
								echo "<option value=".$year.">".$year."</option>";
							}
					?>
				</select>
			</div>
			
			<div class="input-group " >
				<select class="dropdown dropdown-list " name="jk" >
					<option value="" disabled selected> Jenis Kelamin * </option>
					<option value="Laki-laki " > Laki-laki </option>
					<option value="Perempuan " > Perempuan </option>
				</select>
			</div>

			<div class="input-group " >
			<input type="text"  value="" name="domisili" placeholder="Kota Tempat Tinggal Saat Ini *"  /></div>
			
			<div class="input-group " >
			<input type="text"  value="" name="telp" placeholder="Nomor Telepon *" maxlength="12" 
			oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
			/>
			</div>
			
			<div class="input-group " >
			<input type="text"  value="" name="email" placeholder="Email Aktif *"  /></div>
			
			<div class="input-group " >
			<input type="text" value="" name="smp_asal" placeholder="SMP Asal" /></div>
			
			<div class="input-group " >
			<input type="text" value="" name="perusahaan" placeholder="Tempat Bekerja" /></div>
			
			<div class="input-group " >
			<input type="text" value="" name="posisi" placeholder="Posisi Pekerjaan" /></div>
			
			<div class="input-group " >
			<input type="text" value="" name="almtperusahaan" placeholder="Alamat Tempat Bekerja" /></div>
			
			<div class="input-group " >
			<input type="text" value="" name="universitas" placeholder="Universitas" /></div>
			
			<div class="input-group " >
			<input type="text" value="" name="facebook" placeholder="Akun Facebook" /></div>
			
			<div class="input-group " >
			<input type="text" value="" name="instagram" placeholder="Akun Instagram" /></div>
			
			<div class="input-group" >
			<input type="file" class="inputfile inputfile-2" value="" name="foto" id="foto"/>
			<label for="foto" >Upload Foto</label>
			<img src="" id="foto-preview" class="input-preview" />
				<script type="text/javascript">
					function readURL(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
								$('#foto-preview').attr('src', e.target.result);
							}
							reader.readAsDataURL(input.files[0]);
						}
					}
					$("#foto").change(function(){
						readURL(this);
					});
				</script>
			</div>
			<br>
			
	  </div>
	  
	   <div class="submit">
		  <input type="button" onclick="validateForm()" value="Upload Data" >
	   </div>
		<div class="clear" >ket * : Wajib Diisi</div>
	</form>
<div id="validate"></div>
</div>
<script>
	function validateForm() {
    var nama = document.forms['form_upload']['nama'].value;
    var angkatan = document.getElementById('angkatan');
	var jurusan = document.getElementById('jurusan');
	var tempat_lahir = document.getElementById('tempat_lahir');
	var tgl_lahir = document.getElementById('tgl_lahir');
	var bulan_lahir = document.getElementById('bulan_lahir');
	var tahun_lahir = document.getElementById('tahun_lahir');
	var jk = document.forms['form_upload']['jk'].value;
	var domisili = document.forms['form_upload']['domisili'].value;
	var telp = document.forms['form_upload']['telp'].value;
	var email = document.forms['form_upload']['email'].value;
	var foto = document.getElementById('foto');
		if ( nama == '' ) {
			swal('Nama Harus Lengkap!');
			return false;
		}else if ( angkatan.value == '' ) {
			swal('Angkatan Harus Dipilih!');
			return false;
		}else if ( tempat_lahir.value == ''	|| 
			tgl_lahir.value		== ''	|| 
			bulan_lahir.value	== ''|| 
			tahun_lahir.value	== '') {
			swal('Tempat Tanggal Lahir Harus Dilengkapi!');
			return false;
		}else if ( jk == '' ) {
			swal('Jenis Kelamin Harus Dipilih!');
			return false;
		}else if ( domisili == '' ) {
			swal('Kota Tempat Tinggal Harus Diisi!');
			return false;
		}else if ( telp == '' ) {
			swal('Nomor Telepon Harus Diisi!');
			return false;
		}else if ( email == '' ) {
			swal('Email Tidak Boleh Kosong!');
			return false;
		}else{
			swal({
				title: "Anda Yakin?",
				text: "Data Anda Tidak Bisa Diubah Setelah Diupload!",
				type: "warning",  
				showCancelButton: true,  
				confirmButtonColor: "#DD6B55", 
				confirmButtonText: "Upload",
				closeOnConfirm: false
			},
			function(isConfirm){   
				if (isConfirm) {     
					$("#form-upload-data-alumni").submit();
				}else{     
					return false;
				} 
			});
		}
	}
</script>