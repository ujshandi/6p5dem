<script type="text/javascript">	var url='<?php echo site_url();?>/user_privilege/';	$(document).ready(function() {	//Default Action		$(".tab_content").hide(); //Hide all content		$("ul.tabs li:first").addClass("active").show(); //Activate first tab		$(".tab_content:first").show(); //Show first tab content				//On Click Event		$("ul.tabs li").click(function() {			$("ul.tabs li").removeClass("active"); //Remove any "active" class			$(this).addClass("active"); //Add "active" class to selected tab			$(".tab_content").hide(); //Hide all tab content			var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content			$(activeTab).fadeIn(); //Fade in the active content			return false;		});	});		$(document).ready(function() {				$('#list_data_tab1').load(url + 'get_all_bboard');				$(function (){			$('#txt_search').change(function (){			  var txt_search = $("#txt_search").val();			  $.ajax({					type: 'POST',					url :  url + 'get_all_bboard',					data: 'txt_search=' + txt_search,					success: function(data) {						$('#list_data_tab1').html(data);					}				});			});		});			});		function get_bboard(){		$('#list_data_tab1').load(url + 'get_all_bboard');	}	function get_sdm(){		$('#list_data_tab2').load(url + 'get_all_sdm');	}		function ajaxpaging(param_url){		var txt_search=document.getElementById('txt_search').value;		if (param_url== null ){			param_url='<?php echo site_url();?>/users/proses_pencarian/';		}		$.ajax({				type: 'POST',				url :  param_url,				data: 'txt_search=' + txt_search,				success: function(data) {					$('#list_data_tab1').html(data);				}			});	}		function ajaxpaging_sdm(param_url){		var txt_search=document.getElementById('txt_search_sdm').value;		if (param_url== null ){			param_url='<?php echo site_url();?>/users/get_users_sdm/';		}		$.ajax({				type: 'POST',				url :  param_url,				data: 'txt_search=' + txt_search,				success: function(data) {					$('#list_data_tab2').html(data);				}			});	}		function tambah_data(){		/*$.ajax({				type: 'POST',				url :  url + '/add',				data: $("#form_add_users").serialize(),				success: function(data) {					$('#list_data_tab1').html(data);				}			});*/			$('#list_data_tab1').load(url+'add');	}		function add_users(){		$.ajax({			type:'POST',			url :  url + 'proses_add',			data: $("#form_add_users").serialize(),			success: function(data) {				$('#list_data_tab1').html(data);			}		});		return false;	}		function edit_privilege_bboard(id){		$('#list_data_tab1').load(url+'edit_bboard/' + id);	}		function proses_edit(){		$.ajax({			type:'POST',			url :  url + 'proses_edit',			data: $("#form_edit_users").serialize(),			success: function(data) {				$('#list_data_tab1').html(data);			}		});		return false;	}		function add_sdm(){		$.ajax({			type:'POST',			url :  url + 'proses_add_sdm',			data: $("#form_add_sdm").serialize(),			success: function(data) {				$('#list_data_tab2').html(data);			}		});		return false;	}		function get_data_edit(id_users){		$('#list_data_tab2').load(url+'load_edit_bboard/' + id_users);	}	function get_data_edit_sdm(id){		$('#list_data_tab2').load(url+'load_edit_sdm/' + id);	}		function edit_privilege_sdm(){		$.ajax({			type:'POST',			url :  url + 'proses_edit_sdm',			data: $("#form_edit_sdm").serialize(),			success: function(data) {				$('#list_data_tab2').html(data);			}		});		return false;	}	function hapus_users_sdm(id_users){		var conf = confirm("Hapus ? ");		if (conf==true){			$('#list_data_tab2').load(url+'proses_delete_sdm/' + id_users);		}else{			return false;		}	}</script><div class="wrap_right bgcontent">	<ul class="tabs">        <li><a href="#tab1" onclick="get_bboard()">Buletin Board</a></li>        <li><a href="#tab2" onclick="get_sdm()">SDM</a></li>        <li><a href="#tab3">Diklat</a></li>        <li><a href="#tab4">Manajemen Kompetensi</a></li>    </ul>    <div class="tabbed">        <div id="tab1" class="tab_content">            <h2>Buletin Board</h2>			<input type="text" name="txt_search" id="txt_search" value=""/><!--<input type="button" onClick="ajaxpaging()" value="Cari">-->			&nbsp; <a href="javascript:void(0);" onClick="ajaxpaging()" class="control">&nbsp; &nbsp; Cari &nbsp; &nbsp; </a>            <div id="list_data_tab1"></div>        </div>        <div id="tab2" class="tab_content">            <h2>SDM</h2>				<input type="text" name="txt_search_sdm" id="txt_search_sdm" value="<?=$this->session->userdata('keysearch_users'); ?>"/><!--<input type="button" onClick="ajaxpaging()" value="Cari">-->				&nbsp; <a href="javascript:void(0);" onClick="ajaxpaging_sdm()" class="control">&nbsp; &nbsp; Cari &nbsp; &nbsp; </a>            <div id="list_data_tab2"></div>        </div>        <div id="tab3" class="tab_content">            <h2>Diklat</h2>            <div id="list_data_tab3"></div>        </div>    </div>	<div class="clear">&nbsp;</div></div>