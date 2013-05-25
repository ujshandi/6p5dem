var $ = jQuery.noConflict();

$(document).ready(function() {
						
$('.flexslider').flexslider({
	  animation: "slide",
});

$('#infos1').vTicker({
	speed: 500,
	pause: 4000,
	showItems: 2,
	animation: 'fade',
	mousePause: true,
	height: 0,
	direction: 'up'
});

$('#infos2').vTicker({
	speed: 500,
	pause: 4000,
	showItems: 1,
	animation: 'fade',
	mousePause: true,
	height: 0,
	direction: 'up'
});

var opt = {	iconFolder: "/images/icons/"};
$("ul.jtree").jtree();

$(function() {
	$('#calendar_box').simpleCalendar({
		previousClick: function(options) {alert('Previous clicked!!');},
		nextClick: function(options) {alert('Next clicked!!');},
		cellClick: function(e) {alert('Day: ' + e.data.date.getDate() + ' clicked!!');},
	});
});

});//end doc ready