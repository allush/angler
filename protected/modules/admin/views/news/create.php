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

<section>
    <div class="section-header">
<h1>Создание новости</h1>
    </div>
<div class="section-body">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</section>