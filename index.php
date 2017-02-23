<?php
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($lang){
    case "cs":
        $message = "Zase jsem si nezamkla počítač!";
        break;
    case "en":
        $message = "I didn't lock my computer again!";
        break;        
    default:
        $message = "I didn't lock my computer again!";
        break;
}

$expire = 60*60*24*365;
if(!isset($_COOKIE["count"])) {
	setcookie("count",1,time()+$expire);
	$status = "First";
	$count = 1;
} else {
	$count = $_COOKIE["count"];
	$count++;
	setcookie("count",$count,time()+$expire);
	$last = substr($count,-1);
	switch($count) {
		case "1":
			$status = "First";
			break;
		case "2":
			$status = "Second";
			break;
		case "3":
			$status = "Third";
			break;
		case "11":
		case "12":
		case "13":
			$status = $count."th";
			break;
		default:
			$status .= $count;
			switch($last) {
				case "1":
					$status .= "st";
					break;
				case "2":
					$status .= "nd";
					break;
				case "3":
					$status .= "rd";
					break;
				default:
					$status .= "th";
					break;
			}
		break;
	}
}

// Pastel colors by http://colors.findthedata.com/saved_search/Pastel-Colors
// Except: #C23B22
$backgrounds = array( "#F49AC2", "#CB99C9", "#FFD1DC", "#DEA5A4", "#AEC6CF", "#77DD77", "#CFCFC4", "#B39EB5", "#FFB347", "#B19CD9", "#FF6961", "#03C03C", "#FDFD96", "#836953", "#779ECB", "#966FD6" );
$background = $count % count($backgrounds);
?>
<!doctype html>

<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="theme-color" content="<?php echo $backgrounds[$background]; ?>">
		<style>
		html {
				background-color: <?php echo $backgrounds[$background]; ?>
		}

    .centered {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -60%);
        text-align: center;
		}
		.bottom {
				position: fixed;
				bottom: 1%;
				right: 1%;
				text-align: right;
				color: DimGray;
		}
		.bottom a {
				color: DimGray;
				text-decoration: underline;
		}

		.status {
				position: fixed;
				bottom: 1%;
				left: 1%;
				text-align: left;
				color: black;
				font-weight: bold;
		}

		.hostname {
			position: fixed;
			top: 1%;
			right: 1%;
			text-align: right;
			color: DimGray;
		}
		.hostname a {
				color: DimGray;
				text-decoration: none;
		}
		.hostname a:hover {
				color: DimGray;
				text-decoration: underline;
		}
    </style>
</head>

<body>
		<h1 class="centered" style="font-size: 500%;"><?php echo "$message"; ?></h1>
		<div class="status"><?php echo $status; ?> hit!</div>
		<div class="bottom"><a href="https://github.com/vician/nzmk.cz">Fork me on Github.</a> Created by <a href="https://www.vician.cz">Vician</a> and <a href="https://lat.sk">Lat</a>.</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73656343-4', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
