<?php

$position = isset($_GET['my']) ? $_GET['my'] : "false";
if ($position == "false")
    header("location: main");

$workquery = mysqli_query($connect, "SELECT * FROM experience");
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
                        <th>

                        </th>
                    </tr>
                </thead>
                <?php

                while ($workdata = mysqli_fetch_array($workquery)) {
                    echo "<tr>
                        <td>
                            $workdata[posisi]
                        </td>
                        <td>
                            $workdata[perusahaan]
                        </td>
                        <td>
                            $workdata[alamat]
                        </td>
                        <td>
                            $workdata[tahun]
                        </td>
                        <td>
                            $workdata[keterangan]
                        </td>
                        <td>
                            <a href='main?my=work&then=edit&id=$workdata[id]'><i class='fas fa-edit'></i></a>
                            <a href='main?my=work&then=delete&id=$workdata[id]'><i class='fas fa-trash'></i></a>
                        </td>
                    </tr>";
                }

                ?>
            </table>

            <a href="main?my=work&then=add" class="btn btn-danger">ADD</a>
        </div>
    </div>
</body>

</html>