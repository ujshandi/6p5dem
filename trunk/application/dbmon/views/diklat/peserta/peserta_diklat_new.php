<script>
    $(document).ready(function(){
        $("#KODE_UPT").change(function(){
            var KODE_UPT = $("#KODE_UPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/diklat/getProgram",
               data : "KODE_UPT=" + KODE_UPT,
               success: function(data){
                   $("#KODE_PROGRAM").html(data);
               }
            });
        });
    });
</script>

<!-- contenna -->
<div class="wrap_right bgcontent">
        <h1 class="heading">Komposisi  <?=$title;?></h1>
        <hr/>
       
        <?=form_open('diklat/peserta')?>
        <table>
                <tr>
                <div id="indukupt">
                        <td width="100">Induk UPT : </td>
                    <td>
                                <select name="KODE_UPT" id="KODE_UPT">
                                        <?=$this->mdl_satker->getOptionSatker(array('value'=>$upt))?>
                                </select>
                        </td>
                </div>
                </tr>
                <tr>
                <div>
                        <td>Program : </td>
                    <td>
                                <select name="KODE_PROGRAM" id="KODE_PROGRAM">
                                        <?=$this->mdl_program->getOptionProgram(array('kode_induk'=>$upt, 'value'=>$program));?>
                                </select>
                        </td>
                </div>
                </tr>
                <tr>
                        <td>Tahun : </td>
                    <td>
                        <input type="text" name="tahun_awal" id="tahun_awal" maxlength="4" size="5" value="<?=$tahun_awal;?>"/>
                                <label>s/d</label>
                        <input type="text" name="tahun_akhir" id="tahun_akhir" maxlength="4" size="5" value="<?=$tahun_akhir;?>"/>
                    </td>
                </tr>
                <tr>
                        <td></td>
                        <td><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:LEFT"/></td>
                </tr>
        </table>
        <hr/>
    <?=form_close() ?>

        <div id="chart1" style="margin-top:10px; margin-left:15px; margin-bottom:20px; width:98%; min-height:300px;"></div>
        <pre class="code brush:js"></pre>
        <hr/>
        <table>
                <thead>
                        <tr>
                                <td width="20px" rowspan="2" style="text-align:center;vertical-align:middle;">No.</td>
                                <td width="400px" rowspan="2" style="text-align:center;vertical-align:middle;">UPT</td>
                                <td colspan="<?=sizeof($tahun);?>" style="text-align:center;vertical-align:middle;">TAHUN</td>
                        </tr>          
                        <tr><?php foreach ($tahun as $y) :?>
                                <td style="text-align:center;vertical-align:middle;"><?=$y?></td>
                                <?php endforeach;?>
                        </tr>
                </thead>
                <tbody>
                        <?php
                                $total=array_fill(0,sizeof($tahun),0);
                                $i=1;
                                foreach ($data->result_array() as $peserta) :
                        ?>      
                        <tr>    
                                <td><?=$i;?>.</td>
                                <td><?=$peserta['NAMA_UPT']?></td>
                                <?php
                                $j=0;
                                foreach ($tahun as $y){
                                        echo '<td>'.$peserta[$y].'</td>';
                                        $total[$j] += $peserta[$y];
                                        $j++;
                                } $i++;
                                ?>
                        </tr>                          
                        <?php endforeach;?>
                        <tr>    
                                <td colspan="2">Jumlah</td>
                                <?php $j=0; foreach ($tahun as $y) {?>
                                <td><?=$total[$j]?></td>
                                <?php $j++; }?>
                        </tr>                          
                </tbody>
        </table>

        <script class="code" type="text/javascript">
                $(document).ready(function(){
                        $.jqplot.config.enablePlugins = true;
                        var key = [<?php foreach ($tahun as $y) {echo $y.',';}?>];
                        var s1 = [<?php foreach ($total as $y) {echo $y.',';}?>];
                        var ticks = [<?php foreach ($tahun as $y) {echo $y.',';}?>];
                       
                        plot1 = $.jqplot('chart1', [s1],{
                                axes: {
                                        xaxis: {
                                                renderer: $.jqplot.CategoryAxisRenderer,
                                                ticks: ticks
                                        }
                                }
                        });

                        $('#chart1').bind('jqplotDataClick',
                                function (ev, seriesIndex, pointIndex, data) {
                                        window.location.href = "<?=base_url().'dbmon.php/sdm/dinas/'?>"+key[pointIndex];
                                }
                        );
                });
        </script>
        <div class="clear">&nbsp;</div>

</div><!-- end wrap right content-->

<!-- Don't touch this! -->


<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/syntaxhighlighter/scripts/shCore.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
<!-- Additional plugins go here -->

<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.barRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.pieRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.pointLabels.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>asset/globalstyle/js/plugins/jqplot.EnhancedLegendRenderer.min.js"></script>
