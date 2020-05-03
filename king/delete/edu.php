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
<div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
    <div class="row myred" style="padding: 20px;">
        <form style="width: 100%" action="?my=edu&then=delete&so=yes" method="post">
            <table class="table" style="color: white;">
                <thead class="thead-red">
                    <tr>
                        <th>Tingkat</th>
                        <th>Jurusan</th>
                        <th>Tahun</th>
                    </tr>
                </thead>
                <tr>
                    <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id; ?>" required>
                    <td>
                        <?php echo $edudata['tingkat']; ?>
                    </td>
                    <td>
                        <?php echo $edudata['jurusan']; ?>
                    </td>
                    <td>
                        <?php echo $edudata['tahun']; ?>
                    </td>
                </tr>

            </table>
            <input class="btn btn-danger" type="submit" value="DELETE">
        </form>
    </div>
</div>