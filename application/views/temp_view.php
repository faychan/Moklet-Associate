<div class="main-view-data">
    <div class="panel panel-info">
        <div class="panel-body">
            <div class="panel-feature">
                <h3>Custom Search</h3>
                <div class="feature-lable">
                    <div><label>Nama :</label>		</div>
                    <div><label>Jurusan :</label>	</div>
                    <div><label>Angkatan :</label>	</div>
                </div>

                <div class="feature">
                    <div>
                        <input type="text" class="searchBox" id="searchBox" name="searchBox" placeholder=" ..." onKeyup="searchFunction()" />
                    </div>

                    <div>
                        <select onchange="filterJurusan()" id="filterJurusan">
                            <option value="" selected>...</option>
                            <?php $jurusan = "";
                            foreach($angkatan_jurusan as $drop) :
                                $jurusan .= substr($drop->angkatan_jurusan, -3, 4)." ";
                            endforeach;
                            $jurusan = explode(" ", $jurusan);
                            $jurusan = array_values(array_unique($jurusan));
                            for ($i = 0; $i<count($jurusan)-1; $i++){
                                ?><option value"<?php echo $jurusan[$i];?>"><?php echo $jurusan[$i]; ?></option>
                            <?php } ?>
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
                        <select onchange="filterAngkatan()" id="filterAngkatan">
                            <option value="" selected>...</option>
                            <?php $angkatan = "";
                            foreach($angkatan_jurusan as $drop) :
                                $angkatan .= substr($drop->angkatan_jurusan, 0, 2)." ";
                            endforeach;
                            $angkatan = explode(" ", $angkatan);
                            $angkatan = array_values(array_unique($angkatan));
                            for ($i = 0; $i<count($angkatan)-1; $i++){
                                ?><option value"<?php echo $angkatan[$i];?>"><?php echo $angkatan[$i]; ?></option>
                            <?php } ?>
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
                    <div><button class="btn btn-danger btn-sm" onClick="resetOption()" >reset</button></div>
                </div>
            </div>
            <br>
            <div class="clear"> </div>
            <div class="table-responsive " >

                <table border="0" cellpadding="4" cellspacing="0" class="table table-bordered table-hover" id="data_table" >
                    <tr>
                        <th style=" background-color: #f1f1f1;" class="col-sm-1 text-center" >Nama</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-2 text-center " >Angkatan/<br>Jurusan</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-3 text-left ">No. Telepon</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-4 text-left " >Email Aktif</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-5 text-center " >Jenis Kel.</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-6 text-center " >Domisili Saat Ini</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-7 text-center " >Perusahaan</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-8 text-center " >Alamat</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-9 text-center " >Posisi</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-10 text-center " >Universitas</th>
                        <th style=" background-color: #f1f1f1;" class="col-sm-11 text-center " >Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($alumni as $data): ?>
                        <tr style="cursor:pointer;" group="hidden">

                            <td class="text-left ">	 <?php echo $data->nama		?></td>
                            <td class="text-center "><?php echo str_replace(" ", "<br>", $data->angkatan_jurusan);?></td>
                            <td class="text-left ">	 <?php echo $data->telp		?></td>
                            <td class="text-left ">	 <?php echo $data->email	?></td>
                            <td class="text-center "><?php echo $data->jk		?></td>
                            <td class="text-center "><?php echo $data->domisili	?></td>
                            <td class="text-center "><?php echo $data->tempat_bekerja	?></td>
                            <td class="text-center "><?php echo $data->alamat_kerja	?></td>
                            <td class="text-center "><?php echo $data->posisi_kerja	?></td>
                            <td class="text-center "><?php echo $data->universitas	?></td>
                            <td class="text-center ">
                                <a onClick="delete_alert()" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i></a>
                            </td>
                        </tr>
                        <?php ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function searchFunction() {
        var jurusan, filterjurusan, nama, searchnama, angkatan, filterangkatan, table, tr, td, i;
        jurusan = document.getElementById("filterJurusan");
        filterjurusan = jurusan.value.toUpperCase();
        angkatan = document.getElementById("filterAngkatan");
        filterangkatan = angkatan.value.toUpperCase();
        nama = document.getElementById("searchBox");
        searchnama = nama.value.toUpperCase();
        table = document.getElementById("data_table");
        tr = table.getElementsByTagName("tr");

        if ( jurusan.value != "" ||  angkatan.value !="") {
            for (i = 0; i < tr.length; i++) {
                nm = tr[i].getElementsByTagName("td")[0];
                td = tr[i].getElementsByTagName("td")[1];
                if (nm) {
                    if (nm.innerHTML.toUpperCase().indexOf(searchnama) > -1) {
                        if (td.innerHTML.toUpperCase().indexOf(filterjurusan) > -1) {
                            if (td.innerHTML.toUpperCase().indexOf(filterangkatan) > -1) {
                                tr[i].style.display = "";
                            }else{
                                tr[i].style.display = "none";
                            }
                        }else{
                            tr[i].style.display = "none";
                        }
                    }else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }else{
            for (i = 0; i < tr.length; i++) {
                nm = tr[i].getElementsByTagName("td")[0];
                if (nm) {
                    if (nm.innerHTML.toUpperCase().indexOf(searchnama) > -1) {
                        tr[i].style.display = "";
                    }else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

    function filterJurusan() {
        var jurusan, filterjurusan, nama, searchnama, angkatan, filterangkatan, table, tr, td, i;
        jurusan = document.getElementById("filterJurusan");
        filterjurusan = jurusan.value.toUpperCase();
        angkatan = document.getElementById("filterAngkatan");
        filterangkatan = angkatan.value.toUpperCase();
        nama = document.getElementById("searchBox");
        searchnama = nama.value.toUpperCase();
        table = document.getElementById("data_table");
        tr = table.getElementsByTagName("tr");

        if ( nama.value != "" ||  angkatan.value !="") {
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                nm = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filterjurusan) > -1) {
                        if (nm.innerHTML.toUpperCase().indexOf(searchnama) > -1) {
                            if(td.innerHTML.toUpperCase().indexOf(filterangkatan) > -1) {
                                tr[i].style.display = "";
                            }else{
                                tr[i].style.display = "none";
                            }
                        }else{
                            tr[i].style.display = "none";
                        }
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }else{
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filterjurusan) > -1) {
                        tr[i].style.display = "";
                    }else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

    function filterAngkatan() {
        var jurusan, filterjurusan, nama, searchnama, angkatan, filterangkatan, table, tr, td, i;
        jurusan = document.getElementById("filterJurusan");
        filterjurusan = jurusan.value.toUpperCase();
        angkatan = document.getElementById("filterAngkatan");
        filterangkatan = angkatan.value.toUpperCase();
        nama = document.getElementById("searchBox");
        searchnama = nama.value.toUpperCase();
        table = document.getElementById("data_table");
        tr = table.getElementsByTagName("tr");

        if ( nama.value != "" ||  jurusan.value !="") {
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                nm = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filterangkatan) > -1) {
                        if (td.innerHTML.toUpperCase().indexOf(filterjurusan) > -1) {
                            if(nm.innerHTML.toUpperCase().indexOf(searchnama) > -1) {
                                tr[i].style.display = "";
                            }else{
                                tr[i].style.display = "none";
                            }
                        }else{
                            tr[i].style.display = "none";
                        }
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }else{
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filterangkatan) > -1) {
                        tr[i].style.display = "";
                    }else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

    function resetOption() {
        $("table tr[group='hidden']").hide();

        $('#searchBox').val("");

        $('#filterJurusan').val("");

        $('#filterAngkatan').val("");
    }

    function delete_alert() {
        swal({
                title: "Data Anonymous",
                text: "Setuju untuk ditambahkan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#057bdd",
                confirmButtonText: "Add Data",
                closeOnConfirm: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location = "<?php  echo base_url(); ?>index.php/admin/add_temp/<?php echo $data->id.'/'.
                        $data->nama .'/'. $data->foto; ?>";
                    return true;
                }else{
                    return false;
                }
            });
    }
</script>
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/29/18
 * Time: 2:16 PM
 */