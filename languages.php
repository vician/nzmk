<?php

if(isset($_GET['lang'])) {
	$lang = $_GET['lang'];
} else {
	if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	} else $lang = 'en';
}

require_once("strings.php");

$translates = array(
	'en' => $en, // English is default
	'cs' => $cs,
);

function tr($string) {
	global $lang, $translates;
	if($lang == "review") {
		global $language_strings;
		if(!isset($language_strings[$string]))
			array_push($language_strings,$string);
	}

	if(isset($translates[$lang])) {
		$tr = $translates[$lang];
		if(isset($tr[$string])) {
			echo $tr[$string];
		} else echo $string;
	} else echo $string;
}

function language_review() {
	global $translates,$language_strings;
	sort($language_strings);

	echo "<div align='center' id='languages'>";
	echo "<h1>";
	tr("Strings for translation");
	echo "</h1>";
	echo "<table border=\"1\">";
	echo "<tr>";
	foreach ($translates as $lang => $strings) {
		echo "<th>".$lang."</th>";
	}
	foreach (array_unique($language_strings) as $string) {
		if($string == "") continue;
		if(is_numeric($string)) continue;
		if(in_array($string,array("st","nd","rd","th"))) continue;
		echo "</tr>";
		echo "<td>".$string,"</td>";
		foreach ($translates as $lang => $strings) {
			if($lang != "en") {
				echo "<td";
				if ($strings[$string] == "") echo " style=\"background: orange;\"";
				echo ">".$strings[$string]."</td>";
			}
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "<h1>";
	tr("Not used strings");
	echo "</h1>";
	echo "<table border=\"1\">";
	foreach ($translates as $lang => $strings) {
		if($lang == "en") continue;
		echo "<th>en</th>";
		echo "<th>".$lang."</th>";
		foreach ($strings as $origin => $string) {
			if(in_array($origin,$language_strings)) continue;
			echo "<tr>";
			echo "<td>".$origin."</td>";
			echo "<td>".$string."</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "</div>";
	echo "<h1>";
	tr("PHP export");
	echo "</h1>";
	echo "<textarea rows=\"".count($language_strings)."\" cols=\"120\">";
	foreach ($translates as $lang => $strings) {
		if ($lang == "en") continue;
		echo "\$$lang = array(\n";
		foreach (array_unique($language_strings) as $string) {
			if($string == "") continue;
			if(is_numeric($string)) continue;
			if(in_array($string,array("st","nd","rd","th"))) continue;
			echo "\t\"".$string,"\" => \"";
			if(isset($strings[$string])) echo $strings[$string];
			echo "\",\n";
		}
		echo ");";
	}
	echo "</textarea>";
}

?>
