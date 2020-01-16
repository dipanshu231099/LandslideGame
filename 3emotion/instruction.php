<?php session_start();
error_reporting(0);
if(!isset($_SESSION['uid']) || $_SESSION['consent'] != 'true') {
?>

<?php include 'head.php';?>
<body>
    <!--header -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="row"> <div class=col-md-1> <a href="index.php"><embed height="50" width="50" src="23.png"></a></div>
            <div class="col-md-11">
            <div class="navbar-header">
                
                <a href="index.php" class="navbar-brand kalam">Interactive Landslide Simulator</a>
            </div>
            <!-- Menu Items -->
            <div class="collapse navbar-collapse" id="mainNavBar">
                <ul class="nav navbar-nav">
                    <li> <a href="index.php" class="kalam">Home</a> </li>
                    <li  class="active" class="kalam"> <a href="instruction.php">Instructions</a> </li> 
                    <li> <a href="contact.php" class="kalam">Contact Us</a> </li> 
                </ul>
            </div>
            </div></div></div>
    </nav><br><br><br><br>
    
    <!--body -->
    <div class="container-fluid">
<div class="jumbotron"><h1 class="text-center">INSTRUCTIONS</h1></div>
        
        <div class="jumbotron">
<p class="text-justify">
<!-- instructions start-->
You are a resident of Mandi district of Himachal Pradesh, India, a township in the lap of Himalayas. You with your family and friends live on your property in this area. Landslides may get triggered in this area due to a number of environmental factors (e.g., the prevailing geological conditions and rainfall in the area). These landslides may cause fatalities and injuries to you and your family. In addition, these landslides may also damage your property and cause loss to your property wealth. 
<br><br><strong>In this task, you will be repeatedly making daily investment decisions to mitigate landslides over a period of several days.</strong> In this task, we use a fictitious currency called “EC”. Every day, you earn 292 EC. This money is your daily income and you may use a part or whole of it for making investments against landslides. Your investments will be used to provide landslide mitigation measures like planting trees and building reinforcements, both of which prevent landslides from occurring. <strong>Every day, you may decide to invest a certain monetary amount from your income towards landslide mitigation; however, you may also decide not to invest anything on a particular day (in which case, you invest 0.0 against landslides).</strong>
Based upon your investments against landslides, you’ll get feedback on whether landslides occurred and whether there were associated fatalities, injuries, and property damages (all three events are independent and they can occur at the same time). 
<br><br><strong>Your total wealth at any point in the task is the following: sum of your income that you did not invest against landslides + your property wealth - damages to you, your family, and to your property due to landslides</strong>. Your property wealth is assumed to be 20 million EC at the start of the task. The income invested against landslides is lost and it cannot contribute to the total wealth. <strong>Your goal in this task is to maximize your total wealth</strong>. 
<br><br><strong>Please note that landslides may occur; however, not all landslides may cause fatalities, injuries, and property damage</strong>. If a landslide occurs and it causes fatality, then your daily income is reduced by 20% of its current value. If a landslide occurs and it causes injury, then your daily income is reduced by 10% of its current value. Thus, your income may get reduced with each fatality and injury due to landslides. Furthermore, if a landslide occurs and it causes property damage, then your property wealth is reduced by 50% of its current value.  The reductions in income due fatalities, injuries, and property damage are permanent and remain for the duration of the task. 
<br><br>The total probability of landslide is a weighted average of probability of landslide due to environmental factors and probability of landslide due to human (investment) factor. The income you invest to mitigate landslides may reduce the probability of landslide due to the human factor and also may reduce the total probability of landslides. 
<br><br>You will be paid INR 50 for your effort as base payment. In addition, at the end of the task, we will enter top-10 participants based upon the total wealth into a lucky draw. One of the participants will be randomly selected from the lucky draw and awarded a cash prize of INR 500.
<!-- instructions end-->        
</p></div>
        </div>
<?php include 'footer.php'; ?>
</body>
</html>

<?php
} else {
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
};
if(!empty($_POST['age']) && !empty($_POST['gender']) && !empty($_POST['ed']) && !empty($_POST['occ']) && !empty($_POST['major']) && !empty($_POST['email']))
    {  
        
        $age = test_input($_POST['age']);
        $gender = test_input($_POST['gender']);
        $ed = test_input($_POST['ed']);
        $occ = test_input($_POST['occ']);
        $major = test_input($_POST['major']);
        $email = $_POST['email'];
        
 $city = test_input($_POST['city']);
 $live = test_input($_POST['live']);
if($live=="no") {$live = test_input($_POST['liveno']);}
 $live_long = test_input($_POST['livelong']);
 $livereason = test_input($_POST['livereason']);
if($livereason=="Other") {$livereason = test_input($_POST['livereasonother']);}
$dwell = test_input($_POST['dwell']);
if($dwell=="Other") {$dwell = test_input($_POST['dwellother']);}
 $household = test_input($_POST['household']);
$owner = test_input($_POST['owner']);
if($owner=="Other") {$owner = test_input($_POST['ownerother']);}
$source = test_input($_POST['source']);
if($source=="Other") {$source = test_input($_POST['sourceother']);}
$income = test_input($_POST['income']);
$know = test_input($_POST['know']);

    }
    $unqid = $_SESSION['uid'];
    $_SESSION['name'] = 'Guest';
    $conn = new mysqli("localhost", "acs_de_gam", "acslab","acs_draft");
    $sql = "INSERT INTO demographic (id, Age, Gender, Education, Occupation, Major, Email, city_belong_to, liveno_currently_live, live_long, livereason, dwell_type, household_size, owner, source_of_income, income, knowledge) 
