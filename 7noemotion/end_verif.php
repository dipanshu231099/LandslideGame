<?php
session_start();

if(!isset($_SESSION['uid'])) {

header('Location: http://pratik.acslab.org/index.php');
session_destroy();
   die();
                              
}
$uid = $_SESSION['uid'];
$t_span = $_SESSION['time_span']; 
$conn = new mysqli("localhost", "acs_de_gam", "acslab","acs_draft");
$sql = "SELECT * FROM game WHERE id='".$uid."' AND day=".$t_span.";";
if(mysqli_query($conn,$sql)) {

header('Location: https://prolificacademic.co.uk/submissions/567ff475c5767f00051c7e40/complete?cc=S5F51ZWY');
session_destroy();
   die();
} else {
echo "You haven't completed the game yet. Please complete the game first! <a href='http://pratik.acslab.org/game.php'>Click here to get back to the game</a>.";
}
?>