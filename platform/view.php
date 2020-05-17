<?php

// switch ($platform) {
//     case 'web':
//         $portfolioquery = mysqli_query($connect, "SELECT * FROM portfolio WHERE id = '$view'");
//         break;
//     case 'desktop':
//         $portfolioquery = mysqli_query($connect, "SELECT * FROM portfolio WHERE id = '$view'");
//         break;
//     case 'mobile':
//         $portfolioquery = mysqli_query($connect, "SELECT * FROM portfolio WHERE id = '$view'");
//         break;
//     default:
//         # code...
//         break;
// }

    $portfolioquery = mysqli_query($connect, "SELECT * FROM portfolio WHERE id = '$view'");
    $portofolio = mysqli_fetch_assoc($portfolioquery);
    $foto = $portofolio['foto'];
    $foto = explode('|', $foto);
    mysqli_query($connect, "UPDATE statistic SET views = views+1");
?>
<style>
    .nav-pills .nav-link.active{
        color: rgba(255,255,255,.5);
        background-color: #992e24 !important;
    }
    #btnHere{
        padding: .25rem .5rem !important;
        font-size: .875rem !important;
        line-height: 1.5 !important;
        border-radius: .2rem !important;
    }
    #btnHere:hover {
        color: rgba(255,255,255,.5);
        background-color: #810006 !important;
    }
</style>
<div id="main-wrapper">
    <div class="columns-block container">
        <div class="row" style="width: 100%;">
            <div class="col-md-6">
                <div class="row">
                    <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist" style="background-color: #810006 !important; width: 100%;">
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
                    <div class="tab-content" id="pills-tabContent" style="text-align: center">
                        <div class="tab-pane fade show active" id="pills-thumbnail" role="tabpanel" aria-labelledby="pills-thumbnail-tab">
                            <img src="img/portofolio/<?= $foto[0];?>" style="width: 100%">
                        </div>
                        <div class="tab-pane fade" id="pills-preview1" role="tabpanel" aria-labelledby="pills-preview1-tab">
                            <img src="img/portofolio/<?= $foto[1];?>" style="width: 100%">
                        </div>
                        <div class="tab-pane fade" id="pills-preview2" role="tabpanel" aria-labelledby="pills-preview2-tab">
                            <img src="img/portofolio/<?= $foto[2];?>" style="width: 100%">
                        </div>
                        <div class="tab-pane fade" id="pills-preview3" role="tabpanel" aria-labelledby="pills-preview3-tab">
                            <img src="img/portofolio/<?= $foto[3];?>" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: #810006; color: white;">
                            <li class="breadcrumb-item" aria-current="page">Judul Project</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                    <?= $portofolio['judul'];?>
                    </div>
                </div>
                <div class="form-group">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: #810006; color: white;">
                            <li class="breadcrumb-item" aria-current="page">URL</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-md-6">
                            <a id="btnHere" href="<?= $portofolio['github'];?>" target="_blank" class="btn" style="background-color: #992e24; color: white;">GitHub</a>
                            <?php if($portofolio['web']!=""){?>
                                <a id="btnHere" href="<?= $portofolio['web']; ?>" target="_blank" class="btn" style="background-color: #992e24; color: white;">Web</a>
                            <?php } else {?>
                                <a id="btnHere" class="btn" style="background-color: #646464; color: white;">Web (unavailable)</a>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: #810006; color: white;">
                            <li class="breadcrumb-item" aria-current="page">Keterangan</li>
                        </ol>
                    </nav>
                    <div class="col-md-12">
                        <?= $portofolio['keterangan'];?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>