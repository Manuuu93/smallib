<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property BookToGenre[] $bookToGenres
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookToGenres()
    {
        return $this->hasMany(BookToGenre::className(), ['genre_id' => 'id']);
    }
}
