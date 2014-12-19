<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    'Партнёрка',
);
?>
<section>
    <div class="section-header">
        <h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
    </div>

    <div class="section-body">
        <div class="box box-body style-white">
            <p>
                Добро пожаловать в партнёрку <br>
                Это представление действия '<code><?php echo $this->action->id; ?></code>'
                которое принадлежит контроллеру '<code><?php echo get_class($this); ?></code>'
                модуля '<code><?php echo $this->module->id; ?></code>'
            </p>

            <p>
                Возможно редактирование этой страницы путём модификации файла
                '<code><tt><?php echo __FILE__; ?></tt></code>'
            </p>

        </div>
    </div>

</section>