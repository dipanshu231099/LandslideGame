<?php include 'head.php'; 
session_start();?>

<style type="text/css">
        button{
    position:relative;
    left:50%;
}
        .containerx{
            width:100%;
        }
    
</style>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '380473385456177',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65166348-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- BODY STARTS HERE -->
<body>
    <!--HEADER -->
     <nav class="navbar navbar-inverse">
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
                    <li class="active"> <a href="index.php" class="kalam">Home</a> </li>
                    <li> <a href="instruction.php" class="kalam">Instructions</a> </li> 
                    <li> <a href="contact.php" class="kalam">Contact Us</a> </li> 
                </ul>
            </div>
            </div></div></div>
    </nav>
    <!-- BODY -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <iframe id=impress width=100% height="580px"    src ="impress2.html" frameborder="0"></iframe>
            </div>
            <div class="col-lg-5">
                <div class="jumbotron">
                <!-- TEXT STARTS  -->
                    <h2 class="text-center kalam">Interactive Landslide Simulator</h2><br>
                <p>The motivation behind developing this game is to<b> improve the causal understanding of the people about landslides.</b><br>Previous research shows that<b> public’s understanding</b> of <b>causes and consequences of landslide </b>disaster and their landslide risk perception is<b> very different</b> from what it ought to be. <br>
This game is designed to <b>increase public awareness</b> about landslides and <strong>balance risk perceptions</strong>.                    
                </p>
                    <!--BUTTON -->
<div class="container">
                <a href="index2.php"><button type="button" class="btn btn-primary btn-lg">PLAY</button></a>
</div>
                </div>
            </div>
        </div>  
    </div>
    <!--FOOTER -->
    <?php include 'footer.php'; ?>
</body>
</html>
<!-- JAVASCRIPT FOR AUTOMATIC REFRESHING OF frame embedded in the code page -->
<script type = "text/javascript">
    window.onload = function() {   
     setInterval(function refresh() {  
      document.getElementById('impress').contentDocument.location.reload(true);
      }, 5500);
     } 
</script>

<?php
session_destroy();
?>