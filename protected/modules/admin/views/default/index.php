<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Админская',
);
?>
<section>
<div class="section-header">
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
</div>

<div class="section-body">
<p>
Добро пожаловать в админскую <br>
Это представление действия "<?php echo $this->action->id; ?>"
которое принадлежит контроллеру "<?php echo get_class($this); ?>"
модуля "<?php echo $this->module->id; ?>"
</p>
<p>
Возможно редактирование этой страницы путём модификации файла <tt><?php echo __FILE__; ?></tt>
</p>

</div>

</section>