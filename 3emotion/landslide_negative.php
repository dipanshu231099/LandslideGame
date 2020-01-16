<!-- Game page when landslide does not occur -->
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php';session_start();unset($_SESSION['process']); ?>
<body>
    <!--HEADER, no header needed -->
    
    <!-- BODY -->
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron">
                <h2 class="text-center"><i class="fa fa-smile-o"></i> Landslide did not Occur!</h2>
                
                <p>Thus, your income stays at <strong><?php echo round($_SESSION['daily_income'],1);?></strong>.</p>
            
                <p>Thus, your property wealth stays at <strong><?php echo $_SESSION['final_money_array'][$_SESSION['day']-1] ;?></strong>.</p>
                <p>Your total wealth is <strong><?php echo round($_SESSION['final_money'],1); ?></strong>.</p>
            <br>
                <?php if($_SESSION['day']-1 == $_SESSION['time_span']) {echo "<a href='end.php'><button class='btn btn-warning'>Return To Game</button></a>";} else { echo "<a href='game.php'><button class='btn btn-warning'>Return To Game</button></a>"; } ?><br><br>
                
                </div>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>