VALUES ('$unqid','$age','$gender','$ed','$occ','$major','$email','$city','$live','$live_long','$livereason','$dwell','$household','$owner','$source','$income','$know')";
if ($conn->query($sql) === TRUE) 
{     
    $_SESSION['day']=0;
    $_SESSION['cumulative_invest']=0;
    
 $sql2 = "SELECT scenario_id FROM param";
 $result = mysqli_query($conn,$sql2);
    $j = 0;
   while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
   $row1[$j] = $row[0]; $j++;
   }
 $random_keys=array_rand($row1);
 $sno = $row1[$random_keys];
$sno = 2;
 $sql3 = "SELECT * FROM param WHERE scenario_id='$sno'";
    $_SESSION['scenario_id'] = $sno;
 $result1 = mysqli_query($conn,$sql3);
 $row=mysqli_fetch_array($result1,MYSQLI_ASSOC);
 $inj_loss = $row["injury_daily_inc_loss"];
    $_SESSION['injury_daily_inc_loss'] = $inj_loss;
$_SESSION['day_initial_temporal'] = $row["day_initial_temporal"];
    $d_i_t = $_SESSION['day_initial_temporal'];
 $fat_loss = $row["fatality_daily_inc_loss"];
    $_SESSION['fatality_daily_inc_loss'] = $fat_loss;
 $winv = $row["weight_invest"];$_SESSION['weight_invest'] = $winv;
 $d_f_inv = $row["dampening_factor_investment"];$_SESSION['d_f_inv'] = $d_f_inv;
 $wealth_property = $row["wealth_property"];$_SESSION['wealth_property'] = $wealth_property;
 $dinc = $row["daily_income"];$consent = $_SESSION['consent']; $_SESSION['income_unaffected_cumulative'] = 0; $_SESSION['daily_income_unaffected'] = $dinc; $_SESSION['daily_income'] = $dinc;
 $mini = $row["money_ini"]; $_SESSION['money_ini'] = $mini;
 $ret = $row["return_mitigation"]; $_SESSION['return_mitigation'] = $ret;
 $tspan = $row["time_span"]; $_SESSION['time_span'] = $tspan;
 $property = $row["p_property"]; $_SESSION['p_property'] = $property;
 $fatality = $row["p_fatality"]; $_SESSION['p_fatality'] = $fatality;
 $injury = $row["p_injury"]; $_SESSION['p_injury'] = $injury;
 //$spatial = $row["p_spatial"]; no more fetching single value from param table
$rand_spatial = round(mt_rand() / mt_getrandmax(),2);
//NOW APPLYING interpolation to modify spatial probability 
$near = $rand_spatial*100;
$near = $near%5;
$near = $rand_spatial - 0.01*$near;
$sqlnear = "SELECT * FROM spatial_p WHERE low=".$near.";";
$resultnear = mysqli_query($conn,$sqlnear);
$rownear = mysqli_fetch_array($resultnear,MYSQLI_ASSOC);
$value1 = $rownear["value"];
//extracting second value for interpolation
$near2 = $near+0.05;
if($near2 == 1.00) {
$near2 = 0.99;
}
$sqlnear2 = "SELECT * FROM spatial_p WHERE low=".$near2.";";
$resultnear2 = mysqli_query($conn,$sqlnear2);
$rownear2 = mysqli_fetch_array($resultnear2,MYSQLI_ASSOC);
$value2 = $rownear2["value"];
$slope = ($value2 - $value1) / ($near2 - $near);
$spatial = $rand_spatial * $slope + $value1 - $slope * $near;
$_SESSION['p_spatial']=$spatial;
$_SESSION['final_money'] = $mini;
    
    $_SESSION['daily_income_array'][0] = $dinc;
    
    $_SESSION['final_money_array'] = array_fill(0,$_SESSION['time_span'] + 1,NULL);
    $_SESSION['final_money_array'][0] = $mini;
$_SESSION['income_not_invested'] = array_fill(0,$_SESSION['time_span'] + 1,NULL);
    $_SESSION['damage_array'][$_SESSION['day']] = 0;
     $_SESSION['daychart'] = array_fill(0,$_SESSION['time_span']+1,"0");$i=0;
    for ( $i=0 ; $i <= $_SESSION['time_span'] ; $i ++ )
    {
        $_SESSION['daychart'][$i] = $i;
    }
     $_SESSION['p_landslide_array'][$_SESSION['day']] = 0;
    
 $sql1 = "INSERT INTO game (rand_spatial,consent, id, day, weight_invest, daily_income, money_ini, return_mitigation, time_span, p_property, p_fatality, p_injury, p_spatial, dampening_factor_investment, wealth_property, injury_daily_inc_loss, fatality_daily_inc_loss, day_initial_temporal) 
