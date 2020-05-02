<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

$id = isset($_GET["id"]) ? $connect->real_escape_string($_GET["id"]) : "false";

if ($id == "false")
    header("location: main");

$experiencequery = mysqli_query($connect, "SELECT * FROM experience WHERE id = $id");
$experiencedata = mysqli_fetch_assoc($experiencequery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
        <div class="row myred" style="padding: 20px;">
            <form style="width: 100%" action="?my=work&then=delete&so=yes" method="post">
                <table class="table" style="color: white;">
                    <thead class="thead-red">
                        <tr>
                            <th>
                                Job
                            </th>
                            <th>
                                Perusahaan
                            </th>
                            <th>
                                Daerah
                            </th>
                            <th>
                                Tahun
                            </th>
                            <th>
                                Keterangan
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id; ?>" required>
                        <td>
                            <?php echo $experiencedata['posisi']; ?>
                        </td>
                        <td>
                            <?php echo $experiencedata['perusahaan']; ?>
                        </td>
                        <td>
                            <?php echo $experiencedata['alamat']; ?>
                        </td>
                        <td>
                            <?php echo $experiencedata['tahun']; ?>
                        </td>
                        <td>
                            <?php echo $experiencedata['keterangan']; ?>
                        </td>
                    </tr>

                </table>
                <input class="btn btn-danger" type="submit" value="DELETE">
            </form>
        </div>
    </div>
</body>

</html>