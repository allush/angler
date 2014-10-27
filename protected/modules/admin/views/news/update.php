<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);



?>
<section>
    <div class="section-header">
<h1>Обновление <?php echo $model->id; ?></h1>
    </div>
    <div class="section-body">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</section>