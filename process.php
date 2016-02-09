<?php

session_start();

	if(!isset($_SESSION['number'])) {
		$_SESSION['number'] = rand(1, 100);
	}

	if(isset($_POST['guess'])) {
		if ($_POST['guess'] == $_SESSION['number']) {
			$_SESSION['msg'] = 'right';
		} else if ($_POST['guess'] < $_SESSION['number']) {
			$_SESSION['msg'] = 'low';
		} else if ($_POST['guess'] > $_SESSION['number']) {
			$_SESSION['msg'] = 'high';
		}
	}

	if(isset($_POST['reset'])) {
		session_destroy();
	}
	
header('location:index.php');

?>