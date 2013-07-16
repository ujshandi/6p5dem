<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Komposisi <?=$title;?></h1>
	<hr/>
	<div id="tooltip"></div>
    <div id="chart2" style="margin-top:10px; margin-right:15px; width:46%; min-height:800px; float:right"></div>
    <pre class="code brush:js"></pre>

	<div id="chart1" style="margin-top:10px; margin-left:15px; min-height:900px;"></div>
	<pre class="code brush:js"></pre>
	
	<script class="code" type="text/javascript">
		$(document).ready(function(){
			$.jqplot.config.enablePlugins = true;
			var key = [
				<?php
					foreach($stat->result() as $point){
						echo "'".$point->KODE_DIKLAT."', ";
					}
				?>
			];

			var s2 = [
				<?php
					foreach($stat->result() as $point){
						echo "['".$point->NAMA_DIKLAT."', ".$point->JUMLAH_ALUMNI."],";
					}
				?>
			];

			plot2 = jQuery.jqplot('chart1', [s2], 
			{
			  //title: 'Persentase Komposisi', 
			  seriesDefaults: {
			    shadow: false, 
			    renderer: jQuery.jqplot.PieRenderer, 
			    rendererOptions: { 
			      startAngle: 180, 
			      sliceMargin: 1, 
			      showDataLabels: true } 
			  },
			  legend:{
				    renderer: $.jqplot.EnhancedLegendRenderer,
				    show: true,
				    rendererOptions: {
				        numberColumns: 3
				    },
				    location: 's'
				}		  
			  			});

			$('#chart1').bind('jqplotDataClick', 
				function (ev, seriesIndex, pointIndex, data) {
					window.location.href = "<?=base_url().'dbmon.php/diklat/alumni/'?>"+key[pointIndex];
				}
			);
		});
	</script>

	<div class="clear">&nbsp;</div>

</div><!-- end wrap right content-->

<!-- Don't touch this! -->


<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/syntaxhighlighter/scripts/shCore.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
<!-- Additional plugins go here -->

<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.barRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.pieRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.pointLabels.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.EnhancedLegendRenderer.min.js"></script>

<!-- load the pyramidAxis and Grid renderers in production.  pyramidRenderer will try to load via ajax if not present, but that is not optimal and depends on paths being set. -->
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.pyramidAxisRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.pyramidGridRenderer.min.js"></script> 

<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.pyramidRenderer.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.canvasTextRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>

<!-- End additional plugins -->