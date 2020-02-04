<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['uid'])) {

    header('Location: index.php');
    session_destroy();
    die();
}
?>
<!-- End of game -->
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<style>
    .containerx {
        width: 600px;
    }
</style>

<body>
    <!-- HEADER -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="row">
                <div class=col-md-1> <embed height="50" width="50" src="23.png"></div>
                <div class="col-md-11">
                    <div class="navbar-header">
                        <a class="navbar-brand">Interactive Landslide Simulator</a>
                    </div>
                </div>
            </div>
        </div>
    </nav><br> <br> <br><br>
    <!-- BODY -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="jumbotron">
                    <h1>Congrats!</h1> <br>
                    <h3> You have completed the game successfully.</h3><br><br>
                    <br>
                    <h3>Copy the code, and redeem this code to avail your reward for your participation</h3><br>
                    <?php
                    echo $_SESSION['uid'];
                    echo "<br>";
                    ?>

                    <p>Thank you for your participation.
                        <!--Now, please click the button below to indicate to Academic Prolific that you have completed the study.-->
                    </p>
                    <!--<div class="containerx">  --> <?php //echo "<a href='http://pratik.acslab.org/end_verif.php'><button class='btn btn-info btn-lg' style=\"position:'relative';left:'25%'\">Click here</button></a>";//
                                                        ?>
                    <!--</div>-->
                    <br>

                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include 'footer.php'; ?>
</body>

</html>