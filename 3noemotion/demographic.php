<!-- capturing demographic information -->
<?php error_reporting(0);session_start();

if (!isset($_GET['id']) && empty($_GET['id'])) { ?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
<body>
    <div class="container">
    <h1>OOPS!</h1><br> <h3>Please go <a href="index2.php">here</a> first</h3>
    </div>
</body>
</html>

<?php   }
elseif (!isset($_GET['connect']) && empty($_GET['connect'])) {
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    
<body>
    <div class="container">
    <h1>OOPS!</h1><br> <h3>Please go <a href="connect.php">here</a> first</h3>
    </div>
</body>
</html>

<?php }
                                                              elseif(empty($_SESSION['consent'])) {
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
<body>
    <div class="alert alert-danger">
    <h1>OOPS!</h1><br> <h3>Session Destroyed!</h3><h3>Please click <a href="index.php">here</a></h3>.
    </div>
</body>
</html>

<?php                                               }
else { 

?>
<!-- head files included -->
<?php include 'head.php' ?>
<style>
        .containerx{
            width:100px;
        }
    </style>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Logo --><div class="row"> <div class=col-md-1> <embed height="50" width="50" src="23.png"></div> <div class="col-md-11">
            <div class="navbar-header">
                <a class="navbar-brand kalam">Interactive Landslide Simulator</a>
            </div>
        </div></div>
    </nav><br><br><br>
    <!--main body here -->
    <div class="container"> <div class="jumbotron">
        <h1 class="text-center">Demographic Profile<br></h1>
        <p class="text-justify">Please provide the following demographic information.  Your anonymity will be preserved throughout this study. The information you provide will be used for research purposes only. </p>
        
        
    <form role="form" method="POST" id="form1" name="form1"  action="instruction.php?id=<?= isset($_GET['id']) ? $_GET['id'] : '' ?>&connect=true&demo=true">
        
    <?php $_SESSION['name'] = 'Guest';?>
    <div class="form-group containerx">
        <label>Age:</label>
        <input type="number" class="form-control" id="age" name="age" max=100 min=<?php echo $_SESSION['age_restriction'];?> required>
    </div>
    <div class="form-group">
        <label>Gender:</label>
    <div class="radio">
        <label><input type="radio" name="gender" value="M" required>Male</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="gender" value="F">Female</label>
    </div>
    </div>

    <div class="form-group">
        <label>Highest education level attained:</label>
    <div class="radio">
        <label><input type="radio" name="ed" value="High_School" required>High School</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="ed" value="Intermediate">Intermediate</label>
    </div><div class="radio">
        <label><input type="radio" name="ed" value="Undergraduate">Undergraduate (B.A., B.Sc., B.Com., B.E., B.Tech.) or equivalent
        </label>
    </div>
        <div class="radio">
        <label><input type="radio" name="ed" value="Masters">Masters or equivalent</label>
    </div>
        <div class="radio">
        <label><input type="radio" name="ed" value="phd">Ph.D. or equivalent</label>
    </div>
        <div class="radio">
        <label><input type="radio" name="ed" value="Other">Other</label>
    </div>
    </div>

    <div class="form-group">
        <label>Major / Specialization:</label>
        <input type="text" class="form-control" id="major" name="major" required>
    </div>

    <div class="form-group">
        <label>Occupation (If retired, state Retired and specify former occupation):</label>
        <input type="text" class="form-control" id="occ" name="occ" required>
        </div>

    <div class="form-group">
        <label>E-Mail ID (strictly for payment purposes):</label><br>
        <input id='email' type="email" class="form-control" name="email" required>
    </div>

        <div class="form-group">
        <label>The city/town to which you belong to:</label>
        <input type="text" class="form-control" id="city" name="city" required>
    </div>
       
<div class="form-group">
        <label>Do you currently live at the city/town where you belong to? </label>
    <div class="radio">
        <label><input type="radio" name="live" value="yes" required>Yes</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="live" value="no">No</label>
    </div>
    </div>

<div class="form-group">
        <label>If you marked “No” above, then mention the city/town where you currently live:</label>
        <input type="text" class="form-control" id="liveno" name="liveno" value="fill-in" required>
    </div>

<div class="form-group">
        <label>How long have you lived in city/town where you currently reside?</label>
    <div class="radio">
        <label><input type="radio" name="livelong" value="Less than one year" required>Less than one year</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="livelong" value="1-5 Years">1-5 Years</label>
    </div>
<div class="radio">
        <label><input type="radio" name="livelong" value="5-10 Years">5-10 Years</label>
    </div>
<div class="radio">
        <label><input type="radio" name="livelong" value="10-15 Years">10-15 Years</label>
    </div>
<div class="radio">
        <label><input type="radio" name="livelong" value="15+ Years">15+ Years</label>
    </div>
    </div>

<!--<div class="form-group">
        <label>The reason(s) for living in your current place of residence include: </label>
    <div class="radio">
        <label><input type="radio" name="livereason" value="Was born here" required>Was born here</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="livereason" value="Because of marriage">Because of marriage</label>
    </div>
<div class="radio">
        <label><input type="radio" name="livereason" value="Because of work">Because of work</label>
    </div>
<div class="radio">
        <label><input type="radio" name="livereason" value="Like to stay in mountainous areas">Like to stay in mountainous areas</label>
    </div>
<div class="radio">
        <label><input type="radio" name="livereason" value="Other">Other</label>
    </div>
    </div>

<div class="form-group">
        <label>If you marked “Other” above:</label>
        <input type="text" class="form-control" id="livereasonother" name="livereasonother">
    </div>
-->
<input type="hidden" name="livereason" value="NULL">

<div class="form-group">
        <label>Type of dwelling for your household: </label>
    <div class="radio">
        <label><input type="radio" name="dwell" value="Informal Building" required>Informal Building (e.g. Wood and wattle walls, grass thatched roof)</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="dwell" value="Formal Building">Formal Building (e.g. Brick walls, tiles/iron sheet roof)</label>
    </div>
<div class="radio">
        <label><input type="radio" name="dwell" value="Other">Other</label>
    </div>
    </div>

<div class="form-group">
        <label for=xyz>If you marked “Other” above, please specify:</label>
        <input id=xyz type="text" class="form-control" id="dwellother" name="dwellother" value="fill-in" required>
    </div>

<div class="form-group">
        <label>Your household size:</label>
    <div class="radio">
        <label><input type="radio" name="household" value="1 member only" required>1 member only</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="household" value="1-3 members">1-3 members</label>
    </div>
<div class="radio">
        <label><input type="radio" name="household" value="3-6 members">3-6 members</label>
    </div>
<div class="radio">
        <label><input type="radio" name="household" value="6-9 members">6-9 members</label>
    </div>
<div class="radio">
        <label><input type="radio" name="household" value="9 + members">9 + members</label>
    </div>
    </div>

<!--<div class="form-group">
        <label>Ownership status of the housing structure:</label>
    <div class="radio">
        <label><input type="radio" name="owner" value="own" required>Own House</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="owner" value="rented">Rented House</label>
    </div>
<div class="radio">
        <label><input type="radio" name="owner" value="Other">Other</label>
    </div>
    </div>

<div class="form-group">
        <label>If you marked “Other” above</label>
        <input type="text" class="form-control" id="ownerother" name="ownerother">
    </div> -->
<input type="hidden" name="owner" value="NULL">

<div class="form-group">
        <label>What is your major source of income for the household?</label>
    <div class="radio">
        <label><input type="radio" name="source" value="Homemaker" required>Homemaker</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="source" value="Business (e.g., Shop)">Business (e.g., Shop)</label>
    </div>
<div class="radio">
        <label><input type="radio" name="source" value="Government Job">Government Job</label>
    </div>
<div class="radio">
        <label><input type="radio" name="source" value="Retired and getting pension">Retired and getting pension</label>
    </div>
<div class="radio">
        <label><input type="radio" name="source" value="Other">Other</label>
    </div>
    </div>

<div class="form-group">
        <label>If you marked “Other” above, please specify:</label>
        <input type="text" class="form-control" id="sourceother" name="sourceother" value="fill-in" required>
    </div>

<div class="form-group">
        <label>What is the approximate range of the household income in INR per month? (This information will be kept confidential and it will be used strictly for research purposes)</label>
<div class="radio">
        <label><input type="radio" name="income" value="less than 5,000" required>less than 5,000</label>
    </div>
<div class="radio">
        <label><input type="radio" name="income" value="5,000 - 25,000">5,000 - 25,000</label>
    </div>
<div class="radio">
        <label><input type="radio" name="income" value="25,000 - 50,000">25,000 - 50,000</label>
    </div>
<div class="radio">
        <label><input type="radio" name="income" value="50,000 - 75,000">50,000 - 75,000</label>
    </div>
<div class="radio">
        <label><input type="radio" name="income" value="75,000 - 1,00,000">75,000 - 1,00,000</label>
    </div>
<div class="radio">
        <label><input type="radio" name="income" value="More than 1,00,000">More than 1,00,000</label>
    </div>
</div>

<div class="form-group">
        <label>Please describe your knowledge level about landslides:</label>




<div class="radio">
        <label><input type="radio" name="know" value="No idea">No idea</label>
    </div>

<div class="radio">
        <label><input type="radio" name="know" value="Little understanding">Little understanding</label>
    </div>

<div class="radio">
        <label><input type="radio" name="know" value="Basic understanding">Basic understanding</label>
    </div>
<div class="radio">
        <label><input type="radio" name="know" value="Knowledgeable">Knowledgeable</label>
    </div>
<div class="radio">
        <label><input type="radio" name="know" value="Highly Knowledgeable" required>Highly Knowledgeable</label>
    </div>


        <button type='submit' id='validate' class="btn btn-primary btn-lg" name="Submit">Submit</button>
</form>
    </div>
    <script>
        function validateEmail(email) { 
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);}
            
            function validate(){
            var email = $("#email").val();
            if (validateEmail(email)) {
            return true;
            } else {
            return false;
            }
            }
        function validate2() { 
            var t = validate();
           var r = document.forms["form1"]["gender"].value;
        var s = document.forms["form1"]["ed"].value;
            var v = document.forms["form1"]["email"].value;
            if( t == false) { alert("Please enter correct e-mail id!"); return false; }
            else if (r == null || r == "" ||s == null || s == "" ||v == null || v == "") {
                alert("All the fields must be properly answered");
                return false;
                };}// return true;}
        </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65166348-1', 'auto');
  ga('send', 'pageview');

</script>
        </div>
    <?php include 'footer.php' ?>
</body>
</html>
<?php };
    ?>