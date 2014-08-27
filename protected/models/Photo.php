<?php

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $filename
 */
class Photo extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public $image;

    public function tableName()
    {
        return 'photo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('user_id, filename', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('filename', 'length', 'max' => 255),
            array('image', 'file', 'types' => 'jpg, gif, png'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'Username',
            'filename' => 'Filename',
            'image' => 'Photo',
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function imageUrl(){
        return Yii::app()->request->getBaseUrl(true) . '/www/images/photo/';
    }
    public static function path(){
        return Yii::app()->basePath . '/../images/photo/';
    }
}
