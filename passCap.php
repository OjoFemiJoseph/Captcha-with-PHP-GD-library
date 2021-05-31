<?php

session_start();
?>

<!-- takes user input for captcha -->
<form method='post'>
	<img src="captcha.php">
	<p>
		Enter the characters correctly
	</p>
	<input type="text" name="cap">
	<input type="submit" name="submit" value="submit">
</form>





<?php


#compare user captcha input with the correct one (stored in the session)
if (isset($_POST['submit'])){
	if ($_POST['cap']==$_SESSION['capt']){

		#redirects to the vote which will input the vote into the datbase
		#header("location: vote.php");
		echo "<script>alert('Correct Captcha Code')</script>";

	}else{
		#informs the user about the wrong captcha entered
		echo "<script>alert('Incorrect Captcha Code')</script>";
	}
	}
?>