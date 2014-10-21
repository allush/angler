<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">


    <div class="box box-type-pricing indent-bottom">
        <div class="box-body text-left style-primary-gradient">
            <h2 class="text-light"><?php echo $data->head; ?></h2>
            <br/>
            <p class="opacity-50"><em><?php echo date('d.m.Y', $data->date); ?></em></p>
        </div>

        <div class="box-body style-body">
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
        </div>

        <div class="box-body style-body">
            <?php echo CHtml::link("Читать далее", array('view', 'id'=>$data->id), array('class'=>'btn btn-transparent') ); ?>
        </div>
    </div>



</div>