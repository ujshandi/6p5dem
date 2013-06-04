<div id="provin"><label>Kabupaten/Kota   <em>*</em></label>
						<?php
							echo form_dropdown("KODEKABUP", $option_kabupkota, $this->input->post('KODEKABUP'),"id='KODEKABUP'");
						?></div>