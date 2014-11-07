<?php
/* @var $this ParserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parsers',
);

$this->menu=array(
	array('label'=>'Create Parser', 'url'=>array('create')),
	array('label'=>'Manage Parser', 'url'=>array('admin')),
);
?>

<h1>Parsers</h1>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
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