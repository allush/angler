
<?php $this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => 'Инфа', 'url' => array('/profile/profile')),
        array('label' => 'My photo', 'url' => array('/profile/myphoto')),
        array('label' => 'Upload photo', 'url' => array('/profile/photo')),
        array('label' => 'Update profile', 'url' => array('/profile/updateprofile')),
    ),
    'htmlOptions'=>array(
        'class'=>'nav nav-pills'
    )
)); ?>