<?php
/* @var $this ProfileController */
/* @var $model Photo */
/* @var $form CActiveForm */
$this->pageTitle = Yii::app()->name . ' - Обновить фото';
$this->breadcrumbs = array(
    'Мои фото'=>array('myphoto'),
    'Обновить координаты'
);
$photo = Photo::model()->findByAttributes(array('id' => $model->id));
?>

<?php $this->renderPartial('_menu'); ?>
<h1>Фото</h1>

<p>Здесь вы можете обновить координаты вашего фото</p>

<?php $this->renderPartial('_form', array('model' => $model)); ?>







