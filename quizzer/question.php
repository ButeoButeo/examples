<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8" />
		<title>Quizzer</title>
		<link rel = "stylesheet" href = "css/style.css" type = "text/css" />
	</head>
	
	<body>
		<header>
			<div class = "container">
			<h1>Quizzer</h1>
			</div>
		</header>
		
		<main>
			<div class = "container">
				<div class = "current">Question 1 of 5</div>
				<p class = "question">
					Which animal is found on the British Pathe logo?
				</p>
				<form method = "post" action = "process.php">
					<ul class = "choices">
						<li><input name = "choice" type = "radio" value = "1" />A cockerel</li>
						<li><input name = "choice" type = "radio" value = "1" />A hen</li>
						<li><input name = "choice" type = "radio" value = "1" />A bullock</li>
						<li><input name = "choice" type = "radio" value = "1" />A crocodile</li>
					</ul>
					<input type = "submit" value = "Submit" />
				</form>
			</div>
		</main>
		
		<footer>
			<div class = "container">
				Copyright &copy; 2015, Andrea's Quizzer
			</div>
		</footer>
	</body>
</html>