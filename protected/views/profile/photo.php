<?php
/* @var $this SiteController */
/* @var $model Photo */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Load Photo';
$this->breadcrumbs = array(
    'Load Photo',
);
?>
<?php $this->renderPartial('_menu');?>

<h1>Photo</h1>

<p>Hi, that's a photo page.</p>

<?php $this->renderPartial('_form' ,array('model' =>$model)); ?>


