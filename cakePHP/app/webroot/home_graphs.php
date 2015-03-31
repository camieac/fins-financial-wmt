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
					<div class="frameWrap" id = "frameWrap1">
						<img class = "loader" id="loader1" src="img/loader.gif" width="36" height="36" alt="loading gif"/>
						<iframe id="iframe1" width="520" height="220"src="/stocklists/quickview?stock=<?php echo $index1 ?>" ></iframe>
					</div>
					<script>
						$(document).ready(function () {
							$('#iframe1').on('load', function () {
								$('#loader1').hide();
								$('#frameWrap1').append(('<div class = "graphTitle">'.concat('<?php echo $this->Html->link($index1, array('controller' => 'stocklists','action' => 'view?stock=' . $index1));?>','</div>')));
							});
						});
					</script>
				</td>
				<td>
					<div class="frameWrap" id = "frameWrap2">
						<img class = "loader" id="loader2" src="img/loader.gif" width="36" height="36" alt="loading gif"/>
						<iframe id="iframe2" width="520" height="220"src="/stocklists/quickview?stock=<?php echo $index2 ?>" ></iframe>
					</div>
					<script>
						$(document).ready(function () {
							$('#iframe2').on('load', function () {
								$('#loader2').hide();
								$('#frameWrap2').append(('<div class = "graphTitle">'.concat('<?php echo $this->Html->link($index2, array('controller' => 'stocklists','action' => 'view?stock=' . $index2));?>','</div>')));
							});
						});
					</script>
				</td>
				<td>
					<div class="frameWrap" id = "frameWrap3">
						<img class = "loader" id="loader3" src="img/loader.gif" width="36" height="36" alt="loading gif"/>
						<iframe id="iframe3" width="520" height="220"src="/stocklists/quickview?stock=<?php echo $index3 ?>" ></iframe>
					</div>
					<script>
						$(document).ready(function () {
							$('#iframe3').on('load', function () {
								$('#loader3').hide();
								$('#frameWrap3').append(('<div class = "graphTitle">'.concat('<?php echo $this->Html->link($index3, array('controller' => 'stocklists','action' => 'view?stock=' . $index3));?>','</div>')));
							});
						});
					</script>
				</td>
				<td>
					<div class="frameWrap" id = "frameWrap4">
						<img class = "loader" id="loader4" src="img/loader.gif" width="36" height="36" alt="loading gif"/>
						<iframe id="iframe4" width="520" height="220"src="/stocklists/quickview?stock=<?php echo $index4 ?>" ></iframe>
					</div>
					<script>
						$(document).ready(function () {
							$('#iframe4').on('load', function () {
								$('#loader4').hide();
								$('#frameWrap4').append(('<div class = "graphTitle">'.concat('<?php echo $this->Html->link($index4, array('controller' => 'stocklists','action' => 'view?stock=' . $index4));?>','</div>')));
							});
						});
					</script>
				</td>
			</tr>
		</tbody>
	</table>
</div>
