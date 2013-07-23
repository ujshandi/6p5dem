var frmHeight = getClientHeight();
var frmWidth = getClientWidth();
var tinggi = Math.round(frmHeight/2)-73;
var	lebar = frmWidth-12;
var	lebar2 = Math.round(lebar/2)-156;
var post={};
function getClientHeight(){
	var theHeight;
	if (window.innerHeight)
		theHeight=window.innerHeight;
	else if (document.documentElement && document.documentElement.clientHeight) 
		theHeight=document.documentElement.clientHeight;
	else if (document.body) 
		theHeight=document.body.clientHeight;
	
	return theHeight;
}

function getClientWidth(){
	var theWidth;
	if (window.innerWidth) 
		theWidth=window.innerWidth;
	else if (document.documentElement && document.documentElement.clientWidth) 
		theWidth=document.documentElement.clientWidth;
	else if (document.body) 
		theWidth=document.body.clientWidth;

	return theWidth;
}



function get_chart(id,type_chart,mod,render_id,lebar_na,tinggi_na){
	post['kat']=mod;
	$("#"+render_id).html("").addClass("loading");
	$.post(host+'dashboard/get_datagrap',post,function(r){
			//r = eval('('+r+')');
			if(FusionCharts(id)){FusionCharts(id).dispose();}
			id = new FusionCharts(site+"asset/dbmon/swf/"+type_chart+".swf", id, frmWidth-lebar_na, (mod=='campur' ? tinggi_na : frmHeight-tinggi_na));
			id.setDataXML(r);
			id.render(render_id);
			 $("#"+render_id).removeClass("loading");
	});
}

var container3;
function mywindow(html,judul,width,height){
    container3 = "win"+Math.floor(Math.random()*9999);
    $("<div id="+container3+"></div>").appendTo("body");
    container3 = "#"+container3;
    $(container3).html(html);
    $(container3).css('padding','5px');
    $(container3).window({
       title:judul,
       width:width,
       height:height,
       autoOpen:false,
       maximizable:false,
       minimizable: false,
	   collapsible: false,
       resizable: false,
       closable:true,
       modal:true,
	   onBeforeClose:function(){	   
			$(container3).window("close",true);
			$(container3).window("destroy",true);
	   }
    });
    $(container3).window('open');        
}
function mywindow_close(){
    $(container3).window('close');
    $(container3).html("");
}

function get_data_kab(kd_prov,flag_kelamin,w,h,url_na){
	loadingna()
	var url=host+'dashboard/'+url_na;
	var post_na={};
	post_na['kd_prov']=kd_prov;
	if(flag_kelamin!=''){	
		post_na['flag_kelamin']=flag_kelamin;
	}

	$.post(url,post_na,function(resp){
		mywindow(resp,'LIST DATA PER KABUPATEN',frmWidth-w,frmHeight-h);
		winLoadingClose();
	});
	
}

function windowLoading(html,judul,width,height){
    divcontainerz = "win"+Math.floor(Math.random()*9999);
    $("<div id="+divcontainerz+"></div>").appendTo("body");
    divcontainerz = "#"+divcontainerz;
    $(divcontainerz).html(html);
    $(divcontainerz).css('padding','5px');
    $(divcontainerz).window({
       title:judul,
       width:width,
       height:height,
       autoOpen:false,
       modal:true,
       maximizable:false,
       resizable:false,
       minimizable:false,
       closable:false,
       collapsible:false,  
    });
    $(divcontainerz).window('open');        
}
function winLoadingClose(){
    $(divcontainerz).window('close');
    //$(divcontainer).html('');
}
function loadingna(){
	windowLoading("<img src='"+site+"asset/dbmon/images/loading.gif' style='position: fixed;top: 50%;left: 50%;margin-top: -10px;margin-left: -25px;'/>","Mohon Tunggu",200,100);
}

function loadUrl(obj, urls){
	var url=host+'dashboard/'+urls;
	$('.btn-highlight').removeClass("btn-highlight");
	obj.className += " btn-highlight";	
	
    $("#content_na").html("").addClass("loading");
	$.get(url,function (html){
	    $("#content_na").html(html).removeClass("loading");
    });
}

function fillCombo(url, SelID, value, value2, value3, value4){
	//if(Ext.get(SelID).innerHTML == "") return false;
	if (value == undefined) value = "";
	if (value2 == undefined) value2 = "";
	if (value3 == undefined) value3 = "";
	if (value4 == undefined) value4 = "";
	
	$.post(url, {"v": value, "v2": value2, "v3": value3, "v4": value4},function(data){
	$('#'+SelID).append(data);
	});
}