<?php
session_start();error_reporting(0);
if(!isset($_SESSION['uid'])) {

header('Location: http://pratik.acslab.org/index.php');
session_destroy();
   die();
                              
}
?>
<!-- End of game -->
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <style>
        .containerx{
            width:600px;
        }
    </style>
<body>
    <!-- HEADER -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="row"> <div class=col-md-1> <embed height="50" width="50" src="23.png"></div>
            <div class="col-md-11">
            <div class="navbar-header">
                <a class="navbar-brand">Interactive Landslide Simulator</a>
            </div>
                </div></div></div>
    </nav><br> <br> <br><br>
    <!-- BODY -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8"><div class="jumbotron">
                <h1>Congrats!</h1> <br><h3> You have completed the game successfully.</h3><br><br>
            <br>
<p>Thank you for your participation. <!--Now, please click the button below to indicate to Academic Prolific that you have completed the study.--></p>
<!--<div class="containerx">  -->         <?php //echo "<a href='http://pratik.acslab.org/end_verif.php'><button class='btn btn-info btn-lg' style=\"position:'relative';left:'25%'\">Click here</button></a>";//?>
                <!--</div>-->
            <br>
           
            </div></div>
            <div class="col-md-4"><div class="well">
                <h3 class="text-center">Final Game Parameters</h3>
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tr class="info">
                        <th>Day</th>
                        <th><?php echo "End of game"; ?></th>
                    </tr>
                    <tr class="info">
                        <th>Income available for investment today (M)</th>
                        <th><?php $income = round ($_SESSION['daily_income'],1); echo $income;
                            ?></th>
                    </tr>
                   
                    <tr class="info">
                        <th>Total income not invested in landslides (NTM)</th>
                        <th><?php if($_SESSION['day'] == 1) {echo round ($_SESSION['daily_income'],1);}
 else {$unqid = $_SESSION['uid']; $ntm = 0;
$conn = new mysqli("localhost", "acs_de_gam", "acslab","acs_draft");
$sqlntm = "SELECT daily_income-invest from game where id='$unqid' AND day >0;";
if ($resultntm = mysqli_query($conn, $sqlntm)) {
    while ($rowntm = mysqli_fetch_array($resultntm, MYSQLI_NUM)) {
        $ntm=$ntm+$rowntm[0];
    }

    echo round($ntm,1);
    mysqli_free_result($resultntm);
} else {echo "not found";}

} ?></th>
</tr>
                    <tr  class="info">
                        <th>Property wealth (PW)</th>
                        <th><?php echo round($_SESSION['money_ini'],1); ?></th></tr>

<tr  class="info">
                        <th>Total damage due to landslides (TD)</th>
                        <th><?php 
if($_SESSION['day'] == 1) {echo "-"; $td=0;}
 else {

$unqid = $_SESSION['uid']; $td = 0;
$sqltd = "SELECT SUM(damage) from game where id='$unqid' AND day >0;";
if ($resulttd = mysqli_query($conn, $sqltd)) {
    $rowtd = mysqli_fetch_array($resulttd, MYSQLI_NUM);
    $td=$td+$rowtd[0] + 292 - round ($_SESSION['daily_income'],1);
    echo round($td,1);
    mysqli_free_result($resulttd);
} else {echo "not found";}
}
?></th>
</tr>
                     <tr class="info">
                        <th>Total wealth (NTM + PW - TD)</th>
                        <th><?php echo round($_SESSION['final_money'],1); ?></th></tr>

                    <tr  class="info">
                        <th>Probability of landslide due to human (investment) factor (P(I))</th>
                        <th><?php if($_SESSION['day'] == 1) {$toll = 1 - $_SESSION['return_mitigation'];$_SESSION['p_invest'] = $toll; echo round($toll,2); 
} else {echo round($_SESSION['p_invest'],2);} ?></th>
                    </tr>

                    <tr  class="info">
                        <th>Probability of landslide due environmental factors (P(E))</th>
                        <th><?php echo round($_SESSION['p_rain'],2); ?></th></tr>
                    
                    <tr  class="info">
                        <th>Probability weight (W)</th>
                        <th><?php echo $_SESSION['weight_invest']; ?></th></tr>

                    <tr class="info" >
                        <th>Total probability of landslide (W*P(I)+(1-W)*P(E))</th>
                        <th><?php if($_SESSION['day'] == 1) {
                                                             $_SESSION['p_landslide_array'][0] = (1 - $_SESSION['return_mitigation'] * $_SESSION['d_f_inv']) * $_SESSION['weight_invest'] + $_SESSION['p_rain'] * (1 - $_SESSION['weight_invest']);
echo round($_SESSION['p_landslide_array'][0],2);
$_SESSION['p_landslide_array'][0] = round($_SESSION['p_landslide_array'][0],2);
 } else {echo round($_SESSION['p_landslide'],2);} ?></th></tr>
                    
                </table>
                </div></div>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>