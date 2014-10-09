<!--поиск переданных символов в таблице tags-->

<!--создание списка из выбранных тегов в блоке-->

<!---->


<?php
/**
 * @var $this NewsController
 * @var $tags Tags[]
 */

?>




<div id="tagslist">
    <ul class="list-group" id="tagsid">
        <?php foreach($tags as $tag){
            echo '<li class="list-group-item">'.$tag->tag.'</li>';
        }?>
        <!-- загружаемые элементы -->
    </ul>
</div>

<script type="text/javascript">




    $("#tagslist li").click(function() {

        //считать строку
        //разбить на элементы
        //последний заменить на выбранный
        //вывести в инпут


        var TagsInputArr = $('#News_tempTags').val().split(',');
        TagsInputArr[TagsInputArr.length-1] = $(this).text();
        var out="";
        for(var i=0; i < TagsInputArr.length-1; i++)
        {
            out+= $.trim(TagsInputArr[i])+", ";
        }
        out+=TagsInputArr[TagsInputArr.length-1];

        $('#News_tempTags').val(out);

        $('#News_tempTags').focus();

    });

</script>