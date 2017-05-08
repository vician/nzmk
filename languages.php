<?php

if(isset($_GET['lang'])) {
	$lang = $_GET['lang'];
} else $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$language_strings = array("");
$cs = array(
	"Why" => "Proč",
	"How to use" => "Jak používat",
	"About" => "O nás",
	"and contact" => "a kontakt",
	"I didn't lock my computer again!" => "Zase jsem si nezamkl(a) počítač!",
	"hit" => "zásah",
	"should I lock my computer?" => "bych si měl(a) zamykat počítač?",
	"Code released under the" => "Zdrojový kód zvěřejněn pod",
	"license" => "licencí",
	// numbers
	"First" => "První",
	"Second" => "Druhý",
	"Third" => "Třetí",
	"st" => "",
	"nd" => "",
	"rd" => "",
	"th" => "",
);

$translates = array(
	'en' => $en, // English is default
	'cs' => $cs,
);

function tr($string) {
	global $lang, $translates;
	if($lang == "review") {
		global $language_strings;
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

	echo "<div align='center' id='languages'>";
	echo "<h1>";
	tr("Strings for translation");
	echo "</h1>";
	echo "<table border=\"1\">";
	echo "<tr>";
	foreach ($translates as $lang => $strings) {
		echo "<th>".$lang."</th>";
	}
	foreach ($language_strings as $string) {
		if($string == "") continue;
		echo "</tr>";
		echo "<td>".$string,"</td>";
		foreach ($translates as $lang => $strings) {
			if($lang != "en") {
				echo "<td>".$strings[$string]."</td>";
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
}

?>
