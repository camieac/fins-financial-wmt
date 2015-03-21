<!DOCTYPE HTML>

<html>
	<head>
		<title>Homepage</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		
		<?php echo $this->Html->script('jquery.min'); ?>
		
		<?php echo $this->Html->script('skel.min'); ?>
		
		<?php echo $this->Html->script('skel-layers.min'); ?>
		
		<?php echo $this->Html->script('init'); ?>
		<noscript>
	<?php echo $this->Html->css(array('skel', 'style', 'style-desktop')); ?>
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
<style>

.dQuickview{
padding:1em;
border-radius:1em;
background:white;
}
.frameWrap{
    width :520px;
    height: 220px;
    display:inline;
}

.loader {
	position:relative;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%) ;
    width:36px;
    height:36px;
    bottom:60px;

}
</style>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
<script type="text/javascript">
	$(document).ready(function() {
	$('#tChart').DataTable({
	"bLengthChange": false,
	"scrollX": true,
	"paging": false,
	"searching":false,
	"ordering":false,
	"info":false
	}
	);
} ); 
</script>
	</head>
	<body>


<div id="banner-wrapper">
	<table id = "tChart">
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<div class="frameWrap">
						<img class = "loader" id="loader1" src="img/loader.gif" width="36" height="36" alt="loading gif"/>
						<iframe id="iframe1" width="520" height="220"src="http://emarkettrader.co.uk/stocklists/quickview?stock=GOOG" ></iframe>
					</div>
					<script>
						$(document).ready(function () {
							$('#iframe1').on('load', function () {
								$('#loader1').hide();
							});
						});
					</script>
				</td>
				<td>
					<div class="frameWrap">
						<img class = "loader" id="loader2" src="img/loader.gif" width="36" height="36" alt="loading gif"/>
						<iframe id="iframe2" width="520" height="220"src="http://emarkettrader.co.uk/stocklists/quickview?stock=GOOG" ></iframe>
					</div>
					<script>
						$(document).ready(function () {
							$('#iframe2').on('load', function () {
								$('#loader2').hide();
							});
						});
					</script>
				</td>
				<td>
					<div class="frameWrap">
						<img class = "loader" id="loader3" src="img/loader.gif" width="36" height="36" alt="loading gif"/>
						<iframe id="iframe3" width="520" height="220"src="http://emarkettrader.co.uk/stocklists/quickview?stock=GOOG" ></iframe>
					</div>
					<script>
						$(document).ready(function () {
							$('#iframe3').on('load', function () {
								$('#loader3').hide();
							});
						});
					</script>
				</td>
				<td>
					<div class="frameWrap">
						<img class = "loader" id="loader4" src="img/loader.gif" width="36" height="36" alt="loading gif"/>
						<iframe id="iframe4" width="520" height="220"src="http://emarkettrader.co.uk/stocklists/quickview?stock=GOOG" ></iframe>
					</div>
					<script>
						$(document).ready(function () {
							$('#iframe4').on('load', function () {
								$('#loader4').hide();
							});
						});
					</script>
				</td>
			</tr>
		</tbody>
	</table>
</div>
		
		
		
		
		


		
		
		
		
		
		
		<?php if ($user = 'admin') { ?>
			
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
			<?php } ?>
		</div>
	</body>
</html>
