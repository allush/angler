<?php
/* @var $this SertifikatController */
/* @var $model Sertifikat */

$this->breadcrumbs = array(
    'Пользователи' => array('index'),
    $model->id,
);

?>

<section>
    <div class="section-body contain-lg">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-sm-9">
                    <div class="box box-outlined style-body">
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id пользователя</th>
                                    <th><?= $model->user_id ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td><?= $model->id ?></td>
                                </tr>
                                <tr>
                                    <td>Цена</td>
                                    <td><?= $model->price ?></td>
                                </tr>
                                <tr>
                                    <td>Потрачено</td>
                                    <td><?php if ($model->used == 1) echo 'Да'; else echo 'Нет'; ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="box box-body">
                        <?php
                        if ($model->used == 0) {
                            $this->widget('zii.widgets.CMenu', array(
                                'items' => array(
                                    array('label' => 'К списку сертификатов', 'url' => array('index')),
                                    array('label' => 'Пометить как потраченный', 'url' => '#', 'linkOptions' => array('submit' => array('makeused', 'id' => $model->id), 'confirm' => 'Вы уверены в изменении?')),
                                    array('label' => 'Удалить сертификат', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Вы уверены в удалении?')),
                                ),
                                'htmlOptions' => array(
                                    'class' => 'nav nav-pills nav-stacked nav-transparent'
                                )
                            ));
                        } else {
                            $this->widget('zii.widgets.CMenu', array(
                                'items' => array(
                                    array('label' => 'К списку сертификатов', 'url' => array('index')),
                                    array('label' => 'Удалить сертификат', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Вы уверены в удалении?')),
                                ),
                                'htmlOptions' => array(
                                    'class' => 'nav nav-pills nav-stacked nav-transparent'
                                )
                            ));
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>