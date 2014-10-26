<?php

/**
 * This is the model class for table "sertifikat".
 *
 * The followings are the available columns in table 'sertifikat':
 * @property integer $id
 * @property integer $user_id
 * @property integer $price
 * @property User $user
 */
class Sertifikat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sertifikat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
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
			'user_id' => 'ID пользователя',
            'price' => 'Цена'
		);
	}

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

    public function PdfUrl()
    {
        return Yii::app()->baseUrl . '/sertifikat/' . $this->filename;
    }

    public function PdfPath()
    {
        return $this->path() . $this->filename;
    }

    public static function path()
    {
        return Yii::app()->getBasePath() . '/..' . '/sertifikat';
    }
}
