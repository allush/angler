
<?php $this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => 'Информация', 'url' => array('/profile/profile')),
        array('label' => 'Мои фото', 'url' => array('/profile/myphoto')),
        array('label' => 'Загрузка фото', 'url' => array('/profile/photo')),
        array('label' => 'Обновить профиль', 'url' => array('/profile/updateprofile')),
    ),
    'htmlOptions'=>array(
        'class'=>'nav nav-pills'
    )
)); ?>