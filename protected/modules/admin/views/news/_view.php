<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">



    <?php echo date('d.m.Y', $data->date); ?>
    <h3><?php echo $data->head; ?></h3>
	 <?php
    $pieces= explode("<div style=\"page-break-after: always\"><span style=\"display:none\">&nbsp;</span></div>", $data->content);
    echo $pieces[0];
    ?>
    <?php echo CHtml::link("Читать далее", array('view', 'id'=>$data->id) ); ?>
	<br /><br/><br /><br/>

</div>