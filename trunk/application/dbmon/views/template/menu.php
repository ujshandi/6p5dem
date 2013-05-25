<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="jquery,ui,easy,easyui,web">
	<meta name="description" content="easyui help you build your web page easily!">

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/diklat/js/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/diklat/js/themes/icon.css">
	<script type="text/javascript" src="<?=base_url()?>public/diklat/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>public/diklat/js/jquery.easyui.min.js"></script>
	<style>
		.panel-body{
			background:#f0f0f0;
		}
		.panel-header{
	background-color: #fff;
	background-image: url(images/panel_header_bg.gif);
	background-repeat: no-repeat;
	background-position: right top;
		}
		.panel-tool-collapse{
			background:url(images/arrow_up.gif) no-repeat 0px -3px;
		}
		.panel-tool-expand{
			background:url(images/arrow_down.gif) no-repeat 0px -3px;
		}
	</style>
</head>
<body>

	<div style="width:190px;height:auto;background:#7190E0;padding:5px;">
			<div class="easyui-panel" title="Data" collapsible="true" style="width:190px;height:auto;padding:10px;">
		     <?
			   /*
			   include"../config/koneksi.php";
			   $tampil=mysql_query("select * from menu where admin='admin' and aktif='Y'");
			   while($r=mysql_fetch_array($tampil)){
			    echo"<p><a href='$r[url]'>&raquo; $r[nama_menu]</a></p>";
			   }*/
				
				$this->db->flush_cache();
				$this->db->select('*');
				$this->db->from('menu');
				$this->db->where('admin', 'admin');
				$this->db->where('aktif', 'Y');
				
				$res = $this->db->get();
				
				foreach($res->result() as $r){
					echo '<p><a href="'.$r->url.'">&raquo; '.$r->nama_menu.'</a></p>';
				}
				
			 ?>
			 
		</div>
	
				<div class="easyui-panel" title="Logout" collapsible="true" style="width:190px;height:auto;padding:10px;">
			
			<a href="logout.php">&raquo; Logout</a><br/>
			
		</div>
	</div>

</body>
</html>