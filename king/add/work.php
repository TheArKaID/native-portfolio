<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
        <div class="row myred" style="padding: 20px;">
            <form style="width: 100%" action="?my=work&then=add&so=yes" method="post">
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
                        <td>
                            <input class="form-control" type="text" name="job" id="job" required>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="perusahaan" id="perusahaan" required>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="daerah" id="daerah" required>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="tahun" id="tahun" required>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="keterangan" id="keterangan" required>
                        </td>
                    </tr>

                </table>
                <input class="btn btn-danger" type="submit" value="SAVE">
            </form>
        </div>
    </div>
</body>

</html>