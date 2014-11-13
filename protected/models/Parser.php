<?php

/**
 * This is the model class for table "parser".
 *
 * The followings are the available columns in table 'parser':
 * @property integer $id
 * @property string $name
 * @property integer $date
 * @property integer $request_id
 *
 *  @property Request $request
 */
class Parser extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'parser';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, date, request_id', 'required'),
            array('date', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, date,request_id', 'safe', 'on' => 'search'),
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
            'request'=>array(self::BELONGS_TO, 'Request', 'request_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'request_id' => 'Request ID',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('date', $this->date);
        $criteria->compare('request_id', $this->request_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Parser the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function snapshotUrl()
    {
        return $this->snapshotPath() ? Yii::app()->assetManager->publish($this->snapshotPath()) : null;
    }

    public function snapshotPath()
    {
        $path = Yii::app()->getBasePath() . "/data/snapshots/" . $this->id . ".png";
        if (!file_exists($path) or !is_file($path)) {
            return null;
        }
        return $path;
    }
}
