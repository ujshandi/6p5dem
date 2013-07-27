
	<div style="padding-left: 5px; background: #dee8f4;">	
		<a href="javascript:void(0)" onClick="window.location = '<?=base_url()?>/home';" class="easyui-linkbutton" plain="true" menu="#smFile" iconCls="house">Beranda</a>
		<? $menu =$this->db->get('kelompok_data')->result_array();
			foreach ($menu as $x=>$v){
		?>
			<a href="javascript:void(0)"  class="easyui-menubutton" menu="#<?=$v['id']?>" iconCls="<?=$v['icon']?>"><?=$v['nama']?></a>
		<? } ?>
		<a href="javascript:void(0)" onClick="showChangePass();" id="mmLogout" class="easyui-linkbutton" plain="true" menu="#smLogout" iconCls="user">Mengganti Sandi</a>
		<a href="javascript:void(0)" onClick="window.location = '<?=base_url()?>login/logout_na';" id="mmLogout" class="easyui-linkbutton" plain="true" menu="#smLogout" iconCls="door_out">Log Out</a>
	</div>
	
		<? 
			foreach ($menu as $x=>$v){
		?> 		<div id="<?=$v['id']?>" style="width:250px;">
		<?
				$sub_menu= $this->db->get_where('jenis_data',array('id_kelompok'=>$v['id']))->result_array();
				foreach ($sub_menu as $y=>$z){
		?>
					<div iconCls="<?=$z['icon']?>" onClick="window.location = '<?=base_url()?>/dashboard/get_pages/<?=$z['id']?>';"><?=$z['nama']?></div>
				<? } ?>
				</div>
		<? } ?>
	
	
	<!--
	<div id="smFile" style="width:150px;">
		<div iconCls="house" onClick="window.location = '<?=base_url()?>';">Home</div>
		<div class="menu-sep">&nbsp;</div>
		<div iconCls="user" onClick="showChangePass();">Mengganti Sandi</div>
	</div>
	-->
	<!--<a href="javascript:void(0)" onClick="" id="mmFile" class="easyui-menubutton" menu="#smFile" iconCls="script">Dokumen</a>-->

	
