<?php
/* @var $this ParserController */
/* @var $dataProvider CActiveDataProvider */
/* @var $data array */
/* @var $siteNames array */
/* @var $minDate int */
/* @var $maxDate int */

$this->breadcrumbs = array(
    'Parsers',
);

//$this->menu=array(
//	array('label'=>'Create Parser', 'url'=>array('create')),
//	array('label'=>'Manage Parser', 'url'=>array('admin')),
//);
//
?>


<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $(".fancybox").fancybox({-->
<!---->
<!--        });-->
<!--    });-->
<!---->
<!---->
<!--    $(function () {-->
<!--        var time = new Date().getTime() / 1000;-->
<!--        var date1, date2;-->
<!--        var datefirst, datelast;-->
<!--        $("#slider-range").slider({-->
<!--            range: true,-->
<!--            min: 1415277424,-->
<!--            max: time,-->
<!--            step: 86400,-->
<!--            values: [ 1415277424, 1415466983],-->
<!--            slide: function (event, ui) {-->
<!--                date1 = new Date(ui.values[0] * 1000);-->
<!--                date2 = new Date(ui.values[1] * 1000);-->
<!--                $("#amount").val(date1.getDate() + "." + date1.getMonth() + "." + date1.getFullYear() + " - " + date2.getDate() + "." + date2.getMonth() + "." + date2.getFullYear());-->
<!--                $('[name=from]').val(ui.values[0]);-->
<!--                $('[name=to]').val(ui.values[1]);-->
<!--            }-->
<!--        });-->
<!--        date1 = new Date(1415277424 * 1000);-->
<!--        date2 = new Date(1415466983 * 1000);-->
<!--        $("#amount").val(date1.getDate() + "." + date1.getMonth() + "." + date1.getFullYear() + " - " + date2.getDate() + "." + date2.getMonth() + "." + date2.getFullYear());-->
<!--        $('[name=from]').val(ui.values[0]);-->
<!--        $('[name=to]').val(ui.values[1]);-->
<!--    });-->
<!---->
<!---->
<!--</script>-->


<script type="text/javascript">
    $(document).ready(function () {
        $(".fancybox").fancybox({
            fitToView: false
        });
    });


    $(function() {
        var date1, date2;
        $( "#slider-range" ).slider({
            range: true,
            step: 86400,
            min: (<?= $minDate;?>),
            max: (<?= $maxDate;?>+86400),
            values: [ <?php if ($from) echo $from; else echo $minDate; ?>, <?php if ($to) echo $to; else echo $maxDate;?> ],
            slide: function( event, ui ) {
                date1 = new Date(ui.values[0] * 1000);
                date2 = new Date(ui.values[1] * 1000);
                $("#amount").val((date1.getDate()) + "." + (date1.getMonth()+1) + "." + date1.getFullYear() + " - " + date2.getDate() + "." + (date2.getMonth()+1) + "." + date2.getFullYear());
                $('[name=from]').val(ui.values[0]-8600);
                $('[name=to]').val(ui.values[1]);
            }
        });
        date1 = new Date(<?php if ($from) echo $from; else echo $minDate; ?> * 1000);
        date2 = new Date(<?php if ($to) echo $to; else echo $maxDate;?> * 1000);
        $("#amount").val((date1.getDate()) + "." + (date1.getMonth()+1) + "." + date1.getFullYear() + " - " + date2.getDate() + "." + (date2.getMonth()+1) + "." + date2.getFullYear());
        $('[name=from]').val(ui.values[0]-8600);
        $('[name=to]').val(ui.values[1]);
    });

</script>

<h1>Парсер</h1>


<?php $form = $this->beginWidget('CActiveForm', array(
    'method' => 'get',
    'action' => array("/parser/index"),
)); ?>

<? //= $form->textField('from', '1415277424') ?>
<? //= $form->textField('to', '1415466983') ?>
<label for="amount">Диапазон дат:</label>
<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
<div id="slider-range"></div>
<?= CHtml::hiddenField('from', $minDate) ?>
<?= CHtml::hiddenField('to', $maxDate) ?>
<br/>
<?= CHtml::submitButton('Выбрать'); ?>

<?php $this->endWidget(); ?>


<form method="get" action="index.php">
    <input name="r" value="parser/index.php" type="hidden">

    <p>
        <label for="amount">Диапазон дат:</label>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
        <input name="from" value="1415277424" type="hidden">
        <input name="to" value="1415466983" type="hidden">
    </p>

    <div id="slider-range"></div>
    <br/>
<!--    <input type="submit">-->

</form>
<?php
//$dataProvider->sort->defaultOrder = "date DESC";
//
//
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'parser-grid',
//    'dataProvider' => $dataProvider,
//    'summaryText' => '',
//    'columns' => array(
//        array(
//
//            'name' => 'id',
//            'header' => '#',
//            'type' => 'raw',
//            'value' => '$data->id',
//        ),
////        array(
////            'name' => 'name',
////            'header' => 'Название сайта',
////            'type' => 'raw',
////            'value' => 'CHtml::link($data->name, "/parser/sites/".$data->id.".html", array("class"=>"fancybox", "data-fancybox-type"=>"iframe"))',
////            'name'=>'id',
////            'header'=>'#',
////            'type'=>'raw',
////            'value'=>'$data->id',
////        ),
//        array(
//            'name' => 'name',
//            'header' => 'Название сайта',
//            'type' => 'raw',
//            'value' => 'CHtml::link($data->name, $data->snapshotUrl(), array("class"=>"fancybox"))',
//
//        ),
//        array(
//            'name' => 'date',
//            'header' => 'Дата слепка',
//            'value' => 'date("d.m.Y", $data->date)',
//        ),
//
//    ),
//    'itemsCssClass' => 'table table-hover',
//    'pagerCssClass' => 'eqweqewqeq',
//    'pager' => array(
//        'firstPageLabel' => '<<',
//        'prevPageLabel' => '<',
//        'nextPageLabel' => '>',
//        'lastPageLabel' => '>>',
//        'maxButtonCount' => '7',
//        'header' => '',
//        'selectedPageCssClass' => 'active',
//        'htmlOptions' => array(
//            'class' => 'pagination',
//        )
//    ),
//    //'htmlOptions'=>array('class'=>'table'),
//));
?>


<table class="table table-bordered">
    <?php
    foreach ($siteNames as $i => $siteName) {
        if (!$i) {
            ?>
            <tr>
                <td></td>
                <?php foreach (array_keys($data) as $date) {
                    ?>
                    <td><?= $date; ?></td><?php
                }?>
            </tr>
        <?php } ?>

        <tr>
            <td><?= $siteName; ?></td>

            <?php
            /** @var Parser[] $parsers */
            foreach ($data as $date => $parsers) {
                ?>
                <td>
                    <?php
                    $j = 0;
                    foreach ($parsers as $parser) {
                        if ($parser->name == $siteName) {
                            if ($j++) {
                                echo '&nbsp;';
                            }
                            echo CHtml::link('<i class="glyphicon glyphicon-asterisk"></i>', $parser->snapshotUrl(), array("class" => "fancybox"));
                        }
                    }?>
                </td>
            <?php
            } ?>
        </tr>
    <?php
    }?>
</table>