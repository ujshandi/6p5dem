 <div id="wrapper">
 			<div class="home"><a href="../web/">&nbsp;HOME&nbsp;</a></div>

	<div class="container">
 
		<div id="navigation">
		 
 		<?
 		$parent_menu = $this->Home_model->get_parent_menu();
		?>
 		<ul id="nav" class="dropdown dropdown-horizontal">
			<li><a href="<?=base_url()?>">HOME</a></li>
			<?
				foreach($parent_menu as $parent){
					//master menu condition
					$sub_menu = $this->Home_model->get_sub_menu($parent->menu_code);
 
 					if($sub_menu->num_rows() == 0){
						echo '<li><a href='.site_url().'/'.$parent->menu_group."/".$parent->menu_controller.'>'.$parent->menu_name.'</a></li>';
					}else{
						echo '<li><span class=dir>'.$parent->menu_name.'</span>';
							echo '<ul>';
							
							foreach($sub_menu->result() as $sub){
							//sub menu
 								$child_menu = $this->Home_model->get_child_submenu($sub->menu_code);
								if($child_menu->num_rows() == 0){
									echo '<li><a href='.site_url().'/'.$sub->menu_group.$sub->menu_controller.'>'.$sub->menu_name.'</a></li>';
								}else{
									echo '<li><span class=dir>'.$sub->menu_name.'</span>';
										echo '<ul>';
											//add child menu
											foreach($child_menu->result() as $child){
												echo '<li><a href='.site_url().'/'.$child->menu_group.$child->menu_controller.'>'.$child->menu_name.'</a></li>';
											}
										echo '</ul>';
									echo '</li>';
								}
								
							}
							echo '</ul>';
						echo '</li>';
 					}	 
				}
			?>
			
 		</ul>
</div> 

			<!-- End Of Navigation-->
