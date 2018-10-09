<?php
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
} else $lang = 'en';
include('./languages.php');

$expire = 60*60*24*365;
if(!isset($_COOKIE["count"])) {
	setcookie("count",1,time()+$expire);
	$status = "First";
	$count = "";
} else {
	$count = $_COOKIE["count"];
	$count++;
	setcookie("count",$count,time()+$expire);
	$last = substr($count,-1);
	switch($count) {
		case "1":
			$count = "";
			$status = "First";
			break;
		case "2":
			$count = "";
			$status = "Second";
			break;
		case "3":
			$count = "";
			$status = "Third";
			break;
		case "11":
		case "12":
		case "13":
			$status = "th";
			break;
		default:
			switch($last) {
				case "1":
					$status = "st";
					break;
				case "2":
					$status = "nd";
					break;
				case "3":
					$status = "rd";
					break;
				default:
					$status = "th";
					break;
			}
		break;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#222">

	<title><?php tr("I didn't lock my computer again!"); ?> | nzmk.cz</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php tr('Toggle navigation'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">nzmk.cz</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
						<a href="#why"><?php tr('Why'); ?></a>
                    </li>
                    <li>
						<a href="#how"><?php tr('How to use'); ?></a>
                    </li>
                    <li>
						<a href="#about"><?php tr('About'); ?></a>
					</li>
<?php
foreach ($translates as $translate_language => $strings) {
	if($lang != $translate_language) {
		echo "<li><a href=\"?lang=".$translate_language."\"><img src=\"./img/".$translate_language.".png\" alt=\"".$translate_language."\"></a></li>";
	}
}
?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
				<h1><?php tr("I didn't lock my computer again!"); ?></h1>
				<h2><?php tr($count);tr($status); ?> <?php tr('hit'); ?>!</h2>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" id="why">
            <img class="featurette-image img-circle img-responsive pull-right" src="./img/keys.jpg">
			<h2 class="featurette-heading"><?php tr('Why'); ?>
				<span class="text-muted"><?php tr('should I lock my computer?'); ?></span>
			</h2>
			<p class="lead"><?php tr(''); ?></p>
        </div>

        <hr class="featurette-divider">

        <!-- Second Featurette -->
        <div class="featurette" id="how">
            <img class="featurette-image img-circle img-responsive pull-left" src="./img/baby.png">
			<h2 class="featurette-heading"><?php tr('How to use'); ?>
				<span class="text-muted"><?php tr('this page?'); ?></span>
				</h2>
			<p class="lead"><?php tr(''); ?></p>
        </div>

        <hr class="featurette-divider">

        <!-- Third Featurette -->
        <div class="featurette" id="about">
            <img class="featurette-image img-circle img-responsive pull-right" src="./img/mit.png">
			<h2 class="featurette-heading"><?php tr('About'); ?>
				<span class="text-muted"><?php tr('and contact'); ?></span>
            </h2>
			<p class="lead"><?php tr("We would like to teach people to lock their computers while they are away and improve security."); ?></p>
			<ul>
				<li><?php tr("Authors"); ?>: <a href="https://lat.sk">Radek Lát</a> <?php tr("and"); ?> <a href="https://www.vician.cz">Martin Vicián</a>
				<li><?php tr("Code released under the"); ?> <a href="https://gitlab.com/vician/nzmk/blob/master/LICENSE">MIT</a> <?php tr("license"); ?></li>
				<li><?php tr("Source code"); ?>: <a href="https://gitlab.com/vician/nzmk/">https://gitlab.com/vician/nzmk</a></li>
				<li><?php tr("Theme"); ?>: <a href="https://startbootstrap.com/template-overviews/bare/">https://startbootstrap.com/template-overviews/bare/</a></li>
				<li>Contact us: <a href="mailto:&#x69;&#x6E;&#x66;&#x6F;&#x40;&#x76;&#x69;&#x63;&#x69;&#x61;&#x6E;&#x2E;&#x63;&#x7A;">&#x69;&#x6E;&#x66;&#x6F;&#x40;&#x76;&#x69;&#x63;&#x69;&#x61;&#x6E;&#x2E;&#x63;&#x7A;</a></li>
			</ul>
			<p class="lead"><?php tr("Contribute"); ?>:</p>
			<ul>
				<li><?php tr("Use and show your friends and colleagues."); ?></li>
				<li><a href="?lang=review#languages"><?php tr("Translate this page to your language."); ?></a></li>
			</ul>
        </div>

        <hr class="featurette-divider">

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
					<p>Copyright &copy; <?php echo date("Y"); ?> <?php tr("Code released under the"); ?> <a href="https://gitlab.com/vician/nzmk/blob/master/LICENSE">MIT</a> <?php tr("license"); ?>.</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

<?php if ($lang == "review") language_review(); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<Script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-73656343-4', 'auto');
	  ga('send', 'pageview');

	</script>
</body>

</html>
