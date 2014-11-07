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

    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox();
        });
    </script>

<h1>Parsers</h1>
<?php
echo CHtml::beginForm(CHtml::normalizeUrl(array('parser/index')), 'get', array('id'=>'filter-form'));
echo CHtml::dateField('datefirst', (isset($_GET['datefirst'])) ? $_GET['datefirst']:'');
//echo CHtml::textField('datefirst', (isset($_GET['datefirst'])) ? $_GET['datefirst']:'');
echo CHtml::dateField('datelast', (isset($_GET['datelast'])) ? $_GET['datelast']:'');
echo '<br/>';
echo CHtml::submitButton('Поиск', array('name'=>''));
echo CHtml::endForm();
?>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $dataProvider->sort->defaultOrder = "date DESC";
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
        'summaryText'=>false,
    )); ?>
    </tbody>
</table>
<?php //$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>

<!--перенести в контроллер-->
<?php
//$d = time()-432000;
//
//$query = Yii::app()->db->createCommand()->select('*')->from('parser')->where('date >= :d', array(':d'=>$d))->queryAll();
//$d;
//?>

<?php
//
// $this->widget('zii.widgets.grid.CGridView', array(
//    'dataProvider'=>$dataProvider,
//    'columns'=>array(
//        array(
//            'name'=>'id',
//            'type'=>'html',
//            'value'=>$data->id,
//        ),
//        array(
//            'name'=>'name',
//            'type'=>'html',
//            'value'=>CHtml::link($data->name, 'index.php'),
//        ),
//
//
//    ),
//)); ?>