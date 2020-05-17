<?php

$action = isset($_GET['then']) ? $_GET['then'] : "false";
if ($action == "false")
    header("location: main");

?>
<div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
    <div class="row myred" style="padding: 20px;">
        <form style="width: 100%" action="?my=portofolio&then=add&so=yes" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="judul">Judul Project</label>
                        <input class="form-control" type="text" name="judul" id="judul" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Platform</label>
                        <select name="platform" class="form-control" required>
                            <option selected disabled hidden> - Platform</option>
                            <option value="desktop">Desktop</option>
                            <option value="mobile">Mobile</option>
                            <option value="web">Web</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="github">Github</label>
                        <input class="form-control" type="text" name="github" id="github" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="web">Web</label>
                        <input class="form-control" type="text" name="web" id="web" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="deskripsi">Keterangan</label>
                        <textarea name="keterangan" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="foto">Preview</label>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" name="thumbnail" accept="image/png, image/jpeg" required>
                            </div>
                            <div class="col-md-3">
                                <label for="preview1">Preview 1</label>
                                <input type="file" name="preview1" accept="image/png, image/jpeg" required>
                            </div>
                            <div class="col-md-3">
                                <label for="preview2">Preview 2</label>
                                <input type="file" name="preview2" accept="image/png, image/jpeg" required>
                            </div>
                            <div class="col-md-3">
                                <label for="preview3">Preview 3</label>
                                <input type="file" name="preview3" accept="image/png, image/jpeg" required>
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