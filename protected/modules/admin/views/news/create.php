<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);


$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label'=>'Все новости', 'url'=>array('index')),
        array('label'=>'Управление новостями', 'url'=>array('admin')),
    ),
    'htmlOptions'=>array(
        'class'=>'nav nav-pills'
    )
));
?>

<h1>Create News</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>