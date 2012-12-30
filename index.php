<?php
session_start();
include 'includes/common.php';
$page = 'home';
?>
<!DOCTYPE html>
<html lang="en de" class="no-js">
	<head>
		<?php
		include 'includes/head.php';
		?>
	</head>

	<body class="home">

		<?php
		include 'includes/header.php';
		?>
		<div class="<?php echo $page; ?>">

			<section class="hs1">
				<header>
					<!-- Each section should begin with a new h1 (not h2), and optionally a header -->
					<h1>This is a Page Sub Title</h1>
				</header>

				<p>
					Some content...
				</p>
				<!-- The h2 below is a sub heading relative to the h1 in this section, not for the whole document -->

				<h2>Demonstrating EM and STRONG</h2>
				<p>
					<strong>This text will have more importance (SEO-wise and contextually)</strong>
				</p>

				<footer>
					<p>
						Author: <cite>Louis Lazaris</cite>
					</p>
				</footer>

			</section>

			<section class="hs2">
				<h1>This is another section</h1>
				<p>
					This is some dummy content
				</p>
			</section>

		</div><!-- .main -->

		<aside class="sidebar">
			<p>
				Sidebar content
			</p>
		</aside>

		<?php
		include 'includes/footer.php';
		?>
		<?php
		include 'includes/scripts.php';
		?>
	</body>
</html>