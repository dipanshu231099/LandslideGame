<!-- Game page when landslide occurs -->
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php';session_start();unset($_SESSION['process']); ?>
<body>
    <!--HEADER, no header needed -->
    
    <!-- BODY -->
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron">
                <h2 class="text-center"><i class="fa fa-exclamation-triangle"></i> Landslide Occurred!</h2>
                <!--SAD MESSAGE START -->
                <br><br>
                <p>You made <strong><?php echo  $_SESSION['invest'];?></strong> investment.</p>
                <?php
                if($_SESSION['message_fatality'])
                {
                    echo "<p>Sorry, a wage-earner of your family got buried under the debris of the mudslide. Thus, your daily income was affected and decreased to "; echo "<strong>"; echo round($_SESSION['daily_income'],1); echo "</strong>.</p>";
                }
else {echo "<p>Fortunately, no one in your family died.</p>";echo "<p>Thus, your daily income was not affected and stays at the same value.</p>";}
                if($_SESSION['message_injury'])
                {
                    echo "<p>Sorry, a wage-earner of your family got injured in a car accident while traveling with a friend. Thus, your daily income was affected and decreased to "; echo "<strong>"; echo round($_SESSION['daily_income'],1); echo "</strong>.</p>";
                }
else {echo "<p>Fortunately, no one in your family was injured.</p>"; echo "<p>Thus, your daily income was not affected and stays at the same value.</p>";
}   ?>
                

            <?php    if($_SESSION['message_property'])
                {
                    echo "<p>Sorry, your house was destroyed by the debris. Total damage occurred is "; echo "<strong>"; echo round($_SESSION['dmg_property'],1); echo "</strong>.</p>";
             ?>
<p>Thus, your property wealth is <strong><?php echo round($_SESSION['final_money_array'][$_SESSION['day']-1],1) ;?></strong>.</p>
 <?php  }
else {echo "<p>Fortunately, none of your property was harmed.</p>";
echo "<p>Thus, your property wealth was not affected and stays at the same value.</p>";
}
                ?>
                
                <p>Your total wealth is <strong><?php echo round($_SESSION['final_money'],1); ?></strong>.</p>
            <br>
                <?php if($_SESSION['day']-1 == $_SESSION['time_span']) {echo "<a href='end.php'><button class='btn btn-warning'>Return To Game</button></a>";} else { echo "<a href='game.php'><button class='btn btn-warning'>Return To Game</button></a>"; } ?><br><br>
                <div class="row">
                <?php
                //code for images to be displayed
 $conn1 = new mysqli("localhost", "acs_de_gam", "acslab","acs_draft");
$scenario_id = $_SESSION['scenario_id'];
if($_SESSION['message_fatality']) {
$sqldth = "SELECT image_source FROM death_images WHERE scenario_id='$scenario_id'";
    if($resultdth = mysqli_query($conn1,$sqldth)){
        
       $i = 0; while($rowdth=mysqli_fetch_array($resultdth,MYSQLI_NUM))
        {
            $rowdth1[$i] = $rowdth[0];$i++;
        }
        $random_keys_dth = array_rand($rowdth1);
        $dth_img_src = $rowdth1[$random_keys_dth];
        
        echo "<div class='col-md-4'><embed height='400' width='100%' src='";echo $dth_img_src; echo "'></div>";
    }
}
if($_SESSION['message_injury']){
    $sqlinj = "SELECT image_source FROM injury_images WHERE scenario_id='$scenario_id'";
    if($resultinj = mysqli_query($conn1,$sqlinj)){
        $i =0 ;
        while($rowinj=mysqli_fetch_array($resultinj,MYSQLI_NUM)) {
            $rowinj1[$i] = $rowinj[0];$i++;
        }
        $random_keys_inj = array_rand($rowinj1);
        $inj_img_src = $rowinj1[$random_keys_inj];
        
        echo "<div class='col-md-4'><embed height='400' width='100%' src='";echo $inj_img_src; echo "'></div>";
    }
}
if($_SESSION['message_property']){
    $sqlprop = "SELECT image_source FROM property_images WHERE scenario_id='$scenario_id'";
    if($resultprop = mysqli_query($conn1,$sqlprop)){
        $i=0;
        while($rowprop=mysqli_fetch_array($resultprop,MYSQLI_NUM)) {
            $rowprop1[$i] = $rowprop[0];$i++;
        }
        
        $random_keys_prop = array_rand($rowprop1);
        $prop_img_src = $rowprop1[$random_keys_prop];
        
        echo "<div class='col-md-4'><embed height='400' width='100%' src='";echo $prop_img_src; echo "'></div>";
    }
}               
                mysqli_close($conn1);
                ?><br><br>
            </div>
                </div>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>