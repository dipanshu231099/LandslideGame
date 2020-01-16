<!-- contact page -->
     <?php include 'head.php';error_reporting(0); ?>
<body>
    <!--HEADER -->
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
                    <li> <a href="instruction.php" class="kalam">Instructions</a> </li> 
                    <li class="active"> <a href="contact.php" class="kalam">Contact Us</a> </li> 
                </ul>
            </div>
            </div></div></div>
    </nav><br><br><br><br>
    <?php session_start();
if(!empty($_SESSION['akshit']) && $_SESSION['mail'] == true) {
echo "
<div class=\"container-fluid\">
    <div class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><h2><i class='fa fa-paper-plane'></i>
    <strong>Thanks ";echo $_SESSION['akshit'] ;echo "!</strong></h2>. <p>Your message has been delivered.</p>
    </div></div>
";
}
session_destroy();
    ?>
    <div class="container-fluid">
        <div class="jumbotron"><h1 class="text-center"><i class="fa fa-users"></i> The Team</h1></div>
    <div class="row">
        <div class="col-md-4">
    <blockquote>
        <h4 class="kalam">Faculty Advisor:</h4><br>
        <embed src="varun.jpg" height="150" width="150">
        
        <a href="http://faculty.iitmandi.ac.in/~varun/"><h3><b>Dr. Varun Dutt</b></h3></a><br>
    <i class="fa fa-user"></i> Assistant Professor<br>
    <a href="http://www.acslab.org/"><i class="fa fa-plus-square"></i> ACS Lab</a><br>
    <a href="http://www.iitmandi.ac.in"><i class="fa fa-external-link"></i>Indian Institute of Technology, Mandi</a><br>
    <i class="fa fa-map-marker"></i> Himachal Pradesh, India - 175001<br>
    <i class="fa fa-phone"></i> +91 (1905) 267-041<br>
    <i class="fa fa-envelope-o"></i> varun@iitmandi.ac.in<br>
    </blockquote>
        </div><div class="col-md-4">
    <blockquote>
        <h4 class="kalam">Project Associate:</h4><br>
        <embed src="pratik.jpg" height="150" width="150">
        
        <a href="http://www.researchgate.net/profile/Pratik_Chaturvedi"><h3><b>Mr. Pratik Chaturvedi</b></h3></a><br>
    <i class="fa fa-user"></i> Ph.D. Student<br>
    <a href="http://www.acslab.org/"><i class="fa fa-plus-square"></i> ACS Lab</a><br>
        <a href="http://www.iitmandi.ac.in"><i class="fa fa-external-link"></i>Indian Institute of Technology, Mandi</a><br>
    <i class="fa fa-map-marker"></i> Himachal Pradesh, India - 175001<br>
    <i class="fa fa-phone"></i> +91 93 13 131129<br>
    <i class="fa fa-envelope-o"></i> prateek@dtrl.drdo.in<br>
    </blockquote>
        </div><div class="col-md-4">
    <blockquote>
        <h4 class="kalam">Website Developer:</h4><br>
        <embed src="akshit.jpg" height="150" width="150">
        <a href="https://in.linkedin.com/in/akshitarora1995"><h3><b>Akshit Arora</b></h3></a><br>
    <i class="fa fa-user"></i> Undergraduate Student<br>
    <a href="http://www.thapar.edu"><i class="fa fa-plus-square"></i> Computer Science and Engineering<br>
    <i class="fa fa-external-link"></i> Thapar University, Patiala</a><br>
    <i class="fa fa-map-marker"></i> Punjab, India - 147004<br>
    <i class="fa fa-phone"></i> +91 76 96 061995<br>
    <i class="fa fa-envelope-o"></i> akshit.arora1995@gmail.com<br>
    </blockquote>
        </div>
    </div></div>

    <div class="container-fluid">
    <!-- BODY --><div class="jumbotron">
        <h1 class="text-center"><i class="fa fa-paper-plane-o"></i>Contact</h1><br> 
        <form role="form" method="post" action="contact_process.php" id = form1 name="form1">
            <div class="form-group">
        <label>Name:</label>
                <input type="text" class="form-control" id="usr" name="name" required> </div>
            <div class="form-group">
        <label>Email ID:</label>
                <input id='email' type="email" class="form-control" name="email" required> </div>
        <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment" name = body required></textarea>
</div>
            <input type='submit' class="btn btn-primary btn-lg" style="position:relative; left:50%" name="Send" value="Send">
        </form>
    </div></div>
    <!-- FOOTER -->
    
    <?php include 'footer.php';?>
</body>
</html>