<?php
/* @var $this ProfileController */
/* @var $model ProfileForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' -Редактировать';
$this->breadcrumbs = array(
    'Профиль' => array('profile'),
    'Редактировать'
);

$user = User::model()->findByAttributes(array('id' => Yii::app()->user->id));
?>

<?php $this->renderPartial('_menu'); ?>
<h1>Редактировать</h1>

<p>Обновление страницы профиля</p>


<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'profile-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'Имя пользователя:'); ?>
        <?php echo $form->labelEx($model, $user->username); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Электронная почта:'); ?>
        <?php echo $form->labelEx($model, $user->email); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Новый пароль'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Обновить профиль'); ?>
    </div>




    <?php $this->endWidget(); ?>
</div><!-- form -->

