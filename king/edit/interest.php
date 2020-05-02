<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

$id = isset($_GET["id"]) ? $connect->real_escape_string($_GET["id"]) : "false";

if ($id == "false")
    header("location: main");

$interestquery = mysqli_query($connect, "SELECT * FROM interest WHERE id = $id");
$interestdata = mysqli_fetch_assoc($interestquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
        <div class="row myred" style="padding: 20px;">
            <form style="width: 100%" action="?my=interest&then=edit&so=yes" method="post">
                <table class="table" style="color: white;">
                    <thead class="thead-red">
                        <tr>
                            <th>
                                Tipe
                            </th>
                            <th>
                                Deskripsi
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id; ?>" required>
                        <td>
                            <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $interestdata['nama']; ?>" required>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="keterangan" id="keterangan" value="<?php echo $interestdata['keterangan']; ?>" required>
                        </td>
                    </tr>

                </table>
                <input class="btn btn-danger" type="submit" value="SAVE">
            </form>
        </div>
    </div>
</body>

</html>