<?php
/* @var $this ScoreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'События',
);

//$this->menu=array(
//    array('label'=>'Генерировать события', 'url'=>array('createEvents')),
//
//);

?>

<h1>События</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>
