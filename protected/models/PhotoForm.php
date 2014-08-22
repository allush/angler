<?php

/**
 * ProfileForm class.
 * user profile  data. It is used by the 'profile' action of 'SiteController'.
 */
class PhotoForm extends CFormModel
{
	public $url;

    public function rules()
    {
        return array(
            array('url','length', 'max' => 32, 'min' => 4),
            
        );
    }

}
?>