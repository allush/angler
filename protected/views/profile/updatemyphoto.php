<?php
/* @var $this ProfileController */
/* @var $model Photo */
/* @var $form CActiveForm */
$this->pageTitle = Yii::app()->name . ' - Update my Photo';
$this->breadcrumbs = array(
    'Update my Photo',
);
$photo=Photo::model()->findByAttributes(array('id' => $model->id));
?>

<?php $this->renderPartial('_menu');?>
<h1>Фото</h1>

<p>Здесь вы можете обновить координаты вашего фото</p>

<?php $this->renderPartial('_form' ,array('model' =>$model)); ?>







