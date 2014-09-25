<?php
/* @var $this ProfileController */
/* @var $model Photo */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Загрузка фото';
$this->breadcrumbs = array(
    'Загрузка фото',
);
?>
<?php $this->renderPartial('_menu');?>


<?php $this->renderPartial('_form' ,array('model' =>$model)); ?>


