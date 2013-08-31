<div id="usefulinkcontent_left">

<table>
	<thead>
		<tr>
			<th align="left" valign="top" scope="col">Lowongan  Perhubungan Darat Terbaru</th>
			<th align="left" valign="top" scope="col">Expired</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i=0;
			foreach($result_md->result()  as $row){ 
		?>
		<tr>
			<?php
				$originalDate = $row->LOWONGAN_DATE_EXPIRED;
				$newDate = date("Y-m-d", strtotime($originalDate));
			?>
			<td align="left" valign="top">
				<a href="<?=site_url().'/lowongan_kerja/lowongan_kerja_detail/'.$row->LOWONGAN_CODE?>" class="control" ><span class="edit"><?=$row->LOWONGAN_TITLE?></span></a>
			</td>
			<td align="left" valign="top">
				<a href="<?=site_url().'/lowongan_kerja/lowongan_kerja_detail/'.$row->LOWONGAN_CODE?>" class="control" ><span class="edit"><?=$newDate?></span></a>
			</td>
		</tr>
		
		<?php
				$i++;
			} 
		?>
		<?php if ($i==0){
			echo "<tr><td>Lowongan Perhubungan Darat</td></tr>";
		} ?>
	</tbody>
	
</table>
</div>
<div id="usefulinkcontent_right">
<table >
	<thead>
		<tr>
			<th align="left" valign="top" scope="col">Lowongan  Perhubungan Laut Terbaru</th>
			<th align="left" valign="top" scope="col">Expired</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i=0;
			foreach($result_ml->result()  as $row){ 
		?>
		<tr>
			<?php
				$originalDate = $row->LOWONGAN_DATE_EXPIRED;
				$newDate = date("Y-m-d", strtotime($originalDate));
			?>
			<td align="left" valign="top">
				<a href="<?=site_url().'/lowongan_kerja/lowongan_kerja_detail/'.$row->LOWONGAN_CODE?>" class="control" ><span class="edit"><?=$row->LOWONGAN_TITLE?></span></a>
			</td>
			<td align="left" valign="top">
				<a href="<?=site_url().'/lowongan_kerja/lowongan_kerja_detail/'.$row->LOWONGAN_CODE?>" class="control" ><span class="edit"><?=$newDate?></span></a>
			</td>
		</tr>
		
		<?php
				$i++;
			} 
		?>
		<?php if ($i==0){
			echo "<tr><td>Lowongan Perhubungan Laut</td></tr>";
		} ?>
	</tbody>
	
</table>
</div>

<div class="clearfix">&nbsp;</div>
<div id="usefulinkcontent_left">
<table>
	<thead>
		<tr>
			<th align="left" valign="top" scope="col">Lowongan  Perhubungan Udara Terbaru</th>
			<th align="left" valign="top" scope="col">Expired</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i=0;
			foreach($result_mu->result()  as $row){ 
		?>
		<tr>
			<?php
				$originalDate = $row->LOWONGAN_DATE_EXPIRED;
				$newDate = date("Y-m-d", strtotime($originalDate));
			?>
			<td align="left" valign="top">
				<a href="<?=site_url().'/lowongan_kerja/lowongan_kerja_detail/'.$row->LOWONGAN_CODE?>" class="control" ><span class="edit"><?=$row->LOWONGAN_TITLE?></span></a>
			</td>
			<td align="left" valign="top">
				<a href="<?=site_url().'/lowongan_kerja/lowongan_kerja_detail/'.$row->LOWONGAN_CODE?>" class="control" ><span class="edit"><?=$newDate?></span></a>
			</td>
		</tr>
		
		<?php
				$i++;
			} 
		?>
		<?php if ($i==0){
			echo "<tr><td>Lowongan Perhubungan Udara</td></tr>";
		} ?>
	</tbody>
	
</table>
</div>
<div id="usefulinkcontent_right">
<table>
	<thead>
		<tr>
			<th align="left" valign="top" scope="col">Lowongan  Perhubungan Kereta Api Terbaru</th>
			<th align="left" valign="top" scope="col">Expired</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i=0;
			foreach($result_mka->result()  as $row){ 
		?>
		<tr>
			<?php
				$originalDate = $row->LOWONGAN_DATE_EXPIRED;
				$newDate = date("Y-m-d", strtotime($originalDate));
			?>
			<td align="left" valign="top">
				<a href="<?=site_url().'/lowongan_kerja/lowongan_kerja_detail/'.$row->LOWONGAN_CODE?>" class="control" ><span class="edit"><?=$row->LOWONGAN_TITLE?></span></a>
			</td>
			<td align="left" valign="top">
				<a href="<?=site_url().'/lowongan_kerja/lowongan_kerja_detail/'.$row->LOWONGAN_CODE?>" class="control" ><span class="edit"><?=$newDate?></span></a>
			</td>
		</tr>
		
		<?php
				$i++;
			} 
		?>
		<?php if ($i==0){
			echo "<tr><td>Lowongan Perhubungan Kereta Api</td></tr>";
		} ?>
	</tbody>
	
</table>
</div>
<div class="clear">&nbsp;</div>

