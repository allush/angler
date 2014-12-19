<?php
/* @var $this ScoreController */
/* @var $model Score */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'score-form',
)); ?>

<div class="box box-outlined style-body">
    <div class="box-body">

        <form class="form-vertical form-stripped">
            <div class="form-group">
                <?php echo $form->errorSummary($model); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Событие: '); ?>
                <span class="text-support1"><?= $model->name; ?></span>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Цена'); ?>
                <?php echo $form->numberField($model, 'price', array('class' => 'form-control control-width-mini')); ?>
                <?php echo $form->error($model, 'price'); ?>
            </div>
            <div class="form-group">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-primary')); ?>
                <?= CHtml::link('Отмена', array('score/index'), array('class' => 'btn btn-default')); ?>
            </div>
        </form>
    </div>
</div>
<?php $this->endWidget(); ?>
