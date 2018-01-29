<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books_genre".
 *
 * @property int $books_id
 * @property int $genre_id
 *
 * @property Genre $genre
 * @property Books $books
 */
class BooksGenre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books_genre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['books_id', 'genre_id'], 'required'],
            [['books_id', 'genre_id'], 'integer'],
            [['books_id', 'genre_id'], 'unique', 'targetAttribute' => ['books_id', 'genre_id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genre_id' => 'id']],
            [['books_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['books_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'books_id' => Yii::t('app', 'Books ID'),
            'genre_id' => Yii::t('app', 'Genre ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasOne(Books::className(), ['id' => 'books_id']);
    }
}
