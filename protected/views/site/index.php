<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Добро пожаловать на <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Поздравляем, вы успешно создали ваше Yii приложение</p>

<p>Вы можете изменить содержимое этой страницы посредством редактирования слеующих файлов:</p>
<ul>
	<li>Файл раз: <code><?php echo __FILE__; ?></code></li>
	<li>Файл два: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>Для дальнейшего изучения изучайте <a href="http://www.yiiframework.com/doc/"> документацю</a>.
Задавайте вопросы на данном <a href="http://www.yiiframework.com/forum/">форуме</a>,
по интересующим вас вопросам.</p>
