<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>


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


<div class="container" id="page">

    <?php echo CHtml::encode(Yii::app()->name); ?>
    <!-- header -->
    <div class="row">

        <div class="col-sm-2">

            <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Главная', 'url' => array('/site/index')),
                    array('label' => 'Регстрация', 'url' => array('/site/register'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Авторизация', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Профиль', 'url' => array('/profile/profile'), 'visible' => !Yii::app()->user->isGuest),
                    array('label' => 'Галерея', 'url' => array('/gallery/allphoto')),
                    array('label' => 'Новости', 'url' => array('news/index')),
                    array('label' => 'Выход (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
                'htmlOptions' => array(
                    'class' => 'nav nav-pills nav-stacked'
                )
            )); ?>

            <!-- mainmenu -->
        </div>

        <div class="col-sm-8">
            <?php if (isset($this->breadcrumbs)): ?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                )); ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

        </div>
    </div>

    <?php echo Yii::powered(); ?>


    <!-- footer -->
</div>

<!-- page -->

</body>
</html>
