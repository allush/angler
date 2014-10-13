<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>



    <?php Yii::app()->getClientScript()->registerCoreScript('jquery');?>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>



<!--    BOOSTBOX-->
    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="/css/boostbox/theme-default/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/css/boostbox/theme-default/boostbox.css" />
    <link type="text/css" rel="stylesheet" href="/css/boostbox/theme-default/boostbox_responsive.css" />
    <link type="text/css" rel="stylesheet" href="/css/boostbox/theme-default/font-awesome.min.css" />
    <!-- Additional CSS includes -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/js/boostbox/libs/utils/html5shiv.js"></script>
    <script type="text/javascript" src="/js/boostbox/libs/utils/respond.min.js"></script>
    <![endif]-->

</head>

<body>


<!-- BEGIN JAVASCRIPT -->
<script src="/js/boostbox/libs/jquery/jquery-1.11.0.min.js"></script>
<script src="/js/boostbox/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/boostbox/core/BootstrapFixed.js"></script>
<script src="/js/boostbox/libs/bootstrap/bootstrap.min.js"></script>
<!-- Additional JS includes -->

<!-- Always put App.js last in your javascript imports -->
<script src="/js/boostbox/core/App.js"></script>



<header id="header">
    <?php echo CHtml::encode(Yii::app()->name); ?>
</header>


   <!-- header -->
    <div id="base">

        <div id="sidebar">
            <div class="sidebar-back"></div>
            <div class="sidebar-content">
                <div class="nav-brand">
                    <a class="main-brand" href="#"><h3 class="text-light text-white">логотип</h3> </a>
                </div>


            <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Админская', 'url' => array('default/index')),
                    array('label' => 'Пользователи', 'url' => array('user/index')),
                    array('label' => 'Баллы', 'url' => array('score/index')),
                    array('label' => 'Фото', 'url' => array('photo/index')),
                    array('label' => 'Новости', 'url' => array('news/index')),
                    array('label' => 'Выход (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
                'htmlOptions'=>array(
                    'class'=>'main-menu'
                )
            )); ?>

                </div>

            <!-- mainmenu -->
        </div>

        <div id="content">
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
<!--    Copyright &copy; --><?php //echo date('Y'); ?><!-- by My Company.<br/>-->
<!--    All Rights Reserved.<br/>-->
    <?php echo Yii::powered(); ?>


    <!-- footer -->


<!-- page -->

</body>
</html>
