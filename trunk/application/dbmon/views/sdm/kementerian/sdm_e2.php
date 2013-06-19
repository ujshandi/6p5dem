<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Komposisi SDM <?=$title;?></h1>
	<hr/>
	
	<?=form_open('')?>
	<div id="provin">
   	Jenis Kelamin : 
    <?php
        echo form_dropdown("JENIS_KELAMIN", array(''=>'Seluruhnya','Pria'=>'Pria','Wanita'=>'Wanita'), $this->input->post('JENIS_KELAMIN'),"id='JENIS_KELAMIN'");
    ?>
    </div>
 
    <td></td>
		<td><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:LEFT"/></td>
 	<hr/>
    <?=form_close() ?>


	<div id="chart1" style="margin-top:10px; margin-right:15px; width:100%; min-height:800px;"></div>
	<pre class="code brush:js"></pre>

    <div id="chart2" style="margin-top:13px; margin-right:15px; width:100%; min-height:800px;"></div>
    <pre class="code brush:js"></pre>

	<script class="code" type="text/javascript">
		$(document).ready(function(){
			$.jqplot.config.enablePlugins = true;
			var key = [
				<?php
					foreach($stat->result() as $point){
						echo "'".$point->ID_ESELON_2."', ";
					}
				?>
			];

			var s1 = [
				<?php
					foreach($stat->result() as $point){
						echo "'".$point->JUMLAH_SDM."', ";
					}
				?>
			];
			var ticks = [
					<?php
						foreach($stat->result() as $point){
							echo "'".$point->NAMA_ESELON_2."', ";
						}
					?>
				];

			var val = [
				<?php
					foreach($stat->result() as $point){
						echo "['".$point->NAMA_ESELON_2."', ".$point->JUMLAH_SDM."],";
					}
				?>
			];
			
			plot1 = $.jqplot('chart1', [s1], {
				// Only animate if we're not using excanvas (not in IE 7 or IE 8)..
				animate: !$.jqplot.use_excanvas,
				seriesDefaults:{
					renderer:$.jqplot.BarRenderer,
                    pointLabels: { show: true, location: 'e', edgeTolerance: -15 },
                    shadowAngle: 135,
                    rendererOptions: {
                        barDirection: 'horizontal',
                        barMargin: 5
                    }
				},
				axes: {
					yaxis: {
						renderer: $.jqplot.CategoryAxisRenderer,
						ticks: ticks
					}
				},
				highlighter: { show: false }
			});

			plot2 = jQuery.jqplot('chart2', [val], 
			{
			  title: ' ', 
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

			// $('#chart1').bind('jqplotDataClick', 
			// 	function (ev, seriesIndex, pointIndex, data) {
			// 		window.location.href = "<?=base_url().'dbmon.php/sdm/kementerian/'.$stat->row()->ID_ESELON_1.'/'?>"+key[pointIndex];
			// 	}
			// );

			// $('#chart2').bind('jqplotDataClick', 
			// 	function (ev, seriesIndex, pointIndex, data) {
			// 		window.location.href = "<?=base_url().'dbmon.php/sdm/kementerian/'.$stat->row()->ID_ESELON_1.'/'?>"+key[pointIndex];
			// 	}
			// );
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