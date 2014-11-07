<?php
/* @var $this ParserController */
/* @var $data Parser */
?>

<!--<script type="text/javascript">-->
<!--    $(document).ready(function() {-->
<!--        $(".fancybox").fancybox();-->
<!--    });-->
<!--</script>-->

<div class="view">


            <?php echo CHtml::encode($data->id);?>

            <a class="fancybox" data-fancybox-type="iframe" href="/parser/sites/<?= $data->id ?>.html"> <?= $data->name; ?> </a>

            <?php echo CHtml::encode(date('d.m.Y', $data->date));
            CHtml::link($data->name, '/parser/sites/'.$data->id.'.html', array('class'=>'fancybox', 'data-fancybox-type'=>'iframe'))
            ?>

</div>