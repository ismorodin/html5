<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WRAPPER</title>
	<link rel="stylesheet" type="text/css" href="./public/css/main.css">
	<script type="text/javascript" src="./public/js/jquery.js"></script>
	<script>
	$(document).ready(function() {
		$('input[type=submit]').on('click', function(event) {
			event.preventDefault();
			var username = $('input[name=username]').val();
			var password = $('input[name=password]').val();
			var email = $('input[name=email]').val();
			if((username && password && email) !== ""){
				$.getJson('controllers/auth.php', {u: username}, function(data) {
					console.log(data.json);
				});
			}
		});
	});
	</script>
</head>
<body>
	<div id="wrapper">
		<header id="header">
			<nav id="#nav">
				<ul class="b-nav-navs">
						<li><a href="#">Главная</a></li>
						<li><a href="#">О нас</a></li>
						<li><a href="#">Новости</a></li>
						<li><a href="#">История</a></li>
						<li><a href="#">Другое</a></li>
					</ul>	
			</nav>
		</header>
		<main id="main">