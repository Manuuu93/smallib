<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book_to_genre".
 *
 * @property int $id
 * @property int $book_id
 * @property int $genre_id
 *
 * @property Book $book
 * @property Genre $genre
 */
class BookToGenre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_to_genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'genre_id'], 'integer'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'genre_id' => 'Genre ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }
}
