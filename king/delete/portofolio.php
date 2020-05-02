<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

$id = isset($_GET["id"]) ? $connect->real_escape_string($_GET["id"]) : "false";

if ($id == "false")
    header("location: main");

$portofolioquery = mysqli_query($connect, "SELECT * FROM portfolio WHERE id = $id");
$portofoliodata = mysqli_fetch_assoc($portofolioquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
        <div class="row myred" style="padding: 20px;">
            <form style="width: 100%" action="?my=portofolio&then=delete&so=yes" method="post">
                <table class="table" style="color: white;">
                    <thead class="thead-red">
                        <tr>
                            <th>Judul</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tr>
                        <input class="form-control" type="hidden" name="id" id="id" value="<?= $id; ?>" required>
                        <td><?= $portofoliodata['judul']; ?></td>
                        <td><?= $portofoliodata['url']; ?></td>
                    </tr>

                </table>
                <input class="btn btn-danger" type="submit" value="DELETE">
            </form>
        </div>
    </div>
</body>

</html>