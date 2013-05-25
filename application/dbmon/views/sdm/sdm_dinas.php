<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Komposisi SDM Dinas Provinsi</h1>
	<hr/>

    <div id="chart2" style="margin-top:13px; margin-left:20px; width:48%; min-height:800px; float:right"></div>
    <pre class="code brush:js"></pre>

	<div id="chart1" style="margin-top:10px; margin-left:20px; width:48%; min-height:800px;"></div>
	<pre class="code brush:js"></pre>

	<script class="code" type="text/javascript">
		$(document).ready(function(){
			$.jqplot.config.enablePlugins = true;
			var s1 = [200, 600, 700, 1000, 800,200, 600, 700, 1000, 800,200, 600, 700, 1000, 800,200, 600, 700, 1000, 800,200, 600, 700, 1000, 800,200, 600, 700, 1000, 800];
			var ticks = ['Jawa Barat', 'Jawa Timur', 'Jawa Tengah', 'Jakarta', 'Yogya','Jawa Barat', 'Jawa Timur', 'Jawa Tengah', 'Jakarta', 'Yogya','Jawa Barat', 'Jawa Timur', 'Jawa Tengah', 'Jakarta', 'Yogya','Jawa Barat', 'Jawa Timur', 'Jawa Tengah', 'Jakarta', 'Yogya','Jawa Barat', 'Jawa Timur', 'Jawa Tengah', 'Jakarta', 'Yogya','Jawa Barat', 'Jawa Timur', 'Jawa Tengah', 'Jakarta', 'Yogya'];
			
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

			$('#chart1').bind('jqplotDataClick', 
				function (ev, seriesIndex, pointIndex, data) {
					$('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
				}
			);
		});
	</script>

	<script class="code" type="text/javascript">
		$(document).ready(function(){
		  var s2 = [
		  	['Jawa Barat', 200],
		  	['Jawa Tengah', 700], 
		  	['Jawa Timur', 600], 
		    ['Jakarta', 1000],
		    ['Yogya', 800],
		  	['Jawa Barat', 200],
		  	['Jawa Tengah', 700], 
		  	['Jawa Timur', 600], 
		    ['Jakarta', 1000],
		    ['Yogya', 800],
		  	['Jawa Barat', 200],
		  	['Jawa Tengah', 700], 
		  	['Jawa Timur', 600], 
		    ['Jakarta', 1000],
		    ['Yogya', 800],
		  	['Jawa Barat', 200],
		  	['Jawa Tengah', 700], 
		  	['Jawa Timur', 600], 
		    ['Jakarta', 1000],
		    ['Yogya', 800],
		  	['Jawa Barat', 200],
		  	['Jawa Tengah', 700], 
		  	['Jawa Timur', 600], 
		    ['Jakarta', 1000],
		    ['Yogya', 800],
		  	['Jawa Barat', 200],
		  	['Jawa Tengah', 700], 
		  	['Jawa Timur', 600], 
		    ['Jakarta', 1000],
		    ['Yogya', 800]
		  ];

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
		    }
		  );
		});
	</script>

	<div class="clear">&nbsp;</div>

</div><!-- end wrap right content-->

<!-- Don't touch this! -->


<script class="include" type="text/javascript" src="<?=base_url();?>asset/dbmon/js/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/dbmon/js/syntaxhighlighter/scripts/shCore.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/dbmon/js/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/dbmon/js/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
<!-- Additional plugins go here -->

<script class="include" type="text/javascript" src="<?=base_url();?>asset/dbmon/js/plugins/jqplot.barRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/dbmon/js/plugins/jqplot.pieRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/dbmon/js/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/dbmon/js/plugins/jqplot.pointLabels.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/dbmon/js/plugins/jqplot.EnhancedLegendRenderer.min.js"></script>