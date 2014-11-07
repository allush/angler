<?php
/* @var $this ParserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parsers',
);

//$this->menu=array(
//	array('label'=>'Create Parser', 'url'=>array('create')),
//	array('label'=>'Manage Parser', 'url'=>array('admin')),
//);
//?>



<h1>Парсер</h1>
<?php
//echo CHtml::beginForm(CHtml::normalizeUrl(array('parser/index')), 'get', array('id'=>'filter-form'));
//echo CHtml::dateField('datefirst', (isset($_GET['datefirst'])) ? $_GET['datefirst']:'');
////echo CHtml::textField('datefirst', (isset($_GET['datefirst'])) ? $_GET['datefirst']:'');
//echo CHtml::dateField('datelast', (isset($_GET['datelast'])) ? $_GET['datelast']:'');
//echo '<br/>';
//echo CHtml::submitButton('Поиск', array('name'=>''));
//echo CHtml::endForm();
//?>

<p>
    <label for="amount">Диапазон дат: </label>
    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>

<div id="slider-range"></div>

<?php
    $dataProvider->sort->defaultOrder = "date DESC";

//@todo изменить класс таблицы!!
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'parser-grid',
    'dataProvider'=>$dataProvider,
    'summaryText'=>false,
    'columns'=>array(
        array(
            'name'=>'id',
            'header'=>'#',
            'type'=>'raw',
            'value'=>'$data->id',
        ),
        array(
            'name'=>'name',
            'header'=>'Название сайта',
            'type'=>'raw',
            'value'=>'CHtml::link($data->name, Yii::app()->getBasePath()."/data/snapshots/".$data->id.".htm", array("class"=>"fancybox", "data-fancybox-type"=>"iframe"))',
        ),
        array(
            'name'=>'date',
            'header'=>'Дата слепка',
            'value'=>'date("d.m.Y", $data->date)',
        ),
    ),
)); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();

        var time = new Date().getTime() / 1000;
        $( "#slider-range" ).slider({
            range: true,
            min: 1414977424,
            max: time,
            step: 86400,
            values: [ 1414977424, time ],
            slide: function( event, ui ) {
                $( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
            " - " + $( "#slider-range" ).slider( "values", 1 ) );
    });
</script>
