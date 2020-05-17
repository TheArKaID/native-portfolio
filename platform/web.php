<?php

    $portfoliowebquery = mysqli_query($connect, "SELECT * FROM portfolio WHERE platform = 'web'");
    mysqli_query($connect, "UPDATE statistic SET views = views+1");
?>
<div id="main-wrapper">
    <div class="columns-block container">
        <div class="row">
            <?php
            if(mysqli_num_rows($portfoliowebquery)!=0){
                
                while ($portfolioweb = mysqli_fetch_array($portfoliowebquery)) {
                    $foto = $portfolioweb['foto'];
                    $foto = explode('|', $foto);
                    $thumbnail = $foto[0];
            ?>
                <div class="col-md-6">
                    <a class="portfolio-item" href="index?platform=web&view=<?=$portfolioweb['id'];?>">
                        <div class="portfolio-thumb">
                            <img src="img/portofolio/<?= $thumbnail;?>" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h3><?= $portfolioweb['judul'];?></h3>
                            <small><?= $portfolioweb['github'];?></small>
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