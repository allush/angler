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


<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'upload-photo-form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
)); ?>
<?php echo $form->hiddenField($model, 'user_id', array('value' => Yii::app()->user->id)); ?>

<?php echo $form->labelEx($model, 'image'); ?>
<?php echo $form->fileField($model, 'image'); ?>
<?php echo $form->error($model, 'image'); ?>

<?php echo CHtml::submitButton('Load Photo'); ?>

<?php $this->endWidget(); ?>
