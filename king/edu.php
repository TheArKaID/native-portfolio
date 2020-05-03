<?php

$position = isset($_GET['my']) ? $_GET['my'] : "false";
if ($position == "false")
    header("location: main");

$eduquery = mysqli_query($connect, "SELECT *  FROM education");

?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
        <div class="row myred" style="padding: 20px;">
            <table class="table" style="color: white">
                <thead class="thead-red">
                    <tr>
                        <th>Tingkat Pendidikan</th>
                        <th>Jurusan</th>
                        <th>Tahun</th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <?php

                while ($edudata = mysqli_fetch_array($eduquery)) {
                    echo "<tr>
                    <td>
                        $edudata[tingkat]
                    </td>
                    <td>
                        $edudata[jurusan]
                    </td>
                    <td>
                        $edudata[tahun]
                    </td>
                    <td>
                        <a href='main?my=edu&then=edit&id=$edudata[id]'><i class='fas fa-edit'></i></a>
                        <a href='main?my=edu&then=delete&id=$edudata[id]'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>";
                }
                ?>
            </table>

            <a href="main?my=edu&then=add" class="btn btn-danger">ADD</a>
        </div>
    </div>
</body>

</html>