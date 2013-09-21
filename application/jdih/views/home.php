<? 
global $site_adm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
.kecil{font-size:10px;
font-family:Verdana, Arial, Helvetica, sans-serif;
color:#ffffff;
text-align:center;
margin-left:139px;
font-weight:bold;
}
.text_css{
	border: solid 1px  #006633;
	background: #FFFFFF;
	margin: 50px 0 2px 141px;
	padding: 5px;
	display:inline-block;
	font-size:16px;
	width:237px;
	background: 
		-webkit-gradient(
			linear,
			left top,
			left 25,
			from(#FFFFFF),
			color-stop(4%, #EEEEEE),
			to(#FFFFFF)
		);
	background: 
		-moz-linear-gradient(
			top,
			#FFFFFF,
			#EEEEEE 1px,
			#FFFFFF 25px
			);
	-moz-box-shadow: 0px 0px 8px #f0f0f0;
	-webkit-box-shadow: 0px 0px 8px #f0f0f0;
	box-shadow: 0px 0px 8px #000000;
}
</style>
</head>

<body>
<div style="display:inline-block; border:1px solid #57B2DA; border-radius: 3px 3px 3px 3px; margin-top:7px; margin-left:5px; padding:5px;width:643px; font-size:12px;">					
	Kategori : <select id="kat" style="width:120px;">
				<option value="">-- SEMUA --</option>
				<? foreach($kat as $v){
					echo '<option value="'.$v['ID'].'">'.$v['NAMA_PRODUK_HUKUM'].'</option>';
				}?>
			   </select> &nbsp;&nbsp;&nbsp;
	Tematik : <select id="tematik" style="width:100px;">
				<option value="">-- SEMUA --</option>
				<? foreach($tematik as $v){
					echo '<option value="'.$v['ID'].'">'.$v['TEMATIK'].'</option>';
				}?>
			  </select> &nbsp;&nbsp;&nbsp;
	Key Word : <input type="text" name="key" id="key" />&nbsp; <a href="#" id="cari"><img src="<?=base_url()?>asset/dbmon/css/easyui/icons/zoom.png" /></a>
	
</div>
<form action="<?=base_url()?>index.php/home/index/" method="post" name="tai">
<div style="padding:5px;"><table id="data_na"></table></div>
 
</form>
</body>
</html>
<script type="text/javascript">
	
	var buka=1;var grid_na;
	function lempar(){
		var jml=$('#tags').val().length;
		if(jml>=4){
			if(buka==1){$('#header_na').toggle('slow');buka=2;}
		}
	}
	
	
grid_na=$('#data_na').datagrid({
				title:'Daftar Produk Hukum Kementerian Perhubungan',
				//iconCls:'icon-ok',
				width:655,
				height:900,
				nowrap: false,
				autoRowHeight: false,
				striped: true,
				collapsible:false,
				fit:false,
				rownumbers:true,
				singleSelect:true,
				url: host+'produk_hukum/get_data/data_peraturan_home',
				pagination:"true",
				pageSize:20,
				queryParams:{
					
				},
				
			
				columns:[[
					{field:'ck', checkbox:true},
					{field:'JUDUL' ,title:'Produk Hukum', width:490, sortable:true,align:'left'
						,formatter:function(value,rowData,rowindex){
							return '<span style="color:navy; font-weight:bold">'+rowData.JUDUL+'</span><br><span style="font-size:10px;"><i>'+rowData.DESKRIPSI+"</i></span>"
						}
					},
					{field:'FILE' ,title:'Download', width:100, sortable:true,align:'center'
					,formatter:function(value,rowData,rowindex){
							return '<a href="#" onClick="download_na(\''+value+'\',\''+rowData.ID+'\',\''+rowData.FOLDER_NA+'\');"><img src="<?=base_url()?>asset/dbmon/css/easyui/icons/page_white_acrobat.png" /></a>'
						}
					},
					
					
				]]
});



function download_na(filee,id,folder){
	
	folder = "upload/jdih";
	window.location.href='<?=base_url()?>'+folder+'/'+filee;
	//open_win('<?=base_url()?>'+folder+'/'+filee,'Menu Pilihan Proyek');
	/*
	$.post('<?=base_url()?>jdih.php/produk_hukum/cek_file',{folder:folder,file:filee,id:id},function(resp){
		if(resp==1){
			open_win('<?=base_url()?>'+folder+'/'+filee,'Menu Pilihan Proyek');
		}
	else{	
			alert(resp);
			window.location.href('#');
		}
	});
	*/
	
	//open_win('<?=base_url()?>'+folder+'/'+filee,'Menu Pilihan Proyek');
}

$('#cari').click(function(){
	var kat=$('#kat').val();
	var tematik=$('#tematik').val();
	var key=$('#key').val();
	grid_na.datagrid('reload',{kat:kat,tematik:tematik,key:key});
});
	   


</script>
