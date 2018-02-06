<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<?php
	if(!empty($result)){
		echo	'	<table border="0" cellpadding="4" cellspacing="0" class="table table-bordered table-hover" id="DataTable" >';
		echo	'	<thead>';
		echo	'	<tr>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-2 " >Nama</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-1 text-left ">No. Telepon</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-2 text-left " >Email Aktif</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-1 text-center " >Jenis Kel.</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-3 text-center " >Domisili Saat Ini</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-1 text-center " >Angkatan/<br>Jurusan</th>';
		echo	'	</tr>';
		echo	'	</thead>';
		echo	'	<tbody>';
		foreach($result as $data){
			echo '<tr style="cursor:pointer;" onClick="detail'.$data->id_diri.'()"  >';
				echo '<td class="text-left ">	'.	$data->nama		.'</td>';
				echo '<td class="text-left ">	'.  $data->telp		.'</td>';
				echo '<td class="text-left ">	'.  $data->email	.'</td>';
				echo '<td class="text-center "> '.  $data->jk		.'</td>';
				echo '<td class="text-center "> '.  $data->domisili	.'</td>';
				echo '<td class="text-center "> '.  str_replace(" ", "<br>", $data->angkatan_jurusan).'</td>';
			echo '</tr>';
			
			echo '<script>';
			echo 'function detail'.$data->id_diri.'() {';
			echo 'window.location.assign("'. base_url() .'index.php/home/detail_data/'.$data->id_diri.'/'.$this->encryption->encrypt($data->nama).'")';
			echo '}';
			echo '</script>';
		};
		echo	'	</tbody>';
		echo	'	</table>';
		echo	'	<script>';
		echo	'	$(document).ready(function(){ $("#DataTable").DataTable( { "bFilter": false });});';
		echo	'	</script>';
	}else{
		echo	'	<table border="0" cellpadding="4" cellspacing="0" class="table table-bordered table-hover" id="DataTable" >';
		echo	'	<thead>';
		echo	'	<tr>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-2 " >Nama</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-1 text-left ">No. Telepon</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-2 text-left " >Email Aktif</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-1 text-center " >Jenis Kel.</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-3 text-center " >Domisili Saat Ini</th>';
		echo	'	<th style=" background-color: #f1f1f1;" class="col-sm-1 text-center " >Angkatan/<br>Jurusan</th>';
		echo	'	</tr>';
		echo	'	</thead>';
		echo	'	</tbody>';
		echo	'	</table>';
		echo	'	<script>';
		echo	'	$(document).ready(function(){ $("#DataTable").DataTable( { "bFilter": false });});';
		echo	'	</script>';

	}
?>