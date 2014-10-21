<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

    <div class="box style-body">
        <div class="box-head">
            <header>
                <h3 class="text-gray-light"><?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->id)); ?></h3>
            </header>
            <div class="tools">
                <div class="btn-group btn-group-transparent">
                    <a class="btn btn-equal btn-sm btn-collapse">
                        <i class="fa fa-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="box">
                <div class="box-head">
                    <ul class="nav nav-tabs pull-left" data-toggle="tabs">
                        <li class="active">
                            <a href=<?= "#userid".$data->id; ?>>id</a>
                        </li>
                        <li>
                            <a href=<?= "#usermail".$data->id; ?>>e-mail</a>
                        </li>
                        <li>
                            <a href=<?= "#userpass".$data->id; ?>>Пароль</a>
                        </li>
                        <li>
                            <a href=<?= "#userscore".$data->id; ?>>Баллы</a>
                        </li>
                    </ul>

                </div>

                <div class="box-body tab-content">
                    <div class="tab-pane active" id=<?= "userid".$data->id; ?>>
                        <?php echo CHtml::encode($data->id); ?>
                    </div>

                    <div class="tab-pane" id=<?= "usermail".$data->id; ?>>
                        <?php echo CHtml::encode($data->email); ?>
                    </div>

                    <div class="tab-pane" id=<?= "userpass".$data->id; ?>>
                        <?php echo CHtml::encode($data->password); ?>
                    </div>

                    <div class="tab-pane" id=<?= "userscore".$data->id; ?>>
                        <?php echo CHtml::encode($data->score); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
<!--	<br />-->

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('Имя пользователя')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->username); ?>
<!--	<br />-->

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('Электронная почта')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->email); ?>
<!--	<br />-->

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('Пароль')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->password); ?>
<!--	<br />-->

<!--    <b>--><?php //echo CHtml::encode($data->getAttributeLabel('Баллы')); ?><!--:</b>-->
<!--    --><?php //echo CHtml::encode($data->score); ?>
<!--    <br />-->


</div>