<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Komposisi SDM <?=$title;?></h1>

    <div id="tooltip"></div>
    <div id="chart2" style="margin-top:10px; margin-right:15px; width:46%; min-height:800px; float:right"></div>
    <pre class="code brush:js"></pre>

	<div id="chart1" style="margin-top:10px; margin-left:15px; width:50%; min-height:800px;"></div>
	<pre class="code brush:js"></pre>

	<script class="code" type="text/javascript" language="javascript">
    $(document).ready(function(){
        // the "x" values from the data will go into the ticks array.  
        // ticks should be strings for this case where we have values like "75+"
			var key = [<?php
					foreach($stat->result() as $point){
						echo "'".$point->ID_ESELON_1."', ";
					}
			?>];
			var ticks = [
					<?php
						foreach($stat->result() as $point){
							echo '"'.$point->NAMA_ESELON_1.'", ';
						}
					?> 
				""];

			var male = [
				<?php
					foreach($statM->result() as $point){
						echo $point->JUMLAH_SDM.", ";
					}
				?>
			];
			var female = [
				<?php
					foreach($statF->result() as $point){
						echo $point->JUMLAH_SDM.", ";
					}
				?>
			];

        // Custom color arrays are set up for each series to get the look that is desired.
        // Two color arrays are created for the default and optional color which the user can pick.
        var customColors = ["#4F9AB8", "#FF31CB", "#C57225", "#C57225"];
        var greenColors = ["#526D2C", "#77933C", "#C57225", "#C57225"];
        var blueColors = ["#3F7492", "#4F9AB8", "#C57225", "#C57225"];

        // To accomodate changing y axis, need to keep track of plot options, so they are defined separately
        // changing axes will require recreating the plot, so need to keep 
        // track of state changes.
        var plotOptions = {
            // We set up a customized title which acts as labels for the left and right sides of the pyramid.
            title: '<div style="float:left;width:50%;text-align:center">Pria</div><div style="float:right;width:50%;text-align:center">Wanita</div>',

            // by default, the series will use the green color scheme.
            seriesColors: customColors,

            grid: {
                drawBorder: false,
                shadow: false,
                background: 'white',
                rendererOptions: {
                    // plotBands is an option of the pyramidGridRenderer.
                    // it will put banding at starting at a specified value
                    // along the y axis with an adjustable interval.
                    plotBands: {
                        show: false
                    }
                }
            },

            // This makes the effective starting value of the axes 0 instead of 1.
            // For display, the y axis will use the ticks we supplied.
            defaultAxisStart: 0,
            seriesDefaults: {
                renderer: $.jqplot.PyramidRenderer,
                rendererOptions: {
                    barPadding: 2,
                    offsetBars: true
                },
                yaxis: 'yMidAxis',
                shadow: false,
            },

            // We have 4 series, the left and right pyramid bars and
            // the left and rigt overlay lines.
            series: [
                // For pyramid plots, the default side is right.
                // We want to override here to put first set of bars
                // on left.
                {
                    rendererOptions:{
                        side: 'left',
                        synchronizeHighlight: 1
                    }
                },
                {
                    yaxis: 'yMidAxis',
                    rendererOptions:{
                        synchronizeHighlight: 0
                    }
                },
                // Pyramid series are filled bars by default.
                // The overlay series will be unfilled lines.
                {
                    rendererOptions: {
                        fill: false,
                        side: 'left'
                    }
                },
                {
                    yaxis: 'yMidAxis',
                    rendererOptions: {
                        fill: false
                    }
                }
            ],

            // Set up all the y axes, since users are allowed to switch between them.
            // The only axis that will show is the one that the series are "attached" to.
            // We need the appropriate options for the others for when the user switches.
            axes: {
                xaxis: {
                    tickOptions: {},
                    rendererOptions: {
                        baselineWidth: 2
                    }
                },
                yMidAxis: {
                    label: 'Eselon 1',
                    // include empty tick options, they will be used
                    // as users set options with plot controls.
                    tickOptions: {showGridline: false, mark:'cross'},
                    tickInterval: 1,
                    showMinorTicks: true,
                    ticks: ticks,
                    rendererOptions: {
                        category: false,
                        baselineWidth: 2
                    }
                }
            }
        };

        plot1 = $.jqplot('chart1', [male, female, male, female], plotOptions);


        // After plot creation, check to see if contours should be displayed
        checkContour();
       
        //////
        // Function which checkes if the countour lines checkbox is checked.
        // If not, hide the contour lines by hiding the canvases they are
        // drawn on.
        //////
        function checkContour() {
			plot1.series[2].canvas._elem.addClass('jqplot-series-hidden');
			plot1.series[2].canvas._elem.hide();
			plot1.series[3].canvas._elem.addClass('jqplot-series-hidden');
			plot1.series[3].canvas._elem.hide();
        }    

        // bind to the data highlighting event to make custom tooltip:
        $('.jqplot-target').bind('jqplotDataHighlight', function(evt, seriesIndex, pointIndex, data) {
            // Here, assume first series is male poulation and second series is female population.
            // Adjust series indices as appropriate.
            var malePopulation = Math.abs(plot1.series[0].data[pointIndex][1]);
            var femalePopulation = Math.abs(plot1.series[1].data[pointIndex][1]);
            var ratio = femalePopulation / malePopulation * 100;
            var info = "<b>"+ticks[pointIndex]+"</b><br/>Pria : "+malePopulation+"<br/>Wanita : "+femalePopulation;
            $('#tooltip').css({
            	width: 'auto',
		        left: evt.pageX + 1,
		        top: evt.pageY + 1
		    }).stop().show(100).html(info);

            // $('#tooltipMale').stop(true, true).fadeIn(250).html(malePopulation.toPrecision(4));
            // $('#tooltipFemale').stop(true, true).fadeIn(250).html(femalePopulation.toPrecision(4));
            // $('#tooltipRatio').stop(true, true).fadeIn(250).html(ratio.toPrecision(4));

            // // Since we don't know which axis is rendererd and acive with out a little extra work,
            // // just use the supplied ticks array to get the age label.
            // $('#tooltipAge').stop(true, true).fadeIn(250).html(ticks[pointIndex]);
        });

        // bind to the data highlighting event to make custom tooltip:
        $('.jqplot-target').bind('jqplotDataUnhighlight', function(evt, seriesIndex, pointIndex, data) {
            // clear out all the tooltips.
            $('#tooltip').stop().hide(100).html('');
            // $('.tooltip-item').stop(true, true).fadeOut(200).html('');
        });

        // bind to the data highlighting event to make custom tooltip:
        $('.jqplot-target').bind('jqplotDataClick', function(evt, seriesIndex, pointIndex, data) {
            // clear out all the tooltips.
			window.location.href = "<?=base_url().'dbmon.php/sdm/dinas/'?>"+key[pointIndex];
        });

    });
    </script>

	<script class="code" type="text/javascript">
		$(document).ready(function(){
			$.jqplot.config.enablePlugins = true;
			var key = [
				<?php
					foreach($stat->result() as $point){
						echo "'".$point->ID_ESELON_1."', ";
					}
				?>
			];

			var s2 = [
				<?php
					foreach($stat->result() as $point){
						echo "['".$point->NAMA_ESELON_1."', ".$point->JUMLAH_SDM."],";
					}
				?>
			];

			plot2 = jQuery.jqplot('chart2', [s2], 
			{
			  title: 'Persentase Komposisi', 
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

			$('#chart2').bind('jqplotDataClick', 
				function (ev, seriesIndex, pointIndex, data) {
					window.location.href = "<?=base_url().'dbmon.php/sdm/kementerian/';?>"+key[pointIndex];
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
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.canvasTextRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.pointLabels.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.EnhancedLegendRenderer.min.js"></script>