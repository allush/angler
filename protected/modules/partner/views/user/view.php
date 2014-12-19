<?php
/* @var $this UserController */
/* @var $model User */

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
                                    <th>Имя пользователя</th>
                                    <th><?= $model->username ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td><?= $model->id ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td><?= $model->email ?></td>
                                </tr>
                                <tr>
                                    <td>Пароль</td>
                                    <td><?= $model->password ?></td>
                                </tr>
                                <tr>
                                    <td>Баллы</td>
                                    <td><?= $model->score ?></td>
                                </tr>
                                <tr>
                                    <td>Авторизация через</td>
                                    <td><?= $model->network ?></td>
                                </tr>
                                <tr>
                                    <td>Профиль</td>
                                    <td><?= CHtml::link($model->identity, $model->identity) ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="box box-body">
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items' => array(
                                array('label' => 'К списку пользователей', 'url' => array('index')),
                                array('label' => 'Удалить пользователя', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Вы уверены в удалении?')),
                            ),
                            'htmlOptions' => array(
                                'class' => 'nav nav-pills nav-stacked nav-transparent'
                            )
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>