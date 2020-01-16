<!DOCTYPE html>
<html lang="en">
<head>
    <title>Interactive Landslide Simulator</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024" />

<meta property="og:url" content="http://pratik.acslab.org/" />
<meta property="og:title" content="Interactive Landslide Simulator" />
<meta property="og:description" content="This game is part of a research study conducted by Dr. Varun Dutt (Asst. Prof. at Indian Institute of Technology, Mandi) and Mr. Pratik Chaturvedi (Ph.D. Student under Dr. Varun Dutt) and has been developed by Akshit Arora (Summer Intern at IIT Mandi, under guidance of Dr. Varun Dutt).
Therefore, this game presents people the right information that must be known to them before they make a decision of how much can they should invest on landslide aversion.
The motivation behind developing this game is to improve the causal understanding of the people about landslides.
Previous research shows that public’s understanding of causes and consequences of landslide disaster and their landslide risk perception is very different from what it ought to be. 
This game is designed to increase public awareness about landslides and balance risk perceptions. IIT Mandi, Kamand Campus, Mandi, Himachal Pradesh.
Landslide Simulation. Natural Disaster. Research. IIT Mandi. DRDO. Cognitive Science.
" />
<meta property="fb:admins" content="100005226821550" />
<meta property="keywords" content="Interactive Landslide Simulator, IIT Mandi, Akshit Arora, 
Simulation, Natural Disaster, Research, Cognitive Science, DRDO, Defense Research and Development Organization, 
Landslide Simulation, Landslide, IIT, Indian Institute of Technology Mandi, Indian Institute of Technology, Varun Dutt, Dr. Varun Dutt, 
Pratik Chaturvedi, 2015, Summer Internship, Thapar University, Internship, Computer Science and Engineering, TU, Ph.D., B.E.,
Project, Summer Project, Internship Project, HTML5, game design, gaming, game, edutainment, education, risk perception, PHP, SQL, 
Fun, Entertainment
" />
<meta property="og:type" content="game" />
<meta property="og:image" content="http://pratik.acslab.org/final.JPG" />
<!--async -->
<script type="text/javascript">
  (function() {
    var config = {
      kitId: 'jxd4bhn'
    };
    var d = false;
    var tk = document.createElement('script');
    tk.src = '//use.typekit.net/' + config.kitId + '.js';
    tk.type = 'text/javascript';
    tk.async = 'true';
    tk.onload = tk.onreadystatechange = function() {
      var rs = this.readyState;
      if (d || rs && rs != 'complete' && rs != 'loaded') return;
      d = true;
      try { Typekit.load(config); } catch (e) {}
    };
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(tk, s);
  })();
</script>
<!--<script src="//use.typekit.net/jxd4bhn.js"></script>
<script>try{Typekit.load();}catch(e){}</script>-->
<meta property="og:site_name" content="Interactive Landslide Simulator"/>
<meta name="author" content="Akshit Arora, Pratik Chaturvedi and Varun Dutt" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="msvalidate.01" content="A715CCF7512E918C7F99005F066E26EC" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65166348-1', 'auto');
  ga('send', 'pageview');

</script>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />
    <script src="js/highcharts.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!--<link rel="shortcut icon" href="23.png" />
    <!--<link rel="apple-touch-icon" href="apple-touch-icon.png" />-->
    <link rel="shortcut icon" href="Rounded_Rectangle.png" />
   
    <style>
        .container1{
            width:400px;
        }
    </style>
    <style type="text/css">
        button{
    position:relative;
    left:50%;
}
    </style>
</head>