<?php

session_start();

// Get payment data
$id = $_GET['id'];
if (!array_key_exists($id, $_SESSION['payments'])) {
    exit('Payment failed. Invalid payment ID');
}

$amount = (int)$_SESSION['payments'][$id];
// Remove payment from authorized payments list
unset($_SESSION['payments'][$id]);

// Actual money transfer
$_SESSION['you']['amount'] -= $amount;
$_SESSION['level1']['amount'] += $amount;

echo "Payment successful. You paid $amount$.";
