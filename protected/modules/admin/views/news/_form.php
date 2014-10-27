<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>


<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'news-form',
)); ?>
<div class="box box-outlined style-body">
    <div class="box-head">
        <header>
            <h6 class="text-gray-light">Поля, помеченные <span class="required">*,</span> обязательны к заполнению.</h6>
        </header>
    </div>
    <div class="box-body">
        <form class="form-vertical form-bordered">
            <div class="form-group">
                <?php echo $form->errorSummary($model); ?>
            </div>
            <div class="form-group">
                <h3><?php echo $form->labelEx($model, 'head'); ?></h3>
                <?php echo $form->textArea($model, 'head', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'head'); ?>
            </div>

            <div class="form-group">
                <h3><?php echo $form->labelEx($model, 'content'); ?></h3>
                <?php echo $form->textArea($model, 'content', array('class' => 'form-control', 'id' => 'ck')); ?>

                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    var CKEdit = CKEDITOR.replace('ck');
                    CKFinder.setupCKEditor(CKEdit, '/ckfinder/');
                </script>

                <?php echo $form->error($model, 'content'); ?>
            </div>

            <div class="form-group">

                <?php echo $form->textField($model, 'tempTags', array('class'=>'form-control')); ?>
            </div>


            <!--загрузка с сервера блок div со списком (ul)-->



            <script type="text/javascript">



                $(function(){
                    $('#News_tempTags').keyup(function(){


                        var inputTags = $('#News_tempTags').val().split(',');

                        $.ajax({
                            type: "GET",
                            url: "index.php",
                            dataType: "html",
                            data:{
                                r:  'admin/news/getTags',
                                word: $.trim(inputTags[inputTags.length-1])
                            },
                            //возвращение страницы tags.php
                            success: function (data) {
                                $('#result').html(data)
                            }
                        });
                    });
                });




            </script>


            <div class="form-group">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-primary')); ?>
                <?php
                if(Yii::app()->controller->action->getId()=='update')
                 echo CHtml::link("Отмена", array('view', 'id'=>$model->id), array('class'=>'btn btn-default')); ?>
            </div>
        </form>
    </div>
</div>

<?php $this->endWidget(); ?>
