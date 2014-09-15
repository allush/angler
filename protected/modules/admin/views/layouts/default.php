<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery');?>
</head>

<body>


<div class="container" id="page">

    <?php echo CHtml::encode(Yii::app()->name); ?>
    <!-- header -->
    <div class="row">

        <div class="col-sm-2">

            <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Админская', 'url' => array('default/index')),
                    array('label' => 'Пользователи', 'url' => array('user/index')),
                    array('label' => 'Баллы', 'url' => array('score/index')),
                    array('label' => 'Фотографии', 'url' => array('photo/index')),
                    array('label' => 'Новости', 'url' => array('news/index')),
                    array('label' => 'Выход (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
                'htmlOptions'=>array(
                    'class'=>'nav nav-pills nav-stacked'
                )
            )); ?>

            <!-- mainmenu -->
        </div>

        <div class="col-sm-8">
            <?php if (isset($this->breadcrumbs)): ?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'htmlOptions'=>array(
                        'class'=>'breadcrumb'
                    )
                )); ?><!-- breadcrumbs -->
            <?php endif ?>
            <?php $this->widget('zii.widgets.CMenu', array(
                'items' =>$this->menu,
                'htmlOptions'=>array(
                    'class'=>'nav nav-pills nav-stacked'
                )
            )); ?>

            <?php echo $content; ?>

        </div>
    </div>
    Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
    All Rights Reserved.<br/>
    <?php echo Yii::powered(); ?>


    <!-- footer -->
</div>

<!-- page -->

</body>
</html>
