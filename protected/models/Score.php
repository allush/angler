<?php

/**
 * This is the model class for table "score".
 *
 * The followings are the available columns in table 'score':
 * @property integer $id
 * @property integer $action
 * @property integer $price
 * @property string $name
 */
class Score extends CActiveRecord
{
    const EVENT_ADD_PHOTO = 0;
    const EVENT_SET_LOCATION = 1;
    const SERT_200 = 200;
    const SERT_500 = 500;
    const SERT_1000 = 1000;
    public static $events = array(
        self::EVENT_ADD_PHOTO => array(
            'price' => 10,
            'name' => 'Добавление фото'
        ),
        self::EVENT_SET_LOCATION => array(
            'price' => 20,
            'name' => 'Привязка фото к карте'
        ),
    );


    public static function createEvents()
    {
        $scores = Score::model()->findAll();
        if (count($scores) == 0) {
            foreach (self::$events as $event => $data) {
                $eventModel = new Score;
                $eventModel->action = $event;
                $eventModel->price = $data['price'];
                $eventModel->name = $data['name'];
                $eventModel->save();
            }
        }
    }


    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'score';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('action, price', 'required'),
            array('action, price', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, action, price', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'action' => 'Действие',
            'price' => 'Цена',
            'name' => 'Имя события'
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
        $criteria->compare('action', $this->action);
        $criteria->compare('price', $this->price);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Score the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
