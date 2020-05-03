<?php

    mysqli_query($connect, "UPDATE statistic SET views = views+1");

?>
<div id="main-wrapper">
    <!-- Page Preloader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="status-mes">Wellcome</div>
        </div>
    </div> -->

    <div class="columns-block container">
        <div class="left-col-block blocks">
            <header class="header theiaStickySidebar">
                <div class="profile-img">
                    <img src="img/profile.jpg" class="img-responsive" alt="<?= $profiledata['nama']; ?>" style="width: 100%" />
                </div>
                <div class="content">
                    <h1><?= $profiledata['nama']; ?></h1>
                    <span class="lead"><?= $profiledata['title']; ?></span>

                    <div class="about-text">
                        <p><?= $profiledata['tentang']; ?></p>
                        <p><?= $profiledata['motto']; ?></p>
                        <!-- <p><img src="img/Signature.png" alt="" class="img-responsive"/></p> -->
                    </div>
                </div>

            </header>
            <!-- .header-->
        </div>
        <!-- .left-col-block -->
        <div class="right-col-block blocks">
            <div class="theiaStickySidebar">
                <header class="header">
                    <div class="head-section">
                        <div class="container-fluid">
                        <?= getQuote();?>
                        </div>
                    </div>
                </header>
                <section class="expertise-wrapper section-wrapper gray-bg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2>Expertise</h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <?php
                        $no = 2;
                        while ($expertisedata = mysqli_fetch_array($expertisequery)) {
                            if (($no % 2) == 0)
                                echo "<div class='row'>";

                            echo "<div class='col-md-6'>
                                    <div class='expertise-item'>
                                        <h3>$expertisedata[nama]</h3>
                                        <p>
                                            <i>$expertisedata[keterangan]</i>
                                        </p>
                                    </div>
                                </div>";

                            if (($no % 2) == 1)
                                echo "</div>";

                            $no++;
                        }
                        ?>
                    </div>
                </section>
                <!-- .expertise-wrapper -->

                <section class="section-wrapper section-experience gray-bg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2>Work Experience</h2>
                                </div>
                            </div>
                        </div>
                        <!--.row-->
                        <?php
                        $no = 2;
                        while ($experiencedata = mysqli_fetch_array($experiencequery)) {
                            if (($no % 2) == 0)
                                echo "<div class='row'>";

                            echo "<div class='col-md-6'>
                                <div class='content-item'>
                                    <small>$experiencedata[tahun]</small>
                                    <h3>$experiencedata[posisi]</h3>
                                    <h4>$experiencedata[perusahaan]</h4>
                                    <p>$experiencedata[alamat]</p>
                                    <p><i>$experiencedata[keterangan]</i></p>
                                </div>
                            </div>";

                            if (($no % 2) == 1)
                                echo "</div>";

                            $no++;
                        }
                        ?>
                        <!--.row-->
                    </div>
                    <!-- .container-fluid -->

                </section>
                <!-- .section-experience -->

                <section class="section-wrapper section-education">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2>Education</h2>
                                </div>
                            </div>
                        </div>
                        <!--.row-->
                        <?php
                        $no = 2;
                        if (($no % 2) == 0)
                            echo "<div class='row'>";
                        while ($educationdata = mysqli_fetch_array($educationquery)) {
                            echo "<div class='col-md-6'>
                                <div class='content-item'>
                                    <small>$educationdata[tahun]</small>
                                    <h3>$educationdata[jurusan]</h3>
                                    <small>$educationdata[tingkat]</small>
                                    <h4>$educationdata[keterangan]</h4>
                                    <p>$educationdata[alamat]</p>
                                </div>
                            </div>";
                        }

                        if (($no % 2) == 1)
                            echo "</div>";

                        ?>
                        <!--.row-->
                    </div>
                    <!-- .container-fluid -->
                </section>
                <!-- .section-education -->

                <section class="section-wrapper section-interest gray-bg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2>Interest</h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-item">
                                    <?php
                                    while ($interestdata = mysqli_fetch_array($interestquery)) {
                                        echo "<h3>$interestdata[nama]</h3>

                                            <p>$interestdata[keterangan]</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->

                    </div>
                </section>
                <!-- .section-publications -->

                <section class="section-wrapper portfolio-section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2>Portfolio</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            while ($portfoliodata = mysqli_fetch_array($portfolioquery)) {
                                $foto = $portfoliodata['foto'];
                                $foto = explode('|', $foto);
                                $thumbnail = $foto[0];
                            ?>
                                <div class="col-md-6 mb-3" style="height: 250px">
                                    <a class="portfolio-item" href="index?platform=web&view=<?= $portfoliodata['id'];?>" style="height: 250px">
                                        <div class="portfolio-thumb">
                                            <img src="img/portofolio/<?= $thumbnail;?>"  style="height: 250px">
                                        </div>

                                        <div class="portfolio-info">
                                            <h3><?= $portfoliodata['judul'];?></h3>
                                            <small><?= $portfoliodata['url'];?></small>
                                        </div>
                                        <!-- portfolio-info -->
                                    </a>
                                    <!-- .portfolio-item -->
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- /.row -->
                    </div>
                </section>
                <!-- .portfolio -->

                <section class="section-contact section-wrapper gray-bg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2>Contact</h2>
                                </div>
                            </div>
                        </div>
                        <!--.row-->
                        <div class="row">
                            <div class="col-md-12">
                                <address>
                                    <strong>Address</strong><br>
                                    <?= $profiledata['alamat']; ?>
                                </address>

                                <address>
                                    <strong>Mobile Number</strong><br>
                                    <?= $profiledata['nohp']; ?>
                                </address>


                                <address>
                                    <strong>Email</strong><br>
                                    <?= $profiledata['email']; ?>
                                </address>
                            </div>
                        </div>
                        <!--.row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="feedback-form">
                                    <h2>Get in touch</h2>
                                    <form id="contactForm" action="sendemail.php" method="POST">
                                        <div class="form-group">
                                            <label for="InputName">Name</label>
                                            <input type="text" name="name" required="" class="form-control" id="InputName" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="InputEmail">Email address</label>
                                            <input type="email" name="email" required="" class="form-control" id="InputEmail" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="InputSubject">Subject</label>
                                            <input type="text" name="subject" class="form-control" id="InputSubject" placeholder="Subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">Message</label>
                                            <textarea class="form-control" rows="4" required="" name="message" id="message-text" placeholder="Write message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </form>
                                </div>
                                <!-- .feedback-form -->
                            </div>
                        </div>
                    </div>
                    <!--.container-fluid-->
                </section>
                <!--.section-contact-->
            </div>
            <!-- Sticky -->
        </div>
        <!-- .right-col-block -->
    </div>
    <!-- .columns-block -->
</div>
<!-- #main-wrapper -->

<!-- JS -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/theia-sticky-sidebar.js"></script>
<script src="js/scripts.js"></script>