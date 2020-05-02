<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

?>
<div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
    <div class="row myred" style="padding: 20px;">
        <form style="width: 100%" action="?my=expertise&then=add&so=yes" method="post">
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
                    <td>
                        <input class="form-control" type="text" name="tipe" id="tipe" required>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="deskripsi" id="deskripsi" required>
                    </td>
                </tr>

            </table>
            <input class="btn btn-danger" type="submit" value="SAVE">
        </form>
    </div>
</div>