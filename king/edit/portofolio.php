<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

$id = isset($_GET["id"]) ? $connect->real_escape_string($_GET["id"]) : "false";

if ($id == "false")
    header("location: main");

$portfolioquery = mysqli_query($connect, "SELECT * FROM portfolio WHERE id = $id");
$portfoliodata = mysqli_fetch_assoc($portfolioquery);

$foto = explode('|', $portfoliodata['foto']);

?>
<style>
    .nav-pills .nav-link.active{
        color: #fff;
        background-color: #c22131;
    }
</style>
<div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
    <div class="row myred" style="padding: 20px;">
        <form style="width: 100%" action="?my=portofolio&then=edit&so=yes" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="hidden" name="id" id="id" value="<?= $id; ?>" required>
                        <td>
                            <label for="judul">Judul</label>
                            <input class="form-control" type="text" name="judul" id="judul"value="<?= $portfoliodata['judul']; ?>" required>
                        </td>
                    </div>
                    <div class="col-md-6">
                        <td>
                            <label for="url">URL</label>
                            <input class="form-control" type="text" name="url" id="url" value="<?= $portfoliodata['url']; ?>" required>
                        </td>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <td>
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" cols="30" rows="10"><?= $portfoliodata['keterangan']; ?></textarea>
                        </td>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-thumbnail-tab" data-toggle="pill" href="#pills-thumbnail" role="tab" aria-controls="pills-thumbnail" aria-selected="true">Thumbnail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-preview1-tab" data-toggle="pill" href="#pills-preview1" role="tab" aria-controls="pills-preview1" aria-selected="false">Preview 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-preview2-tab" data-toggle="pill" href="#pills-preview2" role="tab" aria-controls="pills-preview2" aria-selected="false">Preview 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-preview3-tab" data-toggle="pill" href="#pills-preview3" role="tab" aria-controls="pills-preview3" aria-selected="false">Preview 3</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-thumbnail" role="tabpanel" aria-labelledby="pills-thumbnail-tab">
                                <img src="../img/portofolio/<?= $foto[0];?>" style="width: 100%">
                            </div>
                            <div class="tab-pane fade" id="pills-preview1" role="tabpanel" aria-labelledby="pills-preview1-tab">
                                <img src="../img/portofolio/<?= $foto[1];?>" style="width: 100%">
                            </div>
                            <div class="tab-pane fade" id="pills-preview2" role="tabpanel" aria-labelledby="pills-preview2-tab">
                                <img src="../img/portofolio/<?= $foto[2];?>" style="width: 100%">
                            </div>
                            <div class="tab-pane fade" id="pills-preview3" role="tabpanel" aria-labelledby="pills-preview3-tab">
                                <img src="../img/portofolio/<?= $foto[3];?>" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-danger" type="submit" value="SAVE">
        </form>
    </div>
</div>
<script src="../plugin/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('keterangan');
</script>