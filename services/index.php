<?php

session_start();

include 'includes/header.php';

if (isset($_SESSION['you']) && isset($_SESSION['level1'])) {
	echo "<div class='col-md-6'>
		<p>You currently have {$_SESSION['you']['amount']}$ in your account.</p>
		<p>You transferred a total of {$_SESSION['level1']['amount']}$ to Level1.</p><br/>";
	if ($_SESSION['level1']['amount'] >= 300) {
        	header("Location: /home.php");
	        exit;
	}
	echo "</div>";

	echo "<div class='col-md-6'><p>Create a new payment</p>
		<form action='authorize_payment.php' method='GET'>
			<label for='amount' value='Amount'>
			<input type='text' name='amount' placeholder='0'/>
			<input type='submit' class='btn btn-primary'/>
		</form></div>";
} else {
	echo "<div class='col-md'>You currently don't have an account</div>";
}

echo "<div class='col-md'>Go <a href='new_account.php'>here</a> if you want a new account.</div>";

echo "<div class='col-md'>
    <a href='./downloads/services.zip' class='btn btn-secondary' download>Download Code ZIP</a>
</div>";

include 'includes/footer.php';

?>

