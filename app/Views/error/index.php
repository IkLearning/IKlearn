<!DOCTYPE HTML>
<html>

<head>
	<title>404-Page not found</title>
    <base href="<?= asset() ?>">
    <!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Iklearning"
	/>
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta Tags -->
	<!-- Custom Theme files -->
	<link href="source/error/css/font-awesome.css" rel="stylesheet">
	<!--// Font-Awesome-CSS -->
	<link href="source/error/css/style.css" rel='stylesheet' type='text/css' />
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Herr+Von+Muellerhoff" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

	<!--//fonts-->
</head>

<body>
	<!--background-->
	<h1>Oop! Page you're looking for not found....</h1>
	<p class="paragraph-w3ls">Anh vẫn thương…dù tim nhói chẳng thể thốt ra lời...</p>
	<div class="bg-agile">
		<div class="main-info-w3-agileits">
			<div class="w3ls_footer_grid_left">
				<h5 class="sub-hdg">follow Us</h5>
				<ul class="w3l-social">
					<li><a href="https://www.facebook.com/Gack113" class="fa fa-facebook" target="_blank"></a></li>
					<li><a href="https://twitter.com/Gack113" class="fa fa-twitter" target="_blank"></a></li>
					<li><a href="https://instagram.com/ln_gach" class="fa fa-instagram" target="_blank"></a>
					<li><a href="https://github.com/IkLearning/IKlearn" class="fa fa-github" target="_blank"></a>
				</ul>

			</div>

		</div>
		<div class="clear"></div>
	</div>
	<!--newsletter-agileinfo-->
	<div class="newsletter-agileinfo">
		<form action="<?= route('page','search') ?>" method="GET">
			<span class="fa fa-search" aria-hidden="true"></span>
			<input type="text" name="key" size="30" required="" placeholder="Search something..." />
			<input type="submit" value=" Search" />
		</form>
	</div>
	<!--//newsletter-agileinfo-->
	<!--copyright-->
	<div class="copy w3ls">
		<p>Copyright &copy; IKLearn Team 2017. All Rights Reserved | Design by <a href="https://www.facebook.com/pages/IK-Team/262246664295405?timeline_context_item_type=intro_card_work&timeline_context_item_source=100007424676770&pnref=lhc" target="_blank">IK Team</a>			</p>
	</div>
	<!--//copyright-->
	<!--//background-->
</body>

</html>