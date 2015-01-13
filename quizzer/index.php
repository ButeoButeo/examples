<?php include 'database.php'; ?>

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
				<h2>Test</h2>
				<p>This is a multiple choice quiz</p>
				<ul>
					<li><strong>Number of Questions: </strong>5</li>
					<li><strong>Type: </strong>Multiple Choice</li>
					<li><strong>Estimated Time: </strong>4 Minutes</li>
				</ul>
				<a href = "question.php?n=1" class = "start">Start Quiz</a>
			</div>
		</main>
		
		<footer>
			<div class = "container">
				Copyright &copy; 2015, Andrea's Quizzer
			</div>
		</footer>
	</body>
</html>