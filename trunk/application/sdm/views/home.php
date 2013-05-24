<link rel="stylesheet" href="<?=base_url()?>slider/css/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>slider/css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>slider/css/social-style.css" type="text/css" media="screen" />

 <div class="slider-wrapper theme-default">
	<div class="ribbon"></div>
	<div id="slider" class="nivoSlider">
		<img src="<?=base_url()?>slider/images/kapal.jpg" alt="" />
		<img src="<?=base_url()?>slider/images/pesawat.jpg" alt="" title="" />
		<img src="<?=base_url()?>slider/images/kereta.jpg" alt="" data-transition="slideInLeft" />
		<img src="<?=base_url()?>slider/images/bus.jpg" alt="" title="#htmlcaption" />
	</div>
</div>

 </div>	
<script type="text/javascript" src="<?=base_url()?>slider/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider();
});
</script>