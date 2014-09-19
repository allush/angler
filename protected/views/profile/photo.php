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

<?php echo $form->textField($model,'coord_x',array('id'=> 'coord-x')) ;?>
<?php echo $form->textField($model,'coord_y',array('id'=> 'coord-y')) ;?>

<?php echo CHtml::submitButton('Load Photo'); ?>





<?php $this->endWidget(); ?>

<?php //echo Chtml::textField('coords','',array('id'=> 'coord-x'));?>
<?php //echo Chtml::textField('coords','',array('id'=> 'coord-y'));?>
<div id="map"></div>

