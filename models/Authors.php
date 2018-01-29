<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $name
 * @property string $fio
 * @property string $image
 * @property string $bdate
 * @property string $country
 * @property string $text
 *
 * @property Books[] $books
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bdate'], 'safe'],
            [['text'], 'string'],
            [['name', 'fio', 'image', 'country'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'fio' => Yii::t('app', 'Fio'),
            'image' => Yii::t('app', 'Image'),
            'bdate' => Yii::t('app', 'Bdate'),
            'country' => Yii::t('app', 'Country'),
            'text' => Yii::t('app', 'Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['author_id' => 'id']);
    }
}
