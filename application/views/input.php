<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<div class="main-view-data">
		<h2 align="middle">Data Alumni</h2>
	<div class="panel panel-info">
    <div class="panel-body">
	<div class="panel-feature">
		<div class="feature-lable">
			<div><label>Nama :</label>		</div>
			<div><label>Jurusan :</label>	</div>
			<div><label>Angkatan :</label>	</div>
		</div>
		
		<div class="feature">
			<div>
				<input type="text" onkeyup="search()" class="searchBox" id="search" value="" />
			</div>
			<div>
				<select id="filterJurusan" onchange="search()">
					<option value="" selected></option>
					<?php foreach($angkatan_jurusan as $drop) : ?>
						<option value="<?php echo substr($drop->angkatan_jurusan, -3); ?>" ><?php echo substr($drop->angkatan_jurusan, -3); ?></option>
					<?php endforeach; ?>
				</select>
				<script>
					var seen = {};
					$("select[id='filterJurusan'] > option").each(function() {
						var txt = $(this).text();
						if (seen[txt])
							$(this).remove();
						else
							seen[txt] = true;
					});
				</script>
			</div>
			<div>
				<select id="filterAngkatan" onchange="search()">
					<option value="" selected></option>
					<?php foreach($angkatan_jurusan as $drop) : ?>
						<option value="<?php echo substr($drop->angkatan_jurusan, 0, 2); ?>" ><?php echo substr($drop->angkatan_jurusan, 0, 2); ?></option>
					<?php endforeach; ?>
				</select>
				<script>
					var seen = {};
					$("select[id='filterAngkatan'] > option").each(function() {
						var txt = $(this).text();
						if (seen[txt])
							$(this).remove();
						else
							seen[txt] = true;
					});
				</script>
			</div>
		</div>
	</div>
	</div>
	<div class="detail-bottom-panel">
		<div class="clear"> </div>
		<div class="table-responsive " id="result" >
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
		</head>
		<body></tbody>
		</table>	
		</div>
	</div>
	</div>
</div>
<script>

$(document).ready(function(){ $("#DataTable").DataTable( { "bFilter": false });});

function search() {
	$nama =  $("#search").val();
	$jrs = $("#filterJurusan :selected").text();
	$ank = $("#filterAngkatan :selected").text();
	$ank_jrs = $ank+"_"+$jrs;

	if($nama!="" || $jrs!="" || $ank!=""){
		if($nama==""){
			$.get( "<?php echo base_url();?>index.php/home/search/"+$ank_jrs, function( data ){
				$( "#result" ).html( data );
			});
		}else if($jrs=="" && $ank==""){
			$.get( "<?php echo base_url();?>index.php/home/search/"+$nama, function( data ){
				$( "#result" ).html( data );
			});
		}else{
			$.get( "<?php echo base_url();?>index.php/home/search/"+$nama+"/"+$ank_jrs, function( data ){
				$( "#result" ).html( data );
			});
		}
	}else{
		$("#search").val("");
		$("#filterJurusan option[value='']").prop('selected', true);
		$("#filterAngkatan option[value='']").prop('selected', true);
		$.get( "<?php echo base_url();?>index.php/home/search/"+null, function( data ){
			$( "#result" ).html( data );
		});
	}
}
</script>