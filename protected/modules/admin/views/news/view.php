<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->id,
);

?>
<section>

    <div class="section-body contain-lg">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-sm-9">
                    <div class="box box-body style-inverse">
                        <h1><?php echo CHtml::encode($model->head);?></h1>
                    </div>
                    <div class="box box-body style-white">
                        <?php echo ($model->content);?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="box box-body">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => array(

                            array('label'=>'Редактирование', 'url'=>array('update', 'id'=>$model->id)),
                            array('label'=>'Удаление', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить данную новость?')),

                        ),
                        'htmlOptions'=>array(
                            'class'=>'nav nav-pills nav-stacked nav-transparent'
                        )
                    ));
                    ?>

                        <h3 class="text-light">Теги</h3>
                        <div class="list-tags">
                            <?php

                            foreach ($model->tags as $tag) {

                                ?><a class="btn btn-xs btn-support1"><?= $tag->tag ?></a>
                                <?php
                            }

                            ?>
                        </div>
                        <br/>
                        <?= date('d.m.Y', $model->date);?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>