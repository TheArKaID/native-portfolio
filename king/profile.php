<?php

$position = isset($_GET['my']) ? $_GET['my'] : "false";
if ($position == "false")
    header("location: main");
?>

<!-- Frame Content -->
<div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
    <form action="?my=profile&then=edit&so=yes" method="POST">
        <div class="row" style="margin-top: 16px; margin-bottom: 16px">
            <!-- Sebelah Kiri -->
            <div class="myred" style="width: 30%; padding: 20px 32px 20px 20px">
                <img src="../img/profile.jpg" alt="Arifia Kasastra" style="width: 100%;">
                <label for="profile">Ganti Profile</label>
                <input class="form-control-file" type="file" name="profile" id="profile">
            </div>
            <!-- Sebelah Kanan -->
            <div class="myred" style="width: 69%; margin-left: 1%; padding: 20px 32px 20px 20px">
                <label for="nama">NAMA</label>
                <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $profiledata['nama']; ?>" style="margin-bottom: 16px;" required>

                <label for="statusSkill">Status Skill</label>
                <input class="form-control" type="text" name="statusSkill" id="statusSkill" value="<?php echo $profiledata['title']; ?>" style="margin-bottom: 16px;" required>
                
                <label for="tentangSaya">Tentang Saya</label>
                <textarea class="form-control" type="text" name="tentangSaya" id="tentangSaya" style="margin-bottom: 16px;" required><?php echo $profiledata['tentang']; ?></textarea>
                
                <label for="motto">Motto</label>
                <input class="form-control" type="text" name="motto" id="motto" value="<?php echo $profiledata['motto']; ?>" style="margin-bottom: 16px;" required>
                
                <label for="alamat">Alamat</label>
                <input class="form-control" type="text" name="alamat" id="alamat" value="<?php echo $profiledata['alamat']; ?>" style="margin-bottom: 16px;" required>
                
                <label for="noHP">No. HP</label>
                <input class="form-control" type="text" name="noHP" id="noHP" value="<?php echo $profiledata['nohp']; ?>" style="margin-bottom: 16px;" required>
                
                <label for="email">E-mail</label>
                <input class="form-control" type="text" name="email" id="email" value="<?php echo $profiledata['email']; ?>" style="margin-bottom: 16px;" required>

                <input class="btn btn-danger" type="submit" value="SIMPAN">
            </div>
        </div>
    </form>

</div>