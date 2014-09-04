<?php
/**
 * @var $this ProfileController
 */


$this->pageTitle = Yii::app()->name . ' - Profile';
$this->breadcrumbs = array(
    'Profile',
);
$user = User::model()->findByAttributes(array('id' => Yii::app()->user->id));
?>

<?php $this->renderPartial('_menu');?>
<h1>Profile</h1>

<p>Hi, that's a profile page.</p>


<div class="row">
    <?php echo CHtml::label('Username: ', '', '') ?>
    <?php echo CHtml::label($user->username, '', '') ?>
</div>

<div class="row">
    <?php echo CHtml::label('Email: ', '', '') ?>
    <?php echo CHtml::label($user->email, '', '') ?>
</div>





