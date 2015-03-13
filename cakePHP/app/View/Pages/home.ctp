<!DOCTYPE HTML>

<html>
	<head>
		<title>Homepage</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		<?php echo $this->Html->script('jquery.min'); ?>
		
		<?php echo $this->Html->script('skel.min'); ?>
		
		<?php echo $this->Html->script('skel-layers.min'); ?>
		
		<?php echo $this->Html->script('init'); ?>
		<noscript>
	<?php echo $this->Html->css(array('skel', 'style', 'style-desktop')); ?>
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>

		<div id="banner-wrapper">
			<div class="container">

				<div id="banner">
					<h2>Possible graph here</h2>
					<span>And put something almost as cool here, but a bit longer ...</span>
				</div>

			</div>
		</div>
		<div id="main">
			<div class="container">
				<div class="row main-row">
					<div class="4u">
						
						<section>
							<h2>Financial Twitter Feed</h2>
							<p><a class="twitter-timeline"  href="https://twitter.com/hashtag/Finance" data-widget-id="564605993368449024">#Finance Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
							<footer class="controls">
								<a href="http://html5up.net" class="button">link to designer page</a>
							</footer>
						</section>
					
					</div>
					<div class="4u">
						
						<section>
							<h2>Financial Times Feed</h2>
							<?php $array = $this->requestAction(array('controller' => 'home', 'action' => 'getFTFeed'),array('return')); ?>
							<dl id="news" class="box">
							<?php
							//$news = $this->Rss->parseRss(5);
							$news = $array;
							echo implode(" ",$news);
							foreach($news as $item):?>
								<dt><?php echo date('d-m-Y H:i',strtotime($item['lastBuildDate'])); ?></dt>
									<dd><?php echo $this->Html->link(
																	$item['title'],
																	$item['link'],
																	array('target' => '_blank')
																	); ?></dd>
							<?php endforeach; ?>
							</dl>
							<ul class="small-image-list">
								<li>
									<?php	echo $this->Html->image('pic2.jpg')?>
									<h4>Jane Anderson</h4>
									<p>Varius nibh. Suspendisse vitae magna eget et amet mollis justo facilisis amet quis.</p>
								</li>
								<li>
								<?php	echo $this->Html->image('pic2.jpg')?>
									<h4>James Doe</h4>
									<p>Vitae magna eget odio amet mollis justo facilisis amet quis. Sed sagittis consequat.</p>
								</li>
							</ul>
						</section>
					
					</div>
					<div class="4u">
					
						<section>
							<h2>How about some links?</h2>
							<div>
								<div class="row">
									<div class="6u">
										<ul class="link-list">
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Suspendisse varius ipsum</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
										</ul>
									</div>
									<div class="6u">
										<ul class="link-list">
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Vitae magna sed dolore</a></li>
										</ul>
									</div>
								</div>
							</div>
						</section>

					</div>
				</div>
				
					
						
				
			</div>
		</div>
	</body>
</html>
