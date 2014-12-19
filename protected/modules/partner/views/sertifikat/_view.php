<?php
/* @var $this SertifikatController */
/* @var $data Sertifikat */
/* @var $model LoginForm */
?>

<div class="view">
    <tbody>
    <tr>
        <td><?php echo CHtml::encode($data->id); ?></td>
        <td><?php echo CHtml::encode($data->price) ?></td>
        <td><?php echo CHtml::encode($data->user_id); ?></td>
        <td>
            <div class="form">
                <?php //@TODO Форма для использования сертификатов
                //     $model=new For
                echo CHtml::beginForm();
                echo CHtml::errorSummary($model);?>

                <div class="row">
                    <?php echo CHtml::activeLabel($model, 'Номер сертификата'); ?>
                    <?php echo CHtml::activeTextField($model, 'id'); ?>
                </div>

                <div class="row submit">
                    <?php echo CHtml::submitButton('Войти'); ?>
                </div>

                <?php echo CHtml::endForm(); ?>
            </div>
            <!-- form -->
        </td>

        <td><?php echo CHtml::link('Info', array('view', 'id' => $data->id), array('class' => 'btn btn-support3 btn-xs btn-rounded')); ?></td>
    </tr>
    </tbody>
</div>