<?php
/* @var $this SiteController */
/* @var $model Photo */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Load Photo';
$this->breadcrumbs=array(
	'Load Photo',
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'photo-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<h1>Photo</h1>

<p>Hi, that's a photo page.</p>

<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::activeFileField($model, 'image'); ?>
<?php echo CHtml::endForm(); ?>

<div class="row buttons">
    <?php echo CHtml::submitButton('Load Photo'); ?>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
