var kolom ={};
var kolomkaku={};
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
		height: frmHeight-220,
		title: 'Komposisi SDM Per Provinsi (%)',
		html: "<div id='chart1'></div>"
	});
	$('#chart2').panel({
		width: lebar2,
		height: frmHeight-220,
		title: 'Komposisi SDM Provinsi Pria & Wanita',
		html: "<div id='chart2'></div>"
	});
	
	get_chart('fcfchart1','Doughnut3D','all','chart1',850,270);
	get_chart('fcfchart2','FCF_MSBar2D','campur','chart2',865,1500);	
	//get_chart('fcfchart3','Bar2D','pria','chart3',1000,100);	
	});
}

// sdm_kementerian
if(modul=='sdm_kementerian'){
	$(document).ready(function(){
	$('#panelsMom1').css('height', tinggi+'px');
	$('#panelsMom1').css('width', lebar-290+'px');
	
	$('#kat').css('width', lebar2+'px');	
	$('#all2').css('width', lebar2+'px');	
	$('#kat').css('height', tinggi+'px');	
	$('#all2').css('height', tinggi+'px');	
	
	$('#chart1').panel({
		width: lebar2,
		height: frmHeight-220,
		title: 'Komposisi SDM Kementerian Perhubungan (%)',
		html: "<div id='chart1'></div>"
	});
	$('#chart2').panel({
		width: lebar2,
		height: frmHeight-220,
		title: 'Komposisi SDM Kementerian Pria & Wanita',
		html: "<div id='chart2'></div>"
	});
	
	get_chart2('fcfchart1','Doughnut3D','all2','chart1',850,270);
	get_chart2('fcfchart2','FCF_MSBar2D','campur2','chart2',865,500);	
	//get_chart('fcfchart3','Bar2D','pria','chart3',1000,100);	
	});
}

if(modul=='mon_diklat'){
	var induk_upt
	var program_upt
	var tahun_mulai
	var tahun_akhir
	var buka=0;
	var buka2=0;
	$('#cari').linkbutton({  
		iconCls: 'icon-search' ,
		text:'Cari'
	});  
	fillCombo(host+'dashboard/get_combo/DIKLAT_MST_INDUKUPT','DIKLAT_MST_INDUKUPT');
	$('#DIKLAT_MST_INDUKUPT').die();
	$('#DIKLAT_MST_INDUKUPT').change(function(){
		$('#DIKLAT_MST_PROGRAM').empty();
		fillCombo(host+'dashboard/get_combo/DIKLAT_MST_PROGRAM','DIKLAT_MST_PROGRAM',$('#DIKLAT_MST_INDUKUPT').val());
		
	});
	//
	$('#tab_na').tabs({
				height: frmHeight-350,
				width: frmWidth-303,
				plain: false
	});	
	
	$('#tab_na').tabs('add',{
		title: 'DATA '+flag.toUpperCase(),
		iconCls:'page_copy',
		content:'<div id="isi_data" style="padding:5px;"></div>'
	});	
	
	$('#tab_na').tabs('add',{
		title: 'GRAFIK '+flag.toUpperCase(),
		iconCls:'chart_bar_link',
		content:'<div id="isi_grafik" style="padding:5px;"></div>'
	});	
	
	$('#cari').bind('click',function(){
		 induk_upt=$('#DIKLAT_MST_INDUKUPT').val();
		 program_upt=$('#DIKLAT_MST_PROGRAM').val();
		 tahun_mulai=$('#TAHUN_FROM').val();
		 tahun_akhir=$('#TAHUN_TO').val();
		
		
		buka=0;buka2=0;
		$('#tab_na').tabs('select','DATA '+flag.toUpperCase());
		if(induk_upt==''){
			$.messager.alert("Pencarian","Pilih Induk UPT",'warning');	
		}
		else if(program_upt==''){
			$.messager.alert("Pencarian","Pilih Program UPT",'warning');	
		}
		else if(tahun_mulai==''){
			$.messager.alert("Pencarian","Pilih Tahun Mulai",'warning');	
		}
		else if(tahun_akhir==''){
			$.messager.alert("Pencarian","Pilih Tahun Akhir",'warning');	
		}
		else{
			
			if(parseInt(tahun_akhir) < parseInt(tahun_mulai)){
				$.messager.alert("Pencarian","Range Tahun Akhir Salah (Lebih Besar Dari Tahun Awal)",'warning');	
				buka=1;
				buka2=1;
			}	
			else{
				console.log(tahun_akhir+'->'+tahun_mulai)
				post['induk_upt']=induk_upt;
				post['program_upt']=program_upt;
				post['tahun_mulai']=tahun_mulai;
				post['tahun_akhir']=tahun_akhir;
				post['flag']=flag;
				$("#isi_data").html("").addClass("loading");
					$.post(host+'dashboard/get_form/data_list',post,function (html){
							$("#isi_data").html(html).removeClass("loading");
					});
					
				$("#isi_grafik").html("").addClass("loading");
					$.post(host+'dashboard/get_form/data_grafik',post,function (html){
							$("#isi_grafik").html(html).removeClass("loading");
					});
				
				/*$('#tab_na').tabs({
					onSelect: function(title){
						switch(title){
							case "DATA "+flag.toUpperCase():
								if(buka==0){
									
									buka=1
								}
							break;
							case "GRAFIK "+flag.toUpperCase():
								if(buka2==0){
									
									buka2=1
								}
							break;
							
							
						}
					}
				});*/
				
				
				
			}
		}
		
	});
}
	
	// tambahan
