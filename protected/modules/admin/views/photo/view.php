<?php
/* @var $this PhotoController */
/* @var $model Photo */

$this->breadcrumbs=array(
	'Информация о фото'=>array('index'),
	$model->id,
);


//$this->widget('zii.widgets.CMenu', array(
//    'items' => array(
//        array('label'=>'Список фото', 'url'=>array('index')),
//
//    ),
//    'htmlOptions'=>array(
//        'class'=>'nav nav-pills'
//    )
//));
?>
<section>
    <div class="section-header">
<h1>Информация о фото #<?php echo $model->id; ?></h1>
    </div>
    <div class="section-body">



                    <div class="box box-body">
        <?= CHtml::image('images/photo/'.$model->filename, 'Put the alt value of image here', array('width'=>'100%','height'=>'100%','title'=>'Put your image title here')); ?>
                    </div>


    <div class="box box-outlined style-body">
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Файл</th>
                    <th><?= $model->filename ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>ID</td>
                    <td><?= $model->id ?></td>
                </tr>
                <tr>
                    <td>Загрузил</td>
                    <td><?= $model->user ? $model->user->username : '-' ?></td>
                </tr>
                <tr>
                    <td>Прошло модерацию</td>
                    <td><?php if ($model->is_confirmed == 1) echo 'Да'; else echo 'Нет'; ?></td>
                </tr>
                <tr>
                    <td>Широта</td>
                    <td><?= $model->coord_x ?></td>
                </tr>
                <tr>
                    <td>Долгота</td>
                    <td><?= $model->coord_y ?></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>



<?php //$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id',
//        array(
//            'name' => 'user_id',
//            'value' => $model->user ? $model->user->username : '-',
//        ),
//		'filename',
//        'is_confirmed',
//        'coord_x',
//        'coord_y',
//	),
//)); ?>
    </div>
</section>