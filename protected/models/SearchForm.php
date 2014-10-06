<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.10.14
 * Time: 15:50
 */

class SerachForm extends CFormModel
{
    public $keyword;

    public function rules()
    {
        return array(
            array('keyword', 'required')
        );
    }

}
