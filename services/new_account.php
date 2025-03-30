<?php

session_start();

header("Refresh:2; url=/index.php");

echo "Setting up an account for you and resetting your payments.<br/>";


$_SESSION['you']['amount'] = 100;
echo "You now have {$_SESSION['you']['amount']}$.<br/>";
$_SESSION['level1']['amount'] = 0;
echo "Your friend now has {$_SESSION['level1']['amount']}$.<br/>";

$_SESSION['payments'] = array();

echo "Redirecting to your home page...";