VALUES ('$rand_spatial','$consent','$unqid','0','$winv','$dinc','$mini','$ret','$tspan','$property','$fatality','$injury','$spatial','$d_f_inv','$wealth_property','$inj_loss','$fat_loss','$d_i_t')";
    $result3=mysqli_query($conn,$sql1);
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="row"> <div class=col-md-1> <embed height="50" width="50" src="23.png"></div>
            <div class="col-md-11">
            <div class="navbar-header">
                <a class="navbar-brand kalam">Interactive Landslide Simulator</a>
            </div>
                </div></div></div>
    </nav> <br><br><br><br>
    <div class="container">
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Good to go!</strong> Entry Submitted Successfully.
    </div>
        <div class="jumbotron">
    <h1 class="text-center">Welcome!</h1><br><br><br><br>
    <p class="text-justify">
       
<!-- instructions start-->
You are a resident of Mandi district of Himachal Pradesh, India, a township in the lap of Himalayas. You with your family and friends live on your property in this area. Landslides may get triggered in this area due to a number of environmental factors (e.g., the prevailing geological conditions and rainfall in the area). These landslides may cause fatalities and injuries to you and your family. In addition, these landslides may also damage your property and cause loss to your property wealth. 
<br><br><strong>In this task, you will be repeatedly making daily investment decisions to mitigate landslides over a period of several days.</strong> In this task, we use a fictitious currency called “EC”. Every day, you earn 292 EC. This money is your daily income and you may use a part or whole of it for making investments against landslides. Your investments will be used to provide landslide mitigation measures like planting trees and building reinforcements, both of which prevent landslides from occurring. <strong>Every day, you may decide to invest a certain monetary amount from your income towards landslide mitigation; however, you may also decide not to invest anything on a particular day (in which case, you invest 0.0 against landslides).</strong> Based upon your investments against landslides, you’ll get feedback on whether landslides occurred and whether there were associated fatalities, injuries, and property damages (all three events are independent and they can occur at the same time). 
<br><br><strong>Your total wealth at any point in the task is the following: sum of your income that you did not invest against landslides + your property wealth - damages to you, your family, and to your property due to landslides</strong>. Your property wealth is assumed to be 20 million EC at the start of the task. The income invested against landslides is lost and it cannot contribute to the total wealth. <strong>Your goal in this task is to maximize your total wealth</strong>. 
<br><br><strong>Please note that landslides may occur; however, not all landslides may cause fatalities, injuries, and property damage</strong>. If a landslide occurs and it causes fatality, then your daily income is reduced by 20% of its current value. If a landslide occurs and it causes injury, then your daily income is reduced by 10% of its current value. Thus, your income may get reduced with each fatality and injury due to landslides. Furthermore, if a landslide occurs and it causes property damage, then your property wealth is reduced by 50% of its current value.  The reductions in income due fatalities, injuries, and property damage are permanent and remain for the duration of the task. 
<br><br>The total probability of landslide is a weighted average of probability of landslide due to environmental factors and probability of landslide due to human (investment) factor. The income you invest to mitigate landslides may reduce the probability of landslide due to the human factor and also may reduce the total probability of landslides. 
<br><br>You will be paid INR 50 for your effort as base payment. In addition, at the end of the task, we will enter top-10 participants based upon the total wealth into a lucky draw. One of the participants will be randomly selected from the lucky draw and awarded a cash prize of INR 500.
<!-- instructions end-->   
         </p>       
        
    <br><br>    <h2 class="text-center">Starting Game Parameters</h2>
            <p>Your wealth: <strong><?php $mney = $_SESSION['money_ini'] ; $mney = $mney / 1000000;echo $mney ; ?> million EC</strong></p>
            <p>When a landslide occurs:</p>
            <p>If a death occurs, your daily income will be reduced by <strong><?php $fat_loss = 100 * $_SESSION['fatality_daily_inc_loss'];echo  $fat_loss; ?></strong>% of its current value.</p>
            <p>If an injury takes place, your daily income will be reduced by <strong><?php $inj_loss = 100 * $_SESSION['injury_daily_inc_loss'] ;echo $inj_loss ; ?></strong>% of its current value.</p>
            <p>If a property damage occurs, your wealth will be reduced by <strong><?php $a =  $_SESSION['wealth_property'] * 100;echo $a; ?></strong>% of your property wealth.</p>
           <p><strong>Please note that your goal in this task is to maximize your total wealth across investments over a number of days.</strong></p>
 <p><strong>Best of Luck!</strong></p>
    <a href="game.php"><button type="button" class="btn btn-primary btn-lg" style="position:relative;left:50%">PLAY</button></a>
    </div></div>
    <?php include 'footer.php'; ?>
</body>
</html>

<?php

} else {
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
<body>
    <div class="container">
    <h1>Sorry!</h1><br><br><h3>Entry could not submitted. Please <a href="index.php">try again</a> after sometime.</h3>
    </div>

</body>
</html>

<?php
}
}
?>