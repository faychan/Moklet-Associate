<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<div class="main">
	<?php
		echo $this->pagination->create_links();
	?>

	<table border="0" cellpadding="4" cellspacing="0" class="table table-bordered table-hover" id="DataTable">
		<thead>
		<tr>
			<th style=" background-color: #f1f1f1;" class="col-sm-2 " >Nama</th>
			<th style=" background-color: #f1f1f1;" class="col-sm-1 text-left ">No. Telepon</th>
			<th style=" background-color: #f1f1f1;" class="col-sm-2 text-left " >Email Aktif</th>
			<th style=" background-color: #f1f1f1;" class="col-sm-1 text-center " >Jenis Kel.</th>
			<th style=" background-color: #f1f1f1;" class="col-sm-3 text-center " >Domisili Saat Ini</th>
			<th style=" background-color: #f1f1f1;" class="col-sm-1 text-center " >Angkatan/<br>Jurusan</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($alumni as $data): ?>
			<tr style="cursor:pointer;" onClick="window.location='<?php echo base_url(); ?>index.php/home/detail_data/<?php echo $data->id_diri .'/'. $this->encryption->encrypt($data->nama); ?>';">
				<td class="text-left ">	 <?php echo $data->nama		?></td>
				<td class="text-left ">	 <?php echo $data->telp		?></td>
				<td class="text-left ">	 <?php echo $data->email	?></td>
				<td class="text-center "><?php echo $data->jk		?></td>
				<td class="text-center "><?php echo $data->domisili	?></td>
				<td class="text-center "><?php echo str_replace(" ", "<br>", $data->angkatan_jurusan);?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#DataTable').DataTable( {
		"bFilter": false
	});
});
</script>