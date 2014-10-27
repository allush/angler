<?php
/* @var $this ScoreController */
/* @var $model Score */

$this->breadcrumbs=array(
	'Баллы'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Обновить',
);


?>

<section>



    <div class="section-body">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>



</section>