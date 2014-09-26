<?php
/* @var $this ScoreController */
/* @var $model Score */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'score-form',
    )); ?>



    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Событие: '); ?>
        <?= $model->name; ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Цена'); ?>
        <?php echo $form->numberField($model, 'price'); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->