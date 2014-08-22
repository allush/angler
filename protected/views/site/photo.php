<?php
/* @var $this SiteController */
/* @var $model PhotoForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Photo';
$this->breadcrumbs=array(
	'Photo',
);
$user=User::model()->findByAttributes(array('id' => Yii::app()->user->id));
?>

<h1>Photo</h1>

<p>Hi, that's a photo page.</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Load photo'); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->
