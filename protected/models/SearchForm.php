<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.10.14
 * Time: 15:50
 */

class SearchForm extends CFormModel
{
    //добавить еще одну переменную, отвечающую за критерий поиска (загаловок, тег, содержание)
    public $keyword;

    public function rules()
    {
        return array(
            array('keyword', 'required')
        );
    }

}
