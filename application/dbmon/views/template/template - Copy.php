<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><!-- saved from url=(0104)http://www.gallyapp.com/tf_themes/weadmin/dashboard_blue.html?username=admin&password=admin&submit=Login -->
 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
 
<!-- Website Title --> 
<title>DATABASE SUMBERDAYA MANUSIA PERHUBUNGAN</title>

<!-- Meta data for SEO -->
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Template stylesheet -->
<link href="public/diklat/css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<link href="public/diklat/css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="public/diklat/css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="public/diklat/js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="public/diklat/js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="public/diklat/js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="public/diklat/css/tipsy.css" rel="stylesheet" type="text/css" media="all">

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->

<!-- Jquery and plugins -->
<script type="text/javascript" src="public/diklat/js/jquery.js"></script>
<script type="text/javascript" src="public/diklat/js/jquery-ui.js"></script>
<script type="text/javascript" src="public/diklat/js/jquery.img.preload.js"></script>
<script type="text/javascript" src="public/diklat/js/hint.js"></script>
<script type="text/javascript" src="public/diklat/js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="public/diklat/js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="public/diklat/js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="public/diklat/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="public/diklat/js/custom_blue.js"></script>

</head>
<body>
<div class="content_wrapper">

	<!-- Begin header -->
	<div id="header">
		<div id="logo">
			<img src="public/diklat/images/logo.png" alt="logo"/>
		</div>
		<div id="search">
			<form action="dashboard.html" id="search_form" name="search_form" method="get">
				<input type="text" id="q" name="q" title="Search" class="search noshadow"/>
			</form>
		</div>
		<div id="account_info">
			<img src="public/diklat/images/icon_online.png" alt="Online" class="mid_align"/>
			Hello <a href="default.htm">Admin</a> (<a href="default.htm">1 new message</a>) | <a href="default.htm">Setting</a> | <a href="default.htm">Logout</a>
		</div>
	</div>
	<!-- End header -->
	
	
	<!-- Begin left panel -->
	<a href="javascript:;" id="show_menu">&raquo;</a>
	<div id="left_menu">
		<a href="javascript:;" id="hide_menu">&laquo;</a>
		<ul id="main_menu">
			<li><a href="#">
				<img src="public/diklat/images/icon_home.png" alt="Home"/>Home</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/icon_users.png" alt="Users"/>Data User</a>
				<ul>
					<li><a href="default.htm">Tambah Users</a></li>
					<li><a href="default.htm">Edit Users</a></li>
					<li><a href="default.htm">Hapus Users</a></li>
				</ul>	
			</li>
			<li>
				<a id="#" href="#"><img src="public/diklat/images/icon_posts.png" alt="Pages"/>Data Satuan Kerja</a>				
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/icon_posts.png" alt="Posts"/>Data UPT</a>				
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/icon_posts.png" alt="Media"/>Data Program</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/icon_posts.png" alt="Media"/>Data Diklat</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/icon_posts.png" alt="Media"/>Data Kurikulum</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/icon_posts.png" alt="Media"/>Data Dosen</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/icon_posts.png" alt="Media"/>Data Peserta</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/icon_posts.png" alt="Media"/>Data Alumni</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/calendar.png" alt="Media"/>Kelender Akademik</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/jenis_sapra.png" alt="Media"/>Jenis Sarana Prasarana</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/rekam_sapra.png" alt="Media"/>Rekam Sarana Prasarana</a>
			</li>
			<li>
				<a href="#"><img src="public/diklat/images/penyuluhan.png" alt="Media"/>Penyuluhan</a>
			</li>
		</ul>
		<br class="clear"/>
		
		<!-- Begin left panel calendar -->
		<div id="calendar"></div>
		<!-- End left panel calendar -->
		
	</div>
	<!-- End left panel -->
	
	
	<!-- Begin content -->
	<div id="content">
		<div class="inner">
			<h1>Dashboard</h1>
				<div >
						<p>Selamat datang di halaman Administrator</p>
						<p>Silahkan pilih menu disamping atau klik gambar ikon dibawah ini untuk mengelola konten aplikasi</p>
						
				</div>
			
			<!-- Begin shortcut menu -->
			<ul id="shortcut">
    			<li>
    			  <a href="modal_window.html">
				    <img src="public/diklat/images/shortcut/user.png" alt="home"/><br/>
				    <strong>User</strong>
				  </a>
				</li>
    			<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/satker.png" alt="calendar"/><br/>
				    <strong>Satker</strong>
				  </a>
				</li>
    			<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/upt.png" alt="stats"/><br/>
				    <strong>UPT</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/program.png" alt="setting"/><br/>
				    <strong>Program</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/contacts.png" alt="contacts"/><br/>
				    <strong>Diklat</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html"  title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/kurikulum.png" alt="posts"/><br/>
				    <strong>Kurikulum</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/pengajar.png" alt="posts"/><br/>
				    <strong>Pengajar</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/peserta.png" alt="posts"/><br/>
				    <strong>Peserta</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/alumni.png" alt="posts"/><br/>
				    <strong>Alumni</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/calendar.png" alt="posts"/><br/>
				    <strong>Kalender</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/posts.png" alt="posts"/><br/>
				    <strong>Jenis Sarpras</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html" title="Click me to open modal window">
				    <img src="public/diklat/images/shortcut/rekam.png" alt="posts"/><br/>
				    <strong>Rekam Sarpras</strong>
				  </a>
				</li>
				<li>
    			  <a href="modal_window.html">
				    <img src="public/diklat/images/shortcut/penyuluhan.png" alt="posts"/><br/>
				    <strong>Penyuluhan</strong>
				  </a>
				</li>
  			</ul>
			<!-- End shortcut menu -->
			
			<!-- Begin shortcut notification -->
			<div id="shortcut_notifications">
				<!--<span class="notification" rel="shortcut_home">10</span>
				<span class="notification" rel="shortcut_contacts">5</span>
				<span class="notification" rel="shortcut_posts">1</span> -->
			</div>
			<!-- End shortcut noficaton -->
			
			
			<br class="clear"/>
			<!-- Begin graph window -->
			<div class="onecolumn">
				<div class="header">
					<span>Charts</span>
					<div class="switch" style="width:200px">
						<table width="200px" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td>
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch active" value="Bar" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="chart_area" name="chart_area" class="middle_switch" value="Area" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="chart_pie" name="chart_pie" class="middle_switch" value="Pie" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="chart_line" name="chart_line" class="right_switch" value="Line" style="width:50px"/>
								</td>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
				<br class="clear"/>
				<div class="content">
					<div id="chart_wrapper" class="chart_wrapper"></div>
					<br class="clear"/>
					<div class="alert_info">
						<p>
							<img src="images/icon_info.png" alt="success" class="mid_align"/>
							Click on each cell to change its value and graph.
						</p>
					</div>
					<br class="clear"/>
					<form id="form_data" name="form_data" action="" method="post">
						<table id="graph_data" class="data" rel="bar" cellpadding="0" cellspacing="0" width="100%">
						<caption>2009/2010 Sales by industry (Million)</caption>
						<thead>
							<tr>
								<td class="no_input">&nbsp;</td>
								<th>Accounting</th>
								<th>Banking</th>
								<th>Beauty Care</th>
								<th>Insurance</th>
								<th>Internet</th>
								<th>Media</th>
								<th>Telecomm</th>
								<th>Transportation</th>
							</tr>
						</thead>
						
						<tbody>
							<tr>
								<th>2009</th>
								<td>10</td>
								<td>3</td>
								<td>4</td>
								<td>9</td>
								<td>14</td>
								<td>2</td>
								<td>7</td>
								<td>12</td>
							</tr>
							
							<tr>
								<th>2010</th>
								<td>12</td>
								<td>5</td>
								<td>5</td>
								<td>6</td>
								<td>11</td>
								<td>7</td>
								<td>9</td>
								<td>16</td>
							</tr>
							
						</tbody>
						</table>
						<div id="chart_wrapper" class="chart_wrapper"></div>
					<!-- End bar chart table-->
					</form>
				</div>
			</div>
			<!-- End graph window -->
			
			
			<!-- Begin one column window -->
			<div class="onecolumn">
				<div class="header">
					<span>List data</span>
				</div>
				<br class="clear"/>
				<div class="content">
					<form id="form_data" name="form_data" action="" method="post">
						<table class="data" width="100%" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th style="width:10px">
										<input type="checkbox" id="check_all" name="check_all"/>
									</th>
									<th style="width:30%">Column 1</th>
									<th style="width:20%">Column 2</th>
									<th style="width:30%">Column 3</th>
									<th style="width:15%">Column 4</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<input type="checkbox"/>
									</td>
									<td>Maecenas lacinia orci at neque</td>
									<td><a href="default.htm">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>
										<a href="default.htm"><img src="images/icon_edit.png" alt="edit" class="help" title="Edit"/></a>
										<a href="default.htm"><img src="images/icon_delete.png" alt="delete" class="help" title="Delete"/></a>
									</td>
								</tr>
								<tr>
									<td>
										<input type="checkbox"/>
									</td>
									<td>Maecenas lacinia orci at neque</td>
									<td><a href="default.htm">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>
										<a href="default.htm"><img src="images/icon_edit.png" alt="edit" class="help" title="Edit"/></a>
										<a href="default.htm"><img src="images/icon_delete.png" alt="delete" class="help" title="Delete"/></a>
									</td>
								</tr>
								<tr>
									<td>
										<input type="checkbox"/>
									</td>
									<td>Maecenas lacinia orci at neque</td>
									<td><a href="default.htm">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>
										<a href="default.htm"><img src="images/icon_edit.png" alt="edit" class="help" title="Edit"/></a>
										<a href="default.htm"><img src="images/icon_delete.png" alt="delete" class="help" title="Delete"/></a>
									</td>
								</tr>
								<tr>
									<td>
										<input type="checkbox"/>
									</td>
									<td>Maecenas lacinia orci at neque</td>
									<td><a href="default.htm">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>
										<a href="default.htm"><img src="images/icon_edit.png" alt="edit" class="help" title="Edit"/></a>
										<a href="default.htm"><img src="images/icon_delete.png" alt="delete" class="help" title="Delete"/></a>
									</td>
								</tr>
							</tbody>
						</table>
						<div id="chart_wrapper" class="chart_wrapper"></div>
					<!-- End bar chart table-->
					</form>
					
					<!-- Begin pagination -->
						<div class="pagination">
							<a href="#">«</a>
							<a href="#" class="active">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#">4</a>
							<a href="#">5</a>
							<a href="#">6</a>
							<a href="#">»</a>
						</div>
					<!-- End pagination -->
					
				</div>
			</div>
			<!-- End one column window -->
			
			
			<!-- Begin two column window -->
			
			<!-- Begin left column window -->
			<div class="twocolumn">
				<div class="column_left">
					<div class="header">
						<span>Form elements</span>
					</div>
					<br class="clear"/>
					<div class="content">
						<div class="alert_warning" style="margin-top:0">
							<p>
								<img src="images/icon_warning.png" alt="success" class="mid_align"/>
								Warning Notification.
							</p>
						</div>
						<div class="alert_info">
							<p>
								<img src="images/icon_info.png" alt="success" class="mid_align"/>
								Information Notification.
							</p>
						</div>
						<div class="alert_success">
							<p>
								<img src="images/icon_accept.png" alt="success" class="mid_align"/>
								Success Notification.
							</p>
						</div>
						<div class="alert_error">
							<p>
								<img src="images/icon_error.png" alt="delete" class="mid_align"/>
								Error Notification.
							</p>
						</div>
						<br class="clear"/>
						
						<h2>Headline</h2><br/>
						<p>
							<label>Text input label:</label><br/>
							<input type="text" id="text_input1" style="width:300px"/>
						</p>
						<br/>
						<p>
							<label>Date input label:</label><br/>
							<input type="text" id="datepicker" name="datepicker" style="width:300px"/>
						</p>
						<br/>
						<p>
							<label>Textarea label:</label><br/>
							<textarea rows="5" cols="35"></textarea>
						</p>
						<br/>
						<p>
							<select>
            	      			<optgroup label="Apple">
            	      				<option>iPad</option>
            	      				<option>iPhone</option>
            	      				<option>Macbook</option>
            	      			</optgroup>
            	      			<optgroup label="Microsoft">
            	      				<option>Window 7</option>
            	      				<option>Zune</option>
            	      				<option>XBox 360</option>
            	      			</optgroup>
            	    		</select>
						</p>
						<br/>
						<p>
							<input type="checkbox" class="checkbox" checked="checked" id="cbdemo1"> <label for="cbdemo1">Checkbox label</label>
							<input type="radio" checked="checked" class="radio"> <label>Radio button label</label> 
						</p>
						<br/><br/>
						<p>
							<input type="button" id="btn_modal" value="Open modal window"/>
						</p>
					</div>
				</div>
				<!-- End left column window -->
				
				<!-- Begin right column window -->
				<div class="column_right">
					<div class="header">
						<span>Text style and photos</span>
					</div>
					<br class="clear"/>
					<div class="content">
						<h3>Headline</h3>
						<ul class="style">
            	  			<li>Cupidatat non</li>
            	 			<li>Officia deserunt mollit</li>
            	  			<li>Velit esse cillum</li>
            			</ul>
            			<h4>Headline</h4>
						<ol class="style">
            	  			<li>Cupidatat non</li>
            	 			<li>Officia deserunt mollit</li>
            	  			<li>Velit esse cillum</li>
            			</ol>
            			<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum 
							mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus 
							euismod ultricies. Maecenas lacinia orci at neque commodo commodo. Donec egestas metus a risus 
							euismod ultricies. 
						</p>
						<span class="quote">
							&quot;This is a blockquote - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel enim sed arcu tempor ornare id sed est. Nunc quis justo at&quot;
						</span>
						
						<!-- Begin media modal window -->
						<ul class="media_photos">
	  		  				<li>
	  		  					  <a rel="slide" href="public/diklat/gallery/1.jpg" title="Kobe, Osaka and Kyoto JAPAN">
	  		  					  	<img src="public/diklat/gallery/1_t.jpg" alt="Kobe, Osaka and Kyoto JAPAN"/>
	  		  					  </a>
	  		  				</li>
	  		  				
	  		  				<li>
	  		  					  <a rel="slide" href="public/diklat/gallery/2.jpg" title="Ji's wedding">
	  		  					  	<img src="public/diklat/gallery/2_t.jpg" alt="Ji's wedding"/>
	  		  					  </a>
	  		  				</li>
	  		  				
	  		  				<li>
	  		  					  <a rel="slide" href="public/diklat/gallery/3.jpg" title="BANGKOK-CHIENGKARN">
	  		  					  	<img src="public/diklat/gallery/3_t.jpg" alt="BANGKOK-CHIENGKARN"/>
	  		  					  </a>
	  		  				</li>
	  		  				<li>
	  		  					  <a rel="slide" href="public/diklat/gallery/1.jpg" title="Kobe, Osaka and Kyoto JAPAN">
	  		  					  	<img src="public/diklat/gallery/1_t.jpg" alt="Kobe, Osaka and Kyoto JAPAN"/>
	  		  					  </a>
	  		  				</li>
	  		  				
	  		  				<li>
	  		  					  <a rel="slide" href="public/diklat/gallery/2.jpg" title="Ji's wedding">
	  		  					  	<img src="public/diklat/gallery/2_t.jpg" alt="Ji's wedding"/>
	  		  					  </a>
	  		  				</li>
	  		  				
	  		  				<li>
	  		  					  <a rel="slide" href="public/diklat/gallery/3.jpg" title="BANGKOK-CHIENGKARN">
	  		  					  	<img src="public/diklat/gallery/3_t.jpg" alt="BANGKOK-CHIENGKARN"/>
	  		  					  </a>
	  		  				</li>
	  					</ul>
	  					<!-- End media modal window -->
					</div>
				</div>
				<!-- End right column window -->
			</div>
			<!-- End two column window -->
			
			
			<br class="clear"/>
			
			
			<!-- Begin one column tab content window -->
			<div class="onecolumn">
				<div class="header">
					<span>Tab contents</span>
					<div class="switch" style="width:150px">
						<table width="150px" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td>
									<input type="button" id="tab1" name="tab1" class="left_switch" value="Tab1" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="tab2" name="tab2" class="middle_switch" value="Tab2" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="tab3" name="tab3" class="right_switch active" value="Tab3" style="width:50px"/>
								</td>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
				<br class="clear"/>
				<div class="content">
					<div id="tab1_content" class="tab_content hide">
						<h4>Headline of tab 1</h4>
						<ol class="style">
            	  			<li>Cupidatat non</li>
            	 			<li>Officia deserunt mollit</li>
            	  			<li>Velit esse cillum</li>
            			</ol>
            			<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum 
							mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus 
							euismod ultricies. Maecenas lacinia orci at neque commodo commodo. Donec egestas metus a risus 
							euismod ultricies. 
						</p>
					</div>
					<div id="tab2_content" class="tab_content hide">
						<h4>Headline of tab 2</h4>
            			<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum 
							mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus 
							euismod ultricies. Maecenas lacinia orci at neque commodo commodo. Donec egestas metus a risus 
							euismod ultricies. 
						</p>
						<ul class="media_photos">
	  		  				<li>
	  		  					  <a rel="slide" href="gallery/1.jpg" title="Kobe, Osaka and Kyoto JAPAN">
	  		  					  	<img src="public/diklat/gallery/1_t.jpg" alt="Kobe, Osaka and Kyoto JAPAN"/>
	  		  					  </a>
	  		  				</li>
	  		  				
	  		  				<li>
	  		  					  <a rel="slide" href="gallery/2.jpg" title="Ji's wedding">
	  		  					  	<img src="public/diklat/gallery/2_t.jpg" alt="Ji's wedding"/>
	  		  					  </a>
	  		  				</li>
	  		  				
	  		  				<li>
	  		  					  <a rel="slide" href="gallery/3.jpg" title="BANGKOK-CHIENGKARN">
	  		  					  	<img src="public/diklat/gallery/3_t.jpg" alt="BANGKOK-CHIENGKARN"/>
	  		  					  </a>
	  		  				</li>
	  		  				<li>
	  		  					  <a rel="slide" href="gallery/1.jpg" title="Kobe, Osaka and Kyoto JAPAN">
	  		  					  	<img src="public/diklat/gallery/1_t.jpg" alt="Kobe, Osaka and Kyoto JAPAN"/>
	  		  					  </a>
	  		  				</li>
	  		  				
	  		  				<li>
	  		  					  <a rel="slide" href="gallery/2.jpg" title="Ji's wedding">
	  		  					  	<img src="public/diklat/gallery/2_t.jpg" alt="Ji's wedding"/>
	  		  					  </a>
	  		  				</li>
	  		  				
	  		  				<li>
	  		  					  <a rel="slide" href="gallery/3.jpg" title="BANGKOK-CHIENGKARN">
	  		  					  	<img src="public/diklat/gallery/3_t.jpg" alt="BANGKOK-CHIENGKARN"/>
	  		  					  </a>
	  		  				</li>
	  					</ul>
	  					<br class="clear"/>
					</div>
					<div id="tab3_content" class="tab_content">
						<div class="alert_success">
							<p>
								<img src="public/diklat/images/icon_accept.png" alt="success" class="mid_align"/>
								Successfully display tab 3
							</p>
						</div>
            			<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum 
							mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus 
							euismod ultricies. Maecenas lacinia orci at neque commodo commodo. Donec egestas metus a risus 
							euismod ultricies. 
						</p>
					</div>
				</div>
			</div>
			<!-- End one column tab content window -->
			
			
			<!-- Begin three column window -->
			<div class="onecolumn" style="padding-bottom:20px">
				<div class="header">
					<span>Three column window</span>
				</div>
				<br class="clear"/>
				<div class="content">
					<div class="alert_info">
						<p>
							<img src="public/diklat/images/icon_info.png" alt="success" class="mid_align"/>
							Drag one of three inner window and drop to another to sort it.
						</p>
					</div>
					<br class="clear"/>
					<h4>Try with three column window.</h4>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo. Donec egestas metus a risus euismod ultricies.
					</p>
					<div id="threecolumn" class="threecolumn">
						<div class="threecolumn_each">
							<div class="header">
								<span>Column1</span>
							</div>
							<br class="clear"/>
							<div class="content">
								Your contents go here.
							</div>
						</div>
						<div class="threecolumn_each">
							<div class="header">
								<span>Column2</span>
							</div>
							<br class="clear"/>
							<div class="content">
								Your contents go here.
							</div>
						</div>
						<div class="threecolumn_each">
							<div class="header">
								<span>Column3</span>
							</div>
							<br class="clear"/>
							<div class="content">
								Your contents go here.
							</div>
						</div>
					</div>
				</div>
				<br class="clear"/>
			</div>
			<!-- End three column window -->
			

			<!-- Begin one column wysiwyg window -->
			<div class="onecolumn">
				<div class="header">
					<span>WYSIWYG textarea</span>
				</div>
				<br class="clear"/>
				<div class="content">
					<textarea id="wysiwyg"></textarea>
				</div>
			</div>
			<!-- End one column wysiwyg window -->
		</div>
		
		<br class="clear"/><br class="clear"/>
		
		
		<!-- Begin footer -->
		<div id="footer">
			&copy; Copyright 2010 by Your Company
		</div>
		<!-- End footer -->
		
		
	</div>
	<!-- End content -->
</div>

<!--ipt type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-203192-11']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</scri-->
</body>
</html>