if(modul=='mon_diklat_upt'){
	var induk_upt
	var upt
	var tahun_mulai
	var tahun_akhir
	var buka=0;
	var buka2=0;
	
	$('#cari').linkbutton({  
		iconCls: 'icon-search' ,
		text:'Cari'
	});  
	fillCombo(host+'dashboard/get_combo_upt/DIKLAT_MST_INDUKUPT','DIKLAT_MST_INDUKUPT');
	$('#DIKLAT_MST_INDUKUPT').die();
	$('#DIKLAT_MST_INDUKUPT').change(function(){
		$('#DIKLAT_MST_UPT').empty();
		fillCombo(host+'dashboard/get_combo_upt/DIKLAT_MST_UPT','DIKLAT_MST_UPT',$('#DIKLAT_MST_INDUKUPT').val());
		
	});
	
	$('#tab_na').tabs({
				height: frmHeight-350,
				width: frmWidth-303,
				plain: false
	});	
	
	
	
	$('#tab_na').tabs('add',{
		title: 'GRAFIK '+flag.toUpperCase(),
		iconCls:'chart_bar_link',
		content:'<div id="isi_grafik" style="padding:5px;"></div>'
	});	
	
	$('#cari').bind('click',function(){
		 induk_upt=$('#DIKLAT_MST_INDUKUPT').val();
		 upt=$('#DIKLAT_MST_UPT').val();
		 tahun_mulai=$('#TAHUN_FROM').val();
		 tahun_akhir=$('#TAHUN_TO').val();
		
		
		buka=0;buka2=0;
		$('#tab_na').tabs('select','DATA '+flag.toUpperCase());
		if(induk_upt==''){
			$.messager.alert("Pencarian","Pilih Induk UPT",'warning');	
		}
		else if(upt==''){
			$.messager.alert("Pencarian","Pilih UPT",'warning');	
		}
		else if(tahun_mulai==''){
			$.messager.alert("Pencarian","Pilih Tahun Mulai",'warning');	
		}
		else if(tahun_akhir==''){
			$.messager.alert("Pencarian","Pilih Tahun Akhir",'warning');	
		}
		else{
			
			if(parseInt(tahun_akhir) < parseInt(tahun_mulai)){
				$.messager.alert("Pencarian","Range Tahun Akhir Salah (Lebih Besar Dari Tahun Awal)",'warning');	
				buka=1;
				buka2=1;
			}	
			else{
				console.log(tahun_akhir+'->'+tahun_mulai)
				post['induk_upt']=induk_upt;
				post['upt']=upt;
				post['tahun_mulai']=tahun_mulai;
				post['tahun_akhir']=tahun_akhir;
				post['flag']=flag;
				$("#isi_data").html("").addClass("loading");
					$.post(host+'dashboard/get_form/data_list_upt',post,function (html){
							$("#isi_data").html(html).removeClass("loading");
					});
					
				$("#isi_grafik").html("").addClass("loading");
					$.post(host+'dashboard/get_form/data_grafik_upt',post,function (html){
							$("#isi_grafik").html(html).removeClass("loading");
					});
				
			}
		}
		
	});
}
	