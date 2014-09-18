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
        array('label'=>'Все новости', 'url'=>array('index')),
        array('label'=>'Создать новость', 'url'=>array('create')),
        array('label'=>'Назад', 'url'=>array('view', 'id'=>$model->id)),
        array('label'=>'Управление новостями', 'url'=>array('admin')),
    ),
    'htmlOptions'=>array(
        'class'=>'nav nav-pills'
    )
));
?>

<h1>Update News <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>