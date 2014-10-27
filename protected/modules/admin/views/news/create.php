<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);



?>

<section>
    <div class="section-header">
<h1>Создание новости</h1>
    </div>
<div class="section-body">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</section>