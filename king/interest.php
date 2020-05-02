<?php

$position = isset($_GET['my']) ? $_GET['my'] : "false";
if ($position == "false")
    header("location: main");

    $interestquery = mysqli_query($connect, "SELECT * FROM interest");
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

                while ($interestdata = mysqli_fetch_array($interestquery)) {
                    echo "<tr>
                    <td>
                        $interestdata[nama]
                    </td>
                    <td>
                        $interestdata[keterangan]
                    </td>
                    <td>
                        <a href='main?my=interest&then=edit&id=$interestdata[id]'><i class='fas fa-edit'></i></a>
                        <a href='main?my=interest&then=delete&id=$interestdata[id]'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>";
                }

                ?>
            </table>
        
            <a href="main?my=interest&then=add" class="btn btn-danger">ADD</a>
        </div>
    </div>
</body>

</html>