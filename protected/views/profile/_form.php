<?php
/**
 * @var $model Photo
 * @var $form CActiveForm
 */

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'upload-photo-form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
)); ?>

<?php echo $form->hiddenField($model, 'user_id', array('value' => Yii::app()->user->id)); ?>

<?php if ($model->isNewRecord) {
    echo $form->labelEx($model, 'Изображение');
    echo $form->fileField($model, 'image');
    echo $form->error($model, 'image');
} ?>

<div class="row">
    <?php if (!$model->isNewRecord) {
        echo $form->labelEx($model, 'Широта:');
        echo $model->coord_x;
    }
    echo $form->hiddenField($model, 'coord_x', array('id' => 'coord-x'));
    ?>
</div>

<div class="row">
    <?php if (!$model->isNewRecord) {
        echo $form->labelEx($model, 'Долгота:');
        echo $model->coord_y;
    }
    echo $form->hiddenField($model, 'coord_y', array('id' => 'coord-y'));
    ?>
</div>

<?php if ($model->isNewRecord) {
    echo CHtml::submitButton('Загрузить фото');
} else
    echo CHtml::submitButton('Обновить фото');
?>

<?php $this->endWidget(); ?>


<div id="map"></div>