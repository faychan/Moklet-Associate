<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

            <!-- /.panel-heading -->
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>JK</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Domisili</th>
                        <th>Ang./Jur.</th>
                        <th>Posisi Kerja</th>
                        <th>Tempat Kerja</th>
                        <th>Alamat Kerja</th>
                        <th>Universitas</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = $this->uri->segment('3') + 1; ?>
                    <?php foreach($alumni as $data): ?>
                        <tr style="cursor:pointer;" group="hidden" onClick="window.location='<?php echo base_url(); ?>index.php/home/detail_data/<?php echo $data->id_diri .'/'. $this->encryption->encrypt($data->nama); ?>';">
                            <td class="text-left ">	 <?php echo $data->nama		?></td>
                            <td class="text-left ">	 <?php echo $data->ttl		?></td>
                            <td class="text-center "><?php if ($data->jk == "Perempuan"){ echo "P";} else { echo "L";} 		?></td>
                            <td class="text-left ">	 <?php echo $data->telp		?></td>
                            <td class="text-left ">	 <?php echo $data->email	?></td>
                            <td class="text-center "><?php echo $data->domisili	?></td>
                            <td class="text-center "><?php echo str_replace(" ", "<br>", $data->angkatan_jurusan);?></td>
                            <td class="text-left ">	 <?php echo $data->posisi_kerja	?></td>
                            <td class="text-left ">	 <?php echo $data->tempat_bekerja	?></td>
                            <td class="text-left ">	 <?php echo $data->alamat_kerja	?></td>
                            <td class="text-left ">	 <?php echo $data->universitas	?></td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <div class="well">
                    <h4>DataTables Usage Information</h4>
                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/22/18
 * Time: 1:27 PM
 */