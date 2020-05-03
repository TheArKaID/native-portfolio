<?php

    $portfoliodesktopquery = mysqli_query($connect, "SELECT * FROM portfolio WHERE platform = 'desktop'");
    mysqli_query($connect, "UPDATE statistic SET views = views+1");
?>
<div id="main-wrapper">
    <div class="columns-block container">
        <div class="row">
            <?php
            if(mysqli_num_rows($portfoliodesktopquery)!=0){
                
                while ($portfoliodesktop = mysqli_fetch_array($portfoliodesktopquery)) {
                    $foto = $portfoliodesktop['foto'];
                    $foto = explode('|', $foto);
                    $thumbnail = $foto[0];
            ?>
                <div class="col-md-6">
                    <a class="portfolio-item" href="index?platform=desktop&view=<?=$portfoliodesktop['id'];?>">
                        <div class="portfolio-thumb">
                            <img src="img/portofolio/<?= $thumbnail;?>" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h3><?= $portfoliodesktop['judul'];?></h3>
                            <small><?= $portfoliodesktop['url'];?></small>
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