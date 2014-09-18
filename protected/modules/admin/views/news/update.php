<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);


$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label'=>'List News', 'url'=>array('index')),
        array('label'=>'Create News', 'url'=>array('create')),
        array('label'=>'View News', 'url'=>array('view', 'id'=>$model->id)),
        array('label'=>'Manage News', 'url'=>array('admin')),
    ),
    'htmlOptions'=>array(
        'class'=>'nav nav-pills'
    )
));
?>

<h1>Update News <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>