<?php
/* @var $this SiteController */


$this->pageTitle=Yii::app()->name . ' - Запрос';
$this->breadcrumbs=array(
	'Запрос',
);
?>

<h1>Здесь будет вызываться запрос в яндекс и выдаваться его результаты</h1>



<div class="row buttons">
    <?php echo CHtml::link('Запрос', array('getzapros')); ?>
</div>


