<?php
/* @var $this SiteController */
/* @var $model ProfileForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Profile';
$this->breadcrumbs=array(
	'Profile',
);
$user=User::model()->findByAttributes(array('email' => Yii::app()->user->name));
?>

<h1>Profile</h1>

<p>Hi, that's a profile page.</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'Current username'); ?>
        <?php echo $form->labelEx($model,$user->username); ?>
        <?php echo $form->textField($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'Current email'); ?>
        <?php echo $form->labelEx($model,$user->email); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div class="row">
        <?php echo $form->labelEx($model,'Current password'); ?>
        <?php echo $form->labelEx($model,$user->password); ?>
        <?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Update information'); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->
