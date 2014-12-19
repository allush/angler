<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>

    <!--    Plupload:-->
    <script type="text/javascript" src="/js/plupload/plupload.full.min.js"></script>


    <!-- Add jQuery library -->
    <!--    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>-->


    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript">


        ymaps.ready(init);
        var myMap;

        function init() {
            myMap = new ymaps.Map("map", {
                center: [57.5262, 38.3061], // Углич
                zoom: 11
            });

            myMap.events.add('click', function (e) {
                var coords = e.get('coords');
                $('#coord-x').val(coords[0]);
                $('#coord-y').val(coords[1]);
                console.log(coords);
                if (myMap.balloon.isOpen()) {
                    myMap.balloon.close();
                }
                var coords = e.get('coords');
                myMap.balloon.open(coords, {
                    contentHeader: '',
                    contentBody: '<p>Координаты фото: ' + [
                        coords[0].toPrecision(6),
                        coords[1].toPrecision(6)
                    ].join(', ') + '</p>',
                    contentFooter: ''
                });
            });
        }
    </script>
</head>

<body>


<div id="wrap">
    <header class="masthead">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php echo CHtml::encode(Yii::app()->name); ?>
                </div>
                <div class="col-sm-6">
                    <div class="pull-right  hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h3><i
                                    class="glyphicon glyphicon-user"></i></h3></a>
                        <?php if (!Yii::app()->user->isGuest) {
                            $this->widget('zii.widgets.CMenu', array(
                                'items' => array(
                                    array('label' => 'Профиль', 'url' => array('/profile/profile')),
                                    array('label' => 'Сертификаты', 'url' => array('/profile/sertifikat')),
                                    array('label' => 'Мои фото', 'url' => array('/profile/myphoto')),
//                                    array('label' => 'Загрузка фото', 'url' => array('/profile/photo')),
//                                    array('label' => 'Обновить профиль', 'url' => array('/profile/updateprofile')),
                                    array('label' => 'Выход (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'))
                                ),
                                'htmlOptions' => array(
                                    'class' => 'dropdown-menu'
                                )
                            ));
                        } else {
                            $this->widget('zii.widgets.CMenu', array(
                                'items' => array(
                                    array('label' => 'Регистрация', 'url' => array('/site/register')),
                                    array('label' => 'Авторизация', 'url' => array('/site/login')),
                                ),
                                'htmlOptions' => array(
                                    'class' => 'dropdown-menu'
                                )
                            ));
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- header -->

    <div class="navbar navbar-custom navbar-inverse navbar-static-top" id="nav">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse">

                <?php $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Главная', 'url' => array('/site/index')),
                        array('label' => 'Регистрация', 'url' => array('/site/register'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Авторизация', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
//                        array('label' => 'Профиль', 'url' => array('/profile/profile'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Галерея', 'url' => array('/gallery/allphoto')),
                        array('label' => 'Новости', 'url' => array('news/index')),
//                        array('label' => 'Выход (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                    'htmlOptions' => array(
                        'class' => 'nav navbar-nav nav-justified'

                    )
                )); ?>

            </div>
        </div>
    </div>
    <!-- mainmenu -->


<!--   <div class="divider" id="section1"></div>-->

    <div class="container">
        <div class="col-sm-10 col-sm-offset-1">
            <?php if (isset($this->breadcrumbs)): ?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                )); ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

        </div>
    </div>

<!--    <div class="divider" id="section2"></div>-->
<!---->
<!--    <section class="bg-1">-->
<!--        <div class="col-sm-6 col-sm-offset-3 text-center"><h2 style="padding:20px;background-color:rgba(5,5,5,.8)">-->
<!---->
<!--        </h2></div>-->
<!--    </section>-->

</div>
</div>
<div id="footer">
    <div class="container">
        <?php echo Yii::powered(); ?>
    </div>
</div>

<ul class="nav pull-right scroll-top">
    <li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>

<!-- page -->

</body>
</html>
