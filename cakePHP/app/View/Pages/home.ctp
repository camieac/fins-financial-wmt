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
});
$(document).ready(function() {
	$('#tNews').DataTable({
	"bLengthChange": false,
	"scrollY": '600px',
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


<! HOME GRAPHS GO HERE !>

	<?php if ($indexDisplay) { 
		include 'home_graphs.php';
		}?>	
		

		
		<?php if ($user = 'admin') { ?>
			
		<div id="main">
			<div class="container">
				<div class="row main-row">
					<div class="4u">
						
						<section>
							<h2>Financial Twitter Feed</h2>
							<div id = "dTwitter" style ="margin-top:2.7em;">
							<p><a class="twitter-timeline"  href="https://twitter.com/hashtag/Finance" data-widget-id="564605993368449024">#Finance Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p></div>
							
						</section>
					
					</div>
					<div class="4u">
						
						<section>
							<h2>Financial Times Feed</h2>
						<?php //debug($this->params) ;?>
							<?php //debug($financialTimes); ?>

  <table id ="tNews">
	  <thead><tr><th></th></tr></thead>
	  <tbody>
	<?php
	//$items = $rss['rss'];
	//debug($items);
	$itemss = $financialTimes['rss']['channel']['item'];
	
	//debug($itemss);
foreach($itemss as $item) { ?>
<tr><td><a title = "<?php echo $item['pubDate'] ?>" href="<?php echo $item['link'] ?>"><?php echo $item['title']; ?></a>	</td></tr>
<tr><td style = "padding-left:5em;"><?php echo $item['description']; ?></td></tr>
	
<?php
}

	
	?></tbody></table>
							
						</section>
					
					</div>
					
				</div>
				
					
						
				
			</div>
			<?php } ?>
		</div>
	</body>
</html>
