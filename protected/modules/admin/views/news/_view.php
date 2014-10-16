<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">


    <section>
        <br>
    <?php echo date('d.m.Y', $data->date); ?>
    <h3><?php echo $data->head; ?></h3>
	 <?php
    $pieces= explode("<div style=\"page-break-after: always\"><span style=\"display:none\">&nbsp;</span></div>", $data->content);
    echo $pieces[0];
    $p = new CHtmlPurifier();
     $p->options = array('URI.AllowedSchemes'=>array(
         'http' => true,
         'https' => true,
     ));
     $pieces[0] = $p->purify($pieces[0]);
    ?>
        <br>
    <?php echo CHtml::link("Читать далее", array('view', 'id'=>$data->id), array('class'=>'link') ); ?>
    </section>

</div>