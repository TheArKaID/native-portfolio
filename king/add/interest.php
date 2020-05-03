<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

?>
<div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
    <div class="row myred" style="padding: 20px;">
        <form style="width: 100%" action="?my=interest&then=add&so=yes" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input class="form-control" type="text" name="nama" id="nama" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-danger" type="submit" value="SAVE">
            </div>
        </form>
    </div>
</div>