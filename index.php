<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Great Number Game</title>
	<style type="text/css">
		h1, p, form {
			text-align: center;
		}
		#message> .right, .wrong {
			margin: 20px 600px;
			padding: 50px 0px;
			font-size: 24pt;
		}
		.right {
			background-color: green;
		}
		.wrong {
			background-color: red;
		}
	</style>
</head>
<body>
	<h1>Welcome to the Great Number Game!</h1>
	<p>I am thinking of a number between 1 and 100</p>
	<p>Take a guess!</p>
	<div id="message">
		<?php

		if(isset($_SESSION['msg'])) {
			if($_SESSION['msg'] == 'right') {
				echo '<p class="right">' . $_SESSION['number'] . " was the number!" . '</p>';
			} else if ($_SESSION['msg'] == 'low') {
				echo '<p class="wrong">Too low!</p>';
			} else if ($_SESSION['msg'] == 'high') {
				echo '<p class="wrong">Too high!</p>';
			}
		}
		?>
	</div>
		<?php
			if(!isset($_SESSION['msg'])) { ?>
				<form action="process.php" method="post">
					<input type="text" name="guess"><br>
					<input type="submit" value="Guess">
				</form>
			<?php } else {
				if ($_SESSION['msg'] == 'right') { ?>
					<form action="process.php" method="post">
						<input type="hidden" name="reset">
						<input type="submit" value="Play Again!">
					</form>
				<?php } else { ?>
						<form action="process.php" method="post">
							<input type="text" name="guess"><br>
							<input type="submit" value="Guess">
						</form>
				<?php }
			}
		?>
</body>
</html>
