<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">




<div class="box box-tiles style-gray">
    <article>
        <div class="box-body style-inverse">
            <h2><?php echo $data->head; ?></h2>
            <div class="text-muted">
                <?php echo date('d.m.Y', $data->date); ?>
            </div>
        </div>

        <div class="box-body style-white">
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
            <br/>
            <?php echo CHtml::link("Читать далее", array('view', 'id'=>$data->id), array('class'=>'btn btn-transparent btn-primary') ); ?>
        </div>
    </article>
</div>





</div>