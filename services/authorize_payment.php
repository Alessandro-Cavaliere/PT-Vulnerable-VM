<?php

session_start();

// The amount of money you currently have on your account
$account = $_SESSION['you']['amount'];
// The amount of money you want to pay
$amount = (int)$_GET['amount'];
if ($amount < 0) { 
	echo "<div style='text-align: center;'>";
    echo "No stealing plz. I'm poor.";
    echo "<br><img src='/assets/sadge.jpeg' style='display: block; margin: auto;'/>";
    echo "</div>";
	exit();}

// Perform payment, but only if you have enough money for it
if ($account - $amount >= 0) {
	// Add payment to authorized payments
	$id = bin2hex(random_bytes(10));
	$_SESSION['payments'][$id] = $amount;
	header("Refresh: 3;url=finalize_payment.php?id=$id");
	echo "Payment authorized with ID $id.<br/>Processing payment authorization...";
} else {
    echo "<div style='text-align: center;'>";
    echo "Payment authorization failed. Not enough money.";
    echo "<br><img src='/assets/memeLevel1.jpeg' style='display: block; margin: auto;'/>";
    echo "</div>";
}
