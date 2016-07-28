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

// Pastel colors by http://colors.findthedata.com/saved_search/Pastel-Colors
// Except: #C23B22
$backgrounds = array( "#F49AC2", "#CB99C9", "#FFD1DC", "#DEA5A4", "#AEC6CF", "#77DD77", "#CFCFC4", "#B39EB5", "#FFB347", "#B19CD9", "#FF6961", "#03C03C", "#FDFD96", "#836953", "#779ECB", "#966FD6" );
$background = time() % count($backgrounds);

?><!doctype html>

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
    </style>
</head>

<body>
		<h1 class="centered" style="font-size: 500%;"><?php echo "$message"; ?></h1>
		<div class="status">
<?php
$expire = 60*60*24*365;
if(!isset($_COOKIE["count"])) {
	setcookie("count",1,time()+$expire);
	echo "First hit!";
} else {
	$count = $_COOKIE["count"];
	$count++;
	setcookie("count",$count,time()+$expire);
	$last = substr($count,-1);
	switch($count) {
		case "1":
			echo "First";
			break;
		case "2":
			echo "Second";
			break;
		case "3":
			echo "Third";
			break;
		case "11":
		case "12":
		case "13":
			echo $count."th";
			break;
		default:
			echo $count;
			switch($last) {
				case "1":
					echo "st";
					break;
				case "2":
					echo "nd";
					break;
				case "3":
					echo "rd";
					break;
				default:
					echo "th";
					break;
			}
		break;
	}
	echo " hit!";
}
?>
		</div>
		<div class="bottom"><a href="https://github.com/vician/nzmk.cz">Fork me on Github.</a> Created by <a href="https://www.vician.cz">Vician</a> and <a href="https://lat.sk">Lat</a>.</div>
</body>
</html>
