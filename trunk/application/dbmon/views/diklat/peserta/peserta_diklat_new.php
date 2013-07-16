<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Komposisi SDM <?=$title;?></h1>
	<hr/>
	
	<?=form_open('sdm/dinas')?>
	<table>
		<tr>
		   	<td width="100">Induk UPT : </td>
		    <td><?php
		        echo form_dropdown("INDUKUPT", array(''=>'Pilih Induk UPT','0'=>'0','1'=>'1'), '');
		    ?></td>
		</tr>
	   	<tr>
			<td>Program : </td>
		    <td><?php
		        echo form_dropdown("Program", array(''=>'Pilih Induk UPT','0'=>'0','1'=>'1'), '');
		    ?></td>
		</tr>
		<tr>
		   	<td>Tahun : </td>
		    <td>
		    	<input type="text" name="tahun_awal" id="tahun_awal" value="2012" maxlength="4" size="5"/>
		    	<input type="text" name="tahun_akhir" id="tahun_akhir" value="2013" maxlength="4" size="5"/>
		    </td>
		</tr>
		<tr>
			<td></td>
			<td><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:LEFT"/></td>
		</tr>
	</table>
 	<hr/>
    <?=form_close() ?>

	<div id="chart1" style="margin-top:10px; margin-left:15px; margin-bottom:20px; width:98%; min-height:300px;"></div>
	<pre class="code brush:js"></pre>
 	<hr/>
	<table>
		<thead>
			<tr>
				<td width="20px" rowspan="2" style="text-align:center;vertical-align:middle;">No.</td>
				<td width="400px" rowspan="2" style="text-align:center;vertical-align:middle;">UPT</td>
				<td colspan="3" style="text-align:center;vertical-align:middle;">TAHUN</td>
			</tr>		
			<tr>		
				<td style="text-align:center;vertical-align:middle;">2011</td>
				<td style="text-align:center;vertical-align:middle;">2012</td>
				<td style="text-align:center;vertical-align:middle;">2013</td>
			</tr>
		</thead>
		<tbody>
			<tr>		
				<td>1.</td>
				<td>ASD</td>
				<td>1</td>
				<td>2</td>
				<td>3</td>
			</tr>				
		</tbody>
	</table>

	<script class="code" type="text/javascript">
		$(document).ready(function(){
			$.jqplot.config.enablePlugins = true;
			var key = [3,7,9,1,5,3,8,2,5];
			var s1 = [3,7,9,1,5,3,8,2,5];
			var ticks = [3,7,9,1,5,3,8,2,5];
			
			plot1 = $.jqplot('chart1', [s1]);

			var s2 = [3,7,9,1,5,3,8,2,5];
			// [
			// 	<?php
			// 		foreach($stat->result() as $point){
			// 			echo "['".$point->NAMAPROVIN."', ".$point->JUMLAH_SDM."],";
			// 		}
			// 	?>
			// ];

			plot2 = jQuery.jqplot('chart2', [s2], 
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

			$('#chart1').bind('jqplotDataClick', 
				function (ev, seriesIndex, pointIndex, data) {
					window.location.href = "<?=base_url().'dbmon.php/sdm/dinas/'?>"+key[pointIndex];
				}
			);

			$('#chart2').bind('jqplotDataClick', 
				function (ev, seriesIndex, pointIndex, data) {
					window.location.href = "<?=base_url().'dbmon.php/sdm/dinas/'?>"+key[pointIndex];
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