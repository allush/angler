<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property integer $date
 * @property string $head
 * @property string $content
 *
 * @property Tags[] $tags
 */
class News extends CActiveRecord
{
    public $tempTags;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('date, head, content', 'required'),
            array('date', 'numerical', 'integerOnly' => true),
            array('head, tempTags', 'length', 'max' => 100)
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'tags' => array(self::MANY_MANY, 'Tags', 'news_tag(news_id, tags_id)')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'date' => 'Дата',
            'head' => 'Заголовок',
            'content' => 'Содержание',
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
        $criteria->compare('date', $this->date);
        $criteria->compare('head', $this->head, true);
        $criteria->compare('content', $this->content, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    protected function afterSave()
    {
        parent::afterSave();

        NewsTag::model()->deleteAllByAttributes(array(
            'news_id' => $this->id,
        ));

        // разбираем теги по запятой

        $exTags = explode(",", $this->tempTags);

        // каждый тег проверям в базе
        foreach ($exTags as $tag) {
            $tag = trim($tag);

            /** @var Tags $find */
            $find = Tags::model()->findByAttributes(array(
                'tag' => $tag
            ));
            if (!$find) {
                $t = new Tags();
                $t->tag = $tag;
                if ($t->save()) {
                    $nt = new NewsTag();
                    $nt->news_id = $this->id;
                    $nt->tags_id = $t->id;
                    $nt->save();
                }
            } else {
                $nt = new NewsTag();
                $nt->news_id = $this->id;
                $nt->tags_id = $find->id;
                $nt->save();
            }

        }
        // если есть - связываем с новостью

        // если нет в базе - создаем и связываем с новостью



    }

    protected function afterFind()
    {
        foreach ($this->tags as $i => $tag) {
            if ($i) {
                $this->tempTags .= ', ';
            }
            $this->tempTags .= $tag->tag;
        }
    }
}
