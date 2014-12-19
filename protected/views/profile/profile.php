<?php
/**
 * @var $this ProfileController
 */


$this->pageTitle = Yii::app()->name . ' - Профиль';
$this->breadcrumbs = array(
    'Профиль'
);
$user = User::model()->findByAttributes(array('id' => Yii::app()->user->id));
?>
<div class="smalldivider"></div>

<?php $this->renderPartial('_menu');
echo CHtml::link('Редактировать', array('updateprofile'));
?>
<h1>Профиль</h1>


<div class="row">
    <?php echo CHtml::label('Имя пользователя: ', '', '') ?>
    <?php echo CHtml::label($user->username, '', '') ?>
</div>

<div class="row">
    <?php echo CHtml::label('Электронная почта: ', '', '') ?>
    <?php echo CHtml::label($user->email, '', '') ?>
</div>

<div class="row">
    <?php echo CHtml::label('Баллы: ', '', '') ?>
    <?php echo CHtml::label($user->score, '', '') ?>
</div>






