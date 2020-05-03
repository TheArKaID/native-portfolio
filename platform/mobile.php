<?php

    $portfoliomobilequery = mysqli_query($connect, "SELECT * FROM portfolio WHERE platform = 'mobile'");
    mysqli_query($connect, "UPDATE statistic SET views = views+1");
?>
<div id="main-wrapper">
    <div class="columns-block container" style="display: grid;">
        <div class="row">
            <?php
            if(mysqli_num_rows($portfoliomobilequery)!=0){
                
                while ($portfoliomobile = mysqli_fetch_array($portfoliomobilequery)) {
                    $foto = $portfoliomobile['foto'];
                    $foto = explode('|', $foto);
                    $thumbnail = $foto[0];
            ?>
            <div class="col-md-6" style="height: 250px">
                <a class="portfolio-item" href="index?platform=mobile&view=<?=$portfoliomobile['id'];?>" style="height: 250px">
                    <div class="portfolio-thumb">
                        <img src="img/portofolio/<?= $thumbnail;?>" style="height: 250px">
                    </div>
                    <div class="portfolio-info">
                        <h3><?= $portfoliomobile['judul'];?></h3>
                        <small><?= $portfoliomobile['url'];?></small>
                    </div>
                    <!-- portfolio-info -->
                </a>
                <!-- .portfolio-item -->
            </div>
            <?php
                }
            } else {
            ?>
                <div class="container">
                    <div class="col-md-12">
                        <i>Belum Ada Portofolio Disini</i>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>  
    </div>
</div>