<?php

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $filename
 * @property integer $is_confirmed
 * @property float $coord_x
 * @property float $coord_y
 *
 * @property User $user
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
            array('image', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true),
            array('is_confirmed', 'boolean'),
            array('coord_x', 'numerical'),
            array('coord_y', 'numerical'),

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
            'is_confirmed'=> 'Confirmed',
            'coord_x'=>'Shirota',
            'coord_y'=>'Dolgota',
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

    protected function beforeDelete()
    {
        $path = $this->imagePath();
        if (file_exists($path) and is_file($path)) {
            unlink($path);
        }
        return parent::beforeDelete();
    }

    public function imageUrl()
    {
        return Yii::app()->baseUrl . '/images/photo/' . $this->filename;
    }

    public function imagePath()
    {
        return $this->path() . $this->filename;
    }

    public static function path()
    {
        return Yii::app()->basePath . '/../images/photo/';
    }
}
