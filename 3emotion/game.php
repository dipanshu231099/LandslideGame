<?php
session_start();error_reporting(0);
if(!isset($_SESSION["uid"])) {
?>
<?php include 'head.php';?>
<!-- if user id is not assigned -->
<body>
    <div class="container">
    <h1>OOPS!</h1><br> <h3>Please go <a href="index.php">here</a> first</h3>
    </div>
</body>
</html>

<?php
} 
elseif(!isset($_SESSION["connect"])) {
?>
<?php include_once 'head.php';?>
<!-- if no connection to database -->
<body>
    <div class="container">
    <h1>OOPS!</h1><br> <h3>Please go <a href="connect.php">here</a> first</h3>
    </div>
</body>
</html>

<?php   }
else {
$unqid = $_SESSION["uid"];
$cryptid = $_SESSION["cid"];
    if($_SESSION['day'] == 0)
    {$_SESSION['day'] += 1;}
    $_SESSION['process'] = 'false';
    $day = $_SESSION['day'];
    $day_temporal = $day + $_SESSION['day_initial_temporal'] - 1;
    $conn = new mysqli("localhost", "acs_de_gam", "acslab","acs_draft");
 $sqlinp = "SELECT p_temporal FROM reference WHERE day='$day_temporal'";
$resulti = mysqli_query($conn,$sqlinp);
$tempo=mysqli_fetch_array($resulti,MYSQLI_ASSOC);
 //   $spatial = $_SESSION['p_spatial'];

    $p_temporal = $tempo["p_temporal"];
    $_SESSION['p_temporal'] = $p_temporal;
$spatial = $_SESSION['p_spatial'];
    $_SESSION['p_rain'] = $spatial * $p_temporal ;
    $_SESSION['name'] = 'Guest';

?>
<!-- main game page starts here -->
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Interactive Landslide Simulator</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="msvalidate.01" content="A715CCF7512E918C7F99005F066E26EC" />
		
    <meta name="description" content="Welcome! This game is part of a research study conducted by Dr. Varun Dutt (Asst. Prof. at Indian Institute of Technology, Mandi) and Mr. Pratik Chaturvedi (Ph.D. Student under Dr. Varun Dutt) and has been developed by Akshit Arora (Summer Intern at IIT Mandi, under guidance of Dr. Varun Dutt).
Therefore, this game presents people the right information that must be known to them before they make a decision of how much can they should invest on landslide aversion. " />
<meta name="description" content="The motivation behind developing this game is to improve the causal understanding of the people about landslides.
Previous research shows that public’s understanding of causes and consequences of landslide disaster and their landslide risk perception is very different from what it ought to be. 
This game is designed to increase public awareness about landslides and balance risk perceptions." />
<meta name="description" content="IIT Mandi, Kamand Campus, Mandi, Himachal Pradesh" />
<meta name="description" content="IIT, India" />
    <meta property="og:image" content="http://pratik.acslab.org/og.JPG" />
<meta property="og:url" content="http://pratik.acslab.org/" />
<meta property="og:title" content="Interactive Landslide Simulator" />
<meta property="og:description" content="This game is part of a research study conducted by Dr. Varun Dutt (Asst. Prof. at Indian Institute of Technology, Mandi) and Mr. Pratik Chaturvedi (Ph.D. Student under Dr. Varun Dutt) and has been developed by Akshit Arora (Summer Intern at IIT Mandi, under guidance of Dr. Varun Dutt).
Therefore, this game presents people the right information that must be known to them before they make a decision of how much can they should invest on landslide aversion." />
<meta property="keywords" content="Interactive Landslide Simulator" />
<meta property="keywords" content="IIT Mandi" />
<meta property="og:type" content="game" />
<meta property="keywords" content="Akshit Arora" />
<meta property="og:site_name" content="Interactive Landslide Simulator"/>
<meta name="author" content="Akshit Arora, Pratik Chaturvedi and Varun Dutt" />
<meta name="description" content="Landslide risk perception" />
<meta name="description" content="Interactive Landslide Simulator" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery.min.js"></script>
        <script src="js/highcharts.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="23.png" />
    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <style>
        .container1{
            width:400px;
        }
    </style>
        
    </head>
<body>
    
    <!-- BODY -->
    <br>
    <div class="container-fluid">
            <!--    messages--><div class="row">
            <div class="col-md-8"><div class="jumbotron">
                <div class="row">
                    <!-- day wise message -->
      <?php 
    $day_alert = $_SESSION['day'];
    $scenario_id = $_SESSION['scenario_id'];
    $sqlday = "SELECT image_source FROM message_day WHERE scenario_id='$scenario_id' AND day='$day_alert'";
    $resultday=mysqli_query($conn, $sqlday);    
    if($day_source = mysqli_fetch_array($resultday)) {
        
        echo "<div class='col-sm-6'><embed height='200' width='100%' src='";
        echo $day_source[0];
        echo "'></div>";
    }
    ?><!-- probability wise messages -->
                <?php 
    if($_SESSION['day'] == 1) { 
$_SESSION['p_landslide_array'][0] = 1 - $_SESSION['return_mitigation'] * $_SESSION['d_f_inv'] + $_SESSION['p_rain'];
$lndsld = round($_SESSION['p_landslide_array'][0],2);
$_SESSION['p_landslide_array'][0] = round($_SESSION['p_landslide_array'][0],2);
 } else {$lndsld =  $_SESSION['p_landslide'];} 
    $sqlprob = "SELECT from_prob, to_prob, image_source FROM message_probability WHERE scenario_id='$scenario_id'";
        if($resultprob = mysqli_query($conn, $sqlprob)) {
            
            while($row_prob = mysqli_fetch_array($resultprob,MYSQLI_ASSOC)) {
            $fro = $row_prob["from_prob"];
            $to = $row_prob["to_prob"];
            $prob_source = $row_prob["image_source"];
                if($lndsld <= $to && $lndsld >= $fro)
                { echo "<div class='col-sm-6'><embed height='200' width='100%' src='";
        echo $prob_source;
                 echo "'></div>";}
            }

        }
                    ?></div>
                
                    <div class="row">
                        <!-- INVESTMENT FORM -->
                <form role="form" id="form2" name="form2" method="post" onsubmit='return check()' action="process.php?id=<?php echo $cryptid; ?>&decision=true">
                <div class="form-group">
                <div class=container1>    
                <label><h3>Your Investment for landslides for day <?php echo $_SESSION['day'];?> (between 0.0 and <?php $abd = floor($_SESSION['daily_income'] * 10)/10 ; echo $abd; ?>):</h3></label>
                <input type="number" class="form-control" id="invest" name="invest" step="0.1"  min=0.0 max=<?php echo $abd; ?> required> <?php echo 'For no investment, please enter 0.0' ;?>
                    </div></div>
                <div class="form-group">
                <input type="submit" value="Invest" class="btn btn-md btn-primary">
                        <!--HELP MODAL BUTTON -->
                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal" >Help</button>
                </div>
                    </form>
                <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Help</h4>
      </div>
      <div class="modal-body">
<p>On the right hand side, the table indicates values of various game parameters.</p>
        <p>Below this panel there are 3 graphs indicating the probability of landslide, your income and property wealth as you play.</p>
<p>Please enter your investment value in the text box above.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div><!--MODAL END -->
                    </div>
                </div>
                </div>
        <!-- Game Parameters -->        
        <div class="col-md-4"> <div class="well">
                <h4 class="text-center">Game Parameters</h4>
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tr class="info">
                        <th>Day</th>
                        <th><?php echo $_SESSION['day'] ; ?></th>
                    </tr>
                    <tr class="info">
                        <th>Income available for investment today (M)</th>
                        <th><?php $income = floor($_SESSION['daily_income'] * 10) / 10 ; echo $income;
                            ?></th>
                    </tr>
         <!--          <tr class="info">
                        <th>Yesterday's investment (Y)</th>
                        <th><?php// if($_SESSION['day'] == 1) {echo '-';} //else //{echo round($_SESSION['invest'],1)//;} ?></th>
</tr>-->
                    <!--<tr class="info">
                        <th>Remaining income (M - Y)</th>
                        <th><?php //if($_SESSION['day'] == 1) {echo '-';} else {$remaining =// $_SESSION['daily_income'] - $_SESSION['invest'];
                                                //                              echo round($remaining,1);} ?></th>
</tr>
-->
<tr class="info">
                        <th>Total income not invested in landslides (NTM)</th>
                        <th><?php if($_SESSION['day'] == 1) {$abd = " -"; echo $abd; $_SESSION['income_not_invested'][0] = 0;}
 else {$unqid = $_SESSION['uid']; $ntm = 0;
$sqlntm = "SELECT daily_income-invest from game where id='$unqid' AND day >0;";
if ($resultntm = mysqli_query($conn, $sqlntm)) {
    while ($rowntm = mysqli_fetch_array($resultntm, MYSQLI_NUM)) {
        $ntm=$ntm+$rowntm[0];
    }

    echo round($ntm,1);
$_SESSION['income_not_invested'][$_SESSION['day']] = round($ntm,1);
    mysqli_free_result($resultntm);
} else {echo "not found";}

} ?></th>
</tr>
                    <tr  class="info">
                        <th>Property wealth (PW)</th>
                        <th><?php echo round($_SESSION['money_ini'],1); ?></th></tr>

                   <!-- <tr  class="info">
                        <th>Property damage (PD)</th>
                        <th><?php //if($_SESSION['day']==1) {echo '-';}
   // elseif($_SESSION['damage_array']//[$_SESSION['day']]) //{echo round(//$_SESSION['damage_array'][$_SESSION['day']],2);}
                               // else {echo //'0.0';}?></th>
</tr>-->
<tr  class="info">
                        <th>Total damage due to landslides (TD)</th>
                        <th><?php 
if($_SESSION['day'] == 1) {echo "-"; $td=0;}
 else {

$unqid = $_SESSION['uid']; $td = 0;
$sqltd = "SELECT SUM(damage) from game where id='$unqid' AND day >0;";
if ($resulttd = mysqli_query($conn, $sqltd)) {
    $rowtd = mysqli_fetch_array($resulttd, MYSQLI_NUM);
    $td=$td+$rowtd[0] + 292 - floor($_SESSION['daily_income'] * 10) / 10;
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
                        <th><?php if($_SESSION['day'] == 1) {$toll = 1 - $_SESSION['return_mitigation'];$_SESSION['p_invest'] = $toll; echo "-"; 
} else {echo round($_SESSION['p_invest'],2);} ?></th>
                    </tr>
                    <tr  class="info">
                        <th>Probability of landslide due to environmental factors (P(E))</th>
                        <th><?php echo round($_SESSION['p_rain'],2); ?></th></tr>
                    
                    <tr  class="info">
                        <th>Probability weight (W)</th>
                        <th><?php echo $_SESSION['weight_invest']; ?></th></tr>

                    <tr class="info" >
                        <th>Total probability of landslide (W*P(I)+(1-W)*P(E))</th>
                        <th><?php if($_SESSION['day'] == 1) {
                                                             $_SESSION['p_landslide_array'][0] = (1 - $_SESSION['return_mitigation'] * $_SESSION['d_f_inv']) * $_SESSION['weight_invest'] + $_SESSION['p_rain'] * (1 - $_SESSION['weight_invest']);
echo "-";
$_SESSION['p_landslide_array'][0] = round($_SESSION['p_landslide_array'][0],2);
 } else {echo round($_SESSION['p_landslide'],2);} ?></th></tr>
                    
                </table>
                
            </div>
            </div>
        </div>
                    <div class="row">
                        <div class="col-sm-4">
                <div id="container3" style="width:100%; height:400px;"></div></div><div class="col-sm-4">
                        <div id="container4" style="width:100%; height:400px;"></div></div>
                        <div class="col-sm-4">
                        <div id="container1" style="width:100%; height:400px;"></div></div>
                    </div>
            </div>
    
   
    <!-- FOOTER without any links -->
    <?php include 'footer.php';?>
    
</body>
</html>

<?php   }
    ?>
<!-- scripts for charts -->
            <script>
                $(function () { 
    $('#container1').highcharts({
        chart: {
            type: 'line'
        },
            title: {
            text: 'Property wealth'
        },
        xAxis: {
            title: 'Day',
            categories: <?php echo json_encode($_SESSION['daychart']); ?>
        },
        yAxis: {
            title: {
                text: 'Property wealth'
            }
        },credits: {
      enabled: false
  },
        series: [{
            name: '<?php echo ' '; ?>',
            data: <?php echo "[";$count = count($_SESSION['final_money_array']); $j = 0;
    for($j = 0; $j < $count - 1; $j++) {
    echo $_SESSION['final_money_array'][$j];echo",";
    }; echo $_SESSION['final_money_array'][$count - 1]; echo "]";
          
            ?>
        }]
    });
});
            </script>
                    <br>
                    
            <script>
               /* $(function () { 
    $('#container2').highcharts({
        chart: {
            type: 'line'
        },
            title: {
            text: 'Damage'
        },
        xAxis: {
             title: 'Day',
            categories: <php echo json_encode($_SESSION['daychart']); ?>
        },
        yAxis: {
            title: {
                text: 'Damage'
            }
        },
        series: [{
           name: '<?php echo ' '; ?>',
            data: <php echo "[";$count = count($_SESSION['damage_array']); $j = 0;
    for($j = 0; $j < $count - 1; $j++) {
    echo $_SESSION['damage_array'][$j];echo",";
    }; echo $_SESSION['damage_array'][$count - 1]; echo "]";
            ?>
        }]
    });
});
           */ </script>
                    <br>
                    
            <script>
                $(function () { 
    $('#container3').highcharts({
        chart: {
            type: 'line'
        },
            title: {
            text: 'Total probability of landslide'
        },
        xAxis: {
            title: 'Day',
            categories: <?php echo json_encode($_SESSION['daychart']); ?>
        },
        yAxis: {
            title: {
                text: 'Total probability of landslide'
            }
        },credits: {
      enabled: false
  },
        series: [{
            name: '<?php echo ' '; ?>',
            data: <?php echo "[";$count = count($_SESSION['p_landslide_array']); $j = 0;
    for($j = 0; $j < $count - 1; $j++) {
    echo $_SESSION['p_landslide_array'][$j];echo",";
    }; echo $_SESSION['p_landslide_array'][$count - 1]; echo "]";
            ?>
        }]
    });
});
            </script>
<script>
                $(function () { 
    $('#container4').highcharts({
        chart: {
            type: 'line'
        },
            title: {
            text: 'Total income not invested in landslides'
        },
        xAxis: {
            title: 'Day',
            categories: <?php echo json_encode($_SESSION['daychart']); ?>
        },
        yAxis: {
            title: {
                text: 'Total income not invested in landslides'
            }
        },credits: {
      enabled: false
  },
        series: [{
           name: '<?php echo ' '; ?>',
            data: <?php echo "[";$count = count($_SESSION['income_not_invested']); $j = 0;
    for($j = 0; $j < $count - 1; $j++) {
    echo $_SESSION['income_not_invested'][$j];echo",";
    }; echo $_SESSION['income_not_invested'][$count - 1]; echo "]";
            ?>
        }]
    });
});
            </script>