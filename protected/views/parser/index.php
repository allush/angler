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

<br/>





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