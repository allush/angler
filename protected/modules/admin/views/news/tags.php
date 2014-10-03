<!--поиск переданных символов в таблице tags-->

<!--создание списка из выбранных тегов в блоке-->

<!---->


<?php
/**
 * @var $this NewsController
 * @var $tags Tags[]
 */

?>


<script type="text/javascript">

    // !! ДОДЕЛАТЬ ВСТАВКУ ТЕКСТА В ПОЛЕ ВВОДА !!!


    $("#tagslist li").click(function() {

        //считать строку
        //разбить на элементы
        //последний заменить на выбранный
        //вывести в инпут

        var StrTags = $('#News_tempTags').val();
        var TagsInputArr = StrTags.split(',');
        TagsInputArr[TagsInputArr.length-1] = $(this).text();
        var out="";
        for(var i=0; i < TagsInputArr.length-1; i++)
        {
            out+=TagsInputArr[i]+",";
        }
        out+=" "+TagsInputArr[TagsInputArr.length-1];
        $('#News_tempTags').val(out);   //если элемент первый, то строка будет начинаться с пробела

        $('#News_tempTags').focus();

    });

</script>

<div id="tagslist">
    <ul class="list-group" id="tagsid">
        <?php foreach($tags as $tag){
            echo '<li class="list-group-item">'.$tag->tag.'</li>';
        }?>
        <!-- загружаемые элементы -->
    </ul>
</div>

