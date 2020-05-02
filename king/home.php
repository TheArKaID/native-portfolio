<?php

    $position = isset($_GET['my']) ? $_GET['my'] : false;
    if (!$position)
        header("location: main");

    $statistic = mysqli_query($connect, "SELECT * FROM statistic");
    $statistic = mysqli_fetch_assoc($statistic);

?>
<!DOCTYPE html>
<html lang="en">

<body>
    <!-- Frame Content -->
    <div class="col-md-12" style="margin: 16px 8px 16px 8px; width: -moz-available; font-family: ubuntuFont">
        <!-- Version -->
        <div class="row myred" style="padding: 20px;">
            <i class="fas fa-vector-square" style="margin: 8px; font-size: x-large;"> Redarka Material v.1 by ArKa</i>
        </div>
        <!-- Visitor Content -->
        <div class="row" style="margin-top: 16px; margin-bottom: 16px">
            <div class="myred" style="width: 33%; padding: 10px 32px 10px 20px">
                <div>Page Views</div>
                <div style="font-family: ubuntuFont; font-size: 50pt; text-align: right; padding: 0px 0px 25px 0px"><i class="fas fa-binoculars"></i> <?= $statistic['views'];?></div>
            </div>
            <div class="myred" style="width: 32%; margin-right: 1%; margin-left: 1%; padding: 10px 32px 10px 20px">
                <div>Visitor</div>
                <div style="font-family: ubuntuFont; font-size: 50pt; text-align: right; padding: 0px 0px 25px 0px"><i class="fas fa-users"></i> <?= $statistic['visitors'];?></div>
            </div>
            <div class="myred" style="width: 33%; padding: 10px 32px 10px 20px">
                <div>Total Visit</div>
                <div style="font-family: ubuntuFont; font-size: 50pt; text-align: right; padding: 0px 0px 25px 0px"><i class="fas fa-chart-line"></i> <?= $statistic['total'];?></div>
            </div>
        </div>

        <div class="row">
            <div class="myred" style="padding: 20px; width: 100%;">
                <?= getQuote();?>
            </div>
        </div>
    </div>
</body>

</html>