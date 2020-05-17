<?php

$position = isset($_GET['my']) ? $_GET['my'] : "false";
if ($position == "false")
    header("location: main");

    $portofolioquery = mysqli_query($connect, "SELECT * FROM portfolio");
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
                        Project
                    </th>
                    <th>
                        GitHub
                    </th>
                    <th>
                        Web
                    </th>
                    <th style="width: 100px">
                        Aksi
                    </th>
                </tr>
                </thead>
                <?php

                while ($portofoliodata = mysqli_fetch_array($portofolioquery)) {
                    echo "<tr>
                    <td>
                        $portofoliodata[judul]
                    </td>
                    <td>
                        $portofoliodata[github]
                    </td>
                    <td>
                        $portofoliodata[web]
                    </td>
                    <td>
                        <a href='main?my=portofolio&then=edit&id=$portofoliodata[id]'><i class='fas fa-edit'></i></a>
                        <a href='main?my=portofolio&then=delete&id=$portofoliodata[id]'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>";
                }

                ?>
            </table>
        
            <a href="main?my=portofolio&then=add" class="btn btn-danger">ADD</a>
        </div>
    </div>
</body>

</html>