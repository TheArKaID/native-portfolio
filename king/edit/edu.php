<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

$id = isset($_GET["id"]) ? $connect->real_escape_string($_GET["id"]) : "false";

if ($id == "false")
    header("location: main");

$eduquery = mysqli_query($connect, "SELECT * FROM education WHERE id = $id");
$edudata = mysqli_fetch_assoc($eduquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
        <div class="row myred" style="padding: 20px;">
            <form style="width: 100%" action="?my=edu&then=edit&so=yes" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Tingkat Pendidikan</label>
                            <input class="form-control" type="text" name="pendidikan" id="pendidikan" value="<?php echo $edudata['tingkat']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label>Jurusan</label>
                            <input class="form-control" type="text" name="jurusan" id="jurusan" value="<?php echo $edudata['jurusan']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label>Tahun</label>
                            <input class="form-control" type="number" name="tahun" id="tahun" value="<?php echo $edudata['tahun']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Keterangan</label>
                            <input class="form-control" type="text" name="keterangan" id="keterangan" value="<?php echo $edudata['keterangan']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>Alamat</label>
                            <input class="form-control" type="text" name="alamat" id="alamat" value="<?php echo $edudata['alamat']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-12">
                        <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id; ?>" required>
                            <input class="btn btn-danger" type="submit" value="SAVE">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>