<style>
#tabbed_box {  
    margin: 0px auto 0px auto;  
    width:300px;  
}
.tabbed_box h4 {  
    font-family:Arial, Helvetica, sans-serif;  
    font-size:23px;  
    color:#cccccc;  
    letter-spacing:-1px;  
    margin-bottom:10px;  
    margin-top:10px;  
} 
.tabbed_area {  
    border:1px solid #cccccc;  
    padding:8px;      
}   
ul.tabs {  
    margin:0px; padding:0px;  
}  
ul.tabs li {  
    list-style:none;  
    display:inline;  
}  
ul.tabs li a {  
    background-color:#464c54;  
    color:#ffffff;  
    padding:8px 14px 8px 14px;  
    text-decoration:none;  
    font-size:9px;  
    font-family:Verdana, Arial, Helvetica, sans-serif;  
    font-weight:bold;  
    text-transform:uppercase;  
    border:1px;   
}  
ul.tabs li a:hover {  
    background-color:#2f343a;  
    border-color:#2f343a;  
}  
ul.tabs li a.active {  
    background-color:#cccccc;  
    color:#999999;    
} 
.content {  
    background-color:#ffffff;       
}  
#content_2, #content_3 {
 display:none; 
 }  
 ul.tabs {  
    margin:0px; padding:0px;  
    margin-top:5px;  
    margin-bottom:6px;  
}
.content ul {  
    margin:0px;  
    padding:0px 20px 0px 20px;  
}  
.content ul li {  
    list-style:none;  
    border-bottom:1px solid #d6dde0;  
    padding-top:15px;  
    padding-bottom:15px;  
    font-size:13px;  
}  
.content ul li a {  
    text-decoration:none;  
    color:#3e4346;  
}  
.content ul li a small {  
    color:#8b959c;  
    font-size:9px;  
    text-transform:uppercase;  
    font-family:Verdana, Arial, Helvetica, sans-serif;  
    position:relative;  
    left:4px;  
    top:0px;  
} 
.content ul li:last-child {  
    border-bottom:none;  
} 
  
</style>

<script>
	function tabSwitch(new_tab, new_content) {  
		document.getElementById('content_1').style.display = 'none';  
		document.getElementById('content_2').style.display = 'none';  
		document.getElementById('content_3').style.display = 'none';          
		document.getElementById('content_4').style.display = 'none';          
		document.getElementById('content_5').style.display = 'none';          
		document.getElementById(new_content).style.display = 'block';     
		  
		document.getElementById('tab_1').className = '';  
		document.getElementById('tab_2').className = '';  
		document.getElementById('tab_3').className = '';          
		document.getElementById('tab_4').className = '';          
		document.getElementById('tab_5').className = '';          
		document.getElementById(new_tab).className = 'active';        
	}  
	
	//tabSwitch('tab_1', 'content_1');
</script> 

<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Diklat</h1>
	<hr/>
	<br>
	<br>
	<div id="tabbed_box_1" class="tabbed_box">  
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Darat</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Laut</a></li>  
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Udara</a></li>  
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">Pengembangan SDM Aparatur</a></li>  
				<li><a href="javascript:tabSwitch('tab_5', 'content_5');" id="tab_5">Sekretariat BPSDM</a></li>  
			</ul>   
				  
			<div id="content_1" class="content">
				<?=$this->mdl_diklat_front->getContenttabDiklat(3);?>
			</div>
			
			<div id="content_2" class="content" style="display:none;">
				<?=$this->mdl_diklat_front->getContenttabDiklat(4);?>
			</div>
			
			<div id="content_3" class="content" style="display:none;">
				<?=$this->mdl_diklat_front->getContenttabDiklat(5);?>
			</div>
			
			<div id="content_4" class="content" style="display:none;">
				<?=$this->mdl_diklat_front->getContenttabDiklat(2);?>
			</div>
			
			<div id="content_5" class="content" style="display:none;">
				<?=$this->mdl_diklat_front->getContenttabDiklat(1);?>
			</div>
			
		</div>   
	</div>  
	
	
	
	<div class="clearfix"></div>
</div><!-- end wrap right content-->