<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $text
 * @property string $image
 * @property int $cost
 * @property int $status
 * @property string $year
 * @property int $author_id
 *
 * @property Authors $author
 * @property BooksGenre[] $booksGenres
 * @property Genre[] $genres
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['cost', 'status', 'author_id'], 'integer'],
            [['year'], 'safe'],
            [['author_id'], 'required'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['author_id' => 'id']],
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
            'description' => Yii::t('app', 'Description'),
            'text' => Yii::t('app', 'Text'),
            'image' => Yii::t('app', 'Image'),
            'cost' => Yii::t('app', 'Cost'),
            'status' => Yii::t('app', 'Status'),
            'year' => Yii::t('app', 'Year'),
            'author_id' => Yii::t('app', 'Author ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksGenres()
    {
        return $this->hasMany(BooksGenre::className(), ['books_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->viaTable('books_genre', ['books_id' => 'id']);
    }
}
