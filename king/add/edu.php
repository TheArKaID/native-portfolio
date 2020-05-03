<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

?>
<div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
    <div class="row myred" style="padding: 20px;">
        <form style="width: 100%" action="?my=education&then=add&so=yes" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Tingkat Pendidikan</label>
                        <input class="form-control" type="text" name="tipe" id="tipe" required>
                    </div>
                    <div class="col-md-4">
                        <label>Tahun</label>
                        <input class="form-control" type="number" name="deskripsi" id="deskripsi" required>
                    </div>
                    <div class="col-md-4">
                        <label>Jurusan</label>
                        <input class="form-control" type="text" name="deskripsi" id="deskripsi" required>
                    </div>
                </div>
            </div>                        
            <input class="btn btn-danger" type="submit" value="SAVE">
        </form>
    </div>
</div>