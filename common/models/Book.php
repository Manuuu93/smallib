<?php

namespace common\models;

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii2tech\ar\linkmany\LinkManyBehavior;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $publish_date
 * @property string $status
 * @property string $picture
 *
 * @property BookToAuthor[] $bookToAuthors
 * @property BookToGenre[] $bookToGenres
 * @property Author[] $authors
 * @property Genre[] $genres
 * @property Quote[] $quotes
 */
class Book extends \yii\db\ActiveRecord
{
    const STATUS_APPROVED = 'APPROVED';
    const STATUS_MODERATION = 'MODERATION';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    public function behaviors()
    {
        return [
            'linkGroupBehavior' => [
                'class' => LinkManyBehavior::className(),
                'relation' => 'authors', // relation, which will be handled
                'relationReferenceAttribute' => 'author_ids', // virtual attribute, which is used for related records specification
            ],
            'linkGroupBehavior2' => [
                'class' => LinkManyBehavior::className(),
                'relation' => 'genres', // relation, which will be handled
                'relationReferenceAttribute' => 'genre_ids', // virtual attribute, which is used for related records specification
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'status',
                ],
                'value' => self::STATUS_MODERATION,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['publish_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 32],
            [['author_ids', 'genre_ids'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'publish_date' => 'Publish Date',
            'status' => 'Статус',
            'author_ids' => 'Авторы'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookToAuthors()
    {
        return $this->hasMany(BookToAuthor::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookToGenres()
    {
        return $this->hasMany(BookToGenre::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->via('bookToAuthors');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->via('bookToGenres');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotes()
    {
        return $this->hasMany(Quote::className(), ['book_id' => 'id']);
    }

    /**
     * @return boolean
     */
    public function setApproved()
    {
        $this->status = static::STATUS_APPROVED;
        return $this->save();
    }

    public function getPicture()
    {
        if($this->picture) {
            return \Yii::$app->storage->getFile($this->picture);
        }
    }
}
