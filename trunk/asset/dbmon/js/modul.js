
if(modul=='sdm_dinas'){
	$(document).ready(function(){
	$('#panelsMom1').css('height', tinggi+'px');
	$('#panelsMom1').css('width', lebar-290+'px');
	
	$('#kat').css('width', lebar2+'px');	
	$('#all').css('width', lebar2+'px');	
	$('#kat').css('height', tinggi+'px');	
	$('#all').css('height', tinggi+'px');	
	
	$('#chart1').panel({
		width: lebar2,
		height: frmHeight-290,
		title: 'Komposisi SDM Per Provinsi (%)',
		html: "<div id='chart1'></div>"
	});
	$('#chart2').panel({
		width: lebar2,
		height: frmHeight-290,
		title: 'Komposisi SDM Provinsi Pria & Wanita',
		html: "<div id='chart2'></div>"
	});
	
	get_chart('fcfchart1','Doughnut3D','all','chart1',865,325);
	get_chart('fcfchart2','FCF_MSBar2D','campur','chart2',868,1500);	
	//get_chart('fcfchart3','Bar2D','pria','chart3',1000,100);	
	});
}