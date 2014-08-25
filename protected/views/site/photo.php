<?php
/* @var $this SiteController */
/* @var $model Photo */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Create';
$this->breadcrumbs=array(
	'Create',
);
$user=User::model()->findByAttributes(array('id' => Yii::app()->user->id));
?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'photo-form',
)); ?>

<h1>Photo</h1>

<p>Hi, that's a photo page.</p>

<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::activeFileField($model, 'image'); ?>
<?php echo CHtml::endForm(); ?>



<?php $this->endWidget(); ?>
</div><!-- form -->
