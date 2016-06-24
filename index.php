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
?><!doctype html>

<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="theme-color" content="#51ae4a">
    <style>
    .centered {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -60%);
        text-align: center;
    }
    </style>
</head>

<body>
    <h1 class="centered" style="font-size: 500%;"><?php echo "$message"; ?></h1>
</body>
</html>
