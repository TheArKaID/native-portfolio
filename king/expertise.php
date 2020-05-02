<?php

$status = isset($_GET['status']) ? $_GET['status'] : false;
$position = isset($_GET['my']) ? $_GET['my'] : "false";
if ($position == "false")
    header("location: main");

$expertisequery = mysqli_query($connect, "SELECT * FROM expertise");
switch ($status) {
    case 'added':
        $status = "DITAMBAHKAN";
        break;

    case 'edited':
        $status = "DIUBAH";
        break;

    case 'deleted':
        $status = "DIHAPUS";
        break;

    default:
        $status = false;
        break;
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
    </head>

    <body>
        <div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
            <?php if ($status) echo "<div class='row myred' style='padding: 20px; color: #fff; background-color: #c22131; border: 1px solid #dee2e6; font-size:'>BERHASIL $status</div>"; ?>
            <div class="row myred" style="padding: 20px;">
                <table class="table" style="color: white">
                    <thead class="thead-red">
                        <tr>
                            <th>
                                Tipe
                            </th>
                            <th>
                                Deskripsi
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <?php

                    while ($expertisedata = mysqli_fetch_array($expertisequery)) {

                        echo "<tr>
                    <td>"
                            . $expertisedata['nama'] .
                            "</td>
                    <td>"
                            . $expertisedata['keterangan'] .
                            "</td>
                    <td>
                        <a href='main?my=expertise&then=edit&id=$expertisedata[id]'><i class='fas fa-edit'></i></a>
                        <a href='main?my=expertise&then=delete&id=$expertisedata[id]'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>";
                    }

                    ?>
                </table>

                <a href="main?my=expertise&then=add" class="btn btn-danger">ADD</a>
            </div>
        </div>
    </body>

    </html>