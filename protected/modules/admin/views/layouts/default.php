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
    <link type="text/css" rel="stylesheet" href="/css/boostbox/theme-1/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/css/boostbox/theme-1/boostbox.css" />
    <link type="text/css" rel="stylesheet" href="/css/boostbox/theme-1/boostbox_responsive.css" />
    <link type="text/css" rel="stylesheet" href="/css/boostbox/theme-1/font-awesome.min.css" />
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
<script src="../js/boostbox/libs/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>
<script src="../js/boostbox/libs/spin.js/spin.min.js"></script>
<script src="../js/boostbox/libs/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../js/boostbox/core/demo/DemoDocs.js"></script>
<script src="../js/boostbox/core/demo/Demo.js"></script>
<!-- Additional JS includes -->

<!-- Always put App.js last in your javascript imports -->
<script src="/js/boostbox/core/App.js"></script>



<header id="header">



    <!-- BEGIN NAVBAR -->
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="btn btn-transparent btn-equal btn-menu" href="javascript:void(0);"><i class="fa fa-bars fa-lg"></i></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="header-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
            </ul><!--end .nav -->
        </div><!--end #header-navbar-collapse -->
    </nav>
    <!-- END NAVBAR -->
</header>


   <!-- header -->
    <div id="base">

        <div id="sidebar" class="sidebar-fixed">
            <div class="sidebar-back"></div>
            <div class="sidebar-content">
                <div class="nav-brand">
                    <a class="main-brand" href="#">
                        <h3 class="text-light text-white">
                            A<span>ngler</span>
                        </h3>
                    </a>
                </div>






            <?php

            $this->widget('zii.widgets.CMenu', array(
                'encodeLabel'=>false,
                'items' => array(
                    array('label' => 'А<span class="title">дминка</span>', 'url' => array('default/index'), 'linkOptions'=>array('class'=>'linkbtn')),
                    array('label' => 'П<span class="title" >ользователи</span>', 'url' => array('user/index'), 'linkOptions'=>array('class'=>'linkbtn')),
                    array('label' => 'Б<span class="title">аллы<span class="expand-sign">+</span></span>', 'linkOptions'=>array('class'=>'linkbtn'), 'url'=>'', 'items'=>array(
                        array('label'=>'Все события', 'url' => array('score/index'),'linkOptions'=>array('class'=>'linkbtn')),
                        array('label'=>'Генерировать события', 'url'=>array('createEvents'),'linkOptions'=>array('class'=>'linkbtn')),
                    )),
                    array('label' => 'Ф<span class="title">ото<span class="expand-sign">+</span></span>','linkOptions'=>array('class'=>'linkbtn'), 'url'=>'', 'items'=>array(
                        array('label'=>'Новые','url'=>array('/admin/photo/index'),'linkOptions'=>array('class'=>'linkbtn')),
                        array('label'=>'Подтверждённые фото','url'=>array('/admin/photo/confirmed'),'linkOptions'=>array('class'=>'linkbtn')),
                    )),
                    array('label' => 'Н<span class="title">овости<span class="expand-sign">+</span></span>', 'url'=>'','linkOptions'=>array('class'=>'linkbtn'), 'items'=>array(
                        array('label'=>'Все новости', 'url'=>array('news/index'),'linkOptions'=>array('class'=>'linkbtn')),
                        array('label'=>'Создать новость', 'url'=>array('create'),'linkOptions'=>array('class'=>'linkbtn')),
                        array('label'=>'Управление новостями', 'url'=>array('admin'),'linkOptions'=>array('class'=>'linkbtn')),
                    )),
                    array('label' => 'В<span class="title">ыход (' . Yii::app()->user->name . ')</span>', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest,'linkOptions'=>array('class'=>'linkbtn'))
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
            <section>
            <div class="section-body contain-lg">
            <?php echo $content; ?>
                </div>
            </section>

        </div>
    </div>
<!--    Copyright &copy; --><?php //echo date('Y'); ?><!-- by My Company.<br/>-->
<!--    All Rights Reserved.<br/>-->
    <?php echo Yii::powered(); ?>


    <!-- footer -->


<!-- page -->

</body>
</html>
