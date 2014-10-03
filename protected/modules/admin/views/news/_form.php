<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>


<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'news-form',
)); ?>

<p class="note">Поля, помеченные <span class="required">*,</span> обязательны к заполнению.</p>

<?php echo $form->errorSummary($model); ?>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'date'); ?>
<!--		--><?php //echo $form->textField($model,'date'); ?>
<!--		--><?php //echo $form->error($model,'date'); ?>
<!--	</div>-->

<div class="form-group">
    <h3><?php echo $form->labelEx($model, 'head'); ?></h3>
    <?php echo $form->textArea($model, 'head', array('rows' => 4, 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'head'); ?>
</div>

<div class="form-group">
    <h3><?php echo $form->labelEx($model, 'content'); ?></h3>
    <?php echo $form->textArea($model, 'content', array('rows' => 30, 'class' => 'form-control', 'id' => 'ck')); ?>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('ck');
    </script>

    <?php echo $form->error($model, 'content'); ?>
</div>

<div class="form-group">

<?php echo $form->textField($model, 'tempTags', array('class'=>'form-control')); ?>

</div>


<!--загрузка с сервера блок div со списком (ul)-->

<div id="result">

</div>

<script type="text/javascript">

    // !! ПЕРЕДАВАТЬ НЕ ВСЕ ВВЕДЕННЫЕ СИМВОЛЫ, А ТОЛЬКО ПОСЛЕ ЗАПЯТОЙ (РАЗДЕЛЯТЬ ТЕГИ) !!!

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
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-default')); ?>
</div>

<?php $this->endWidget(); ?>
