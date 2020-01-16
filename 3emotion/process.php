<?php

session_start();
error_reporting(0);

if(!isset($_SESSION['uid'])) {
$_SESSION['process'] = 'false';
header('Location: index.php');
    die();

} else if(!isset($_GET['decision']) || !isset($_POST['invest']) || empty($_POST['invest']) || $_SESSION['process'] == 'true' || !isset($_SESSION['process'])) {
$_SESSION['process'] = 'false';
    header('Location: game.php');

    die();

} else {

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
    return $data;}

if(!empty($_POST['invest'])) {
    $invest = test_input($_POST['invest']);
} else { header('Location: index.php'); die(); }


$day = $_SESSION['day'];
$unqid = $_SESSION['uid'];
$consent = $_SESSION['consent'];
$conn = new mysqli("localhost", "acs_de_gam", "acslab","acs_draft");
    
//inputs



//$sqltest = "SELECT * FROM game WHERE id=".$unqid." AND day=".$day.";";
//if(mysqli_query($conn,$sqltest)) {
//header('Location: game.php');
//die();
//}
$_SESSION['cumulative_invest'] = $_SESSION['cumulative_invest'] + $invest;
$cumulative_invest = $_SESSION['cumulative_invest'];
$M = $_SESSION['return_mitigation'];
$money_ini = $_SESSION['money_ini'];
$d_f_inv = $_SESSION['d_f_inv'];
$wealth_property = $_SESSION['wealth_property'];

$_SESSION['income_unaffected_cumulative'] = $_SESSION['income_unaffected_cumulative'] + $_SESSION['daily_income'];
$income_unaffected_cumulative = $_SESSION['income_unaffected_cumulative'];
$p_property = $_SESSION['p_property'];
$p_injury = $_SESSION['p_injury'];
$p_fatality = $_SESSION['p_fatality'];
$daily_income = $_SESSION['daily_income'];
$w_i = $_SESSION['weight_invest'];
$inj_loss = $_SESSION['injury_daily_inc_loss'];
$fat_loss = $_SESSION['fatality_daily_inc_loss'];
//processing part
//outputs

$rand_property = round(mt_rand() / mt_getrandmax(),5);
$rand_fatality = round(mt_rand() / mt_getrandmax(),5);
$rand_injury = round(mt_rand() / mt_getrandmax(),5);
$p_temporal = $_SESSION['p_temporal'];

$p_spatial = $_SESSION['p_spatial'];
$p_rain = $p_temporal * $p_spatial; $p_rain = $_SESSION['p_rain'];

$p_investment = $_SESSION['p_invest'];
$p_investment = 1 - $M * $cumulative_invest / $income_unaffected_cumulative; $_SESSION['p_invest'] = $p_investment;
$p_landslide = $p_rain * ( 1 - $w_i ) + $p_investment * ( $w_i );
    $_SESSION['p_landslide'] = $p_landslide;
$landslide_threshold = round(mt_rand() / mt_getrandmax(),5);;
    if($p_landslide >= $landslide_threshold)
    {  $landslide = 1;
     if($p_property >= $rand_property) {  $damage_property =1 ;
   } else {$damage_property =0 ;};

     if($p_fatality >= $rand_fatality) {$damage_fatality =1;
$_SESSION['dmg_fatality']=$_SESSION['daily_income'];
$_SESSION['daily_income'] = (1 - $fat_loss) * $_SESSION['daily_income'];
$_SESSION['dmg_fatality']=$_SESSION['dmg_fatality'] - $_SESSION['daily_income'];
                                      } else {$damage_fatality =0 ;};

     if($p_injury >= $rand_injury) {$damage_injury =1 ;
$_SESSION['dmg_injury']=$_SESSION['daily_income'];
$_SESSION['daily_income'] = (1 - $inj_loss) * $_SESSION['daily_income'];
$_SESSION['dmg_injury']=$_SESSION['dmg_injury'] - $_SESSION['daily_income'];
                                   } else {$damage_injury =0 ;};

    } else {    $landslide = 0;$damage_property = 0;$damage_fatality = 0;$damage_injury = 0;    }
    if($damage_property == 1) {$damage = $wealth_property * $money_ini;$_SESSION['money_ini'] = ( 1 - $wealth_property) * $_SESSION['money_ini'];
                              } else {$damage = 0;}
$final_money = $_SESSION['final_money'];
$net_money = $_SESSION['daily_income'] - $invest - $damage; $final_money = $final_money + $net_money;
$_SESSION['final_money'] = $final_money;
$t_span = $_SESSION['time_span'];
//$daily_income = $_SESSION['daily_income'];
$_SESSION['invest'] = $invest;

$_SESSION['final_money_array'][$_SESSION['day']] = round($_SESSION['money_ini'],2);
$_SESSION['damage_array'][$_SESSION['day']] = round($damage,2);
$_SESSION['p_landslide_array'][$_SESSION['day']] = round($p_landslide,2);
$_SESSION['daily_income_array'][$_SESSION['day']] = round($daily_income,1);
$d_i_t = $_SESSION['day_initial_temporal'];
$_SESSION['message_property']=$damage_property;
$_SESSION['message_fatality']=$damage_fatality;
$_SESSION['message_injury']=$damage_injury;
$_SESSION['dmg_property']=$damage;


$sqlo = "INSERT INTO game (consent, id, day, invest, cumulative_invest, weight_invest, daily_income, rand_property, rand_fatality, rand_injury, p_temporal, p_spatial, p_rain, p_investment, p_landslide, landslide_threshold, landslide, damage_property, damage_fatality, damage_injury, damage, net_money, final_money, return_mitigation, money_ini, time_span, dampening_factor_investment, wealth_property, p_property, p_fatality, p_injury, injury_daily_inc_loss, fatality_daily_inc_loss, day_initial_temporal)
VALUES('$consent','$unqid','$day','$invest','$cumulative_invest','$w_i','$daily_income','$rand_property','$rand_fatality','$rand_injury','$p_temporal','$p_spatial','$p_rain','$p_investment','$p_landslide','$landslide_threshold','$landslide','$damage_property','$damage_fatality','$damage_injury','$damage','$net_money','$final_money','$M','$money_ini','$t_span','$d_f_inv','$wealth_property','$p_property','$p_fatality','$p_injury','$inj_loss','$fat_loss','$d_i_t')";

$resulto=mysqli_query($conn,$sqlo);

 $_SESSION['process'] = 'true';
//if($_SESSION['day'] == $t_span) {
   //     header('Location: end.php'); die();
    //}

if($landslide == 1) {
$_SESSION['day'] += 1;
        header('Location: landslide_positive.php'); die();
}
    else{ $_SESSION['day'] += 1;
header('Location: landslide_negative.php'); die();}

mysqli_close($conn);
}
?>
