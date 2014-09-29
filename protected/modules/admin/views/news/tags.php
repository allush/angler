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


        alert($(this).text());
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

