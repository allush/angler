<?php

/**
 * ProfileForm class.
 * user profile  data. It is used by the 'profile' action of 'SiteController'.
 */
class Item extends CActiveRecord {
    public $image;
    // другие свойства

    public function rules(){
        return array(
            //устанавливаем правила для файла, позволяющие загружать
            // только картинки!
            array('image', 'file', 'types'=>'jpg, gif, png'),
        );
    }
}

?>